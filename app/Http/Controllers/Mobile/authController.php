<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Mobile\Auth\loginApiRequest ;
use App\Http\Requests\Api\Mobile\Auth\RegisterApiRequest ;
use App\Http\Requests\Api\Mobile\Auth\ForgetPasswordByEmailApiRequest ;
use App\Http\Requests\Api\Mobile\Auth\CheckPinCodeRequest ;
use App\Http\Requests\Api\Mobile\Auth\UpdatePasswordRequest ;

use App\Models\User ;

use Illuminate\Http\Response ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Http\Resources\Mobile\User\UserResource;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password as RulesPassword;


class AuthController extends Controller {
 
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
                    [$user->login_type ],  
                    'google' ,
                    Response::HTTP_UNAUTHORIZED
                ) ;
            }
            // get the user sign normal
            else{
                return $this -> MakeResponseErrors( 
                    [ 'InvalidCredentials' ],  
                    'InvalidCredentials' ,
                    Response::HTTP_UNAUTHORIZED
                ) ; 
            }
        }
        // login if correct
        else if( $this->email_verified($user) ){
            return $this -> MakeResponseErrors( 
                [ 'pincode sent to email' ],  
                'pincode sent' ,
                Response::HTTP_UNAUTHORIZED
            ) ;
        }
        else {
            // login user
            return $this->loginUser($user);
        }
    }

    public function loginSocial( Request $request ) {
        $user = User:: where( 'email', $request->email ) -> first( ) ;

        // if not exist create user
        $user = $user ?? $this->store($request) ;

        return $this->loginUser($user); // login
    }

    public function register( RegisterApiRequest $request ) {
        $user = $this->store($request) ; // store user 
        $this->email_verified($user); // send pin code to user email
        return $this->loginUser($user); // login
    }

    public function logout( Request $request ) {
        Auth::user()->tokens()->delete(); // Sanctum
        // Auth::user()->token()->revoke();// passport
        // Auth::user()->currentAccessToken()->delete(); // passport
        return $this -> MakeResponseSuccessful( 
            ['Successful' ],
            'Successful' ,
            Response::HTTP_OK
         ) ;
    }

    public function forget_password(ForgetPasswordByEmailApiRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        if ($status == Password::RESET_LINK_SENT) {
            return [
                'status' => __($status)
            ];
        }
        return $this -> MakeResponseSuccessful( 
            ['send email Successfully'],
            'Successful' ,
            Response::HTTP_OK
         ) ;
    }

    public function check_pin_code(CheckPinCodeRequest $request){
        // !auth('api')->check() // passport
        if(!Auth::user()){

            $user =  User::where('pin_code',$request->pin_code)->first();
            if ($user) {
                $user->update([ 'email_verified_at' => date("Y-m-d H:i:s") ]);
                return $this ->loginUser($user);
            }else{
                return $this -> MakeResponseSuccessful( 
                    [ 'message' => 'InvalidCredentials' ],  
                    'InvalidCredentials' ,
                    Response::HTTP_UNAUTHORIZED
                ) ;  
            }
        }else{
            return $this -> MakeResponseErrors( 
                [ 'message' => 'loggin in before' ],  
                'InvalidCredentials' ,
                Response::HTTP_UNAUTHORIZED
            ) ; 
        } 
    }

    public function update_password(Request $request)
    {
        Auth::user()->update(['password'=>Hash::make($request->password)]);
        return $this -> MakeResponseSuccessful( 
            ['message'=> 'Password reset successfully'],
            'Successful' ,
            Response::HTTP_OK
        ) ;
    }


    // inside functions


        public function store($request ) {
            $all = [ ];


            $all += array( 'first_name'       => $request -> get( 'first_name' ) );
            $all += array( 'email'      => $request -> get( 'email' ) );
            $all += array( 'phone'      => $request -> get( 'phone' ) );

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
                array( 'login_type' => $request->login_type )
                :
                array( 'login_type' => 'normal' );

            $all += $request -> get( 'last_name' ) ?
                array( 'last_name' => $request -> get( 'last_name' ) )
                :
                [];
            $all += $request -> get( 'gender' ) ?
                array( 'gender' => $request->gender  )
                :
                [];  
            $all += $request -> get( 'birthdate' ) ?
                array( 'birthdate' => $request->birthdate )
                :
                []; 

            $all += $request -> get( 'login_type' ) && $request->login_type != 'normal' ?
                array( 'email_verified_at' =>  date("Y-m-d H:i:s") )
                :
                [];
            $all += $request -> get( 'fcm_token' ) ?
                array( 'fcm_token' => $request ->fcm_token )
                :
                [];
            $all += $request -> get( 'latitude' ) ?
                array( 'latitude' => $request ->latitude )
                :
                [];
            $all += $request -> get( 'longitude' ) ?
                array( 'longitude' => $request ->longitude )
                :
                [];
            return  User::create($all);
        }

        public function loginUser($user)
        {   
            //  user Auth
            Auth::loginUsingId($user->id);

            // update auth user  fcm_token 
            $this->update_auth_fcm_token($user->fcm_token);

            // login Response
            return $this->authResponse();
        }

        public function update_auth_fcm_token($fcm_token) {
            $fcm_token ?    Auth::user()->update(['fcm_token'=>$fcm_token]) : null;
        }

        public function email_verified ($user){
            // if not verified send pin code
            if ($user->email_verified_at) {
                return false;
            }else{
                $user->sendActiveEmailNotification();
                return true;
            }
        }

        public function authResponse () {
            return $this -> MakeResponseSuccessful( 
                [
                    'user'  =>   new UserResource ( Auth::user()   )   , 
                    'Token' => Auth::user() -> getToken( ) 
                ],  
                'Successful' ,
                Response::HTTP_OK
            ) ; 
        }
    // inside functions


}
