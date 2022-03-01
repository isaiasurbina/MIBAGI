<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    //
    protected $fillable = ['status','key','value'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public static function asProperties($fields){
        $f = null;
        foreach($fields as $item):
            $f[$item->key] = $item->value;
        endforeach;

        $flds = (object) $f;

        return $flds;
    }
    public static function saveField($user, $key, $value){
        $field = $user->hasField($key); 
        if($field):
            $field->value = $value;
            $field->save();
        else:
            $newField = Self::create([ 'status'=>'saved', 'key'=>$key, 'value'=>$value]);
            $user->fields()->attach($newField);
            $field = $newField;
        endif;

        return $field;
    }
}
