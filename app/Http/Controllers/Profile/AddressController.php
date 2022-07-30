<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function all()
    {
      return view('pages.profile.address.address-list') ;
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