<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\ControllerTraits\ResponsesTrait;
use App\Http\Controllers\ControllerTraits\FileTrait;

class Controller extends BaseController
{
    use AuthorizesRequests,
    DispatchesJobs,
    ValidatesRequests,
    
    ResponsesTrait,
    FileTrait;
    public function __construct()
    {
        $this->languages = config('app.lang_array'); // ex [ar , en ]
    }


    
    public function deleteAllFiles($model,$file_columns){
        foreach ($file_columns as $file_column) {
            $this->DeleteRowFolder($model->$file_column);
        }
    }
    public function deleteAlltranslatableFiles($model,$translated_file_columns){
        foreach ($translated_file_columns as $file_column) {
            foreach ($this->languages as $language) {
                $this->DeleteRowFolder($model->getTranslation($file_column, $language));
            }
        }
    }
    
    public function store_files($request,$folder_name,$file_columns){

        $all = [ ];
        if (count($this->file_columns)) {
            foreach ($this->file_columns as $file_column) {
                if ( $request->hasFile( $file_column ) ) { 
                    $path = $this->HelperStorage($folder_name,$request->$file_column) ;
                    $all += array( $file_column =>  $path );
                }
            }        
        }
        return $all;

    }


    public function update_files($old_model,$request,$folder_name,$file_columns){
        $all = [ ];
        foreach ($file_columns as $file_column) {
    
            if ( $request->hasFile( $file_column ) ) { 
                $old_path = $old_model->$file_column;
                $this->Deletefile($old_path); 
                $old_folder_location = $this->GetFolderDirectory($old_path); 
    
                $folder_location = $old_folder_location ? $old_folder_location : $folder_name;
    
                $path =   $this->HelperStorage($folder_location,$request->$file_column) ;
    
                $all += array( $file_column =>  $path );
            }
        }
        return $all;
    }

    public function store_translated_files($request,$folder_name,$translated_file_columns){
   
        $all = [ ];
        if (count($this->translated_file_columns)) {

            foreach ($translated_file_columns as $translated_file_column) {
                $data_array = [];
                if ($request->$translated_file_column) {
                    foreach ($request->$translated_file_column as $key => $file) {
                        if ( $request->hasFile( $translated_file_column.'.'.$key ) ) { 
                            $path = $this->HelperStorage($folder_name,$file) ;
                            $data_array +=  [ $key => $path ]  ;
                        }
                    }
                    $all += array( $translated_file_column =>  $data_array );
                }

            }
        }
        return $all;
    }

    public function update_translated_files($old_model,$request,$folder_name,$translated_file_columns){
        $all = [ ];
        foreach ($translated_file_columns as $translated_file_column) {
            $data_array = [];
            if ($request->$translated_file_column) {
                foreach ($request->$translated_file_column as $key => $file) {

                    if ( $request->hasFile( $translated_file_column.'.'.$key ) ) { 

                        $old_path = $old_model->getTranslation($translated_file_column, $key);
                        $this->Deletefile($old_path); 


                        $old_folder_location = $this->GetFolderDirectory($old_path); 

                        $folder_location = $old_folder_location ? $old_folder_location : $folder_name;

                        $path =   $this->HelperStorage($folder_location,$file) ;

                        $data_array +=  [ $key => $path ]  ;
                    }
                } 
            }
            
            if ( count($data_array) ) {
                $all += array( $translated_file_column =>  $data_array );
            }
        }
        return $all;
    }


}
