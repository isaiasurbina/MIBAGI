<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DeliveryPlaces extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title', 'user_name', 'address_line_1', 'state_id', 'city_id', 'address_line_2','phone','latlng'];
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function state()
    {
        return $this->belongsTo(state::class, 'state_id');
    }
}
