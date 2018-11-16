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
    public function getStatusAttribute()
    {
        if ($this->status_id == 1){
            return "รับเข้าสู่ระบบ";
        }elseif ($this->status_id == 2){
            return "อยู่ระหว่างกรซ่อม";
        }elseif ($this->status_id == 3){
            return "ซ่อมเสร็จแล้ว";
        }elseif ($this->status_id == 3){
            return "มารับของแล้ว";
        }
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
    public function getUpdateAtAttribute()
    {
        return $this->updated_at->format('d/m/Y');
    }
    public function getCompleteAtAttribute()
    {
        return "16/11/2018";
    }
    public function getReceiveAtAttribute()
    {
        return "16/11/2018";
    }
}
