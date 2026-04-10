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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32)->default('pix');
            $table->string('channel', 64);
            $table->string('receiver', 120)->nullable();
            $table->string('address', 191)->nullable();
            $table->decimal('minimum', 14, 2)->default(20);
            $table->decimal('maximum', 14, 2)->default(100000);
            $table->decimal('minimum_withdraw', 14, 2)->default(20);
            $table->decimal('maximum_withdraw', 14, 2)->default(100000);
            $table->decimal('withdraw_charge', 6, 2)->default(7);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('payment_methods');
    }
};
