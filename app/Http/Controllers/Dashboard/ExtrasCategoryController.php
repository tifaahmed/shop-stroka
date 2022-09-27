<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// Resource
use App\Http\Resources\Dashboard\Collections\ExtrasCategoryCollection as ModelCollection;
use App\Http\Resources\Dashboard\ExtrasCategory\ExtrasCategoryResource as ModelResource;
// lInterfaces
use App\Repository\ExtrasCategoryRepositoryInterface as ModelInterface;

// Requests
use App\Http\Requests\Api\Dashboard\ExtrasCategory\ExtrasCategoryStoreApiRequest as modelInsertRequest;
use App\Http\Requests\Api\Dashboard\ExtrasCategory\ExtrasCategoryUpdateApiRequest as modelUpdateRequest;

class ExtrasCategoryController extends Controller
{
    private $Repository;
    public function __construct(ModelInterface $Repository)
    {
        $this->ModelRepository = $Repository;
        $this->folder_name = 'extras-category/'.date('Y-m-d-h-i-s');
        $this->file_columns = [];
        $this->translated_file_columns = [];
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
            $modal = $this->ModelRepository->collection( $request->per_page ?? $this->default_per_page);
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
            $except = [];
            $all = [];
            if ($this->file_columns) {
                $all += $this->store_files(
                    $request,
                    $this->folder_name,
                    $this->file_columns
                );
                $except += $this->file_columns;
            }
            if ($this->translated_file_columns) {
                $all += $this->store_translated_files(
                    $request,
                    $this->folder_name,
                    $this->translated_file_columns
                );
                $except += $this->translated_file_columns;
            }
            $model = $this->ModelRepository->create( Request()->except($except)+$all ) ;
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
            $all = $this->update_files(
                $old_model,
                $request,
                $this->folder_name,
                $this->file_columns
            );

            $this->ModelRepository->update( $id,Request()->except($this->file_columns)+$all) ;
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
