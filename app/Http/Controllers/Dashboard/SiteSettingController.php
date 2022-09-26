<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// Resource
use App\Http\Resources\Dashboard\Collections\SiteSettingCollection as ModelCollection;
use App\Http\Resources\Dashboard\SiteSetting\SiteSettingResource as ModelResource;
// lInterfaces
use App\Repository\SiteSettingRepositoryInterface as ModelInterface;
// Requests
use App\Http\Requests\Api\Dashboard\SiteSetting\SiteSettingUpdateApiRequest as modelUpdateRequest;

class SiteSettingController extends Controller
{
    private $Repository;
    public function __construct(ModelInterface $Repository)
    {
        $this->ModelRepository = $Repository;
        $this->folder_name = 'site-setting/'.date('Y-m-d-h-i-s');
        $this->file_columns = ['item'];
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

    public function update(modelUpdateRequest $request ,$id) {
        try {
            $except = [];
            $all = [];
            if ($id == 1) {
                $old_model =  $this->ModelRepository->findById($id)  ;
                $all = $this->update_files(
                    $old_model,
                    $request,
                    $this->folder_name,
                    $this->file_columns
                );
                $except = $this->file_columns;
            }
 
            $this->ModelRepository->update( $id,Request()->except($except)+$all) ;
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
}
