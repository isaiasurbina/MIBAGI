<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function state()
    {
        return $this->belongsTo(State::class, 'city_state');
    }
    public function places()
    {
        return $this->belongsToMany(Place::class, 'city_delivery_places');
    }
}
