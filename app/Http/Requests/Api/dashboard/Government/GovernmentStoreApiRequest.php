<?php

namespace App\Http\Requests\Api\Dashboard\Government;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\UniqueRule;
class GovernmentStoreApiRequest extends FormRequest
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

        $all += [ 'country_id'                 =>  [ 'required','integer','exists:countries,id'  ] ]  ;
        // $all += [ 'name'                =>  [ 'required','unique:governments,name' ] ]  ;

        foreach ($lang_array as $key => $value) {
            $all += [ 'name.'.$value                 =>  [ 'required','unique:governments,name'  , new UniqueRule('governments') ] ]  ;
        }
        
        return $all;
    }
}
