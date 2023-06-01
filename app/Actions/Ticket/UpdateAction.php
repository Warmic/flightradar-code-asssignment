<?php

namespace App\Actions\Ticket;

use App\Exceptions\Tickets\SeatIsOccupiedByCurrentPersonException;
use App\Exceptions\Tickets\SeatIsOccupiedByOtherPersonException;
use App\Models\Ticket;
use App\Services\FlightLockManager;

final class UpdateAction
{
    public function __construct(
        private readonly FlightLockManager $lock
    ) {
    }

    public function execute(Ticket $ticket, int $newSeatId): Ticket
    {
        // I guess here is a potential for DOS attack, so it's a good place for an additional throttling
        $this->lock->runWithinLock(function() use ($newSeatId, $ticket) {
            if ($ticket->seat_id === $newSeatId) {
                throw new SeatIsOccupiedByCurrentPersonException();
            }

            $isPlaceOccupied = $this->checkIsSeatOccupied($ticket, $newSeatId);
            if ($isPlaceOccupied) {
                throw new SeatIsOccupiedByOtherPersonException();
            }

            $ticket->update(['seat_id' => $newSeatId]);
        });

        return $ticket;
    }

    private function checkIsSeatOccupied(Ticket $ticket, int $seatId): bool
    {
        return Ticket::where('flight_id', $ticket->flight_id)
                     ->where('seat_id', $seatId)
                     ->exists();
    }
}