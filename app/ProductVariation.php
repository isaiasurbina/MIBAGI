<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    //
    protected $fillable = ['label', 'product_id'];
    public static function getGroupedCombo(){
        $p_variations = Self::groupBy('label')->select('label')->get();

        return $p_variations;
    }
}
