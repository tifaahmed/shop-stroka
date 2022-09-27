<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Government;              // belongsTo

class City extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;
    
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',           //string , unique , [note: "translatable"]
        'government_id'
    ];
    public $translatable = [
        'name'
    ];

    // belongsTo
    public function government(){
        return $this->belongsTo(Government::class,'government_id');
    }

}
