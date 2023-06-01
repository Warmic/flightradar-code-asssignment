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
        Schema::create('flights', function(Blueprint $table) {
            $table->uuid('id')->primary();

            $table
                ->foreignUuid('source_airport_id')
                ->constrained()
                ->on('airports');
            $table
                ->foreignUuid('destination_airport_id')
                ->constrained()
                ->on('airports');

            $table->timestamp('departure_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
