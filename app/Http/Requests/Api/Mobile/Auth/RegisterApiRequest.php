<?php

namespace App\Http\Requests\Api\Mobile\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterApiRequest extends FormRequest
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


    public function rules()
    {
        return [
            'first_name'      =>  [ 'required' ,'max:50'] ,
            'last_name'      =>  [ 'sometimes' ,'max:50'] ,

            'email'     =>  [ 'required' , 'unique:users,email' ,'email','max:200'] ,
            'phone'     =>  [ 'sometimes' ,'unique:users,phone' ,'max:15' ] ,

            'password'  =>  [ 'required' , 'confirmed' ,  'min:8' , 'max:15' ],
            'password_confirmation'  =>  [ 'required' , 'min:8' , 'max:15' ],


            'avatar'    =>      [ 'sometimes', 'mimes:jpg,jpeg,webp,bmp,png' , 'max:5000'] ,
            'gender'    =>      [ 'sometimes', Rule::in(['girl','boy']) ] ,

            'birthdate '=>      [  'date' , 'date_format:Y/d/m'] ,
            'city_id'=>         [  'sometimes' , 'integer','exists:cities,id' ] ,

            'fcm_token'   =>    [ 'sometimes' ,'max:200' ] ,

            'latitude'   =>    [ 'sometimes' ,'max:50' ] ,
            'longitude'   =>    [ 'sometimes' ,'max:50' ] ,

        ];
    }
}
