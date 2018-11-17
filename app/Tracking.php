<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = ['product', 'code','detail','price','user_id','note','status_id','receive_at','complete_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status_product()
    {
        return $this->belongsTo(StatusProduct::class,'status_id');
    }
    public function getStatusAttribute()
    {
        return $this->status_product->name;
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
    public function getUpdateAtAttribute()
    {
        return $this->updated_at->format('d/m/Y');
    }
    public function getCompleteAttribute()
    {
        if (!empty($this->complete_at)) {
            return $this->complete_at;
        }
        return "-";
    }
        public function getReceiveAttribute()
    {
        if (!empty($this->receive_at)) {
            return $this->receive_at;
        }
        return "-";
    }
}
