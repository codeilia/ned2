<?php

namespace App\Models;

use App\Helpers\CustomDateTime;
use Illuminate\Database\Eloquent\Model;

class MartialInfo extends BaseModel
{
    protected $guarded = [];

    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
//
//    public function getStartDateAttribute($value)
//    {
//        return CustomDateTime::toJalali($value);
//    }
//
//    public function getEndDateAttribute($value)
//    {
//        return CustomDateTime::toJalali($value);
//    }
//
//    public function getSentDateAttribute($value)
//    {
//        return CustomDateTime::toJalali($value);
//    }
}
