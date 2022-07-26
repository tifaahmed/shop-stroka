@extends('layout')

@section('title')
    <title>{{ $item->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$item->keywords}}">

    <meta property="title"  content="{{$item->page_title}}"/>
    <meta property="og:title"  content="{{$item->page_title}}"/>
    <meta name="twitter:title" content="{{$item->page_title}}" />

    <meta name="description" content="{{$item->description}}">
    <meta property="og:description" content="{{$item->description}}"/>
    <meta name="twitter:description" content="{{$item->description}}" />

    <meta name="twitter:image" content="{{asset($item->home_image_one)}}" />
    <meta property="og:image"     content="{{asset($item->home_image_one)}}"/>
@endsection

@section('css')
<style>
 h1 {
    font-size: 100px!important;
}
/*********************************************************/
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
/***************************************************/
.carousel-control.left,.carousel-control.right  {background:none;width:25px;}
.carousel-control.left {left:-25px;}
.carousel-control.right {right:-25px;}
.broun-block {
    background: url("http://myinstantcms.ru/images/bg-broun1.jpg") repeat scroll center top rgba(0, 0, 0, 0);
    padding-bottom: 34px;
}
.block-text {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 3px 0 #2c2222;
    color: #626262;
    font-size: 14px;
    margin-top: 27px;
    padding: 15px 18px;
}
.block-text a {
 color: #7d4702;
    font-size: 25px;
    font-weight: bold;
    line-height: 21px;
    text-decoration: none;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}
.mark {
    padding: 12px 0;background:none;
}
.block-text p {
    color: #585858;
    font-family: Georgia;
    font-style: italic;
    line-height: 20px;
}
.sprite-i-triangle {
    background-position: 0 -1298px;
    height: 44px;
    width: 50px;
}
.block-text ins {
    bottom: -44px;
    left: 50%;
    margin-left: -60px;
}
.block {
    display: block;
}
.zmin {
    z-index: 1;
}
.ab {
    position: absolute;
}

.person-text {
    padding: 10px 0 0;
    text-align: center;
    z-index: 2;
}
.person-text a {
    color: #ffcc00;
    display: block;
    font-size: 14px;
    margin-top: 3px;
    text-decoration: underline;
}
.person-text i {
    color: #fff;
    font-family: Georgia;
    font-size: 13px;
}
.rel {
    position: relative;
}
.our-certification .item img {
    border: 0px solid #ba4699;
}
img {
    max-width:100000px;
}
.carousel-control.left {
    left: -110px;
}
.carousel-control.right {
    left: 1210px;
}
</style>
@endsection

@section('content')
@include('pages.partials.header')

<div   class="inner-page-banner" style="background:url({{asset($item->banner_image)}}) center center no-repeat;background-size: cover;margin-top:-50px">
    <div class="opacity">
        <div class="container text-center">
            <h1 style="  text-shadow:5px 5px 5px #9e9e9e;color:white">{!!$item->page_title!!}  </h1>
        </div>  
    </div>  
</div>  


