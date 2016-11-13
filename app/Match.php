<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable= [
        'match_name',
	'tournament_id',
	'field_id',
	'referee_id',
	'match_date',
	'match_start_time',
	'match_half_time',
	'match_end_time',
	'match_team1_id',
	'match_team2_id',
	'match_team1_score',
	'match_team2_score',
	'match_team1_goals',
	'match_team2_goals',
    ];

    public function tournament() {
        return $this->belongsTo('App\Tournament');
    }
    public function field() {
        return $this->belongsTo('App\Field');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function team() {
        return $this->belongsTo('App\Team');
    }
}
