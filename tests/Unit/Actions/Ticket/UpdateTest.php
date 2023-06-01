<?php

namespace Tests\Unit\Actions\Ticket;

use App\Actions\Ticket\UpdateAction;
use App\Exceptions\Tickets\SeatIsOccupiedByCurrentPersonException;
use App\Exceptions\Tickets\SeatIsOccupiedByOtherPersonException;
use App\Models\Flight;
use App\Models\Ticket;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    private UpdateAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = $this->app->make(UpdateAction::class);
    }

    /**
     * A basic test example.
     */
    public function test_seat_is_changed(): void
    {
        /** @var Ticket $ticket */
        $ticket  = Ticket::factory()->create();
        $newSeat = Ticket::getSeatRange()->first(fn(int $seat) => $seat !== $ticket->seat_id);
        $this->action->execute(
            $ticket,
            $newSeat
        );

        $this->assertDatabaseHas('tickets', [
            'id'      => $ticket->id,
            'seat_id' => $newSeat,
        ]);
    }

    /**
     * A basic test example.
     */
    public function test_seat_is_occupied_by_other(): void
    {
        $this->expectException(SeatIsOccupiedByOtherPersonException::class);

        /** @var Ticket $ticketStale */
        $flight = Flight::factory()->create();
        [$ticketStale, $ticketActive] = Ticket::factory()
                                              ->count(2)
                                              ->create(['flight_id' => $flight->id]);

        $this->action->execute(
            $ticketActive,
            $ticketStale->seat_id
        );
    }

    /**
     * A basic test example.
     */
    public function test_seat_is_occupied_by_me(): void
    {
        $this->expectException(SeatIsOccupiedByCurrentPersonException::class);

        /** @var Ticket $ticket */
        $ticket = Ticket::factory()->create();
        $this->action->execute(
            $ticket,
            $ticket->seat_id
        );
    }
}
