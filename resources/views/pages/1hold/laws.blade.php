@extends('layout')

@section('title')
    <title>{{ $details->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$details->keywords}}">

    <meta property="title"  content="{{$details->page_title}}"/>
    <meta property="og:title"  content="{{$details->page_title}}"/>
    <meta name="twitter:title" content="{{$details->page_title}}" />

    <meta name="description" content="{{$details->description}}">
    <meta property="og:description" content="{{$details->description}}"/>
    <meta name="twitter:description" content="{{$details->description}}" />

    <meta name="twitter:image" content="{{asset($details->home_image_one)}}" />
    <meta property="og:image"     content="{{asset($details->home_image_one)}}"/>
@endsection

@section('css')
@endsection

@section('content') 
@include('pages.partials.header')

<div class="inner-page-banner" style="background:url({{asset($details->banner_image)}}) center center no-repeat;background-size: cover;">
    <div class="opacity">
        <div class="container text-center">
            <h2>{!!$details->page_title!!}</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


        

<div class="welcome-section about">
    <div class="container">
        <div class="row">

            @if($details->table_subject_one)
            @foreach(json_decode($details->table_subject_one) as $key => $subject)
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section-title wow fadeInUp about-title">
                    <h2 class="p-color">{{$subject->title}}</h2>
                    <div class="message-home text-center">
                        <p>
                             {!! $subject->subject !!}
                        </p>
                    </div>
                </div>  
            </div>
            @endforeach
            @endif

        </div>
    </div> 
</div> 

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection
