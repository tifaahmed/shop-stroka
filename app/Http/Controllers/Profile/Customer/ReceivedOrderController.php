<?php

namespace App\Http\Controllers\Profile\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReceivedOrderController extends Controller
{
    public function all()
    {
      return view('pages.profile.customer.received-order.received-order-list') ;
    }
    public function show(Request $request)
    {
      return view('pages.profile.customer.received-order.received-order-show') ;
    }

    
}