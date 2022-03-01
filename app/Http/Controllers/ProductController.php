<?php

namespace App\Http\Controllers;

use App\Store;
use App\categories;
use App\product;
use App\filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        
    }
    public function category(Request $request){
        $currentCategory = categories::where('slug',$request->category)->first();
        $relatedCategories = categories::where('parent', $currentCategory->parent)->where('id',"!=", $currentCategory->id)->get();
        

        $source = compact('currentCategory', 'relatedCategories');

        return view('product.category', $source);
    }
    public function store($store){
        $store = Store::where(DB::raw('md5(id)'), $store)->first();

        $source = compact('store');

        return view('product.store', $source);
    }
    public function showProduct(Request $request){
        $productEncID = $request->product;
        $product = product::where(DB::raw('md5(id)'), $productEncID)->where('status','PUBLISHED')->first();
        if($product):
            $relatedProducts = $product->relatedProducts();
            $product->reviews_count = 0;
            $freeEstimatedDateStart = Carbon::now()->add(7, 'day')->toFormattedDateString();
            $freeEstimatedDateEnd = Carbon::now()->add(10, 'day')->toFormattedDateString();
            $PlusEstimatedDateStart = Carbon::now()->add(3, 'day')->toFormattedDateString();
            $PlusEstimatedDateEnd = Carbon::now()->add(5, 'day')->toFormattedDateString();
            $source = compact('product', 'relatedProducts', 'freeEstimatedDateStart', 'freeEstimatedDateEnd','PlusEstimatedDateStart', 'PlusEstimatedDateEnd');
            return view('product.single', $source );
        else:
            return abort(404);
        endif;
    }

}
