<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use App\Models\ProductCategory;              // belongsTo

class ProductSubCategory extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $table = 'product_sub_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_category_id',      //unsigned
        'title',                    //text 
        'image',                    //text , nullable

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

    // belongsTo
    public function product_category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
}
