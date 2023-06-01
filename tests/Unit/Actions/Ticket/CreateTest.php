<?php

namespace Tests\Unit\Actions\Ticket;

use App\Actions\Ticket\CreateAction;
use App\Exceptions\Tickets\PlaneRanOutOfTicketsException;
use App\Models\Flight;
use App\Models\Passport;
use Tests\TestCase;

class CreateTest extends TestCase
{
    private CreateAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = $this->app->make(CreateAction::class);
    }

    /**
     * A basic test example.
     */
    public function test_model_is_created(): void
    {
        $this->action->execute(
            $flight = Flight::factory()->create(),
            $passport = Passport::factory()->create()
        );

        $this->assertDatabaseHas('tickets', [
            'flight_id'   => $flight->getKey(),
            'passport_id' => $passport->getKey(),
        ]);
    }

    /**
     * A basic test example.
     */
    public function test_flight_has_no_tickets(): void
    {
        $this->expectException(PlaneRanOutOfTicketsException::class);

        $flight = Flight::factory()->create();
        for ($i = 0; $i < 33; $i++) {
            $this->action->execute(
                $flight,
                Passport::factory()->create()
            );
        }
    }
}
