<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Country;              // belongsTo
use App\Models\City;              // HasMany

class Government extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $table = 'governments';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',           //string , unique , [note: "translatable"]
        'country_id'
    ];
    public $translatable = [
        'name'
    ];

    // belongsTo
        public function country(){
            return $this->belongsTo(Country::class,'country_id');
        }

    // HasMany
        public function cities(){
            return $this->HasMany(City::class);
        }
}
