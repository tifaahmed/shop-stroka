<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ExtraCategory extends Model
{
    use HasFactory , HasTranslations  ;

    protected $table = 'extra_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',           //string , unique , [note: "translatable"]
        'type'  //  enum , 'radio'- 'checkbox'
    ];
    public $translatable = [
        'title'
    ];
}
