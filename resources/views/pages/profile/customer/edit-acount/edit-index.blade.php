@extends('pages.profile.customer.customer-index')

@section('customer-title')
 trans('static.My Account')
@endsection

@section('customer-css')
@endsection

@section('customer-breadcrumb')
        @include('pages.partials.breadcrumb',['last_page_name' => trans('static.My Account') ])
@endsection

@section('customer-content') 
    @include('pages.profile.customer.edit-acount.edit-acount-form')
@endsection
