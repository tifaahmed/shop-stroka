<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    use HasFactory;
    protected $table = 'page_details';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = [
            'url',  // string nullable
            'tab_title',// string nullable
            'page_title',// string nullable
            'description',// string nullable
            'keywords'// string nullable
    ];
}
