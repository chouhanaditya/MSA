<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable=[
        'field_name',
        'field_address',
        'field_city',
        'field_state',
        'field_zipcode',
        'field_owner_org',
        'field_owner_name',
        'field_owner_email',
        'field_owner_contactno',
        'field_notes',
    ];

    public function matches() {
        return $this->hasOne('App\match');

    }
}
