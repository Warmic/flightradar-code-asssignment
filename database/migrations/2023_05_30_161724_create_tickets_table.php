<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function(Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('passport_id')->index()->constrained();
            $table->foreignUuid('flight_id')->constrained();
            $table->tinyInteger('seat_id', unsigned: true);

            $table->unique(['flight_id', 'seat_id']);

            // We can also add additional unique index for flight_id + passport_id,
            // or push this responsibility to business logic, but from query
            // purpose, there is no need for such index
            // $table->unique(['flight_id', 'passport_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
