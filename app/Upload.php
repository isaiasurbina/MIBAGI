<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'filename'
      ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function getURLByID($fileID){
        $file = Self::find($fileID);
        if($file):
            $user_folder = md5($file->user_id);
            $fileURL = $file->filename;
            return $fileURL;
        else:
            return false;
        endif;
    }
}
