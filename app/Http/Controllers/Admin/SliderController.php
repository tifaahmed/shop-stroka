<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// lInterfaces
use App\Repository\SliderRepositoryInterface as ModelInterface;

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
    public function store()
    {

    }
}
