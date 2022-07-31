@extends('layout')

@section('title')
<title> profile  @yield('profile-title')</title>
@endsection

@section('css')
@endsection

@section('content') 
<div class="site__body">
    <div class="page-header">
        @yield('profile-breadcrumb')
    </div> 

    <div class="block">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-3 d-flex">
                    @yield('profile-navigation')
                </div>

                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
