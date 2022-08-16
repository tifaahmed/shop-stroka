<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;


    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',            //string 
        'image',            //string , nullable

        'page_url',                 //string , nullable
        'page_tab_title',           //string , nullable
        'page_title',               //string , nullable
        'page_description',         //string , nullable
        'page_keywords',            //string , nullable
    ];
    public $translatable = [
        'title',            //string 

        'page_url',                 //string , nullable
        'page_tab_title',           //string , nullable
        'page_title',               //string , nullable
        'page_description',         //string , nullable
        'page_keywords',            //string , nullable
    ];
}


