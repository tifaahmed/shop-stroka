<?php

namespace App\Http\Requests\Api\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateApiRequest extends FormRequest
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
        $all += [ 'first_name'                 =>  [ 'required'  ] ]  ;
        $all += [ 'last_name'                  =>  [    ] ]  ;

        $all += [ 'email'                 =>  [ 'required'  ] ]  ;
        $all += [ 'password'                 =>  [ 'required'  ] ]  ;

        $all += [ 'gender'                =>  [ 'required'  ] ]  ;  // enum / 'girl','boy' / default: boy
        $all += [ 'phone'                 =>  [    ] ]  ;
        $all += [ 'birthdate'                =>  [ 'sometimes','date' ] ]  ;
        $all += [ 'email_verified_at'                =>  [ 'required'  ] ]  ;
        $all += [ 'avatar'                 =>  [ 'sometimes' ,'max:50000' ] ]  ;
        $all += [ 'pin_code'                =>  [ 'integer'  ] ]  ; // unique
        $all += [ 'fcm_token'                =>  [ 'string'  ] ]  ; // unique
        $all += [ 'latitude'                =>  [ 'string'  ] ]  ; // unique
        $all += [ 'longitude'                =>  [ 'string'  ] ]  ; // unique
   


 
 
 
  
    
        return $all;
    }
}
