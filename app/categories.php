<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //
    public static function categoriesTree($deparment = 'store'){
        $parentCategories = Self::where('parent','0')->where('department',$deparment)->orderBy('name','asc')->get();
        $categoriesTemp = [];
        foreach($parentCategories as $parent):
            $parent->children = Self::where('parent',$parent->id)->orderBy('name','asc')->get();
            $categoriesTemp[] = $parent;
        endforeach;

        $categories = (object) $categoriesTemp;
        
        return $categories;
    }
    public function filters()
    {
        return $this->belongsToMany(filter::class, 'category_filter');
    }
    public function products()
    {
        return $this->belongsToMany(product::class, 'product_category');
    }
}
