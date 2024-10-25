<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('key_cabinets', function (Blueprint $table) {
            $table->id();
            $table->string('cabinet_name')->default('Main Key Cabinet'); // Naam van de sleutelkast
            $table->string('location')->nullable(); // Locatie van de sleutelkast
            $table->integer('capacity')->nullable(); // Capaciteit van de sleutelkast
            $table->integer('current_count')->default(0); // Huidig aantal opgeslagen sleutels
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_cabinets');
    }
};
