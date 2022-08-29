<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use App\Models\ProductSubCategory;              // HasMany

class ProductCategory extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;


    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',            //text 
        'image',            //text , nullable

        'page_url',                 //text , nullable
        'page_tab_title',           //text , nullable
        'page_title',               //text , nullable
        'page_description',         //text , nullable
        'page_keywords',            //text , nullable
    ];
    public $translatable = [
        'title',            
        'image',           

        'page_url',                
        'page_tab_title',     
        'page_title',          
        'page_description',    
        'page_keywords',   
    ];

    // HasMany
    public function product_sub_category(){
        return $this->HasMany(ProductSubCategory::class);
    }
}


