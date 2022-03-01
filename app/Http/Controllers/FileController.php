<?php

namespace App\Http\Controllers;

use App, Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    //
    public $publicFolder = 'public/';
    public $uploadsFolder = 'fls/';
    public $trashFolder = 'trash/';
    public function __construct()
    {
        $this->middleware('verified');
    }
    public function forceRemove(Request $request){
        $user_folder = md5(auth()->user()->id);
        $file = App\Upload::find($request->id);
        if($file):
            $fileURL = $this->uploadsFolder.'/'.$user_folder.'/'.$file->filename;
            Storage::disk('local')->delete($fileURL);
            $file->forceDelete();
        endif;

        return response()->json([
            'message' => 'Deleted : ' . $file->id
        ]);
    }
    public function remove(Request $request){
        $user = auth()->user();

        $user_folder = md5($user->id);
        $file = $user->uploads()->find($request->id);
        if($file):
            $fileURL = $this->uploadsFolder.'/'.$user_folder.'/'.$file->filename;
            $new_fileURL =  $this->trashFolder.'/'.$user_folder.'/'.$file->filename;
            
            Storage::move($fileURL, $new_fileURL);
            $file->delete();
        endif;

        return response()->json([
            'message' => 'Deleted : ' . $file->id
        ]);
    }
    public function upload(Request $request){
        $user_folder = md5(auth()->user()->id);
        $uploadedFile = $request->file('file');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('local')->putFileAs(
            $this->uploadsFolder.$user_folder.'/',
            $uploadedFile,
            $filename
        );

        $upload = new Upload;
        $upload->filename = $filename;

        $upload->user()->associate(auth()->user());

        $upload->save();

        return response()->json([
            'id' => $upload->id
        ]);
    }
    public function uploadImgData(Request $request){
        //for products only
        $user_folder = md5(auth()->user()->id);
        $uploadedFile = base64_decode(substr($request->file, strpos($request->file, ',') + 1));
        
        $time = time();
        $filename = 'pro_'.$time.'_'.$user_folder . '.png';
        $filename_th = 'pro_'.$time.'_'.$user_folder . '_300.png';

        $imgFullPath = $this->publicFolder.$user_folder.'/'.$filename;
        $imgFullPath_th = $this->publicFolder.$user_folder.'/'.$filename_th;
        Storage::put($imgFullPath,$uploadedFile);

        $upload = new Upload;
        $upload->filename = Storage::url($imgFullPath);

        $upload->user()->associate(auth()->user());

        $upload->save();

        $image_resize = Image::make($request->file)->resize(300, 300)->encode('jpg',80);
        
        /* $image_resize->save(); */
        Storage::put($imgFullPath_th,$image_resize);
        
        return response()->json([
            'id' => $upload->id,
            'file' => Storage::url($imgFullPath_th),
            'file_full' => $upload->filename
        ]);
    }
    public function download($code){
        $fileID = Str::afterlast($code,'_');
        $file = App\Upload::find($fileID);
        if($file):
            $user_folder = md5($file->user_id);
            $fileURL = $this->uploadsFolder.'/'.$user_folder.'/'.$file->filename;
            return Storage::download($fileURL);
        else:
            return abort(404);
        endif;
    }
}
