<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReceivedOrderController extends Controller
{
    public function all()
    {
      return view('pages.profile.received-order.received-order-list') ;
    }
    public function show(Request $request)
    {
      return view('pages.profile.received-order.received-order-show') ;
    }

    
}