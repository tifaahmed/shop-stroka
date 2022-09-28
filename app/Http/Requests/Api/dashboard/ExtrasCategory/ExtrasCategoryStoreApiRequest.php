<?php

namespace App\Http\Requests\Api\Dashboard\ExtrasCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Rules\SpatieUniqueRule;
use App\Models\ExtraCategory;

class ExtrasCategoryStoreApiRequest extends FormRequest
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

        $all += [ 'type'     =>  [ 'sometimes' ,Rule::in([
            'radio','checkbox' 
        ]), ] ] ;
        foreach ($lang_array as $key => $value) {
            $all += [ 'title.'.$value                 =>  [ 'required',new SpatieUniqueRule(new ExtraCategory,'title',$value)  ] ]  ;
        }
        
        return $all;
    }
}
