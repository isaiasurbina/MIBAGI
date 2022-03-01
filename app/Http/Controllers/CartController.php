<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Order;
use App\Cart;
use App\DeliveryPlaces;
use App\City;
use App\State;
use App\Payment;
use Illuminate\Http\Request;
use SoapClient;


class CartController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware('verified');
    }
    public function showCart(){
        $cart = Cart::where('status',1)->first();
        $subtotal = 0;
        if($cart){
            foreach ($cart->products()->get() as $product) {
                $itemSubtotal = intval($product->pivot->quantity) * intval($product->price);
                $subtotal += $itemSubtotal ;
            }
        } 
        $source = compact('cart','subtotal');

        return view('cart.index',$source);
    }
    public function store(Request $request){
        $user = auth()->user();
        $carts = $user->carts()->where('status',1)->first();


        if($carts){
            $cart = $carts;
        }else{
            $cart = Cart::create(['user_id'=>$user->id]);
        }
        $product_check = $cart->products()->where('id',$request->id)->first();
        if($product_check):
            $quantity = intval($product_check->pivot->quantity) + 1 ;
            $cart->products()->updateExistingPivot($request->id, ['quantity'=> $quantity ]);
        else:
            $product = [ $request->id => [ 'quantity' => 1 ] ];
            $cart->products()->attach($product);
        endif;

        return back()->with('alert-success', 'El producto ha sido añadido a tu bag');
    }
    public function detachProduct($p){
        $user = auth()->user();
        $carts = $user->carts()->where('status',1)->first();
        $carts->products()->detach($p);

        return back()->with('alert-success', 'El producto ha sido removido de tu bag');
    }
    public function checkout(){
        $user = auth()->user();
        $places = $user->places()->get();
        $cities = City::all();
        $states = State::all();

        $cart = Cart::where('status',1)->first();
        $subtotal = 0;
        if($cart){
            foreach ($cart->products()->get() as $product) {
                $itemSubtotal = intval($product->pivot->quantity) * intval($product->price);
                $subtotal += $itemSubtotal ;
            }
        } 

        $source = compact('places', 'subtotal', 'cart', 'cities', 'states');
        return view('cart.checkout', $source);
    }
    public function getTheAmount($left_zeros = true){
        $cart = Cart::where('status',1)->first();
        $subtotal = 0;
        if($cart){
            foreach ($cart->products()->get() as $product) {
                $itemSubtotal = intval($product->pivot->quantity) * intval($product->price);
                $subtotal += $itemSubtotal ;
            }
        } 
        //get shipping/delivery cost and add to the total
        $shippingCost = 0;
        $total = $shippingCost + $subtotal;
        if($left_zeros){
            $totalLength = strlen($total);
            $leftZerosLen = 12 - $totalLength;
            $leftZeros = '';
            for($i=0; $i < $leftZerosLen; $i++){
                $leftZeros .= '0'; 
            }
            $totalStr = $leftZeros . $total;
        }else{
            $totalStr = $total;
        }
        return $totalStr;
    }
    function msTimeStamp(){ //for order numbers
        return (string)round(microtime(1) * 1000);
    }
    public function authorizepayment(Request $request){
        $validated = $request->validate([
            'place' => 'required',
        ]);
        $cart = Cart::where('status',1)->first();
        $currency = '840';
        $orderNumber = $this->msTimeStamp();
        $total = $this->getTheAmount();
        $amount = $this->getTheAmount(false); //with no zeros
        $signature = $this->Sign($orderNumber, $total, $currency); //pass the params
        $ipAddr = $_SERVER['REMOTE_ADDR'];
        $placeData = DeliveryPlaces::find($request->place);

        
        $BillToFirstname = $request->cardholderFirstname;
        $BillToLastname = $request->cardholderLastname;

        $BillToAddress = $request->billAddress;
        $BillToAddress2 = $request->billAddress2;
        //$BillToZipPostCode = $request->card_zip;
        $BillToCity = $request->card_city;
        $BillToState = $request->card_state;

        if($request->sameaddress){
            $BillToAddress = $placeData->address_line_1;
            $BillToAddress2 = $placeData->address_line_2;
            //$BillToZipPostCode = '';
            $city = $placeData->city;
            $BillToCity = $city->name ;
            $state = $placeData->state;
            $BillToState = $state->name;


        }

        $url = 'https://ecm.firstatlanticcommerce.com/PGService/Services.svc?wsdl';
        $params = array(
            'location' => $url,
            'soap_version'=>SOAP_1_1,
            'exceptions'=>0,
            'trace'=>1,
            'cache_wsdl'=>WSDL_CACHE_NONE
        );
        $client = new SoapClient($url, $params);
        //dd($client->__getTypes());
        $acqID = env('FACAD');
        $mecID = env('FACID');
        $TransactionDetails = array(
            'AcquirerId'=> $acqID,
            'MerchantId'=> $mecID,
            'OrderNumber'=> $orderNumber,
            'TransactionCode'=> 0,
            'Amount'=> $total,
            'Currency'=> $currency,
            'CurrencyExponent'=> 2,
            'SignatureMethod'=> 'SHA1',
            'Signature'=> $signature,
            'IPAddress'=> $ipAddr
        );
        $CardDetails = array(
            'CardNumber' => str_replace(' ', '', $request->card),
            'CardExpiryDate' => $request->duedate_m . $request->duedate_y,
            'CardCVV2' => $request->card_cvv
        );
        $BillingDetails = array(
            'BillToAddress' => $BillToAddress,
            'BillToAddress2' => $BillToAddress2,
            'BillToZipPostCode' => '',
            'BillToFirstName' => $BillToFirstname,
            'BillToLastName' => $BillToLastname,
            'BillToCity' => $BillToCity,
            'BillToState' => $BillToState
        );
        $ShippingDetails = array(
            'ShipToAddress' => $placeData->address_line_1,
            'ShipToAddress2' => $placeData->address_line_2,
            'ShipToZipPostCode' => '',
            'ShipToFirstName' => '',
            'ShipToLastName' => '',
            'ShipToCity' => $BillToCity,
            'ShipToState' => $BillToState
        );
        
        $AuthorizeRequest =  array('Request' => array('CardDetails' => $CardDetails, 'TransactionDetails' => $TransactionDetails));
        
        $result = $client->Authorize($AuthorizeRequest);
        
        if($result->AuthorizeResult->CreditCardTransactionResults->ReasonCode == 1):
            $this->placeorder($cart, $orderNumber,$request->place,$amount,$result->AuthorizeResult->CreditCardTransactionResults);
        else:
            $this->paymentException($result);
        endif;
    }
    function paymentException($result){
        $data = compact('result');
        return view('cart.paymenterror', $data);
    }
    // How to sign a FAC Authorize message
    function Sign($orderNumber, $amount, $currency){
        $facId = env('FACID');
        $passwd = env('FACIDCLV');
        $acquirerId = env('FACAD');
        $stringtohash = $passwd.$facId.$acquirerId.$orderNumber.$amount.$currency;
        $hash = sha1($stringtohash, true);
        $signature = base64_encode($hash);

        return $signature;
    }
    //public function placeorder(Request $request){
    public function placeorder($cart, $order_number,$place,$total,$CreditCardTransactionResults){

        /* $validated = $request->validate([
            'place' => 'required',
        ]); */

        $user = auth()->user();
        
        $cart->status = 9;
        $cart->save();
        $tomorrow = Carbon::tomorrow();

        //insertar la orden
        $orderData['number'] = $order_number;
        $orderData['shipping'] = 1;
        $orderData['status'] = 1;
        $orderData['date_to_send'] = $tomorrow->toDateTimeString();
        $tomorrow->addDays(5);
        $orderData['spected_delivery_date'] = $tomorrow->toDateTimeString() ;
        $orderData['delivery_place'] = $place ;
        $orderData['buyer_id'] = $user->id ;
        $orderData['total'] = $total ;
        
        $order = Order::create($orderData);
        $store_ids = [];
        $CreditCardTransactionResults->orderNumber = $order_number;
        $payment = $this->savePayment($CreditCardTransactionResults);
        foreach ($cart->products()->get() as $product) {
            $order->products()->attach([ $product->id => [ 'quantity' => $product->pivot->quantity ] ]);
            $store_ids[] = $product->store_id;
        }
        $order->stores()->sync($store_ids);
        
        var_dump($order);
        //return redirect()->route('cart.finish', ['order'=>$order->number]);
        return view('cart.placeorder', ['order'=>$order->number] );
    }
    public function savePayment($CreditCardTransactionResults){
        $data = (array) $CreditCardTransactionResults;
        $payment = Payment::create($data);

        return $payment;
    }
    public function finishorder(Request $request){
        $order = $request->order;

        $source = compact('order');
        return view('cart.placeorder', $source);
    }
}
