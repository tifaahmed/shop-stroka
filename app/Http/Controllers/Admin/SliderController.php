<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// Resource
use App\Http\Resources\Dashboard\Collections\SliderCollection;
use App\Http\Resources\Dashboard\sliderResource;

// lInterfaces
use App\Repository\SliderRepositoryInterface as ModelInterface;

// Requests
use App\Http\Requests\Api\dashboard\Slider\SliderStoreApiRequest as modelInsertRequest;
use App\Http\Requests\Api\dashboard\Slider\SliderUpdateApiRequest as modelUpdateRequest;

use App ;
use App\Models\Slider;
class SliderController extends Controller
{
    private $Repository;
    public function __construct(ModelInterface $Repository)
    {
        $this->ModelRepository = $Repository;
        $this->folder_name = 'slider/'.Str::random(10).time();
        $this->languages = config('app.lang_array'); // ex [ar , en ]
        $this->file_columns = ['desktop_image','mobile_image'];

    }

    public function all(){
        try {
            $modal =    $this->ModelRepository->all()    ;
            return new SliderCollection($modal);
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }
    public function collection(Request $request){
        try {
            $modal = $this->ModelRepository->collection( $request->per_page ? $request->per_page : 10);
            return new SliderCollection($modal);
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }

    public function store(modelInsertRequest $request) {
        try {
            $all = [ ];
            foreach ($this->file_columns as $file_column) {
                $data_array = [];
                foreach ($this->languages as $language) {
                    if ( $request->hasFile( $file_column.'.'.$language ) ) { 
                        $path = $this->HelperStorage($this->folder_name,$request->$file_column[$language]) ;
                        $data_array +=  [ $language => $path ]  ;
                    }
                }
                $all += array( $file_column =>  $data_array );
            }
            $model = $this->ModelRepository->create( Request()->except($this->file_columns)+$all ) ;
            return $this -> MakeResponseSuccessful( 
                [ new sliderResource ( $model ) ],
                'Successful'               ,
                Response::HTTP_OK
            ) ;
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function update(modelUpdateRequest $request ,$id) {
        try {
            $old_model =  $this->ModelRepository->findById($id)  ;
             
            $all = [ ];
            foreach ($this->file_columns as $file_column) {
                $data_array = [];
                foreach ($this->languages as $language) {
                    if ( $request->hasFile( $file_column.'.'.$language ) ) { 
                        $old_path = $old_model->getTranslation($file_column, $language);
                        $this->Deletefile($old_path); 
                        $old_folder_location = $this->GetFolderDirectory($old_path); 

                        $folder_location = $old_folder_location ? $old_folder_location : $this->folder_name;

                        $path =   $this->HelperStorage($folder_location,$request->$file_column[$language]) ;

                        $data_array +=  [ $language => $path ]  ;
                    }
                } 
                $all += array( $file_column =>  $data_array );
            }
           
            $this->ModelRepository->update( $id,Request()->except($this->file_columns)+$all) ;
            $model =  $this->ModelRepository->findById($id) ;

            return $this -> MakeResponseSuccessful( 
                [ new sliderResource ( $model ) ],
                    'Successful' ,
                    Response::HTTP_OK
            ) ;
            } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        } 
    }
    public function show($id) {
        try {
            $model = $this->ModelRepository->findById($id);
            return $this -> MakeResponseSuccessful( 
                [ new sliderResource ( $model ) ],
                'Successful',
                Response::HTTP_OK
            ) ;
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }
    public function destroy($id) {
        try {
            $model =  $this->ModelRepository->findById($id) ;
            foreach ($this->file_columns as $file_column) {
                foreach ($this->languages as $language) {
                    $this->DeleteRowFolder($model->getTranslation($file_column, $language));
                }
            }

            $this->ModelRepository->deleteById($id);
            return $this -> MakeResponseSuccessful( 
                [ ],
                'Successful',
                Response::HTTP_OK
            ) ;
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [ $e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }
}
