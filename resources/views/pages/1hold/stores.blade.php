@extends('layout')

@section('title')
  {{$store->page_title_en}}
@endsection
@section('meta')
<meta property="title"  content="{{$store->page_title_en}}"/>
<meta name="description" content="{{$store->description}}">
<meta name="keywords" content="{{$store->keywords}}">

<meta property="og:title"  content="{{$store->title1_ar}}"/>
<meta property="og:description" content="{{$store->description}}"/>
<meta property="og:url"       content="{{asset('/store') }}"/>

@endsection
@section('content')


 




<div class="inner-banner text-center">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="{{asset('/')}}">Home</a>
            </li>
            <li>
                <span>{{$store->page_title_en}}</span>
            </li>
        </ul>
        <h1>{{$store->page_title_en}}</h1>
    </div>
</div>

<section class="about-style-six sec-pad">
    <div class="container">
        <div class="row">
         
            <div class="col-lg-12">
                <div class="content-block">
                    <div class="sec-title mb-0">
                        <h2>{{$store->title_en}} </h2>
                    </div>
                    {!! $store->subject_en !!}
                </div>
            </div>
               <div class="col-lg-12">
                <div class="row shi">
                  @foreach($store_items as $val)

                  <div class="col-md-3">
                      <div class="ship-info">
                          <img src="{{asset($val->image)}}" alt="ship">
                          <h5>{{$val->title1_en}}</h5>
                      </div>
                  </div>
                  @endforeach


                </div>
            </div>
        </div>
    </div>
</section>
@endsection