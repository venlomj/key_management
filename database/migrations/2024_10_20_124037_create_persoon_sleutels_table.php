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
        Schema::create('persoon_sleutels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persoon_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sleutel_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('sleutel_code');
            $table->boolean('uitgegeven')->default(false);
            $table->string('extra_code')->nullable();
            $table->boolean('tijdelijk')->default(false);
            $table->boolean('uitgeleend')->default(false);
            $table->boolean('teruggegeven')->default(false);
            $table->timestamp('teruggave_tijdstip')->nullable();
            $table->timestamp('uitgeven')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persoon_sleutels');
    }
};
