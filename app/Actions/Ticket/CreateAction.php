<?php

namespace App\Actions\Ticket;

use App\Exceptions\Tickets\PlaneAlreadyDepartedException;
use App\Exceptions\Tickets\PlaneRanOutOfTicketsException;
use App\Models\Flight;
use App\Models\Passport;
use App\Models\Ticket;
use App\Services\FlightLockManager;
use Carbon\Carbon;

final class CreateAction
{
    public function __construct(
        private readonly FlightLockManager $lock
    ) {
    }

    public function execute(Flight $flight, Passport $passport): Ticket
    {
        return $this->lock->runWithinLock(function() use ($flight, $passport): Ticket {
            $isPlaneDeparted = Carbon::now()->lessThan($flight->departure_at);
            if ($isPlaneDeparted) {
                throw new PlaneAlreadyDepartedException();
            }

            $vacantSeatId = $this->getVacantSeat($flight);
            if ($vacantSeatId === null) {
                throw new PlaneRanOutOfTicketsException();
            }

            return Ticket::create([
                'flight_id'   => $flight->getKey(),
                'passport_id' => $passport->getKey(),
                'seat_id'     => $vacantSeatId,
            ]);
        });
    }

    private function getVacantSeat(Flight $flight): ?int
    {
        $occupiedSeats = $flight->tickets()->pluck('seat_id');
        $vacantSeats   = Ticket::getSeatRange()->diff($occupiedSeats);

        if ($vacantSeats->isEmpty()) {
            return null;
        }

        return $vacantSeats->random();
    }
}