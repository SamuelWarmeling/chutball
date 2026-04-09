<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('football_match_id')->constrained('football_matches')->cascadeOnDelete();
            $table->enum('bet_type', ['guaranteed', 'free'])->default('guaranteed');
            $table->string('market')->default('Resultado final');
            $table->string('selection');
            $table->decimal('odds', 8, 2);
            $table->decimal('stake', 12, 2);
            $table->decimal('potential_win', 12, 2)->default(0);
            $table->enum('status', ['pending', 'won', 'lost', 'refunded', 'cancelled'])->default('pending');
            $table->timestamp('settled_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bets');
    }
};
