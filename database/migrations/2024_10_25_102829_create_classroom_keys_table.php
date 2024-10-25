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
        Schema::create('classroom_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('key_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity')->default(1); // Track how many of this key are assigned to this classroom
            $table->text('extra_info')->nullable();
            $table->string('hook_number')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_keys');
    }
};
