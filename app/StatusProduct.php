<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'description'
    ];

    public function tracking(){
        return $this->hasMany(Tracking::class);
    }
}
