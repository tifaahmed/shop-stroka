@extends('pages.profile.customer.customer-index')

@section('customer-title')
 {{trans('static.received-order')}}  
@endsection

@section('customer-css')
@endsection

@section('customer-breadcrumb')
    @include('pages.partials.breadcrumb',['last_page_name' =>   trans('static.received-order')])
@endsection

@section('customer-content') 
    @yield('received-order-content')
@endsection
