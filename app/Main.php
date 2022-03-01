<?php

namespace App;

use Carbon\Carbon;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Main extends Model
{
    //
    public static function alertClass(){
        if(session('alert-success')!=null) $alertClass = 'alert-success';
        if(session('alert-danger')!=null) $alertClass = 'alert-danger';
        if(session('alert-warning')!=null) $alertClass = 'alert-warning';
       
        return $alertClass;
    }
    public static function alertIcon(){
        if(session('alert-success')!=null) $alertIcon =  'fa-check-circle';
        if(session('alert-danger')!=null) $alertIcon = 'exclamation-triangle';
        if(session('alert-warning')!=null) $alertIcon = 'fa-engine-warning';

        return $alertIcon;
    }
    public static function alertMessage(){
        
        if(session('alert-success')!=null) $alertMessage = session('alert-success');
        if(session('alert-danger')!=null) $alertMessage = session('alert-danger');
        if(session('alert-warning')!=null) $alertMessage = session('alert-warning');

        return $alertMessage;
    }
    public static function humanDate($date){
        $dt = new Carbon($date);
        App::setLocale('es');
        Carbon::setLocale('es');
        setlocale(LC_ALL, 'es_ES');

        //return $newDate->toFormattedDateString();
        return Str::ucfirst($dt->formatLocalized('%b %d, %Y'));
    }
    
}
