<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role) //roleid
    {
        return Self::roles()->find($role);
    }
    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }
    public function hasField($key)
    {
        return Self::fields()->where('key',$key)->first();
    }
    public function places()
    {
        return $this->belongsToMany(DeliveryPlaces::class, 'user_delivery_places');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_user');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }
    
    public function hasStores(){
        $count = $user->stores()->count();
        if($count > 0):
            return true;
        else:
            return false;
        endif;
    }
    public function uploads(){
        return $this->hasMany(Upload::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'user_id');
    }
}
