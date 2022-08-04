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
        'title1', //nullable
        'subject1',//nullable
        'desktop_image',//nullable
        'mobile_image',//nullable
        'url1',//nullable
        'button1'//nullable
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
