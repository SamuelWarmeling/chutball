<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ref_by')->nullable();
            $table->string('ref_id')->unique();
            $table->string('name');
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('ip')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type')->default('user');
            $table->decimal('balance', 14, 2)->default(0);
            $table->decimal('register_bonus', 14, 2)->default(0);
            $table->string('withdraw_password')->nullable();
            $table->string('gateway_method')->nullable();
            $table->string('gateway_number')->nullable();
            $table->decimal('rebate_balance', 14, 3)->default(0);
            $table->decimal('rb1', 14, 2)->default(0);
            $table->decimal('rb2', 14, 2)->default(0);
            $table->decimal('rb3', 14, 2)->default(0);
            $table->boolean('investor')->default(false);
            $table->rememberToken();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('ban_unban', ['ban', 'unban'])->default('unban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
