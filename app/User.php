<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

     use HasApiTokens, Notifiable;
    //

    protected $fillable = [
        'name', 'email' ,'password',
    ];
}
