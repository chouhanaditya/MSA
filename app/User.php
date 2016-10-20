<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $table    ='users';

    protected $fillable = [
        'password','name', 'email','address','city','state','zipcode',
        'contactno','role','security_question1','security_answer1','security_question2','security_answer2'
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function teams() {
        return $this->hasOne('App\team');

    }
}
