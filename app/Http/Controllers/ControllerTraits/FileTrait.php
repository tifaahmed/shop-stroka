<?php

namespace App\Http\Controllers\ControllerTraits;

use Illuminate\Http\JsonResponse ;
use Storage;
use ZanySoft\Zip\Zip;
use Str;
trait FileTrait {

    // * @param  string $folder_name
	// * @param  file $file
	// * @param  string $key ex(image or url or image_one)
	// @return array  [ key => path value]
    public function HelperHandleFile($folder_name,$requested_file,$key)  
    {
        return $path = $this->HelperStorage($folder_name,$requested_file);
        // return array($key => $path);
    }


	// * @param  string $folder_name
	// * @param  file $file
    // @return url of the file
    public function HelperStorage($folder_name , $file  ) : string
    {
        if ($file->extension() == 'zip' ) {
            $random_string = Str::random(10);
            $location = $folder_name.'/'.$random_string.time();
            $path = Storage::disk('public')->put($location,$file);

            $zip = Zip::open( public_path('storage').'/'.$path );
            $zip->extract(public_path('storage').'/'.$location);

            if( file_exists( public_path('storage').'/'.$location.'/index.php') ){
                return $location.'/index.php';
            }else if( file_exists( public_path('storage').'/'.$location.'/index.html') ){
                return $location.'/index.html';
                 
            }else{
                return $location;
            }

        }else{
            return $path = Storage::disk('public')->put($folder_name,$file);
        }
    }
	// * @param  string $file_path
	// @return nothing
    public function HelperDelete($file_path)  
    {

        if ($file_path && Storage::disk('public')->exists($file_path)) {

            $extension = substr($file_path, strpos($file_path, ".") + 1);    // all 14 get 11 to 14 

            if ($extension == 'php' || $extension == 'html' ) {                     // delete folder
                $folder_path =  $this->HelperGetDirectory($file_path); //all 14 get 0 to 11
                $this->HelperDeleteDirectory($folder_path);
                
            } else{                                                                 // or delete file
                Storage::disk('public')->delete($file_path);
            }
        }
    }
    public function HelperGetDirectory($file_path)  
    {
        if ($file_path && Storage::disk('public')->exists($file_path)) {
            $last_slash_position = strrpos($file_path, '/'); //position number of character from the last  
            return  substr($file_path, 0, $last_slash_position); //delete characters from position number to the end
        }
    }
    public function HelperDeleteDirectory($folder_path)  
    {
        if ($folder_path && Storage::disk('public')->exists($folder_path)) { // if folder exists
            Storage::disk('public')->deleteDirectory($folder_path);   // delete it with every file in it
        }
    }

	// * @param  collection $model
	// * @param  array of arraies  $file_names 
    // $file_names = [file_name_one,file_name_two ]
	// @return nothing
    public function HandleFileDelete($model,$file_key_names)  {
        foreach ($file_key_names  as  $file_key_name) {
            if (
                isset($model->$file_key_name) 
                && 
                $model->$file_key_name            
            ) {   
                $this->HelperDelete($model->$file_key_name);
            }
        }
        
        
    }



}