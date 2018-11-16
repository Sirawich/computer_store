<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status_product()
    {
        return $this->belongsTo(User::class);
    }
}
