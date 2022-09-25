<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// Resource
use App\Http\Resources\Dashboard\Collections\SliderCollection as ModelCollection;
use App\Http\Resources\Dashboard\sliderResource as ModelResource;

// lInterfaces
use App\Repository\SliderRepositoryInterface as ModelInterface;

// Requests
use App\Http\Requests\Api\Dashboard\Slider\SliderStoreApiRequest as modelInsertRequest;
use App\Http\Requests\Api\Dashboard\Slider\SliderUpdateApiRequest as modelUpdateRequest;

class SliderController extends Controller
{
    private $Repository;
    public function __construct(ModelInterface $Repository)
    {
        $this->ModelRepository = $Repository;
        $this->folder_name = 'slider/'.Str::random(10).time();

        $this->languages = config('app.lang_array'); // ex [ar , en ]
        $this->file_columns = [];
        $this->translated_file_columns = ['desktop_image','mobile_image'];
        $this->default_per_page = 10;


    }

    public function all(){
        try {
            $modal =    $this->ModelRepository->all()    ;
            return new ModelCollection($modal);
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
            $modal = $this->ModelRepository->collection( $request->per_page ? $request->per_page : $this->default_per_page);
            return new ModelCollection($modal);
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
            $all = $this->store_translated_files(
                $request,
                $this->folder_name,
                $this->translated_file_columns
            );

            $model = $this->ModelRepository->create( Request()->except($this->translated_file_columns)+$all ) ;
            return $this -> MakeResponseSuccessful( 
                [ new ModelResource ( $model ) ],
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
            $all = $this->update_translated_files(
                $old_model,
                $request,
                $this->folder_name,
                $this->translated_file_columns
            );

            $this->ModelRepository->update( $id,Request()->except($this->translated_file_columns)+$all) ;
            $model =  $this->ModelRepository->findById($id) ;

            return $this -> MakeResponseSuccessful( 
                [ new ModelResource ( $model ) ],
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
                [ new ModelResource ( $model ) ],
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

            if (count($this->translated_file_columns)) {
                $this->deleteAlltranslatableFiles($model,$this->translated_file_columns,$this->languages);
            }
            if (count($this->file_columns)) {
                $this->deleteAllFiles($model,$this->translated_file_columns);
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
