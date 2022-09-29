<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Auth\Notifications\ResetPassword;
use App\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

// Notification
use Illuminate\Support\Facades\Notification;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\ActiveEmailNotification;

use Auth;

use App\Models\Store;              // HasOne


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',// string
        'last_name', // string / nullable

        'email', // string / unique
        'password', // string
        
        'login_type',   // enum / 'google','facebook','normal; / default: normal
        'gender',   // enum / 'girl','boy' / default: boy
        'phone',    // string  / nullable
        'birthdate', //  date  / nullable
        'email_verified_at',  // datetime   / nullable

        'avatar', // string(file) / nullable

        'pin_code', // integer / nullable / unique

        'fcm_token', // string / nullable 
        'latitude', // string / nullable
        'longitude', // string / nullable

        'token', // string / nullable / unique
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        User::creating(function ($model) {
            $model->pin_code = rand(111111,999999);
        });
        User::updating(function ($model) {
            $model->pin_code = rand(111111,999999);
        });
    }



    //relations
        // HasOne
            public function store(){
                return $this->hasOne(Store::class);
            }
    //relations


    

    public function getToken( ) : array { // sanctum
        $token = $this -> createToken( $this->remember_token ??  $this->remember_token   )  ; 
        return [
            'token_type'        =>  'Bearer' ,
            'expires_in'        =>  null ,
            'name_token'        =>  null,
            'access_token'      =>  $token ->plainTextToken ,
            'refresh_token'     =>  null ,
            'updated_at_token'  =>  null ,
            'created_at_token'  =>  null ,
        ] ; 
    }
    // public function getToken( ) : array {   // passport

    //     $token = $this -> createToken( $this->remember_token ?  $this->remember_token : '' )->accessToken;
    //     return [
    //     'token_type'        =>  'Bearer' ,
    //     'expires_in'        =>  $token -> expires_in ,
    //     'name_token'        =>  $token -> name,
    //     'access_token'      =>  $token -> token ,
    //     'refresh_token'     =>  null ,
    //     'updated_at_token'  =>  $token -> updated_at ,
    //     'created_at_token'  =>  $token -> created_at ,
    //     ] ; 
    // }


    // Notification

        public function sendPasswordResetNotification($token)
        {
            $url = asset('api/auth/reset-password?token='.$token);

            $data = [] ;
            $data += ['url' => $url];
            $data += ['pin_code' => $this->pin_code];

            $this->notify(new ResetPasswordNotification($data));
        }
        public function sendActiveEmailNotification()
        {
            $data = ['pin_code' => $this->pin_code];

            $this->notify(new ActiveEmailNotification($data));
            
        }
    //Notifications
    
}
