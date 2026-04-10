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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete();
            $table->string('method_name')->nullable();
            $table->string('method_number')->nullable();
            $table->string('channel')->nullable();
            $table->string('address')->nullable();
            $table->string('order_id')->nullable()->unique();
            $table->string('transaction_id')->nullable();
            $table->string('number')->nullable()->comment('User Number');
            $table->decimal('amount', 14, 2)->default(0)->comment('User Deposit Amount');
            $table->decimal('final_amount', 14, 2)->default(0);
            $table->decimal('usdt', 14, 4)->nullable();
            $table->dateTime('date')->nullable();
            $table->text('feedback')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
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
        Schema::dropIfExists('deposits');
    }
};
