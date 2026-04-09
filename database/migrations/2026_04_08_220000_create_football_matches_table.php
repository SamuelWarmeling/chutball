<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('football_matches', function (Blueprint $table) {
            $table->id();
            $table->string('league');
            $table->string('home_team');
            $table->string('away_team');
            $table->dateTime('starts_at');
            $table->decimal('home_odds', 8, 2)->default(1.80);
            $table->decimal('draw_odds', 8, 2)->default(3.10);
            $table->decimal('away_odds', 8, 2)->default(2.40);
            $table->enum('status', ['scheduled', 'live', 'finished', 'cancelled'])->default('scheduled');
            $table->string('featured_badge')->nullable();
            $table->timestamps();
        });

        DB::table('football_matches')->insert([
            [
                'league' => 'Brasileirao Serie A',
                'home_team' => 'Palmeiras',
                'away_team' => 'Flamengo',
                'starts_at' => now()->addHours(6),
                'home_odds' => 2.05,
                'draw_odds' => 3.15,
                'away_odds' => 2.35,
                'status' => 'scheduled',
                'featured_badge' => 'Aposta Garantida',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'league' => 'Champions League',
                'home_team' => 'Real Madrid',
                'away_team' => 'Manchester City',
                'starts_at' => now()->addHours(10),
                'home_odds' => 2.30,
                'draw_odds' => 3.40,
                'away_odds' => 2.10,
                'status' => 'scheduled',
                'featured_badge' => 'Bilhete do Mestre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'league' => 'Libertadores',
                'home_team' => 'River Plate',
                'away_team' => 'Boca Juniors',
                'starts_at' => now()->addHours(14),
                'home_odds' => 1.95,
                'draw_odds' => 3.00,
                'away_odds' => 2.70,
                'status' => 'scheduled',
                'featured_badge' => 'Aposta Livre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('football_matches');
    }
};
