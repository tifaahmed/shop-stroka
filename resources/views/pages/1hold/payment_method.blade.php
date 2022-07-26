@extends('layout')

@section('title')
    <title>{{ $payment_methods->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$payment_methods->keywords}}">

    <meta property="title"  content="{{$payment_methods->page_title}}"/>
    <meta property="og:title"  content="{{$payment_methods->page_title}}"/>
    <meta name="twitter:title" content="{{$payment_methods->page_title}}" />

    <meta name="description" content="{{$payment_methods->description}}">
    <meta property="og:description" content="{{$payment_methods->description}}"/>
    <meta name="twitter:description" content="{{$payment_methods->description}}" />

    <meta property="og:url"       content="{{url()->full()}}"/>
    <meta name="twitter:image" content="{{asset($payment_methods->home_image_one)}}" />
    <meta property="og:image"     content="{{asset($payment_methods->home_image_one)}}"/>
@endsection

@section('css')
@endsection




@section('content')



<style type="text/css">
  .cleaning-mini-banner {
    background-image: url(" {{ asset( 'asset_en/img/bread-cumb-bg.jpg' ) }} ");

  }
</style>
<div class="cleaning-mini-banner">
    <div class="d-table">
        <div class="d-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2> {{$payment_methods->title1}}</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="cleaning-breadcumb">
                           <a href="index.html">{{trans('static.Home')}}</a> / {{$payment_methods->title1}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Banner Area -->

<!-- Start Services Area -->
<section class="cleaning-content-block services">
    <div class="container">
        <div class="row">

            @if($payment_methods->bank_information)
                @foreach(json_decode($payment_methods->bank_information) as $key=> $subject)
                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.{{$key = $key+1}}s">

                        <div class="single-service-item-block single-service">

                           
                              <img style="height:400px;width: 100%" class="lozad" data-src="{{$subject->image}}"> 
                          
                            <h3>{{$subject->name}}</h3>
                            <p>{{$subject->number}}</p>
                            
                        </div>
                    </div>
                @endforeach
            @endif






        </div>
   

    </div>
</section>
<!-- End Services Area -->























<div id="Subheader">
    <div class="container">
        <div class="column one">
            <h1 class="title">{{$payment_methods->title1}}</h1>
        </div>
    </div>
</div>

<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="entry-content">
                <div class="section mcb-section" id="features" style="padding-top:50px; padding-bottom:20px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one  clearfix">
                            <div class="mcb-wrap-inner">
                                


                               @if($payment_methods->bank_information)
                               @foreach(json_decode($payment_methods->bank_information) as $subject)

                                <div class="column mcb-column one-third column_counter">
                                    <div class="counter counter_vertical animate-math">
                                    <div class="icon_wrapper sup-logo">
                                        <img src="{{$subject->image}}" alt="support-logo">
                                        </div>
                                        <div class="desc_wrapper">
                                            <div class="number-wrapper">
                                                <span>   {{$subject->name}}</span>
                                            </div>
                                            <p class="title">
                                                {{$subject->number}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
