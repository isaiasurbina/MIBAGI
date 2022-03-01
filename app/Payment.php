<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'AuthCode',
        'CVV2Result',
        'OriginalResponseCode',
        'PaddedCardNumber',
        'ReasonCode',
        'ReasonCodeDescription',
        'ReferenceNumber',
        'ResponseCode',
        'TokenizedPAN',
        'orderNumber'
    ];
}
