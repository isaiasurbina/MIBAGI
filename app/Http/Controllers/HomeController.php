<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Store;
use App\StoreRequests;
use App\product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if($user):
            
            $role = Role::where('name','store')->first();
            $roleMaster = Role::where('name','master')->first();
            if($user->hasRole($roleMaster->id)):
                    $storePendingRequest = StoreRequests::where('deleted_at', null)->count();
                    $productPendingRequest = product::where('status', 'ADDED')->count();
                    $storeCount = Store::count();
                    $data = compact('storePendingRequest','storeCount', 'productPendingRequest');
                    return view('admin.dashboard', $data);
            else:
                    $hasStore = ($user->hasRole($role->id));
                    $links = json_decode('{ 
                        "0" : {
                            "link" : "user.profile",
                            "title" : "Perfil",
                            "desc" : "Edita tu información personal y de contacto",
                            "icon" : "fa-users-cog",
                            "color" : "green"
                            },
                        "1" : {
                            "link" : "user.orders",
                            "title" : "Pedidos realizados",
                            "desc" : "Revisa tus pedidos, rastrea tus paquetes",
                            "icon" : "fa-file-invoice",
                            "color" : "gray"
                            },
                        "2" : {
                            "link" : "user.places",
                            "title" : "Direcciones",
                            "desc" : "Gestiona tus direcciones de entrega",
                            "icon" : "fa-location-arrow",
                            "color" : "gray"
                            }
                        }');
                    
                    $data = compact('links', 'hasStore'); 
        
                    return view('home', $data);
            endif;
        endif;
    }
    
}
/* ,
"3" : {
"link" : "user.wishlist",
"title" : "Lista de deseos",
"desc" : "Ver productos que has guardado en tu lista",
"icon" : "fa-clipboard-list",
"color" : "gray"
} */