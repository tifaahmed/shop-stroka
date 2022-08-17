<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
}
