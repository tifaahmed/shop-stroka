<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Str;

// Resource
use App\Http\Resources\Dashboard\Collections\GovernmentCollection as ModelCollection;
use App\Http\Resources\Dashboard\Government\GovernmentResource as ModelResource;
// lInterfaces
use App\Repository\GovernmentRepositoryInterface as ModelInterface;

// Requests
use App\Http\Requests\Api\Dashboard\Government\GovernmentStoreApiRequest as modelInsertRequest;
use App\Http\Requests\Api\Dashboard\Government\GovernmentUpdateApiRequest as modelUpdateRequest;

class GovernmentController extends Controller
{
    //
}
