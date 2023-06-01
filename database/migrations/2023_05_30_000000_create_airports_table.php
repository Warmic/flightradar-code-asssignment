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
        Schema::create('airports', function(Blueprint $table) {
            // This could be an integer, and thus if this table is small, it can be stored in RAM and
            // this way queries will run faster, but in this example let's use uuids everywhere
            $table->uuid('id')->primary();

            $table->string('code')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
