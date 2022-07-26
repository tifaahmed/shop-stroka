@extends('layout')

@section('title')
@if(\Session::get('locale') == 'ar')
{{ $Service_item->page_title_ar}}

 @else
 {{ $Service_item->page_title_en}}

 @endif

@endsection
@section('meta')
<meta name="description" content="{{$Service_item->description}}">
<meta name="keywords" content="{{$Service_item->keywords}}">

<meta property="og:description" content="{{$Service_item->description}}"/>


 @if(\Session::get('locale') == 'ar')
	 <meta property="og:title"  content="{{$Service_item->title1_ar}}"/>
	 <meta property="title"  content="{{$Service_item->title1_ar}}"/>
	 <meta property="og:url"       content="{{asset('/single-service/'.$Service_item->url_ar) }}"/>

 @else
	<meta property="og:title"  content="{{$Service_item->title1_en}}"/>
	<meta property="title"  content="{{$Service_item->title1_en}}"/>
	<meta property="og:url"       content="{{asset('/single-service/'.$Service_item->url_en) }}"/>
 @endif

@endsection

@section('content')
<div class="inner-banner text-center" >
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="{{asset('/')}}">Home</a>
            </li>
            <li>
                <span>{{$Service_item->home_title_en}}</span>
            </li>
        </ul>
        <h1>{{$Service_item->title1_en}}</h1>
    </div>
</div>

<section class="about-style-six sec-pad services">
    <div class="container">
        <div class="row">
          <div class="col-md-5">
               <img src="{{asset($Service_item->image_one)}}" alt="service">
            </div>
            <div class="col-md-7">
                <div class="content-block">
                    <div class="sec-title mb-0">
                        <span class="tag-line">Our Services</span>
                        <h2>{{$Service_item->title1_en}}</h2>
                    </div>
                    {!!  $Service_item->subject1_en !!}		
                </div>
            </div>
              
        </div>
    </div>
</section>
@endsection
