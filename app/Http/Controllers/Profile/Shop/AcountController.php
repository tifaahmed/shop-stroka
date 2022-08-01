<?php

namespace App\Http\Controllers\Profile\Shop;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AcountController extends Controller
{
    public function dashboard()
    {
      return view('pages.profile.shop.dashboard.dashboard-index') ;
    }
}
