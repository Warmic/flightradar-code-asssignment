<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Passport;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'passport_id' => Passport::factory(),
            'seat_id'     => Ticket::getSeatRange()->random(),
            'flight_id'   => Flight::factory(),
        ];
    }
}
