 @extends('layout')

@section('title')
    <title>{{ $stars->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$stars->keywords}}">

    <meta property="title"  content="{{$stars->page_title}}"/>
    <meta property="og:title"  content="{{$stars->page_title}}"/>
    <meta name="twitter:title" content="{{$stars->page_title}}" />

    <meta name="description" content="{{$stars->description}}">
    <meta property="og:description" content="{{$stars->description}}"/>
    <meta name="twitter:description" content="{{$stars->description}}" />

    <meta name="twitter:image" content="{{asset($stars->home_image_one)}}" />
    <meta property="og:image"     content="{{asset($stars->home_image_one)}}"/>
@endsection
@section('css')


 <style>
.inner-page-banner .opacity h2 {
    color: #fff;
    margin-top: 0px;
    text-transform: capitalize;
    font-size: 130px;
    font-weight: unset;
}

</style>

<div class="inner-page-banner" style="background:url({{asset($stars->banner_image)}}) center center no-repeat;background-size: cover;height: 500px;">
    <div class="opacity">
        <div class="container text-center">
            <h2>{{$stars->page_title}}</h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->

<style>
    .new4 {
        max-width: 1000px;
        padding: 2px;
         background: linear-gradient(to right,#b74799,#0cb7e3)!important; */
        padding: 3px;
    }
    .module {
        background: #fff;
        color:#ba4699;
        padding: 0.5rem;
    }
    .container2 {
        margin-right: 46px;
    }
    .radios_image{
        border-radius: 50%;

    }
    .margin_img{
        margin-left: auto;
        margin-right: auto;
    }
    .img_profile{
        width:200px;
        margin-top:-120px;
    }
    .handy{
        width:50px;
    }
</style>
<style>
    .carousel-control.left,.carousel-control.right  {background:none;width:25px;}
    .carousel-control.left {left:-25px;}
    .carousel-control.right {right:-25px;}
    .broun-block {
        background: url("http://myinstantcms.ru/images/bg-broun1.jpg") repeat scroll center top rgba(0, 0, 0, 0);
        padding-bottom: 34px;
        height: 500px;
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
    .floting_text {
        text-align: center;
        margin-top: -176px;
        color: white;
        font-size: 20px;
        width: 100%;
    }
    .carousel-inner {
        overflow: visible!important;
    }
    /* ***************************** */
    .star{
        font-size: 35px;
        text-align: center;
        margin-top: -45px;
    }
    .star_rate{
        font-size: 35px;
        text-align: center;
        color:gold!important;
        
    }
    .li_c{
        display: inline-block;
    }
    /* ***************************** */
        /* ************************** */
        .rating {
        float:left;
        width:300px;
    }
    .rating span { float:right; position:relative; }
    .rating span input {
        position:absolute;
        top:0px;
        left:0px;
        opacity:0;
    }
    .rating span label {
        display:inline-block;
        width:30px;
        height:30px;
        text-align:center;
        color:#FFF;
        background:#ccc;
        font-size:30px;
        margin-right:2px;
        line-height:30px;
        border-radius:50%;
        -webkit-border-radius:50%;
    }
    .rating span:hover ~ span label,
    .rating span:hover label,
    .rating span.checked label,
    .rating span.checked ~ span label {
        background:#F90;
        color:#FFF;
    }
    /* ************************** */   
    @foreach($talented as $key => $val)
        <?php
        $talented_videos_blade = App\Models\Talented_videos::where('uploader_id',$val->id)->where('status',1)->where('youtube','!=',null)->orderBy('rating', 'desc')->get();
         ?>
         
        @foreach($talented_videos_blade as $key => $val_2)        

        <style type="text/css">
            .rating{{$val_2->id}} span { float:right; position:relative; }
            .rating{{$val_2->id}} span input {
                position:absolute;
                top:0px;
                left:0px;
                opacity:0;
            }
            .rating{{$val_2->id}} span label {
                display:inline-block;
                width:30px;
                height:30px;
                text-align:center;
                color:#FFF;
                background:#ccc;
                font-size:30px;
                margin-right:2px;
                line-height:30px;
                border-radius:50%;
                -webkit-border-radius:50%;
            }
            .rating{{$val_2->id}} span:hover ~ span label,
            .rating{{$val_2->id}} span:hover label,
            .rating{{$val_2->id}} span.checked label,
            .rating{{$val_2->id}} span.checked ~ span label {
                background:#F90;
                color:#FFF;
            }
        </style>
    @endforeach
    @endforeach
</style>
@endsection










@section('content')
@include('pages.partials.header')




<div class="course-v2 wow fadeInUp  container2">
    <div class="container">
        @foreach($talented as $key => $val)
        <div class="row">
            <div class="col-lg-4 col-md-12"  >
                <br><br><br><br><br><br><br>
                <div class="new4 row">
                    <div class="module col-lg-12 col-md-12"  >
                        @if($val->avatar)
                        <img class="img_profile  margin_img radios_image lozad" data-src="{{asset($val->avatar)}}" alt="{{$val->full_name}}" title="{{$val->full_name}}">
                        @else
                        <img class="img_profile  margin_img radios_image lozad" data-src="{{asset('asset_ar/img/17-06.jpg')}}">
                        @endif
                        <br> 
                         @if($val->handicap)
                        <img class=" handy   margin_img  radios_image lozad"   data-src="{{asset('asset_ar/img/17-04.jpg')}}" alt="">
                        @endif
                        <br>
                        <div class="new4">
                            <div class="module">{{$val->full_name}}</div>
                        </div> 
                        <br>
                        <div class="new4">
                            <div class="module">  {{$val->birth}}  </div>
                        </div> 
                        <br>
                        <div class="new4">
                            <div class="module"> {{$val->address}}  </div>
                        </div> 
                        <br>
                        <div class="new4">
                            <div class="module">
                                <?php       
                                    $selected_talent_blade  = App\Models\Talent::find($val->id);
                                ?> 
                                {{ $selected_talent_blade ->home_title }}
                           </div>
                        </div> 



                        
                        <div class="module col-xs-12 star_rate"  >
                            <ul>
                                <?php 
                                $talented_videos_blade = App\Models\Talented_videos::where('uploader_id',$val->id)->get();

                                $count = $talented_videos_blade->where('rating',">",0)->count(); 

                                if ($count > 0) {
                                   $z = 0 ;
                                   foreach($talented_videos_blade as $val2){
                                    $z =  $val2->rating + $z;  
                                    }

                                    if ($count == 0 || $count == null || $count == '') {
                                        $avg = 0;
                                    }else{
                                        $avg =  $z / $count  ;
                                        $average =  substr($avg, 0, 3);
                                        $star =  substr($avg, 0, 1);
                                        $dif = $average - $star ;
                                    }  
                                }else{
                                    $average = 0;
                                    $star = 0;
                                    $dif = 0;
                                }
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
                     </div> 
                </div>  
            </div>  
            <div class="col-lg-8 col-md-12"  >
                <br><br><br><br><br><br><br>
                <div class="new4">
                    <div class="module"> 
                        {!! $val->description !!}
                    </div>
                </div>
                <br> 
            </div>  
            <div class="col-lg-12 col-md-12"  >
                <div class="row padding_two_sides  ">
                    <div  class="   col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="carousel-reviews broun-block" dir="ltr">
                            <div class="container">


                                <div class="row">
                                    <div class="theme-slider course-item-wrapper" dir="ltr">
                                        <?php
                                        $talented_videos_blade = App\Models\Talented_videos::where('uploader_id',$val->id)->where('status',1)->where('youtube','!=',null)->orderBy('rating', 'desc')->get();
                                         ?>

                                        @foreach($talented_videos_blade as $key => $val_2)
                                        <?php
                                         ?>
                                        <div class="item hvr-float-shadow">
                                            <div class="img-holder">
                           

                                           <?php 
                                             if(strlen($val_2->youtube) > 11)
                                             {
                                               preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val_2->youtube , $match);
                                             }
                                           ?>
                                           @if(isset($match) && $match[1])
                                               <iframe class="" width="90%" height="315" src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                                           @endif 
                                            </div>
                                            <div class="text" style="text-align: center;" >
                                                <a style="text-align: center;" href="#" data-toggle="modal" data-target="#myModal{{$val_2->id}}" >
                                                <h4 style="text-align: center;" >{{$val_2->title}}</h4>
                                                <h3 style="text-align: center;" >
                                                    {!! substr($val_2->description,0,2) !!}
                                                   </h3>
                                                </a>

                                            </div> 
                                        </div> 
                                        @endforeach  
                                    </div> 
                                </div>




                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        @endforeach
        @include('pages.paginator', ['paginator' => $talented])

    </div>  
</div>  

<!-- ................................................................................ -->


@foreach($talented as $key => $val)
    <?php
    $talented_videos_blade = App\Models\Talented_videos::where('uploader_id',$val->id)->where('status',1)->where('youtube','!=',null)->orderBy('rating', 'desc')->get();
     ?>
     ?>
    @foreach($talented_videos_blade as $key => $val_2)

<div id="myModal{{$val_2->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{$val_2->title}}</h4>
            </div>
            <div class="modal-body">
                    <div class="row ">
                        <div class="module col-lg-12 col-md-12 col-sm-12"  >
                            <div class="col-lg-12 col-md-12 col-sm-12"  >
                                 <iframe width="100%" height="315"
                                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                </iframe>  

                                <div class="row"  style="height: 40px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12"  >
                                        <div class="form-group">

                                            <label >ضع تقييمك : 

                                            <?php 
                                            if (Auth::guard('judge')->user() ){
                                                $rated_person=Auth::guard('judge')->user()->id;
                                                $type = 1;
                                            }elseif ( Auth::guard('trainer')->user() ) {
                                                $rated_person=Auth::guard('trainer')->user()->id;
                                                $type = 2;
                                            
                                            }elseif ( Auth::guard('seller')->user() ) {
                                                $rated_person=Auth::guard('seller')->user()->id;
                                                $type = 3;
                                            
                                            }elseif ( Auth::guard('talented')->user() ) {
                                                $rated_person=Auth::guard('talented')->user()->id;
                                                $type = 4;
                                            
                                            }else{
                                                $rated_person = 0;
                                                $type = 0;
                                            }
                                            $talented_videos_rates_blade  = App\Models\Talented_videos_rates::
                                                                 where('rated_id',$rated_person)
                                                                 ->where('talented_videos_id',$val_2->id)
                                                                 ->where('type',$type)->first();     
                                            ?>
                                            @if(!Auth::guard('judge')->user() &&
                                                !Auth::guard('trainer')->user()&&
                                                !Auth::guard('seller')->user()&&
                                                !Auth::guard('talented')->user()
                                            )

                                            <div class="login rating ">
                                                <span>
                                                    <input type="radio" name="rate" id="str5" value="5">
                                                    <label for="str5">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </label>
                                                </span>
                                                <span>
                                                    <input type="radio" name="rate" id="str4" value="4">
                                                    <label for="str4">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </label>
                                                </span>
                                                <span>
                                                    <input type="radio" name="rate" id="str3" value="3">
                                                    <label for="str3">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </label></span>
                                                <span>
                                                    <input type="radio" name="rate" id="str2" value="2">
                                                    <label for="str2">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </label>
                                                </span>
                                                <span>
                                                    <input type="radio" name="rate" id="str1" value="1">
                                                    <label for="str1">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </label>
                                                </span>
                                                <br>
                                            </div>
                                            @else

                                            <form id="vedio_rate{{$val_2->id}}" method="post" action="{{ asset('vedio_rate') }}" enctype="multipart/form-data" >
                                            {{ csrf_field() }}
                                                <input type="" name="type" value="{{$type}}" hidden="">    
                                                <input type="" name="rated_id" value="{{$rated_person}}" hidden="">    
                                                <input type="" name="talented_videos_id" value="{{$val_2->id}}" hidden="">
                                                @if($talented_videos_rates_blade) 
                                                <input type="" name="id" value="{{$talented_videos_rates_blade->id}}" hidden=""> 
                                                @else
                                                 @endif

                                                         
                                                @if($talented_videos_rates_blade)

                                                    <div class="  rating{{$val_2->id}} rating_1{{$val_2->id}}">
                                                        <span class="{!! $talented_videos_rates_blade->rate >= 5 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate"  id="str5{{$val_2->id}}" value="5" 
                                                            {!! $talented_videos_rates_blade->rate <= 5 ? 'checked' : ' '  !!} >
                                                            <label for="str5{{$val_2->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates_blade->rate >= 4 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str4{{$val_2->id}}" value="4"
                                                            {!! $talented_videos_rates_blade->rate <= 4 ? 'checked' : ' '  !!} >
                                                            <label for="str4{{$val_2->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates_blade->rate >= 3 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str3{{$val_2->id}}" value="3"
                                                            {!! $talented_videos_rates_blade->rate <= 3 ? 'checked' : ' '  !!} >
                                                            <label for="str3{{$val_2->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label></span>
                                                            <span class="{!! $talented_videos_rates_blade->rate >= 2 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str2{{$val_2->id}}" value="2"
                                                            {!! $talented_videos_rates_blade->rate <= 2 ? 'checked' : ' '  !!} >
                                                            <label for="str2{{$val_2->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates_blade->rate >= 1 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str1{{$val_2->id}}" value="1"
                                                            {!! $talented_videos_rates_blade->rate <= 1 ? 'checked' : ' '  !!} >
                                                            <label for="str1{{$val_2->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <br>
                                                    </div>
                                                @else

                                                <div class="rating{{$val_2->id}} rating_1{{$val_2->id}}">
                                                    <span >
                                                        <input type="radio" name="rate"  id="str5{{$val_2->id}}" value="5" >
                                                        <label for="str5{{$val_2->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str4{{$val_2->id}}" value="4">
                                                        <label for="str4{{$val_2->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str3{{$val_2->id}}" value="3">
                                                        <label for="str3{{$val_2->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                        <span class="">
                                                        <input type="radio" name="rate" id="str2{{$val_2->id}}" value="2">
                                                        <label for="str2{{$val_2->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str1{{$val_2->id}}" value="1">
                                                        <label for="str1{{$val_2->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                </div>
                                                @endif
                                                <button type="submit" class="submit{{$val_2->id}}" hidden=""></button>
                                            </form>   
                                            



                                            @endif 
                                            </label>
                                            <br><br><br><br>

                                        </div> 
                                    </div> 
                                </div> 

                                <div class="module col-xs-12 star_rate" style="    margin-top: -50px;" >
                                    <ul>
                                        <?php

                                        $full =$val_2->rating ;
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
                                        $empty =5 - $val_2->rating ;
                                        for ($i=0; $i < $empty; $i++) {                                     
                                        ?>
                                            <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div> 
                            </div> 
                        </div>
                        <p style="text-align: center;">{!! $val_2->description !!}</p>
                        
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
    @endforeach
@endforeach





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')


    @foreach($talented as $key => $val)
        <?php
        $talented_videos_blade = App\Models\Talented_videos::where('uploader_id',$val->id)->where('status',1)->orderBy('rating', 'desc')->get();
         ?>
        @foreach($talented_videos_blade as $key => $val_2)        

        <script>
            $(document).ready(function(){
                $(".rating_1{{$val_2->id}} input").click(function () {
                    $(".rating_1{{$val_2->id}} span").removeClass('checked');
                    $(this).parent().addClass('checked');
                });
            });
        </script>

        <script>
            $("#str5{{$val_2->id}} , #str4{{$val_2->id}} , #str3{{$val_2->id}} , #str2{{$val_2->id}} , #str1{{$val_2->id}} ").change(function() {
                 $( ".submit{{$val_2->id}}" ).click();
            });
        </script>

        <script type="text/javascript">

            jQuery(function ($) {

              $("#vedio_rate{{$val_2->id}}").validate({
                rules: {
                  // name:    {required: true,minlength: 2,},
                  // email: {required: true,email: true,},        
                  // phone: {required: true,minlength: 11 },
                  // message:    {required: true},
            

              },
              submitHandler: function (form, e) {
                e.preventDefault();
                var form = $(form);
                var dataString = form.serialize();
                $.ajax({
                  type: "POST",
                  url: form.attr('action'),
                  data: dataString,
                  dataType: "text",
                  success: function(data)
                  {
                            },
                  error: function(data)
                  {alert('error try again layer');},
                });
              }
              }); 
            });
        </script>
        @endforeach
    @endforeach

    <script type="text/javascript">
        $(".login").click(function() {
            var location = "{{asset('/login')}}";
            window.location.replace(location);
        });
    </script> 



















@endsection

