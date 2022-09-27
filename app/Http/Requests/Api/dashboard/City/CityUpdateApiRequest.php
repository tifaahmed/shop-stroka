<?php

namespace App\Http\Requests\Api\Dashboard\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityUpdateApiRequest extends FormRequest
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

        $all += [ 'government_id'                 =>  [ 'required','integer','exists:governments,id'  ] ]  ;

        foreach ($lang_array as $key => $value) {
            $all += [ 'name.'.$value                 =>  [ 'required','unique:cities,name,'.$this->id  ] ]  ;
        }
        return $all;
    }
}
