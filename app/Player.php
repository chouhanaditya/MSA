<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable=[
        'player_name',
        'player_email',
        'player_address',
        'player_city',
        'player_state',
        'player_zipcode',
        'player_contactno',
        'player_eligibility_status',
        'team_id',

    ];

    public function team() {
        return $this->belongsTo('App\Team');
    }

}
