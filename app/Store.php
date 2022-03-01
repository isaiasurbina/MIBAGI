<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = ['name', 'identifier', 'logo', 'banner'];
    public function products()
    {
        return $this->hasMany(product::class, 'store_id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'store_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'store_user');
    }
}
