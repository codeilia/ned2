<?php

namespace App\Models;


use App\Model;

class Province extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
