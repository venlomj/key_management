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
        Schema::create('personen', function (Blueprint $table) {
            $table->id();
            $table->string('s2_id')->unique();
            $table->string('naam');
            $table->string('voornaam');
            $table->string('waarborg_bedrag', 10, 2);
            $table->boolean('waarborg_bet')->default(false);
            $table->string('wisa_code');
            $table->string('school');
            $table->string('klas');
            $table->date('geboortedatum');
            $table->boolean('te_behouden')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personen');
    }
};
