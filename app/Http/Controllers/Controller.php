<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\ControllerTraits\ResponsesTrait;
use App\Http\Controllers\ControllerTraits\FileTrait;
use App\Http\Controllers\ControllerTraits\LanguageTrait;

class Controller extends BaseController
{
    use AuthorizesRequests,
    DispatchesJobs,
    ValidatesRequests,
    ResponsesTrait,
    FileTrait,
    LanguageTrait;

}
