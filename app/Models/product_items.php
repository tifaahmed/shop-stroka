<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_items extends Model
{
    use HasFactory;

    protected $table = 'product_items';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
        'title', // string
        'product_sub_category_id',  // integer , unsigned

        'visit_count',      // integer , default(0)
        'order_count',      // integer , default(0)
        'wishlisted_count', // integer , default(0)
        'rating_count',     // integer , default(0)
        'comment_count',    // integer , default(0)
        
        'rating',  // float , default(0)
        'price',   // float , default(0)
        'tag',      // string , nullable
        'tag_color', // string , nullable
        'chosen',  // boolean , default(0)
        'code',  // string , nullable
        'image_one',  // string , nullable
        'url',  // string
    ];


}
