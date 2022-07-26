@extends('layout')

@section('title')
<title>{{$clint->tab_title}} </title>
@endsection


@section('meta')
  <meta name="keywords" content="{{$clint->keywords}}">

  <meta property="title"  content="{{$clint->page_title}}"/>
  <meta property="og:title"  content="{{$clint->page_title}}"/>
  <meta name="twitter:title" content="{{$clint->page_title}}" />

  <meta name="description" content="{{$clint->description}}">
  <meta property="og:description" content="{{$clint->description}}"/>
  <meta name="twitter:description" content="{{$clint->description}}" />

  <meta property="og:url"       content="{{url()->full()}}"/>
  <meta name="twitter:image" content="{{asset($clint->image)}}" />
  <meta property="og:image"     content="{{asset($clint->image)}}"/>
@endsection


@section('content')
<style type="text/css">
    .main:after {
        background-image: url("{{asset($clint->image)}}")!important;
        background-position: center;
        background-size: cover;

    }
</style>


<section class="main white service-details-page" data-scroll-index="0">
    <div class="overlay"></div>
    <div class="container between mt-90">
        <div class="row">
            <div class="col-lg-12">
                <div class="title text-center">
                    <h2 class="title-text">{{$clint->title}}</h2>
                                       <p>{!! $clint->subject !!}</p>
                    <div class="dash"></div>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="client-sec" data-scroll-index="0">
  <div class="container">
   <div class="row">


    @foreach($clint->multiple_images as $key => $subject)
     <div class="col-sm-3" data-aos="zoom-in">
       <div class="cli-img">
         <img width="210" height="120" src="{{asset('/uploads/'.$subject)}}" alt="client-img">
       </div>
    </div>
    @endforeach


        


 </div>
</div>
</section>
@endsection
