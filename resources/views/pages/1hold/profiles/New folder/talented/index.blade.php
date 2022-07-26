        
@extends('layout')


@section('title')
     <title>{{ $talented->full_name}}</title>
 @endsection
@section('meta')

<meta name="keywords" content="{{$talented->full_name}}">

<meta property="title"  content="{{$talented->full_name}}"/>
<meta property="og:title"  content="{{$talented->full_name}}"/>
<meta name="twitter:title" content="{{$talented->full_name}}" />

<meta name="description" content="{{$talented->description}}">
<meta property="og:description" content="{{$talented->description}}"/>
<meta name="twitter:description" content="{{$talented->description}}" />

<meta name="twitter:image" content="{{asset($talented->avatar)}}" />
<meta property="og:image"     content="{{asset($talented->avatar)}}"/>

<meta property="og:url"       content="{{Request::url()}}"/>

@endsection 

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/talented_index.css')}}">

@foreach($talented_videos_ready as $val)
    <style type="text/css">
        .rating{{$val->id}} span { float:right; position:relative; }
        .rating{{$val->id}} span input {
            position:absolute;
            top:0px;
            left:0px;
            opacity:0;
        }
        .rating{{$val->id}} span label {
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
        .rating{{$val->id}} span:hover ~ span label,
        .rating{{$val->id}} span:hover label,
        .rating{{$val->id}} span.checked label,
        .rating{{$val->id}} span.checked ~ span label {
            background:#F90;
            color:#FFF;
        }
    </style>
@endforeach
@endsection 


@section('content')
    @include('pages.partials.header')
    <br><br><br><br><br>

    <div class="container container2">
        <div class="">
            <div class="row">

                <div class="col-lg-4 col-md-12"  >
                    <br><br><br><br><br><br><br>
                    <div class="new4 row">
                        <div class="module col-lg-12 col-md-12"  >
                            @if($talented->avatar)
                            <img class="img_profile  margin_img radios_image lozad" data-src="{{asset($talented->avatar)}}" alt="{{$talented->full_name}}" title="{{$talented->full_name}}">
                            @else
                            <img class="img_profile  margin_img radios_image lozad" data-src="{{asset('asset_ar/img/17-06.jpg')}}">
                            @endif
                        </div>
    
                        <div class="module col-lg-12 col-md-12"  >
                            <div  class="image-upload puls_link margin_img">
                                <form action="{{asset('profile_talented_update_avatar')}}" method="post" enctype="multipart/form-data" >  
                                    {{ csrf_field() }}      
                                    <label for="avatar" style ="    width: 100%;">
                                        <img style ="cursor: pointer;" class="  puls w30 radios_image  w30 lozad" data-src="{{asset('asset_ar/img/21-08.png')}}" alt="">  
                                    </label>
                                    <input id="avatar" type="file" class="form-control here" name="avatar" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg">
                                </form>   
                            </div>
                        </div>
                        <div class=" module   col-xs-10"  style="   " >
                        </div>
                        <div class=" module   col-xs-2"  style="    " >
                            @if($talented->handicap)
                            <img class=" w30    radios_image lozad" style="margin-top: -141px;"  data-src="{{asset('asset_ar/img/17-04.jpg')}}" alt="">
                            @endif
                        </div>
                        <!-- star -->
                        @if($talented->star <=0)
                        <div class="module col-xs-12 "  >
                            <img class="       margin_img  " src="{{asset('asset_ar/img/20-08.png')}}" alt="" style=" width:200px;">
                            <p class="star">  مشترك جديد   </p>
                            <br>
                        </div>
                        @elseif($talented->star <=1)
                        <div class="module col-xs-12"  >
                            <img class="margin_img radios_image lozad" data-src="{{asset('asset_ar/img/20-05.png')}}" alt="" style=" width:200px;">
                        </div> 
                        <div class="module col-xs-12 "  >
                            <img class="       margin_img  " src="{{asset('asset_ar/img/20-08.png')}}" alt="" style=" width:200px;">
                            <p class="star"> النجم  الفضي</p>
                            <br>
                        </div>
                        @elseif($talented->star <=2)
                        <div class="module col-xs-12"  >
                            <img class="margin_img radios_image lozad" data-src="{{asset('asset_ar/img/20-04.png')}}" alt="" style=" width:200px;">
                        </div> 
                        <div class="module col-xs-12 "  >
                            <img class="       margin_img  " src="{{asset('asset_ar/img/20-08.png')}}" alt="" style=" width:200px;">
                            <p class="star"> النجم الذهبي</p>
                            <br>
                        </div>
                        @elseif($talented->star <=3)
                        <div class="module col-xs-12"  >
                            <img class="margin_img radios_image lozad" data-src="{{asset('asset_ar/img/20-03.png')}}" alt="" style=" width:200px;">
                        </div> 
                        <div class="module col-xs-12 "  >
                            <img class="       margin_img  " src="{{asset('asset_ar/img/20-08.png')}}" alt="" style=" width:200px;">
                            <p class="star"> النجم   الالماسي</p>
                            <br>
                        </div>
                        @endif


 

                        <div class="module col-lg-12 col-md-12" style="    text-align: center;" >
                            <br>
                            <div class="new4">
                                <div class="module">{{$talented->full_name}}</div>
                            </div> 
                            <br>
                            <div class="new4">
                                <div class="module"> {{$talented->birth}}  </div>
                            </div> 
                            <br>
                            <div class="new4">
                                <div class="module"> {{$talented->address}}   </div>
                            </div> 
                            <br>
                            <div class="new4">
                                <?php       
                                    $selected_talent = App\Models\Talent::find($talented->id);
                                ?> 
                                <div class="module">  {{ $selected_talent->home_title }}  </div>
                            </div> 
                            <br> 
                        </div>

                        <div class="module col-xs-12 star_rate"  >
                            <ul>
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

                <div class="col-lg-8 col-md-12"  >
                    <br><br><br><br>
                    <!-- <h2>حسابك الشخصي</h2> --> <br><br>
                    <hr class='new4'>   
                    <p class="fild_title">نبذه عن المشترك</p> <br>

                    <div class="new4  ">
                         <p class="module">
                            {!! $talented->description !!}

                    </div>

                </div>
               <!--  <div class="col-lg-12 col-md-12" style="direction: ltr;" >
                    <a href="">
                        <img class="   " src="{{asset('asset_ar/img/20-01.png')}}" alt="" style="    width: 253px;">
                    </a>
                </div>  -->



            </div> 


            <br> 
                    
            <div class="row " >
                
 

                <div class="   col-xs-10"  >
                    <h3 style="    font-size: 37px;">
                            ان اعجبتك موهبتى اضف تقييمك لتساهم فى دعمها    : 
                    </h3> 
                 </div> 
            </div> 
            <hr class='new4'>   

            <div class="row ">
                <div class="module col-lg-12 col-md-12 col-sm-12"  >

                    @foreach($talented_videos_ready as $val)

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

                    $talented_videos_rates = App\Models\Talented_videos_rates::
                                         where('rated_id',$rated_person)
                                         ->where('talented_videos_id',$val->id)
                                         ->where('type',$type)->first();     
                    ?>

                    <div class="col-lg-6 col-md-6 col-sm-12"  >

                            <?php 
                              if(strlen($val->youtube) > 11)
                              {
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                              }
                            ?>
                            @if($match[1])
                                <iframe class="lozad" width="100%" height="315" data-src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                            @endif 
                        
                        <div class="row"  style="height: 40px;">
                            <div class="col-lg-12 col-md-12 col-sm-12"  >
                                <div class="form-group">
                                    <label >إن أعجبتك موهبتي أضف تقييمك لتساهم في دعمها   : 


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
                                            <form id="vedio_rate{{$val->id}}" method="post" action="{{ asset('vedio_rate') }}" enctype="multipart/form-data" >
                                            {{ csrf_field() }}
                                                <input type="" name="type" value="{{$type}}" hidden="">    
                                                <input type="" name="rated_id" value="{{$rated_person}}" hidden="">    
                                                <input type="" name="talented_videos_id" value="{{$val->id}}" hidden="">
                                                @if($talented_videos_rates) 
                                                <input type="" name="id" value="{{$talented_videos_rates->id}}" hidden=""> 
                                                @else
                                                 @endif

                                                         
                                                @if($talented_videos_rates)

                                                    <div class="  rating{{$val->id}} rating_1{{$val->id}}">
                                                        <span class="{!! $talented_videos_rates->rate >= 5 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate"  id="str5{{$val->id}}" value="5" 
                                                            {!! $talented_videos_rates->rate <= 5 ? 'checked' : ' '  !!} >
                                                            <label for="str5{{$val->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates->rate >= 4 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str4{{$val->id}}" value="4"
                                                            {!! $talented_videos_rates->rate <= 4 ? 'checked' : ' '  !!} >
                                                            <label for="str4{{$val->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates->rate >= 3 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str3{{$val->id}}" value="3"
                                                            {!! $talented_videos_rates->rate <= 3 ? 'checked' : ' '  !!} >
                                                            <label for="str3{{$val->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label></span>
                                                            <span class="{!! $talented_videos_rates->rate >= 2 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str2{{$val->id}}" value="2"
                                                            {!! $talented_videos_rates->rate <= 2 ? 'checked' : ' '  !!} >
                                                            <label for="str2{{$val->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <span class="{!! $talented_videos_rates->rate >= 1 ? 'checked' : ' '  !!}">
                                                            <input type="radio" name="rate" id="str1{{$val->id}}" value="1"
                                                            {!! $talented_videos_rates->rate <= 1 ? 'checked' : ' '  !!} >
                                                            <label for="str1{{$val->id}}">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </label>
                                                        </span>
                                                        <br>
                                                    </div>
                                                @else

                                                <div class="rating{{$val->id}} rating_1{{$val->id}}">
                                                    <span >
                                                        <input type="radio" name="rate"  id="str5{{$val->id}}" value="5" >
                                                        <label for="str5{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str4{{$val->id}}" value="4">
                                                        <label for="str4{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str3{{$val->id}}" value="3">
                                                        <label for="str3{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                        <span class="">
                                                        <input type="radio" name="rate" id="str2{{$val->id}}" value="2">
                                                        <label for="str2{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="">
                                                        <input type="radio" name="rate" id="str1{{$val->id}}" value="1">
                                                        <label for="str1{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                </div>
                                                @endif
                                                <button type="submit" class="submit{{$val->id}}" hidden="">dddddddd</button>
                                            </form>   
                                            



                                        @endif


                                    </label>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                    @endforeach



                    

                </div>
            </div>


 





 
             
        </div>  
    </div> 



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

    @foreach($talented_videos_ready as $val)
        <script>
            $(document).ready(function(){
                $(".rating_1{{$val->id}} input").click(function () {
                    $(".rating_1{{$val->id}} span").removeClass('checked');
                    $(this).parent().addClass('checked');
                });
            });
        </script>

        <script>
            $("#str5{{$val->id}} , #str4{{$val->id}} , #str3{{$val->id}} , #str2{{$val->id}} , #str1{{$val->id}} ").change(function() {
                 $( ".submit{{$val->id}}" ).click();
            });
        </script>

        <script type="text/javascript">

            jQuery(function ($) {

              $("#vedio_rate{{$val->id}}").validate({
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

    <script type="text/javascript">
        $(".login").click(function() {
            var location = "{{asset('/login')}}";
            window.location.replace(location);
        });
    </script> 

@endsection 