<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [ 'number','shipping','status','date_to_send','spected_delivery_date','delivery_place','buyer_id', 'total'];
    public function products(){
        return $this->belongsToMany(product::class, 'order_items')->withPivot('quantity');
    }
    public function stores(){
        return $this->belongsToMany(Store::class, 'store_order');
    }
    public function presentTotal(){
        return 'USD $'. number_format(intval($this->total) / 100,2);
    }

}
