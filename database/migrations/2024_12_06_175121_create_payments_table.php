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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('deposit_amount', 10, 2)->default(25); // Bedrag van de betaling (voor borg)
            $table->boolean('deposit_paid')->default(false); // Boolean om bij te houden of de borg is betaald
            $table->boolean('deposit_refunded')->default(false); // Boolean om bij te houden of de borg is terugbetaald
            $table->enum('payment_method', ['cash', 'payconiq', 'bank_transfer', 'credit_card'])->nullable();
            $table->timestamp('deposit_paid_at')->nullable();
            $table->timestamp('deposit_refunded_at')->nullable();
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
