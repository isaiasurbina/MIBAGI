<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class Api extends Controller
{
    //
    public function getCities(Request $request){
        $state = App\State::find($request->sid);
        
        return $state->cities()->orderBy('name','ASC')->get();
    }
    public function getCategories(Request $request){
        $categories_source = App\categories::all();
        $categories = [];
        foreach ($categories_source as $cat) {
            $cat->value = $cat->name;
            $categories[] = $cat;
        }
        return $categories;
    }
    public function getBrands(Request $request){
        $brands_source = App\Brands::all();
        $brands = [];
        foreach ($brands_source as $brand) {
            $brand->value = $brand->name;
            $brands[] = $brand;
        }
        return $brands;
    }
}
