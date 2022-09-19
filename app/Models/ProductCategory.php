<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

use App\Models\ProductItem;              // HasMany

class ProductCategory extends Model
{
    use HasFactory , HasTranslations , SoftDeletes;


    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',            //text 
    ];
    public $translatable = [
        'title',            
    ];

    // HasMany
    public function product_item(){
        return $this->HasMany(ProductItem::class);
    }
}


