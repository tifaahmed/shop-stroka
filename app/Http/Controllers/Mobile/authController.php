<?php

namespace App\Http\Controllers\Api\mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\loginApiRequest ;
use App\Http\Requests\Api\RegisterApiRequest ;
use App\Models\User ;

use Illuminate\Http\Response ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Http\Resources\Mobile\UserResource;
use Illuminate\Support\Facades\Auth;

class authController extends Controller {
 
    public function __construct(){
        $this->folder_name = 'user/'.Str::random(10).time();
        $this->file_columns = ['avatar'];
    }

    public function login( loginApiRequest $request ) {
        // get the user by email 
        $user = User::where( 'email' , $request ->email ) -> first( ) ;
        
        // get the user password wrong
        if ( ! Hash::check( $request -> password , $user -> password ) ) {
            // get the user sign by google
            if( $user->login_type ){
                return $this -> MakeResponseErrors( 
                    ['message' => $user->login_type ],  
                    'google' ,
                    Response::HTTP_UNAUTHORIZED
                ) ;
            }else{
                return $this -> MakeResponseErrors( 
                    [ 'message' => 'InvalidCredentials' ],  
                    'InvalidCredentials' ,
                    Response::HTTP_UNAUTHORIZED
                ) ; 
            }
        }
        // login if correct
        else if ( Auth::attempt(['email' => $user->email, 'password' => $request->password],$request->_token) ){
            return $this -> MakeResponseSuccessful( 
                [
                    'user'  =>   new UserResource ( Auth::user()   )   , 
                    'Token' => Auth::user() -> getToken( ) 
                ],  
                'Successful' ,
                Response::HTTP_OK
            ) ; 
        }
    }
    public function loginSocial( Request $request ) {

        $user = User::
        where( 'email'          , $request -> get( 'email' ) ) 
        -> first( ) ;

        $user = $user ?? $this->store($request) ;

        Auth::loginUsingId($user->id) ;
    
        return $this -> MakeResponseSuccessful( 
            [
                'user'  =>   new UserResource ( Auth::user()   )   , 
                'Token' => Auth::user() -> getToken( ) 
            ],  
            'Successful' ,
            Response::HTTP_OK
        ) ; 
    }
    public function store($request ) {
        $all = [ ];


        $all += array( 'first_name'       => $request -> get( 'first_name' ) );
        $all += array( 'email'      => $request -> get( 'email' ) );
        $all += array( 'phone'      => $request -> get( 'phone' ) );
        $all += array( 'pin_code' =>rand(1111,9999) );

        $file_one = 'avatar';
        if ($request->hasFile($file_one)) {            
            $all += $this->HelperHandleFile($this->folder_name,$request->file($file_one),$file_one)  ;
        }

        $all += $request -> get( 'token' ) ?
            array( 'token'       => $request -> get( 'token' )  )
            :
            array( 'token'       => Hash::make( Str::random(60) ) );

        $all += $request -> get( 'token' ) ?
            array( 'remember_token'       => $request -> get( 'token' )  )
            :
            array( 'remember_token'       => Hash::make( Str::random(60) ) );


        $all += $request -> get( 'password' ) ?
            array( 'password'       => Hash::make( $request -> get( 'password' ) ) )
            :
            (
                $request -> get( 'token' ) ?
                array( 'password'       => $request -> get( 'token' )  )
                :
                array( 'password'       => Hash::make('social') )
            );

        $all += $request -> get( 'login_type' ) ?
            array( 'login_type' => $request -> get( 'login_type' ) )
            :
            array( 'login_type' => 'normal' );
        $all += $request -> get( 'last_name' ) ?
            array( 'last_name' => $request -> get( 'last_name' ) )
            :
            null;
        $all += $request -> get( 'gender' ) ?
            array( 'gender' => $request->gender  )
            :
            null;  
        $all += $request -> get( 'birthdate' ) ?
            array( 'birthdate' => $request->birthdate )
            :
            null;  
        $all += $request -> get( 'login_type' ) && $request-> login_type != 'normal' ?
            array( 'email_verified_at' =>  date('Y-m-d-h-i-s') )
            :
            null;
        $all += $request -> get( 'fcm_token' ) ?
            array( 'fcm_token' => $request ->fcm_token )
            :
            null;
        $all += $request -> get( 'latitude' ) ?
            array( 'latitude' => $request ->latitude )
            :
            null;
        $all += $request -> get( 'longitude' ) ?
            array( 'longitude' => $request ->longitude )
            :
            null;
        return  User::create($all);
    }


    
    public function register( RegisterApiRequest $request ) {

        $user = $this->store($request) ;

        // $user->save();
        
        if ( Auth::attempt(['email' => $user->email, 'password' => $request->password],$request->_token) ){
            return $this -> MakeResponseSuccessful( 
                [
                    'user'  =>   new UserResource ( Auth::user()   )   , 
                    'Token' => Auth::user() -> getToken( ) 
                ],  
                'Successful' ,
                Response::HTTP_OK
            ) ; 
        }
    }


    public function logout( Request $request ) {
       // Auth::guard( 'sanctum' ) -> logout( );
        // Auth::guard('sanctum')->logout();
        // Auth::logout();
        return $user = Auth::user()->token();
        $user->revoke();
        // $user->token()->revoke()
        // Auth::user()->currentAccessToken()->delete();
      
        // dd( Auth::user()  );
        return $this -> MakeResponseSuccessful( 
            ['user'  => null ],
            'Successful' ,
            Response::HTTP_OK
         ) ;
    }

}
