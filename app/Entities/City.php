<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function statistic()
    {
        return $this->hasMany('App\Entities\Weather');
    }

    public function lastActivity()
    {
        return $this->hasOne('App\Entities\Weather')->latest();
    }
}
