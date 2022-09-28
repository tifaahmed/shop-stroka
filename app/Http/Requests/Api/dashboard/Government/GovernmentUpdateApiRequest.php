<?php

namespace App\Http\Requests\Api\Dashboard\Government;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\SpatieUniqueRule;
use  App\Models\Government;
use  App\Models\Country;

class GovernmentUpdateApiRequest extends FormRequest
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

        $all += [ 'country_id'                 =>  [ 'required','integer','exists:'.Country::class.',id'  ] ]  ;

        foreach ($lang_array as $key => $value) {
            $all += [ 'name.'.$value                 =>  [ 'required' , new SpatieUniqueRule(new Government,'name',$value,$this->id) ] ]  ;

        }
        return $all;
    }
}
