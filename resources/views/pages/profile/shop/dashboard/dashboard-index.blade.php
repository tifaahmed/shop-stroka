@extends('pages.profile.shop.shop-index')

@section('shop-title')
 {{trans('static.dashboard')}} 
@endsection

@section('shop-css')
@endsection

@section('shop-breadcrumb')
        @include('pages.partials.breadcrumb',['last_page_name' => trans('static.dashboard')])
@endsection

@section('shop-content') 
        <div class="dashboard">
            <div class="col-12 col-lg-12 mt-4 ">
                @include('pages.profile.shop.dashboard.information')
            </div>

            <div class="dashboard__orders card">
                @include('pages.profile.shop.dashboard.table-bottom')
            </div>
        </div>
@endsection
