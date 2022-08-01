@extends('pages.profile.profile-index')

@section('profile-title')
   @yield('shop-title') 
@endsection

@section('profile-css')
    @yield('shop-css') 
@endsection

@section('profile-breadcrumb') 
    @yield('shop-breadcrumb')
@endsection

@section('profile-navigation') 
    @include('pages.profile.shop.navigation')
@endsection

@section('profile-content') 
    @yield('shop-content')
@endsection

