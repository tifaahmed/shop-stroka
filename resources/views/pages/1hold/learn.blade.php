@extends('layout')

@section('title')
<title>{{$meta->title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$details->keywords}}">

    <meta property="title"  content="{{$details->page_title}}"/>
    <meta property="og:title"  content="{{$details->page_title}}"/>
    <meta name="twitter:title" content="{{$details->page_title}}" />

    <meta name="description" content="{{$details->description}}">
    <meta property="og:description" content="{{$details->description}}"/>
    <meta name="twitter:description" content="{{$details->description}}" />

    <meta name="twitter:image" content="{{asset($details->banner_image)}}" />
    <meta property="og:image"     content="{{asset($details->banner_image)}}"/>
    <meta property="og:image:alt"     content="{{asset($meta->banner_image_alt)}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
    <style>
         h1 {
            font-size: 100px!important;
        }
        </style>
        <style>
         h1 {
            font-size: 100px;
        }
        div.round2 {
          border: 2px solid #b0b0b0;
          border-radius: 8px;
        }
        .padding_two_sides{
            margin: auto!important;
        }
        .padding_all{
            padding : 10px
        }
        .color_perpel{
           color: #ba4699;
        }
        .textalgin{
            text-align:center;
        }
        .background_perpel{
            margin-top:-105px;
            color : #fff;
        }
    </style>
@endsection




@section('content')
@include('pages.partials.header')

<div   class="inner-page-banner" style="background:url( {{ asset( $details->banner_image ) }} ) center center no-repeat;background-size: cover;margin-top:-50px">
    <div class="opacity">
        <div class="container text-center">
            <h1 style="  text-shadow:5px 5px 5px #9e9e9e;color:white">{{$details->page_title}} </h1>
        </div> <!-- /.container --> 
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->


<div class="our-certification wow fadeInUp">
    <div class="popular-course wow fadeInUp body-bg rate">
        <div class="container">
            <div class="row padding_two_sides">

                @if($details->table_subject_one)
                    @foreach(json_decode($details->table_subject_one) as $key => $subject)

                        <div class="round2  padding_two_sides col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row" style="    background-color: #fff;">
                                <div class="   col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                                    <h2 class="color_perpel padding_all">{{$subject->name}}</h2>
                                    <p>
                                        {!! $subject->subject !!}
                                    </p>
                                    
                                </div>
                                <div  class="textalgin    col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                                    <br>
                                    

                                    @if($subject->youtube) 
                                    <?php 
                                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $subject->youtube, $match);

                                            echo   '<iframe class="lozad" style="width:100%!important ; height:315px!important " data-src="https://www.youtube.com/embed/'.$match[1].'" frameborder="0" allowfullscreen></iframe>';
                                    ?>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <br><br><br>
                        </div>
                    @endforeach
                @endif
            </div>

            


        </div> 
    </div> 
</div>


    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection

