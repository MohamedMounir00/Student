<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Storage;
class FileUpload extends Model
{
    public  static function photo($request,$fileName,$default="")
    {

    	$name ="";
    	$photo =$request->photo;
    	if ($request->hasFile($fileName)) {
    		
    		$extenstion=$photo->getClientOriginalExtension() ;
    		$name =rand(11111,99999).".".date('Y-m-d').".".time().".".$extenstion;
    		Storage::disk('photo')->put($name,File::get($photo));
    		$name=$name;
    	}else{
    		$name=$default;
    	}
    	return  $name;
    }

}
