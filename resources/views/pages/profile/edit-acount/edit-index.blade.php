@extends('layout')

@section('title')
<title>  {{trans('static.dashboard')}} </title>
@endsection

@section('css')
@endsection

@section('content')  
<div class="site__body">
    <div class="page-header">
        @include('pages.partials.breadcrumb',['last_page_name' => trans('static.My Account')])
    </div>
    <div class="block">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-3 d-flex">
                    @include('pages.profile.navigation')
                </div>

                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    @include('pages.profile.edit-acount.edit-acount-form')
                </div>

            </div>
        </div>
    </div>

</div>
@endsection


