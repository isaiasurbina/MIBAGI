<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Store;
use App\StoreRequests;
use App\product;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\StoreCreated;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('master');
    }
    public function orders(){
        $stores = Store::all();

        $source = compact('stores');

        return view('product.store', $source);
    }
    public function storesRequest(){
        $stores_requests = StoreRequests::all();

        $source = compact('stores_requests');

        return view('admin.store-requests', $source);
    }
    public function productRequests(){
        $products_requests = product::where('status','ADDED')->get();
        
        $source = compact('products_requests');

        return view('admin.product-requests', $source);
    }
    public function ProductApproval($r){
        $product = product::where(DB::raw('md5(id)'), $r)->first();

        $source = compact('product');

        return view('admin.product-details', $source);
    }
    public function ProductPublish($r){
        $product = product::where(DB::raw('md5(id)'), $r)->first();

        $product->status = 'PUBLISHED';
        $product->save();

        $source = compact('product');

        return back()->with('alert-success', 'El producto actual ha sido aprobado y publicado en la tienda en línea.');
    }
    public function ProductDeny($r){
        $product = product::where(DB::raw('md5(id)'), $r)->first();

        $product->status = 'NOT_AUTHORIZED';
        $product->save();

        $source = compact('product');

        return back()->with('alert-success', 'El producto actual ha sido NO AUTORIZADO.');
    }
    public function StoreRequestDetail($r){
        $request = StoreRequests::where(DB::raw('md5(id)'), $r)->first();

        $source = compact('request');

        return view('admin.store-details', $source);
    }
    public function StoreGeneration($r){
        $request = StoreRequests::where(DB::raw('md5(id)'), $r)->first();

        $source = compact('request');

        return view('admin.store-generation', $source);
    }
    public function newStore(Request $request){
        $user = User::where('email', $request->store_user_email)->first();
        if($user){
            $STrequest = StoreRequests::find($request->stRequestID);
            $STrequest->delete();
            $code = md5($user->id) . uniqid();
            $newStore = Store::create([ 'name' => $request->store_name, 'identifier' => 'STR' . $code ]);
            $user->stores()->attach($newStore);
            $user->roles()->attach([2]); //asigna el rol de tienda

            Mail::to($user)->send(new StoreCreated($newStore));
            return redirect()->route('admin.stores')->with('alert-success', 'La tienda ha sido creada exitosamente.');
        }else{
            return back()->with('alert-danger', 'Error al crear la tienda, usuario no encontrado.');
        }
        
    }
    public function stores(){
        $stores = Store::all();
        $source  = compact('stores');
        return view('admin.stores', $source);
    }
}

