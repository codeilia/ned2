<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoidDuty extends Model
{
    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
}
