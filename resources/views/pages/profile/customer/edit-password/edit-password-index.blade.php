@extends('pages.profile.customer.customer-index')

@section('customer-title')
 {{trans('static.edit-password')}} 
@endsection

@section('customer-css')
@endsection

@section('customer-breadcrumb')
        @include('pages.partials.breadcrumb',['last_page_name' => trans('static.edit-password')])
@endsection

@section('customer-content') 
    @include('pages.profile.edit-password.edit-password-form')
@endsection
