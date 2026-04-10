<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete();
            $table->string('method_name')->nullable();
            $table->string('oid')->nullable()->unique();
            $table->string('number')->nullable();
            $table->decimal('amount', 14, 2)->default(0);
            $table->decimal('charge', 14, 2)->default(0);
            $table->decimal('final_amount', 14, 2)->default(0);
            $table->enum('status', ['pending', 'processing', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('withdrawals');
    }
};
