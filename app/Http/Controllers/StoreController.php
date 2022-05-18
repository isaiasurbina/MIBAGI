<?php

namespace App\Http\Controllers;

use App;
use App\product;
use App\ProductVariation;
use App\categories;
use App\Upload;
use App\Mail\OrderPlaced;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;



class StoreController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('store');
    }
    public function dashboard(){
        $user = auth()->user();
        $store = $user->stores()->first();
        $pending_orders = $store->orders()->where('status', 'PLACED')->count();
        $sending_orders = $store->orders()->where('status', 'PROCESSING')->count();
        $return_orders = $store->orders()->where('status', 'RETURN')->count();

        $source = compact('user', 'store', 'pending_orders', 'sending_orders', 'return_orders');

        return view('store.dashboard', $source);
    }
    public function catalog(){
        $user = auth()->user();
        $store = $user->stores()->first();
        $pproducts = $store->products()->get();
        $products = array();
        foreach ($pproducts as $product) {
            $product->status_label =  ($product->status == 'ADDED') ? "PENDIENTE":'';
            $product->status_label =  ($product->status == 'PUBLISHED') ? "PUBLICADO":$product->status_label;
            $product->status_label =  ($product->status == 'NOT_APPROVED') ? "NO APROBADO":$product->status_label;

            $product->status_class =  ($product->status == 'ADDED') ? "warning":'';
            $product->status_class =  ($product->status == 'PUBLISHED') ? "success":$product->status_class;
            $product->status_class =  ($product->status == 'NOT_APPROVED') ? "danger":$product->status_class;
            $products[] = $product;
        }
        
        $source = compact('store','products');
        return view('store.products-index',$source);
    }
    public function add(){
        $categories = categories::categoriesTree();
        $edit = false;
        $product = false;
        $source = compact('categories', 'product', 'edit');
        return view('store.product-add',$source);
    }
    public function edit($id){
        $categories = categories::categoriesTree();
        $product = product::where(DB::raw('md5(id)'), $id)->first();
        $edit = true;

        $productFields = $product->fields()->get();
        $product->fields = App\Field::asProperties($productFields);
        $images = array();
        foreach ($product->images()->get() as $item) {
            $images[] = (object) array('filename' => str_replace('.png','_300.png',$item->filename), 'id'=> $item->id );
        }
        $source = compact('categories', 'product', 'edit', 'images');
        return view('store.product-add',$source);
    }
    public function getGroupedCombo(){
        $variations = ProductVariation::getGroupedCombo();

        return response()->json($variations);
    }
    public function productSave(Request $request){

        $validated = $request->validate([
            'titulo' => 'required',
            'cats' => 'required'
        ]);
        $edit = ($request->edit == 'true') ? true:false;

        $price = (isset($request->price)) ? floatval($request->price) * 100:0.00;
        $stock = (isset($request->existencias)) ? $request->existencias:0;
        $th_path = asset('img/pro-default.jpg');
        if(isset($request->images) && count($request->images) > 0){
            $firstID = $request->images[0];
            $imagepath = App\Upload::getURLByID($firstID);
            $th_path = Str::beforeLast($imagepath, '.png');
            $th_path = $th_path . '_300.png';
        }
        $user = auth()->user();
        
        $productData = array(
            "title" => $request->titulo,
            "store_id" => $user->stores[0]->id,
            "status" => 'ADDED', //need aproval
            "price" => $price,
            "stock" => $stock,
            "description" => $request->descripcion_corta,
            "fulltext" => $request->descripcion_larga,
            "thumbnail" => $th_path,
            "dimentions" => '0x0x0',
            "weight" => '0',
            "custom_fields" => '[]',
            "plus" => '0',
            "rating" => '0'
        );

        if(!$edit):
            $newProduct = product::create($productData);
        else:
            $newProduct = product::where(DB::raw('md5(id)'), $request->pid)->first();
            foreach($productData as $k => $v) $newProduct->$k = $v;
            $newProduct->save();
        endif;

        $newProduct->images()->sync($request->images); 
        $newProduct->categories()->sync($request->cats);
        $newProduct->brands()->sync($request->brands);

        //save fields from fields table
        $user_fields_to_save = ['manufacturer'];
        foreach($user_fields_to_save as $field):
            if($request->{$field}):
                $fields[] = App\Field::saveField($user,$field,$request->{$field});
            endif;
        endforeach;
        
        //update product variations 
        //for temporary time, variations cannot be edited
        if(isset($request->variation)){
            foreach ($request->variation as $variation => $options) {
                
                $newVariation = App\ProductVariation::create(['label' => $variation, 'product_id'=> $newProduct->id ]);
                foreach ($options as $option) {
                    
                    $PVOprice = (isset($option['price'])) ? floatval($option['price']) * 100:0.00;
                    $newOption = App\PvOption::create(['variation_id'=> $newVariation->id, 'label'=>$option['tag'], 'price'=> $PVOprice, 'stock'=>0 ]);
                }
            }
        }

        return redirect('store/catalog')->with('alert-success','Se ha guardado correctamente el producto.');
    }
    public function ordersIndex(Request $request){
        $user = Auth()->user();
        $store = $user->stores()->first();
        $orders = $store->orders()->get();
        $source = compact('orders');
        return view('store.orders', $source);
    }
    public function orderDetail($order){
        $user = Auth()->user();
        $store = $user->stores()->first();
        $orden = App\Order::where('number',$order)->first();
        $place = App\DeliveryPlaces::find($orden->delivery_place);
        $source = compact('orden', 'place', 'store');
        return view('store.order-detail', $source);
    }
    public function reports(){
        return view('store.reports');
    }
    public function messages(){
        return view('store.messages');
    }
    public function profile(){
        $user = auth()->user();
        $store = $user->stores()->first();
        $store->banner_url = Upload::getURLByID($store->banner);

        $source = compact('store','user');
        return view('store.profile', $source );
    }
    public function updateBanner(Request $request){
        $user = auth()->user();
        $store = $user->stores()->first();
        if($store):
            $store->banner = $request->banner_id;
            $store->save();
            $response['status'] = true;
            $response['msg'] = 'El banner de la tienda ha sido actualizado';
        else:
            $response['status'] = false;
            $response['msg'] = 'Store not found';
        endif;

        return json_encode($response);
    }
    public function orderUpdate($order,$status){
        $orderObj = App\Order::where('number',$order)->first();
        $statusStrings = $orderObj->orderStatusLabels;
        $statusID = array_search($status,$statusStrings);
        
        if($statusID){
            $orderObj->status = $statusID;
            $orderObj->save();
            $this->orderStatusChange($orderObj,$statusID);
            return back()->with('alert-success', 'order.status_updated');
        }else{
            return back()->with('alert-warning','order.status_updated_error');
        }
    }
    public function orderStatusChange($order,$status){
        //check wich of the following is and take actions
        //1 => 'RECEIVED', 2 => 'PENDING', 3 => 'PROCESSING', 4 => 'SHIPPED'
        // 5 => 'CANCEL_BY_USER', 6 => 'REFUND_REQUEST', 7 => 'REFUNDED', 8 => 'DELIVERED'
        $user = App\User::find($order->buyer_id);
        if($user):
            switch ($status) {
                case 1:
                    //send alert order was placed USER | BUSINESS
                    Mail::to($user)->send(new OrderPlaced($order));
                    break;
                case 2:
                    //do nothing
                    break;
                case 3:
                    //send alert order is processing USER
                    break;
                case 4:
                    //send alert order is shipped USER
                    Mail::to($user)->send(new OrderShipped($order));
                    break;
                case 5:
                    //send alert order is cancelled USER
                    break;
                case 6:
                    //send alert order is requesting refund BUSINESS
                    break;
                case 7:
                    // send alert order is refunded USER
                    break;
                case 8:
                    // send alert order is delivered USER
                    break;
                
                default:
                    # code...
                    break;
                }
        endif;
    }
}
