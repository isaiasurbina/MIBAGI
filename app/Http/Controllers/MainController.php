<?php

namespace App\Http\Controllers;

use App;
use App\StoreRequests;
use App\product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    
    public function contactPage(){
        return view('public.contact');
    }
    public function storeRegisterPage(){
        $user = auth()->user();
        $countries = App\Countries::orderBy('name','asc')->get();
        $showForm = true;
        $source = compact('countries', 'showForm', 'user');
        return view('store.register-page', $source);
    }
    public function storeStartPage(){
        return view('store.start');
    }
    public function showView($view){
        return view('content.' . $view);
    }
    public function welcome(){
        $newProducts = product::where('status', 'PUBLISHED')->orderBy('id','desc')->take(7)->get();
        $offerProducts = product::where('status', 'PUBLISHED')->inRandomOrder()->take(7)->get();
        $bestProducts = product::where('status', 'PUBLISHED')->where('rating', '>=', '3')->get();
        $source = compact('newProducts', 'offerProducts', 'bestProducts');

        return view('welcome', $source);
    }
    public function registerRequest(Request $request){
        $user = auth()->user();

        $validation =  $request->validate([
            'fullname' => 'required|max:255',
            'email' => 'required|email',
            'pais' => 'required',
            'store_name' => 'required|max:255',
            'store_desc' => 'required|max:1000',
            'celular' => 'required'
        ]);
        
        $newRequest = StoreRequests::updateOrCreate(
            ['email' => $request->email],
            [
            'fullname' => $request->fullname,
            'store_name' => $request->store_name,
            'store_desc' => $request->store_desc,
            'country_id' => $request->pais,
            'phone' => $request->celular,
            'url' => $request->enlace 
            ]
        );
        
        

        if($newRequest):
            $countries = [];
            $showForm = false;
            $source = compact('countries', 'showForm', 'user');
            return view('store.register-page', $source);
        else:
            $countries = [];
            $showForm = true;
            $source = compact('countries', 'showForm', 'user');
            return view('store.register-page', $source)->with('alert-danger', 'Error al enviar la información, favor intenta más tarde.');
        endif;
    }
    

    public function termsPage(){
        return view('public.terms');
    }
    public function support(){
        return view('public.support');
    }
    public function introDrivers(){
        return view('drivers.intro');
    }
}