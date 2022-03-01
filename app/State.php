<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public function cities()
    {
        return $this->belongsToMany(City::class, 'city_state');
    }
    public function hasCity($city)
    {
        return Self::cities()->find($city);
    }
}