<div class="our-certification wow fadeInUp">
    <div class="popular-course wow fadeInUp body-bg rate">
        <div class="container">
            @if(isset($item->table_subject_one) && $item->table_subject_one )

            @foreach(json_decode($item->table_subject_one) as $key=>$val)

                <div class="row padding_two_sides">
                    <div class="round2  padding_two_sides col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row" style="background-color: white;">
                            <div class="   col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                                <h2 class="color_perpel padding_all"> {{ isset($val->title) && $val->title ? $val->title : ' '  }}    </h2>
                                <p>
                                    {!! isset($val->subject) && $val->subject ? $val->subject : ' '  !!}  

                                </p>
                                
                            </div>
                            <div  class="textalgin    col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                                <br>


                           
                                      <?php 
                                        if(strlen($val->youtube) > 11)
                                        {
                                          preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube, $match);
                                        }
                                      ?>
                                      @if($match[1])
                                        <iframe width="100%" height="315" src="http://www.youtube.com/embed/{{$match[1]}}" frameborder="0" allowfullscreen></iframe>
                                      @endif  



                                <h3 > <a href="{!! isset($val->link) && $val->link ? $val->link : ' '  !!} " class="color_perpel ">{!! isset($val->name) && $val->name ? $val->name : ' '  !!} </a></h3>
                                 <br>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            @endforeach 
            @endif  








































        <div class="row padding_two_sides  ">
            <div class=" padding_two_sides textalgin " >
                <img   style="width:550px;height:180px" class=" padding_two_sides textalgin " src="img/m-17.png" alt="">
                <h2 class="background_perpel">المشاركات الجديدة</h2>
            </div>
            <div  class="   col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="carousel-reviews broun-block" dir="ltr">
                    <div class="container">
                        <div class="row">
                            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">
                            
                                <div class="carousel-inner">

                                    <div class="item active">
                                        @foreach($talented_videos as $key =>$val)
                                        @if($key <= 2 )

                                        <?php 
                                          if(strlen($val->youtube) > 11)
                                          {
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                                          }
                                        ?>
                                        @if($match[1])
                                        <div class="col-md-4 col-sm-6">
                                            <iframe width="100%" height="300"
                                                src="https://www.youtube.com/embed/{{$match[1]}}">
                                            </iframe>
                                        </div>
                                        @endif 

                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="item ">
                                        @foreach($talented_videos as $key =>$val)
                                        @if($key <= 5  && $key >= 3)

                                        <?php 
                                          if(strlen($val->youtube) > 11)
                                          {
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                                          }
                                        ?>
                                        @if($match[1])
                                        <div class="col-md-4 col-sm-6">
                                            <iframe width="100%" height="300"
                                                src="https://www.youtube.com/embed/{{$match[1]}}">
                                            </iframe>
                                        </div>
                                        @endif 

                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="item ">
                                        @foreach($talented_videos as $key =>$val)
                                        @if($key <= 9  && $key >= 6)

                                        <?php 
                                          if(strlen($val->youtube) > 11)
                                          {
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                                          }
                                        ?>
                                        @if($match[1])
                                        <div class="col-md-4 col-sm-6">
                                            <iframe width="100%" height="300"
                                                src="https://www.youtube.com/embed/{{$match[1]}}">
                                            </iframe>
                                        </div>
                                        @endif 

                                        @endif
                                        @endforeach
                                    </div>

                                </div>
                                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                    <!-- <span class="glyphicon glyphicon-chevron-left"> -->
                                    <img class="glyphicon glyphicon-chevron-left" style="width:110px!important;height:110px!important" alt="" src="{{asset('asset_ar/img/m-18.png')}}">
                                    <!-- </span> -->
                                </a>
                                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                <img class="glyphicon glyphicon-chevron-right" style="width:110px!important;height:83px!important;margin-top: 20px;" alt="" src="{{asset('asset_ar/img/m-19.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   








        <div class=" padding_two_sides textalgin " >
            <img   style="width:550px;height:180px" class=" padding_two_sides textalgin " src="{{asset('asset_ar/img/m-17.png')}}" alt="">
            <h2 class="background_perpel">   أفضل التقييمات‏</h2>
        </div>

        <div class="row course-item-wrapper">
            @foreach($wanted_videos_rate as $key => $val)
            @if ($val->youtube) 

            <div class="col-md-4">
                <div class="item hvr-float-shadow">
                    <div class="img-holder">


                        @if ($val->youtube) 
                            @if(strlen($val->youtube) > 11)
                            <?php
                              preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                          ?>
                            @endif
                            @if($match[1])
                                <iframe class="lozad" height="200px" style="width: 100%"   data-src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                            @endif
                        @endif
                    </div>
                    <div class="text">
                        <?php 
                        $name = App\Models\Talented::where('id',$val->uploader_id)->first();
                        ?>
                        <h4>{{$name->full_name}}</h4>

                        <ul>
                            <?php
                            $average =  substr($val->rating, 0, 3);
                            $star =  substr($val->rating, 0, 1);
                            $dif = $average - $star ;


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
                           <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i> </li>
                           <?php
                           }
                           ?>                            
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @endforeach

        </div>



        <div class="container">
            <div class=" padding_two_sides textalgin " >
                <img   style="width:550px;height:180px" class=" padding_two_sides textalgin " src="{{asset('asset_ar/img/m-17.png')}}" alt="">
                <h2 class="background_perpel">  نجوم فن  الغناء الموسيقى </h2>
            </div>
            <br>
            <br>
            <div class="row">
                @foreach($stars as $val)
                <div class="col-md-4  hvr-float-shadow">
                    <div class="img-holder">
                        <a href="{{asset('star/'.$item->url.'/'.$val->url)}}">
                            @if($val->id == 1)
                            <img   style="width:350px;height:300px"   src="{{asset('asset_ar/img/m-16.png')}}" alt="Image">

                            @elseif($val->id == 3)
                            <img style="width:350px;height:300px"   src="{{asset('asset_ar/img/m-15.png')}}" alt="Image">

                            @elseif($val->id == 4)
                            <img style="width:350px;height:300px"  src="{{asset('asset_ar/img/m-14.png')}}" alt="Image">

                            @endif
                            <h2 class="color_perpel padding_all">      {{$val->page_title }}           </h2>
                        </a>
                    </div>
                </div> <!-- /.item -->
                @endforeach
 

                    
                        
            </div> <!-- /.course-slider -->
        </div>
 








    </div> <!-- /.container -->
</div> <!-- /.blog-v2 -->

@include('pages.partials.footer')
@include('pages.partials.side1')
@include('pages.partials.side2')

@endsection



 





