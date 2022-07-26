@extends('layout')

@section('title')
<title>{{$details->tab_title}} </title>
@endsection

@section('meta')
     @if($details)
        @include('pages.partials.meta', ['page_meta' => $details , 'image' => ''])
     @endif
@endsection

@section('css')
<style type="text/css">
    .service-banner {
        height: auto!important;
    }
    .banner-image-plane {
        background: url({{asset($details->banner_image)}}) no-repeat;
    }
</style>
@endsection

@section('content')
@include('pages.partials.header')
<?php
$lang_session =      Session::get('locale') ;
?>
<!-- 
                 
 {{trans('static.hay i want to contact with you')}}

$info->phone_one - $info->phone_two - $info->phone_three - $info->addres1_en
$info->email_one
$info->email_two  
$info->data_one_en  
-->
<!--{{$social->facebook}} {{$social->twitter}} {{asset($social->youtube)}} {{asset($social->linkedin)}}  {{asset($social->instagram)}} {{asset($social->dribbble)}} {{asset($social->google)}}--> 



<section id="section">
<div class="map">
   {!! $contact_details->map !!}
</div>

    <div class="section">
        <div class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="heading "> 
                            <h3>{{$contact_details->title1}}</h3>
                        </div>
                        <div class="contact-form-box " ng-controller="FormController">

                            @include('pages.submet.contact_us')

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="contact-info">
                            <div class="address-cont">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p> {!! $info->addres1 !!}</p>
                            </div>
                            
                            <div class="address-cont">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>{{$info->phone_one}}</p>
                                <p> {{$info->phone_two}}</p>
                            </div>
                             <div class="address-cont">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p> {{$info->email_one}}</p>
                                <p> {{$info->email_two}}</p>
                                <p> {{$info->email_three}}</p>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Section box ends Here -->
</section>
@include('pages.partials.footer')
@include('vendor.flashy.message')


@endsection
	
