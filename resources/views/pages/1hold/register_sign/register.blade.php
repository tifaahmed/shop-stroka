@extends('layout')


@section('title')
<title>
   التسجيل
</title>
@endsection

@section('meta')
    
    <meta name="keywords" content="{{$page_details->keywords}}">
    <meta property="title"  content="{{$page_details->page_title}}"/>
    <meta property="og:title"  content="{{$page_details->page_title}}"/>
    <meta name="twitter:title" content="{{$page_details->page_title}}" />
    <meta name="description" content="{{$page_details->description}}">
    <meta property="og:description" content="{{$page_details->description}}"/>
    <meta name="twitter:description" content="{{$page_details->description}}" /> 
 
  <meta property="og:url"       content="{{Request::url()}}"/>
  <meta name="twitter:image" content="{{asset($meta->twitter_image)}}" />
  <meta property="og:image"     content="{{asset($meta->og_image)}}"/>
@endsection

@section('css')
 
@endsection

@section('content')
@include('pages.partials.header')

 <div class="inner-head" style=" background-image: url({{asset($page_details->banner_image)}})!important">
    <div class="container">
        <h1 class="entry-title">{{$page_details->title}}</h1>
        <p class="description">
          {!! $page_details->subject !!}
        </p>
        <div class="breadcrumb">
            <ul class="clearfix">
                <li class="ib"><a href="{{asset('/')}}">{{trans('static.Home')}}</a></li>
                <li class="ib current-page">{{$page_details->title}}</li>
            </ul>
        </div>
    </div><!-- End container -->
</div><!-- End Inner Page Head -->

<div class="clearfix"></div>
 <section class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-form register">
                    <div class="login-title">
                        <span class="icon"><i class="fa fa-group"></i></span>
                        <span class="text">{{trans('static.Register')}} </span>
                    </div><!-- End Title -->


                    <?php 
                    if( isset($soc_email) && $soc_email 
                        && isset($soc_name) && $soc_name 
                        && isset($soc_pass) && $soc_pass 
                    ){
                        $soc_email = $soc_email;
                        $soc_name = $soc_name ;
                        $soc_pass = $soc_pass ;
                    }else{
                        $soc_email = '';
                        $soc_name = '';
                        $soc_pass ='';
                    }
                    ?>


                    @include('pages.submet.register', ['action' => 'register_form',
                    'soc_email'=>$soc_email,
                    'soc_name'=>$soc_name,
                    'soc_pass'=>$soc_pass,
                    ])

                </div><!-- end login form -->
                <div class="login-options">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('login/facebook')}}" class="login-op-btn grad-btn ln-tr fb">{{trans('static.Login with Facebook Account')}}</a>
                        </div><!-- end FB login -->
                        <div class="col-md-6 col-sm-6">
                            <a href="{{asset('login/google')}}" class="login-op-btn grad-btn ln-tr gp">{{trans('static.Login with Google Account')}}</a>
                        </div><!-- end GP login -->
                      
                    </div>
                </div><!-- end login optionss -->
            </div><!-- end col-md-8/offset -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- End Register Page -->
  @include('pages.partials.footer')
  @include('pages.partials.side1')
  @include('pages.partials.side2')
  @include('vendor.flashy.message')
@endsection
