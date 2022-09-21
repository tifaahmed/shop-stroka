<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use App\Models\User;              // HasOne

class Store extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;


    protected $table = 'stores';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title',       //text  [note: "store name"]
        'description', //text  [note: "store information"]

        'user_id',  // int / unsigned
        'status',   // enum / 'pending', 'accepted', 'rejected' ,'canceled'
        'image',   // string / [note: "store logo  pizza"]
        'phone',    // string
        'latitude', // string
        'longitude', // string
    ];
    public $translatable = [
        'title', 
        'description'           
    ];
 

    // HasMany
    public function user(){
        return $this->HasOne(User::class);
    }}
