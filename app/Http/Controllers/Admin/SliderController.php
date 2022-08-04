<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// lInterfaces
use App\Repository\SliderRepositoryInterface as ModelInterface;


// Requests
use App\Http\Requests\Api\dashboard\Slider\SliderStoreApiRequest as modelInsertRequest;
use App\Http\Requests\Api\dashboard\Slider\SliderUpdateApiRequest as modelUpdateRequest;

use App\Models\Slider;
class SliderController extends Controller
{
    private $Repository;
    public function __construct(ModelInterface $Repository)
    {
        $this->ModelRepository = $Repository;
        $this->folder_name = 'slider/'.Str::random(10).time();;
    }


    public function all(){
        try {
            return $modal =    $this->ModelRepository->all()    ;
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }
    public function store(modelInsertRequest $request) {
        // return $request->all();

        $newsItem = new Slider; // This is an Eloquent model

        // $all += array(  'title1'   => array('ar' =>$request->title1_ar,'en' =>$request->title1_en) );
        // $all += array(  'subject1' => array('ar' =>$request->title1_ar,'en' =>$request->title1_en) );
        $newsItem
        ->setTranslation('name', 'en', 'Name in English')
        ->setTranslation('name', 'nl', 'Naam in het Nederlands')
        ->save();       
         // $all = [  'subject1' => ['ar' => $request->title1_ar] ];

        // $model = $this->ModelRepository->create( $all ) ;

        // return $all;

    }
}
