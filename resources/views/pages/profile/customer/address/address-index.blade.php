@extends('pages.profile.customer.customer-index')

@section('customer-title')
{{trans('static.address')}}  
@endsection

@section('customer-css')
@endsection

@section('customer-breadcrumb')
    @include('pages.partials.breadcrumb',['last_page_name' => trans('static.address')])
@endsection



@section('customer-content') 
    @yield('address-content')
@endsection
