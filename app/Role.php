<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id','name', 'description'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
