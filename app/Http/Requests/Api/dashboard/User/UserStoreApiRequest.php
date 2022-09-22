<?php

namespace App\Http\Requests\Api\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreApiRequest extends FormRequest
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

        $all += [ 'first_name'               =>  [ 'required'  ] ]  ;
        $all += [ 'last_name'               =>  [  'sometimes'  ] ]  ;

        $all += [ 'email'               =>  [ 'required' ,'unique:users' ,'email' ] ]  ;
        $all += [ 'password'               =>  [   'required' ] ]  ;
        $all += [ 'gender'               =>  [   'required' , Rule::in(['girl','boy']) ] ] ;

        $all += [ 'phone'               =>  [  'sometimes'   ] ]  ;

        $all += [ 'birthdate'               =>  [   'date'  ] ]  ;
        
        $all += [ 'avatar'               =>  [ 'sometimes','max:50000','mimes:jpg,jpeg,webp,bmp,png' ] ]  ;
        
        $all += [ 'pin_code'               =>  [  'integer', 'unique:users' ] ]  ;
        
        $all += [ 'fcm_token'               =>  [  'sometimes'  ] ]  ;

        $all += [ 'latitude'               =>  [  'sometimes'  ] ]  ;
        $all += [ 'longitude'               =>  [  'sometimes'  ] ]  ;

        $all += [ 'email_verified_at'       =>  ['date' ] ]  ;


        return $all;
    }
}
