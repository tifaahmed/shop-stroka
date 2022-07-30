@extends('layout')

@section('title')
<title>about-us </title>
@endsection

@section('content')  

<div class="site__body">
    <div class="block about-us">
        <div class="about-us__image" style="background:{{asset('asset_ar/images/aboutus.jpg')}}!important"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="about-us__body">
                        @include('pages.site.about-us.top')
                        @include('pages.site.about-us.bottom')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
