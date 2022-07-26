<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title1', //nullable
        'subject1',//nullable
        'desktop_image',//nullable
        'mobile_image',//nullable
        'url1',//nullable
        'button1'//nullable
    ];

    // protected $casts = [
    //     'title1' => 'json',
    //     'subject1' => 'json',
    //     'desktopimage' => 'json',
    //     'mobile_image' => 'json',
    //     'url1' => 'json',
    //     'button1' => 'json',
    // ];
}
