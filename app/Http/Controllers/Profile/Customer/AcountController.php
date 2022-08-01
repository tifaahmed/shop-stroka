<?php

namespace App\Http\Controllers\Profile\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AcountController extends Controller
{
    public function dashboard()
    {
      return view('pages.profile.customer.dashboard.dashboard-index') ;
    }

    public function edit()
    {
      return view('pages.profile.customer.edit-acount.edit-index') ;
    }
    public function edit_password()
    {
      return view('pages.profile.customer.edit-password.edit-password-index') ;
    }
    
}
