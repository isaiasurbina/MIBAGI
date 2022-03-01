<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable = [ "title", "store_id","status","price","stock","description","fulltext","thumbnail","plus","rating", "dimentions", "weight", "custom_fields" ];
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function categories()
    {
        return $this->belongsToMany(categories::class, 'product_category');
    }
    public function brands()
    {
        return $this->belongsToMany(Brands::class, 'product_brand');
    }
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'product_field');
    }
    public function images()
    {
        return $this->belongsToMany(Upload::class, 'product_uploads');
    }
    public function relatedProducts(){
        $addedProducts = [];
        $products = [];
        foreach($this->categories as $category):
            foreach($category->products as $product):
                if(!in_array($product->id,$addedProducts)):
                    $products[] = $product;
                    $addedProducts[] = $product->id;
                endif;
            endforeach;
        endforeach;

        return $products;
    }
    public function presentPrice($number_only = false){
        if($number_only == false){
            $result = 'USD $'. number_format(intval($this->price) / 100,2);
        }else{
            $result = number_format(intval($this->price) / 100,2);
        }

        return $result;
    }
}
