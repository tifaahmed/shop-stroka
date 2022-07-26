@extends('website.layout')

@section('title')
  {{$single->page_title}}

@endsection
@section('meta')
<meta property="title"  content="{{$single->title_ar}}"/>
<meta name="description" content="{{$single->description}}">
<meta name="keywords" content="{{$single->keywords}}">

<meta property="og:title"  content="{{$single->title_ar}}"/>
<meta property="og:description" content="{{$single->description}}"/>
<meta property="og:url"       content="{{asset('/collection/'.$single->url) }}"/>

@endsection
@section('content')
<div class="banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
    <div class="titel-banner">
      <h1>المدونة</h1>
      <p>
      <span><a href="{{asset('/')}}">الرئيسية</a></span>
      <i class="fas fa-angle-double-left"></i>
      <span><a href="{{asset('/collection/'.$single->url)}}">{{$single->title_ar}}</a> </span>
      </p>
    </div>
    </div>
  </div>
  </div>
</div>

<div class="blog">
  <div class="container">
    <div class="row" data-aos="fade-down">
    @foreach($allrelated as $key => $val)
    <div class="col-sm-6 col-lg-4">
      <a href="{{asset('single-blog/'.$val->url)}}">
        <div class="blog-info">
          @if($val->image)
          <img src="{{asset($val->image)}}" alt="blog" />
          @endif
          <div style="color: white" class="blog-title">
            <h4> {{$val->title_ar}}</h4>
            <span class="line-blog"></span>
            <span class="here{{$key++}}">
              {!! $val->subject_ar !!}
            </span>
            <br>
            <a href="{{asset('single-blog/'.$val->url)}}" class="more">اقرا المزيد</a>
          </div>
        </div>
      </a> 
    </div>
    <span style="display: none;"  id="count">{{$allrelated->count()}} </span>

    @endforeach
            	<script type="text/javascript">
            		$(document).ready(function(){
            			var num =   $("#count").text();


    				for (var i = num ; i >= 0; i--) {
            			 // alert(txt); 

    $(".here"+[i]+"").text( $(".here"+[i]+"").text().substr(0, $(".here"+[i]+"").text().indexOf('.')) ); 


            		}

            		});
            	</script>
   


    </div>
</div>
</div>

@endsection
