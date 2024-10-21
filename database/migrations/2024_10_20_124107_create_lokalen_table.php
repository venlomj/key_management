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
        Schema::create('lokalen', function (Blueprint $table) {
            $table->id();
            $table->string('lokaal_code')->unique();
            $table->string('lokaal_blok');
            $table->string('instelling');
            $table->string('lokaal_omschrijving');
            $table->text('omschrijving_kort');
            $table->text('opmerking');
            $table->string('specificatie1')->nullable();
            $table->string('specificatie2')->nullable();
            $table->string('zoekveld')->nullable();
            $table->boolean('verwijderen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokalen');
    }
};
