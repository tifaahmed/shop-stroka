@extends('pages.profile.customer.customer-index')

@section('customer-title')
 {{trans('static.dashboard')}} 
@endsection

@section('customer-css')
@endsection

@section('customer-breadcrumb')
        @include('pages.partials.breadcrumb',['last_page_name' => trans('static.dashboard')])
@endsection

@section('customer-content') 
        <div class="dashboard">
            <div class="dashboard__profile card profile-card">
                @include('pages.profile.customer.dashboard.information')
            </div>
            <div class="dashboard__address card address-card address-card--featured">
                @include('pages.profile.customer.dashboard.address')
            </div>
            <div class="dashboard__orders card">
                @include('pages.profile.customer.dashboard.table-bottom')
            </div>
        </div>
@endsection
