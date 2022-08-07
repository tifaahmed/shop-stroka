<?php

namespace App\Http\Controllers\ControllerTraits;

use Illuminate\Http\JsonResponse ;
use Storage;
use ZanySoft\Zip\Zip;
use Str;
trait FileTrait {



	// * @param  string $folder_name
	// * @param  file $file
    // @return url of the file
    public function HelperStorage($folder_name , $file  ) : string
    {
        return $path = Storage::disk('public')->put($folder_name,$file);
    }

	// * @param  string $file_path
	// @return nothing
    public function DeleteRowFolder($file_path)  : void
    {
        if ($file_path && Storage::disk('public')->exists($file_path)) {
            $this->Deletefile($file_path); // delete file 
            $folder_path =  $this->GetFolderDirectory($file_path); //get the folder 
            $this->DeleteFolderDirectory($folder_path); // delete the folder 
        }
    }
    
    // * @param  string $file_path ex(slider/random_number/file name.jpg)
    // return string  the folder path ex(slider/random_number)
    public function GetFolderDirectory($file_path)   : string
    {
            $last_slash_position = strrpos($file_path, '/'); //position number of last character(/) 
            return  substr($file_path, 0, $last_slash_position); //get characters from position(0) number to the end(before /)
    }

    // * @param  string $folder_path ex(slider/random_number)
	// @return nothing (folder will be deleted)
    public function DeleteFolderDirectory($folder_path)   : void
    {
        if ($folder_path && Storage::disk('public')->exists($folder_path)) { // if folder exists
            Storage::disk('public')->deleteDirectory($folder_path);   // delete it with every file in it
        }
    }

   // * @param  string $file_path ex(slider/random_number/file name.jpg)    
   	// @return nothing (file will be deleted)
    public function Deletefile($file_path)   : void
    {
        if (Storage::disk('public')->exists($file_path)) { // if folder exists
                Storage::disk('public')->delete($file_path);
            }
    }
}