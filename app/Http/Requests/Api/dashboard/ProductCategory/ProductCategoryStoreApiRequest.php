<?php

namespace App\Http\Requests\Api\Dashboard\ProductCategory;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryStoreApiRequest extends FormRequest
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




        foreach ($lang_array as $key => $value) {
            $all += [ 'title.'.$value                 =>  [ 'required'  ] ]  ;
            $all += [ 'image.'.$value                  =>  [ 'sometimes' ,'max:50000'] ]  ;

            $all += [ 'page_url.'.$value                  =>  [ 'sometimes'  ] ]  ;
            $all += [ 'page_tab_title.'.$value            =>  [ 'sometimes'  ] ]  ;
            $all += [ 'page_title.'.$value                =>  [ 'sometimes'  ] ]  ;
            $all += [ 'page_description.'.$value          =>  [ 'sometimes'  ] ]  ;
            $all += [ 'page_keywords.'.$value             =>  [ 'sometimes'  ] ]  ;

        }
        return $all;
    }
}
