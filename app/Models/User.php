<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use App\Models\Store;              // HasOne

use Illuminate\Database\Eloquent\SoftDeletes;

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
        'gender',   // enum / 'girl','boy' / default: boy
        'phone',    // string  / nullable
        'birthdate', //  date  / nullable
        'email_verified_at',  // date   / nullable

        'avatar', // string(file) / nullable

        'pin_code', // integer / nullable / unique

        'fcm_token', // string / nullable 
        'latitude', // string / nullable
        'longitude', // string / nullable

        'token', // string / nullable / unique
        'rememberToken'
    ];
 
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getToken( ) : array { 

        $token = $this -> createToken( $this->remember_token ?  $this->remember_token : '' )->accessToken;
        return [
        'token_type'        =>  'Bearer' ,
        'expires_in'        =>  $token -> expires_in ,
        'name_token'        =>  $token -> name,
        'access_token'      =>  $token -> token ,
        'refresh_token'     =>  null ,
        'updated_at_token'  =>  $token -> updated_at ,
        'created_at_token'  =>  $token -> created_at ,
        ] ; 
    }

    public function store(){
        return $this->hasOne(Store::class);
    }
}
