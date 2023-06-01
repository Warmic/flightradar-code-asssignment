<?php

namespace Database\Seeders;

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Passport;
use App\Models\Ticket;
use DB;
use Exception;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $passports = Passport::factory()->count(5)->create();

        /** @var Collection $airports */
        $airports = Airport::factory()->count(5)->create()->keyBy('id');
        $flights  = Flight::factory()->count(5)->state(new Sequence(fn(Sequence $sequence) => [
            'source_airport_id'      => $airport1 = $airports->random(),
            'destination_airport_id' => $airports->except($airport1->id)->random(),
        ]))->create();

        $createTicketsCallback = function() use ($flights, $passports) {
            Ticket::factory()
                  ->count(5)
                  ->sequence(fn(Sequence $sequence) => [
                      'flight_id'   => $flights->random(),
                      'seat_id'     => random_int(1, 32),
                      'passport_id' => $passports->random(),
                  ])
                  ->create();
        };

        // Not pretty, but it ensures there will be no duplicates
        do {
            $success = true;
            try {
                DB::transaction($createTicketsCallback);
            } catch (Exception) {
                $success = false;
            }
        } while (!$success);
    }
}
