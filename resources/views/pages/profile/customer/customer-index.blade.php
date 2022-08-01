@extends('pages.profile.profile-index')

@section('profile-title')
   @yield('customer-title') 
@endsection

@section('profile-css')
    @yield('customer-css') 
@endsection

@section('profile-breadcrumb') 
    @yield('customer-breadcrumb')
@endsection

@section('profile-navigation') 
    @include('pages.profile.customer.navigation')
@endsection

@section('profile-content') 
    @yield('customer-content')
@endsection

