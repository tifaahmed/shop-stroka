<?php

namespace App\Http\Requests\Api\Dashboard\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryUpdateApiRequest extends FormRequest
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

        $all += [ 'image'                  =>  [ 'required' ,'file','max:50000'] ]  ;
        $all += [ 'phone_code'                 =>  [ 'required' ,'numeric' ,'unique:countries,phone_code,'.$this->id  ] ]  ;

        foreach ($lang_array as $key => $value) {
            $all += [ 'name.'.$value                 =>  [ 'required','unique:countries,name,'.$this->id  ] ]  ;
        }
        return $all;
    }
}
