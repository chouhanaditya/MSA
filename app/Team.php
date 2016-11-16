<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    protected $fillable=[
        'team_name',
        'coach_mobile',
        'matches_won',
        'matches_lost',
        'school_id',
        'user_id'
    ];

    public function school() {
        return $this->belongsTo('App\School');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function player() {
        return $this->hasMany('App\Player');

    }
     public function match() {
        return $this->hasMany('App\Match');

    }

}
