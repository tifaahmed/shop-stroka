@extends('layout')

@section('title')
<title>{{$single_category->tab_title}} </title>
@endsection

@section('meta')

  <meta name="keywords" content="{{$single_category->keywords}}">

  <meta property="title"  content="{{$single_category->page_title}}"/>
  <meta property="og:title"  content="{{$single_category->page_title}}"/>
  <meta name="twitter:title" content="{{$single_category->page_title}}" />

  <meta name="description" content="{{$single_category->description}}">
  <meta property="og:description" content="{{$single_category->description}}"/>
  <meta name="twitter:description" content="{{$single_category->description}}" />

  <meta property="og:url"       content="{{url()->full()}}"/>
  <meta name="twitter:image" content="{{asset($single_category->home_image_one)}}" />
  <meta property="og:image"     content="{{asset($single_category->home_image_one)}}"/>
  <meta property="og:image:alt"     content="{{asset($single_category->home_one_alt)}}"/>
@endsection

@section('content')







<section class="services-page">
    <div class="container">
            <div class="row">
              @foreach($items as $key => $val)

                <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="service-item">
                            <div class="img-serv">
                                <img src="{{asset( $val->image_two)}}" aalt="{{$val->image_two_alt}}" title="{{$val->image_two_alt}}">
                            </div>
                            <div class="service-text text-center">
                                <h3>{{$val->home_title}}</h3>
                                        {!! $val->home_subject !!}        
                                <div class="read-more">
                                 <a href="{{asset('/service/'.$val->url)}}">اقرا المزيد&nbsp; <i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                 </div>
                            </div>
                        </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

                            @include('pages.paginator', ['paginator' => $items])


@endsection