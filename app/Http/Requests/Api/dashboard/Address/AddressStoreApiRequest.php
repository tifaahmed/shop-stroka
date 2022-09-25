<?php

namespace App\Http\Requests\Api\Dashboard\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressStoreApiRequest extends FormRequest
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
        $all=[];
        $all += [ 'user_id'   =>  [ 'required' ,'integer','exists:users,id'] ] ;
        $all += [ 'city_id'   =>  [ 'required' ,'integer','exists:cities,id'] ] ;
        $all += [ 'address'                 =>  [ 'required'  ] ]  ;
        $all += [ 'department'                 =>  [ 'sometimes'  ] ]  ;

        $all += [ 'house'                 =>  [ 'sometimes'  ] ]  ;
        $all += [ 'street'                 =>  [ 'sometimes'  ] ]  ;
        $all += [ 'note'                 =>  [ 'sometimes'  ] ]  ;
        $all += [ 'type'        =>  [ 'sometimes' ,Rule::in([
            'home', 'work', 'rest' ,'mosque'
        ]), ] ] ;
        $all += [ 'latitude'                 =>  [ 'sometimes'  ] ]  ;
        $all += [ 'longitude'                 =>  [ 'sometimes'  ] ]  ;
        return $all;
    }
}
