@extends('layout')

@section('title')
<title>{{$details->tab_title_en}} </title>
@endsection

@section('meta')


  <meta name="keywords" content="{{$details->keywords_en}}">

  <meta property="title"  content="{{$details->page_title_en}}"/>
  <meta property="og:title"  content="{{$details->page_title_en}}"/>
  <meta name="twitter:title" content="{{$details->page_title_en}}" />

  <meta name="description" content="{{$details->description_en}}">
  <meta property="og:description" content="{{$details->description_en}}"/>
  <meta name="twitter:description" content="{{$details->description_en}}" />


  <meta property="og:url"       content="{{Request::url()}}"/>
  <meta name="twitter:image" content="{{asset($meta->twitter_image)}}" />
  <meta property="og:image"     content="{{asset($meta->og_image)}}"/>
  
@endsection



@section('content')


    <section class="inner-intro bg-img light-color overlay-before parallax-background">
        <div class="container">
            <div class="row title">
                <h1>{{$details->page_title_en}}</h1>
                  <div class="page-breadcrumb">
                    <a href="{{asset('/')}}">Home</a>/<span>{{$details->page_title_en}}</span>
                </div>
            </div>
        </div>
    </section>
    <section class="padding ptb-xs-40 portofolio">
        <div class="container">
            <div class="row">
                @foreach($order as $val)

                <div class="col-md-3 col-sm-6 mb-xs-30">
                    <div class="box-hover img-scale">
                        <figure>
                            <img src="{{asset($val->image)}}" alt="{{$val->image_one_alt_en}}" title="{{$val->image_one_alt_en}}">
                        </figure>
                    </div>
                </div>

                @endforeach

                   
            </div>
        </div>
        
    </section>
@endsection
