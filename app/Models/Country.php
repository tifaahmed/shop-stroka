<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Government;              // HasMany

class Country extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',           //string , unique , [note: "translatable"]
        'phone_code',           //string , unique 
        'image',         //string , nullable , file
    ];
    public $translatable = [
        'name'
    ];

    // HasMany
    public function government(){
        return $this->HasMany(Government::class);
    }
}
