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

    <meta name="twitter:image" content="{{asset($details->banner_image)}}" />
    <meta property="og:image"     content="{{asset($details->banner_image)}}"/>
    <meta property="og:image:alt"     content="{{$details->home_image_one_alt}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/store.css')}}">

@endsection

@section('content')
    @include('pages.partials.header')


    <div class="inner-page-banner" style="background:url({{asset($details->banner_image)}}) center center no-repeat;background-size: cover;">
        <div class="opacity">
            <div class="container text-center">
                <h2>  {{$details->page_title}}  </h2>
            </div> <!-- /.container -->
        </div> <!-- /.opacity -->
    </div> <!-- /.inner-page-banner -->

        <div class="popular-course wow fadeInUp body-bg rate">
            <div class="container">
                <div class="row padding_two_sides">
                    @if($details->table_subject_one)
                    @foreach(json_decode($details->table_subject_one) as $key => $subject)



                    <div class="round2  padding_two_sides col-lg-12 col-md-12  col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="   col-lg-8 col-md-8  col-sm-12 col-xs-12"  >
                                <h2 class="color_perpel padding_all" style="text-align:right">
                                    {{$subject->title}}
                                </h2>
                                <p>
                                 {!!  $subject->subject !!}
                                </p>
                                
                            </div>
                            <div  class="textalgin    col-lg-4 col-md-4  col-sm-12 col-xs-12" >
                                <br>
                                <?php 
                                  if(strlen($subject->youtube) > 11)
                                  {
                                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $subject->youtube , $match);
                                  }
                                ?>
                                @if(isset($match) && $match[1])
                                    <div class="item hvr-float-shadow">
                                        <div class="img-holder">
                                            <iframe class="lozad" width="100%" height="315" data-src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                @endif 
                                <br>
                                <h3 > <a href=" {{$subject->url}}" class="color_perpel ">   {{$subject->name}} </a></h3>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif


                </div>
                <br> <br>
            </div> <!-- /.container -->
            <div class="row search_row"  style="background-color: #ba4699;padding: 64px;">

                @include('pages.search.product_search', ['action_autocomplete' => 'product_search_autocomplete' , 'action_form'=> 'product_search' ,'field'=> 'home_title' ])
            </div>

            <br> <br>
            <br> <br>

            <div class="row padding_two_sides  image_sides" style="    text-align: center;">
                @foreach($shop_talent as $key => $val)
                    <div class="col-lg-2  col-lg-offset-1 col-md-4   col-sm-6 col-xs-12" style="    padding-bottom: 20px;" >
                        <a href="{{asset('shop_talent/'.$val->home_title)}}">
                            <img style="width: 100%;height: 160px" class="image_shop lozad" data-src="{{asset($val->image_one)}}"  alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
                            <p class="shop_name"  >{{$val->home_title}}  </p>
                        </a>
                    </div>
                @endforeach
 

            </div>
        </div> 
        <!-- **************************************** -->
        <div class="popular-course wow fadeInUp body-bg talent-home">
    		<div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="box-title">
                            <img src="{{asset('asset_ar/img/25-05 (2).png')}}" alt="" style="    margin: auto;width: 432px;height: 120px;">
                        </div>
                    </div>
                    </div>
                        <div class="row">
                            <div class="theme-slider course-item-wrapper" dir="ltr">

                                @foreach($seller_latest as $key => $val)
                                @if($val->shop_name != null && $val->avatar != null )    
                                <div class="item hvr-float-shadow">
                                    <div class="img-holder">
                                        <img class="slider_img" src="{{asset($val->avatar)}}" alt="{{$val->full_name}}" title="{{$val->full_name}}">
                                    </div>
                                    <div class="row">
                                        <div class="  col-xs-12">
                                            <div class="txt_holder" style="text-align: center;">
                                                <a href="{{asset('profile-seller/'.$val->remember_token)}}">

                                            <br>
                                            <p>
                                                <span style="padding: 10px;border: solid;border-radius: 10px!important; border-color: #0cb7e3
                                                    ">  {{$val->shop_name}}</span>
                                            </p>
                                            <br>
                                            <p>
                                                <span style="padding: 10px; border: solid;border-radius: 10px!important;border-color: #0cb7e3
                                                    ">  
                                                    <?php       
                                                        $selected_talent = App\Models\Shop_talent::find($val->talent);
                                                    ?>  
                                                    @if($selected_talent)
                                                    {{ $selected_talent->home_title }} 
                                                    @endif 
                                               </span>
                                            </p>
                                            <br>
                                            <p>
                                            <div class="module col-xs-12 star_rate"  >
                                                <ul>
                                                    <?php 
                                                    $avg =  $val->rating ;
                                                    $average =  substr($avg, 0, 3);
                                                    $star =  substr($avg, 0, 1);
                                                    $dif = $average - $star ;
                                                    ?>

                                                    <?php
                                                    $x = 0;
                                                    $full =$star ;
                                                    if ($full >= 5 ) {
                                                        $full = 5 ;
                                                    }
                                                    for ($i=0; $i < $full; $i++) {                                  
                                                    ?>
                                                    <li class="li_c"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $half =$dif ;
                                                    if ($half >= 0.5 ) {
                                                        $x =1;
                                                    ?>
                                                    <li class="li_c"><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    $empty =5 - $average -$x ;
                                                    for ($i=0; $i < $empty; $i++) {                                     
                                                    ?>
                                                    <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                </ul>
                                            </div> 
                                            </p>
                                            <br><br><br>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.item -->
                                @endif 

                                @endforeach
                            </div> <!-- /.course-slider -->
                        </div>
                    </div> <!-- /.container -->
                </div> <!-- /.popular-course -->
            </div>
        </div> 
        <!-- **************************************** -->
        <div class="popular-course wow fadeInUp body-bg talent-home">
    		<div class="container">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="box-title">
                            <img src="{{asset('asset_ar/img/25-06 (2).png')}}" alt="" style="    margin: auto;width: 480px;height: 120px;">
                        </div>
                    </div>
                    </div>
                        <div class="row">
                            <div class="theme-slider course-item-wrapper" dir="ltr">

                                @foreach($seller_rating as $key => $val)
                                <div class="item hvr-float-shadow">
                                    <div class="img-holder">
                                        <img class="slider_img" src="{{asset($val->avatar)}}" alt="{{$val->full_name}}" title="{{$val->full_name}}">
                                    </div>
                                    <div class="row">
                                        <div class="  col-xs-12">
                                            <div class="txt_holder" style="text-align: center;">
                                                <a href="{{asset('profile-seller/'.$val->remember_token)}}">
                                            <br>
                                            <p>
                                                <span style="
                                                    padding: 10px;
                                                    border: solid;
                                                    border-radius: 10px!important;
                                                    border-color: #0cb7e3
                                                    "> {{$val->shop_name}}</span>
                                            </p>
                                            <br>
                                            <p>
                                                <span style="
                                                    padding: 10px;
                                                    border: solid;
                                                    border-radius: 10px!important;
                                                    border-color: #0cb7e3
                                                    ">
                                                    <?php       
                                                        $selected_talent = App\Models\Shop_talent::find($val->talent);
                                                    ?>  
                                                    {{ $selected_talent->home_title }}  </span>
                                            </p>
                                            <br>
                                            <p>
                                                <div class="module col-xs-12 star_rate"  >
                                                    <ul>
                                                        <ul>
                                                            <?php 
                                                            $avg =  $val->rating ;
                                                            $average =  substr($avg, 0, 3);
                                                            $star =  substr($avg, 0, 1);
                                                            $dif = $average - $star ;
                                                            ?>

                                                            <?php
                                                            $x = 0;
                                                            $full =$star ;
                                                            if ($full >= 5 ) {
                                                                $full = 5 ;
                                                            }
                                                            for ($i=0; $i < $full; $i++) {                                  
                                                            ?>
                                                            <li class="li_c"><i class="fa fa-star" aria-hidden="true"></i></li>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            $half =$dif ;
                                                            if ($half >= 0.5 ) {
                                                                $x =1;
                                                            ?>
                                                            <li class="li_c"><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                                            <?php
                                                            }
                                                            ?>

                                                            <?php
                                                            $empty =5 - $average -$x ;
                                                            for ($i=0; $i < $empty; $i++) {                                     
                                                            ?>
                                                            <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </ul>
                                                    </ul>
                                                </div> 
                                            </p>
                                            <br><br><br>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.item -->

                                @endforeach
                            </div> <!-- /.course-slider -->
                        </div>
                    </div> <!-- /.container -->
                </div> <!-- /.popular-course -->
            </div>
        </div> 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

@endsection			