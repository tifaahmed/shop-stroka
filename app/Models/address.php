<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;              // belongsTo
use App\Models\City;              // belongsTo

class address extends Model
{
    use HasFactory;

    protected $table = 'addresses';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id',  // integer , unsigned
        'city_id',  // integer , unsigned
        'address',  // text  
        'department',  // string  ,nullable
        'house',  // string  ,nullable
        'street',  // string  ,nullable
        'note',  // text  ,nullable
        'type', // enum , 'home', 'work', 'rest' ,'mosque'

        'latitude',  // string  ,nullable
        'longitude',  // string  ,nullable

    ];

    // belongsTo
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}

 