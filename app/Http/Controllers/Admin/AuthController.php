<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\dashboard\Auth\LoginApiRequest ;

use App\Models\User ;
use Illuminate\Http\Response ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Http\Resources\Dashboard\AuthResource;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function login( LoginApiRequest $request ) {
        if ( $request -> get( 'email' , false ) ) {
            $user = User::where( 'email' , $request -> get( 'email' ) ) -> first( ) ;
        }
        if ( ! Hash::check( $request -> password , $user -> password ) ) {
            return $this -> MakeResponseErrors( 
                [ 'InvalidCredentials' ] 
                , 'InvalidCredentials' 
                , Response::HTTP_UNAUTHORIZED 
            ) ;
        }

        if ( Auth::attempt(['email'=>$user->email,'password'=>$request->password],$user->remember_token) ){
            return $this -> MakeResponseSuccessful( 
                [
                    'user'  =>   new AuthResource ( Auth::user()   )   , 
                    'Token' => Auth::user() -> getToken( ) 
                ],  
                'Successful' ,
                Response::HTTP_OK
            ) ; 
        }
    }

}