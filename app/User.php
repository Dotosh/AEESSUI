<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //for form to work, they must be fillable
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//  ROle eloquent
    public function role(){

        return $this->belongsTo('App\Role');


    }


    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    //isAdmin() is the Middleware security
    //create a middleware name 'Admin'
    //add 'admin' to $routeMiddleware in Kernel
    //create a route group in Route -> Web, name it admin
    //create a class in User model names isAdmin
    public function isAdmin(){

        if ($this->role->name == "administrator" && $this->is_active == 1){

            return true;
        }
        return false;
    }


    public function posts(){

        return $this->hasMany('App\Post');
    }


}
