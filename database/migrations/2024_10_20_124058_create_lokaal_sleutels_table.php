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
        Schema::create('lokaal_sleutels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lokaal_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sleutel_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
//            $table->string('lokaal_code');
//            $table->string('lokaal_blok');
//            $table->string('instelling');
//            $table->string('sleutel_code')->unique();
            $table->text('extra_info')->nullable();
            $table->string('haak_nr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokaal_sleutels');
    }
};
