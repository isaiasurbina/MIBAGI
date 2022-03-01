<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('buyer');
    }
    public function profile(){
        $user = auth()->user();

        $userFields = $user->fields()->get();

        $uFields = App\Field::asProperties($userFields);

        $source = compact('user', 'uFields');
        return view('user.profile', $source);
    }
    public function places(){
        $user = auth()->user();
        $places = $user->places()->orderBy('id','DESC')->get();
        $source = compact('places');
        return view('user.places', $source);
    }
        public function deletePlace(Request $request){
            $user = auth()->user();
            $placeToDelete = $user->places()->find($request->n);
            
            if($placeToDelete->delete()):
                return redirect( route('user.places') )->with('alert-success', 'Se ha eliminado la dirección!');
            else:
                return redirect( route('user.places') )->with('alert-warning', 'No se pudo eliminar la dirección!');
            endif;
        }
        public function newPlace(){
            $states = App\State::all();
            $edit = false;
            $source = compact('states', 'edit');
            return view('user.place.new', $source);
        }
        public function editPlace(Request $request){
            $states = App\State::all();
            $edit = true;
            $place = App\DeliveryPlaces::find($request->n);


            $source = compact('states', 'edit', 'place');
            return view('user.place.new', $source);
        }
        public function savePlace(Request $request){
            $vdata = $request->validate([
                'title' => 'required|max:255',
                'user_name' => 'max:255',
                'state' => 'required',
                'city' => 'required',
                'address_line_1' => 'required|max:255',
                'address_line_2' => 'max:255',
                'phone' => 'required',
                'latlng' => 'required'
            ]);
            
            if(isset($request->pid)):
                $newPlace = App\DeliveryPlaces::find($request->pid);
                $newPlace->title = $request->title;
                $newPlace->user_name = $request->user_name;
                $newPlace->state_id = $request->state;
                $newPlace->address_line_1 = $request->address_line_1;
                $newPlace->address_line_2 = $request->address_line_2;
                $newPlace->phone = $request->phone;
                $newPlace->latlng = $request->latlng;
                $newPlace->save();
            else:
                $placeData = [
                    'title' => $request->title,
                    'state_id' => $request->state,
                    'user_name' => $request->user_name,
                    'address_line_1' => $request->address_line_1,
                    'address_line_2' => $request->address_line_2,
                    'phone' => $request->phone,
                    'latlng' => $request->latlng
                ];
                $newPlace = App\DeliveryPlaces::create($placeData);
            endif;
            
            if($newPlace){
                $user = auth()->user();
                if(!isset($request->pid)):
                    $user->places()->attach($newPlace);
                endif;
                $city = App\City::find($request->city);
                $newPlace->city()->associate($city);
                $newPlace->save();

                return redirect( route('user.places') )->with('alert-success','Se ha guardado correctamente la dirección');
            }else{
                return back()->with('alert-warning','Ha ocurrido un error al guardar la dirección');
            }
        } //end places functions
    public function orders(){
        $user = auth()->user();
        $orders = $user->orders()->orderBy('created_at','desc')->get();
        $source = compact('orders');
        return view('user.orders', $source);
    }
    public function profileSave(Request $request){
        $validatedData = $request->validate([
            'fullname' => 'required|max:255'
        ]);

        $user = auth()->user();
        $user->name = $request->fullname;
        $user->save();
        
        //phone
        $user_fields_to_save = ['phone','birthday', 'lang', 'gender'];
        foreach($user_fields_to_save as $field):
            if($request->{$field}):
                $fields[] = App\Field::saveField($user,$field,$request->{$field});
            endif;
        endforeach;

        return back()->with('alert-success','La información de tu perfil ha sido guardada correctamente.');
    }
    public function wishlist(){
        return view('user.wishlist');
    }

}
