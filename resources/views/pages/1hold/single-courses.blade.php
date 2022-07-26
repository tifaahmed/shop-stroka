@extends('layout')

@section('title')

 @if(\Session::get('locale') == 'ar')
    {{ $courses->page_title_ar}}
 @else
    {{ $courses->page_title_en}}
 @endif

@endsection
@section('meta')
    <meta name="description" content="{{$courses->description}}">
    <meta name="keywords" content="{{$courses->keywords}}">

     @if(\Session::get('locale') == 'ar')
         <meta property="og:title"  content="{{$courses->title_ar}}"/>
         <meta property="title"  content="{{$courses->title_ar}}"/>
         <meta property="og:url"       content="{{asset('/courses') }}"/>

     @else
        <meta property="og:title"  content="{{$courses->title_en}}"/>
        <meta property="title"  content="{{$courses->title_en}}"/>
        <meta property="og:url"       content="{{asset('/الدورات') }}"/>

     @endif

    <meta property="og:description" content="{{$courses->description}}"/>
    <meta property="og:keywords" content="{{$courses->keywords}}"/>

@endsection


@section('content')
<section class="bredcrumb">
    <div class="bg-image text-center" style="background-image: url({{asset('images/resources/banner.jpg')}});">
        <h1>  {{trans('static.Training Center')}}</h1>
    </div>
    <div class="">
        <ul class= "middle">
            <li><a href="{{asset('/')}}">{{trans('static.home')}}  </a></li>
            <li>{{trans('static.Training Center')}}</li>
        </ul>
    </div>
</section>
            <section class="about">
            <div class="container">
                <div class="item-list">
                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12">

                            @if(\Session::get('locale') == 'ar')
                               <div class="sec-title" style="text-align: right;">
                                  <h2 class="left">  {{ $courses->title_ar}}</h2>
                                  <p>
                                      {!! $courses->subject_ar !!}
                                  </p>
                              </div>  
                            @else
                             <div class="sec-title">
                                <h2 class="left">  {{ $courses->title_en}}</h2>
                                <p>
                                    {!! $courses->subject_en!!}
                                </p>
                            </div>                            
                            @endif

                            
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="item">
                                <figure class="image-box">
                                    <img src="{{asset($courses->image_one)}}" alt="about" style="width: 100%" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="promotion" style="padding-top:0">
            <div class="container">
                <div class="inner_promotion">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="sec-title cour text-left">
                                <h2>{{trans('static.For reservations and inquiries, please contact the training center official on the number')}}: {{ $courses->phone}} </h2>
                             </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
@endsection
