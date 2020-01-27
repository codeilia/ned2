<?php

namespace App\Models;

use App\Model;
use App\User;

class UserDetail extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
