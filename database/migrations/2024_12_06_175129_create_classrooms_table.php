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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('key_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('classroom_name');
            $table->string('classroom_code');
            $table->string('classroom_block');
            $table->text('classroom_description')->nullable();//zk
            $table->text('short_description')->nullable();//zk
            $table->text('note')->nullable();//zk
            $table->foreignId('institution_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('first_specification')->nullable();//zk
            $table->string('second_specification')->nullable();//zk
            $table->string('search_field')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
