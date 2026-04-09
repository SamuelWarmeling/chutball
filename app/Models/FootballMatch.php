<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'league',
        'home_team',
        'away_team',
        'starts_at',
        'home_odds',
        'draw_odds',
        'away_odds',
        'status',
        'featured_badge',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }
}
