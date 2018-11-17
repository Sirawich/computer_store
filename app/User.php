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
    protected $fillable = [
        'name', 'email', 'password','address','state','phone','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function isAdmin(){

        return $this->role_id == 2;
    }
    public function isUser(){
        return $this->role_id == 1;
    }
    public function promotion(){
        return $this->hasMany(Promotion::class);
    }

    public function tracking(){
        return $this->hasMany(Tracking::class);
    }
}
