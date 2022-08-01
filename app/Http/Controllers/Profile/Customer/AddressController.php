<?php

namespace App\Http\Controllers\Profile\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function all()
    {
      return view('pages.profile.customer.address.address-list') ;
    }
    public function add()
    {
      return view('pages.profile.address.address-add') ;
    }
    public function edit()
    {
      return view('pages.profile.address.address-edit') ;
    }
    
}