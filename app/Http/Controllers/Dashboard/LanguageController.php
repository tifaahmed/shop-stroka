<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;


class LanguageController extends Controller
{
    public function __construct()
    {
        $this->languages = config('app.lang_array'); // ex [ar , en ]
    }
    public function all(){
        try {
            return($this->languages);
        } catch (\Exception $e) {
            return $this -> MakeResponseErrors(  
                [$e->getMessage()  ] ,
                'Errors',
                Response::HTTP_NOT_FOUND
            );
        }
    }
    
}
