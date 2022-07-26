@extends('layout')

@section('title')
<title>{{$details->tab_title}} </title>
@endsection

@section('meta')

  <meta name="keywords" content="{{$details->keywords}}">

  <meta property="title"  content="{{$details->page_title}}"/>
  <meta property="og:title"  content="{{$details->page_title}}"/>
  <meta name="twitter:title" content="{{$details->page_title}}" />

  <meta name="description" content="{{$details->description}}">
  <meta property="og:description" content="{{$details->description}}"/>
  <meta name="twitter:description" content="{{$details->description}}" />

  <meta property="og:url"       content="{{url()->full()}}"/>
  <meta name="twitter:image" content="{{asset($details->home_image_one)}}" />
  <meta property="og:image"     content="{{asset($details->home_image_one)}}"/>
@endsection

@section('content')

<style type="text/css">
  .cleaning-mini-banner {
    background-image: url(" {{ asset( $details->banner_image ) }} ");

  }
</style>
<div class="cleaning-mini-banner">
    <div class="d-table">
        <div class="d-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2> {{$details->page_title}} </h2>
                    </div>
                    <div class="col-md-6">
                        <div class="cleaning-breadcumb">
                           <a href="{{asset('/')}}">{{trans('static.Home')}}</a> /{{$details->page_title}}
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

          @foreach($items as $key => $val)  
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{$key = $key+1}}s">

                <div class="single-service-item-block single-service">

                    <a href="{{asset('/'.$url.'/'.$val->url)}}" class="single-service-image service-bg-2">
                      <img style="height:200px;width: 100%" class="lozad" data-src="{{asset( $val->home_image_one)}}"  alt="{{$val->home_one_alt}}" title="{{$val->home_one_alt}}"> 
                    </a>
                    <h3>{{$val->home_title}}</h3>
                    <p>{!! $val->home_subject !!}</p>
                    <a href="{{asset('/'.$url.'/'.$val->url)}}" class="read-more-btn">{{trans('static.Read More')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
          @endforeach  
           

        </div>
   
        <div class="row">
           <!-- Pagination -->

                      @include('pages.paginator', ['paginator' => $items])

        </div>
    </div>
</section>
<!-- End Services Area -->


                             




@endsection