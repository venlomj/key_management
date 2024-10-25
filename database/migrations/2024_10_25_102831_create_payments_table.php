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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_key_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('deposit_amount', 10, 2); // Bedrag van de betaling (voor borg)
            $table->boolean('deposit_paid')->default(false); // Boolean om bij te houden of de borg is betaald
            $table->boolean('deposit_refunded')->default(false); // Boolean om bij te houden of de borg is terugbetaald
            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
