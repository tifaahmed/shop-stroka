<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
      return view('pages.profile.dashboard.dashboard-index') ;
    }

    public function edit()
    {
      return view('pages.profile.edit-acount.edit-index') ;
    }
    public function edit_password()
    {
      return view('pages.profile.edit-password.edit-password-index') ;
    }
    
}
