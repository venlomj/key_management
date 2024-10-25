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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('account_id')->unique(); //id van de account
            $table->string('last_name');
            $table->string('first_name');
            $table->boolean('active')->default(true);
            $table->boolean('admin')->default(false);
            //$table->decimal('deposit_amount', 10, 2);
            //$table->boolean('deposit_paid')->default(false);
            $table->string('employee_id')->unique();
            $table->string('school');
            //$table->string('class');
            $table->string('search_field')->nullable();
            $table->date('date_of_birth');
            $table->string('preferred_name');
            $table->boolean('to_keep')->default(false);
            //$table->string('payment_method')->nullable();

            //Laravel common fields
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
