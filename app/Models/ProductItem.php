<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use App\Models\ProductCategory;              // belongsTo
use App\Models\Store;              // belongsTo

class ProductItem extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;

    protected $table = 'product_items';
    protected $guarded = ['id'];

    protected $fillable = [
        'title', // string
        'description', // text
        'image', // string

        'discount', // float / default : 0
        'price',   // float / default : 0

        'store_id',  // integer , unsigned
        'product_category_id',  // integer , unsigned

        'status', // enum  request_as_new request_as_edit active  deactivate out_of_stock
    ];
   
    public $translatable = [
        'title',            
        'description',            
    ];
    // belongsTo
    public function product_category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
    // belongsTo
    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
}
