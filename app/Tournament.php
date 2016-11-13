<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable=[
        'tournament_name',
        'tournament_price_money',
        'tournament_sponsers',
        'tournament_teams',
        'tournament_start_date',
        'tournament_end_date',
         ];
}
