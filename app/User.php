<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Log;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
        {

        return true;
        }

    public function haveAccess()
        {
        $access = false;
        $user = json_decode(Auth::user()->roles->access);


//        Log::debug($user);

        return true;
        }

    public function roles()
        {
        return $this->belongsTo('App\Roles');
        }

}
