<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StoreRequests extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['fullname','email','store_name','store_desc','country_id','phone','url'];
}
