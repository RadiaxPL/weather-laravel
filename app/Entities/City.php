<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function statistic()
    {
        return $this->hasMany('App\Entities\Weather')->latest()->take(10);
    }

    public function lastActivity()
    {
        return $this->hasOne('App\Entities\Weather')->latest();
    }
}
