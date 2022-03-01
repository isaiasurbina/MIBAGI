<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PvOption extends Model
{
    //
    protected $fillable = [ 'variation_id', 'label', 'price', 'stock' ];
}
