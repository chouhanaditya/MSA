<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    protected $fillable=[
        'school_name',
        'school_email',
        'school_address',
        'school_city',
        'school_state',
        'school_zipcode',
        'school_contactno',
    ];

    public function teams() {
        return $this->hasOne('App\team');

    }


}
