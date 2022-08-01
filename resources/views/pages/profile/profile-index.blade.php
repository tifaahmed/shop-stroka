@extends('layout')

@section('title')
<title>  @yield('profile-title')</title>
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

                <div class="col-12 col-lg-12" style="padding-bottom: 17px;">

                    <div class="row">
                        <div class="col-6 col-lg-6">
                            <a  href="{{asset(Request::segment(1).'/'.Request::segment(2).'/custumer')}}" 
                                class="btn btn-block btn-success">
                                عميل
                            </a>
                        </div>
                        <div class="col-6 col-lg-6">
                            <a  href="{{asset(Request::segment(1).'/'.Request::segment(2).'/shop')}}" 
                                class="btn btn-block btn-danger">
                                متجر
                            </a>
                        </div>
                    </div>
                    
                </div>  
        
                
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
