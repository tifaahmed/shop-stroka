<?php

namespace App\Http\Requests\Api\Dashboard\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $lang_array = config('app.lang_array') ;
        
        $all=[];


        $all += [ 'image'         =>  [ 'sometimes' ,'max:50000'] ]  ;


        foreach ($lang_array as $key => $value) {
            $all += [ 'title.'.$value                 =>  [ 'required' ,'max:127' ] ]  ;
    
            $all += [ 'page_url.'.$value                  =>  [ 'sometimes' ,'max:127' ] ]  ;
            $all += [ 'page_tab_title.'.$value            =>  [ 'sometimes' ,'max:127' ] ]  ;
            $all += [ 'page_title.'.$value                =>  [ 'sometimes' ,'max:127' ] ]  ;
            $all += [ 'page_description.'.$value          =>  [ 'sometimes' ,'max:127' ] ]  ;
            $all += [ 'page_keywords.'.$value             =>  [ 'sometimes' ,'max:127' ] ]  ;

        }
        return $all;
    }
}
