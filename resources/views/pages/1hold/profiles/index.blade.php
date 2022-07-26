@extends('layout')


@section('title')
    <title>{{ $profile_users->full_name}}</title>
@endsection
@section('meta')
    <meta name="keywords" content="{{$profile_users->full_name}}">

    <meta property="title"  content="{{$profile_users->full_name}}"/>
    <meta property="og:title"  content="{{$profile_users->full_name}}"/>
    <meta name="twitter:title" content="{{$profile_users->full_name}}" />

    <meta name="description" content="{!!$profile_info->full_name!!}">
    <meta property="og:description" content="{!!$profile_info->full_name!!}"/>
    <meta name="twitter:description" content="{!!$profile_info->full_name!!}" />

    <meta name="twitter:image" content="{{asset($profile_users->avatar)}}" />
    <meta property="og:image"     content="{{asset($profile_users->avatar)}}"/>
    
    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
  <style type="text/css">
    /*@media screen and (max-width: 767px){*/
        /*.btn {*/
            /*line-height: 0px !important;*/
        /*}*/
    /*}*/
    .error{
      color: red!important;
    }
    .iti__country-list {
      position: unset!important;
    }
    .iti--allow-dropdown{
      width: 100%
    }
  </style>

@endsection 

@section('content')
    @include('pages.partials.header')

            <a href="{{asset('sent_orders/'.$profile_users->url)}}" class="btn">الطلبات الصادرة</

<!-- <link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}"> -->
<!-- <link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}"> -->




<!-- <script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script> -->


<!-- <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script> -->




      @yield('profile_content')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    @include('vendor.flashy.message')
 


    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 





