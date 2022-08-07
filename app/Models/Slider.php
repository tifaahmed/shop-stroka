<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title1',           //text , nullable
        'subject1',         //text , nullable
        'desktop_image',    //text  
        'mobile_image',     //text 
        'url1',             //text , nullable
        'button1'           //text , nullable
    ];
    public $translatable = [
        'title1',
        'subject1',
        'desktop_image',
        'mobile_image',
        'url1',
        'button1'
    ];


}
