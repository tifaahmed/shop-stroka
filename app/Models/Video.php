<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'file', // string
        'poster',// string

        'sound',// boolean , default 1
        'loop',// boolean , default 1
        'autoplay',// boolean , default 1
        'controls'// boolean , default 1
    ];
}
