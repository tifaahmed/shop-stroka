@extends('layout')

@section('title')

{{trans('static.Common Questions')}}
@endsection



@section('content')
<section class="bredcrumb">
    <div class="bg-image text-center" style="background-image: url({{asset('images/resources/banner.jpg')}});">
        <h1>  {{trans('static.Common Questions')}}</h1>
    </div>
    <div class="">
        <ul class= "middle">
            <li><a href="{{asset('/')}}">{{trans('static.home')}}  </a></li>
            <li>{{trans('static.Common Questions')}}</li>
        </ul>
    </div>
</section>
<section>
     <div class="about">
      <div class="container">
        <div class="media-body">
            @foreach($news as $val)
            <div class="well well-lg">

                @if(\Session::get('locale') == 'en')

                <h4 class="media-heading text-uppercase reviews" >{{$val->title_en}}  </h4> 
                <p class="media-comment">{!!$val->subject_en!!}</p>                
                @else
                <h4 class="media-heading text-uppercase reviews"style="text-align: right;">{{$val->title_ar}}</h4> 
                <p class="media-comment"style="text-align: right;">{!!$val->subject_ar!!}</p>
                @endif                

            </div> 
            <meta name="description" content="{{$val->description}}">
            <meta name="keywords" content="{{$val->keywords}}">
            @endforeach
        </div>
        <ul class="page_pagination">
            @include('pages.default', ['paginator' => $news])

        </ul>

            

      </div>
     </div>
</section>
@endsection
