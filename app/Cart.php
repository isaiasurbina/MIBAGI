<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = ['user_id', 'status'];
    public function products(){
        return $this->belongsToMany(product::class, 'cart_product')->withPivot('quantity');;
    }
    public static function mformat($x){
        return 'USD $'. number_format(intval($x) / 100,2);
    }
}
