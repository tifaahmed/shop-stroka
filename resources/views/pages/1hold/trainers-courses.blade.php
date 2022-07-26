@extends('layout')

@section('title')
    <title>{{ $trainers->full_name}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$trainers->full_name}}">

    <meta property="title"     content="{{$trainers->full_name}}"/>
    <meta property="og:title"  content="{{$trainers->full_name}}"/>
    <meta name="twitter:title" content="{{$trainers->full_name}}" />

    <meta name="description"        content="{{$trainers->description}}">
    <meta property="og:description" content="{{$trainers->description}}"/>
    <meta name="twitter:description"content="{{$trainers->description}}" />

    <meta name="twitter:image" content="{{asset($trainers->avatar)}}" />
    <meta property="og:image"  content="{{asset($trainers->avatar)}}"/>
    
    <meta property="og:url"    content="{{Request::url()}}"/>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/trainers-courses.css')}}">


@foreach($courses as $val)
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

    <div>
        <div   class="inner-page-banner" style="    height: 494px;background:url({{ asset( $training_center_details->banner_image ) }}) center center no-repeat;background-size: cover;margin-top:98px;">
            <div class="opacity">
                <div class="container text-center">
                    <h1 style="         margin-top: -101px;font-size: 144px!important; text-shadow:5px 5px 5px #9e9e9e;color:white">  {{$training_center_details->page_title}}   </h1>
                </div>  
            </div> 
        </div> 


        <div class="popular-course wow fadeInUp body-bg rate">
            <div class="container container2">
                <div class=" row">
                <h2 style="text-align: right;">المدرب  /  {{$trainers->full_name}}</h2>
                <hr class="new4">
                </div> 

                <div class="new4 row">
                    <div style="    height: 474px;" class="module col-lg-4 col-md-12">
                        <div class=" row"  >
                            <div class=" col-lg-12 col-md-12"  >
                                <img style="margin: auto;  width: 465px;padding: 27px;height: 402px;" class="img_profile  margin_img radios_image lozad" data-src="{{asset($trainers->avatar)}}" alt="{{$trainers->full_name}}" title="{{$trainers->full_name}}">
                            </div> 
                        </div>  
                        <div class=" row"  >
                            <div class=" col-lg-12 col-md-12"  >
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
                    </div> 
                    <div class="module col-lg-1 hidden-md hidden-sm hidden-xs ">
                        <img style="    height: 464px;" class="img_profile  margin_img radios_image" src="{{asset('asset_ar/img/10-02.png')}}" alt="">
                    </div> 

                    <div class="module col-lg-7 col-md-12" style="    padding-left: 24px; padding-right: 24px;padding-bottom: 11px;">
                        <br>
                        <div class="row"  >
                            <div class="col-md-12">
                                <h2 style="text-align: right;"> نبذه عن المدرب </h2>
                                <p style="height: 400px; overflow: hidden;">
                                      {{$trainers->description}}
                                </p>
                            </div> 
                        </div>  
                    </div> 
                </div>        
            </div> 
            <!-- **************************************** -->
            <div class="popular-course wow fadeInUp body-bg talent-home" style="padding: 20px 0;">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <h2 style="    text-align: right;color: #ba4699;padding: 16px;">قائمه الدورات  </h2>
                            <hr class='new4'>   
                        </div>
                        <div class="row">
                        <style>
                            table td  , table tr, table th {
                                font-size:25px;border: solid;border-color: #ba4699;color: #ba4699;text-align: center;
                            }

                        </style>
                        <table class="table" >
                            <thead>
                                <tr >
                                    <th>اسم الدورة</th>
                                    <th>نوع الدورة </th>
                                    <th>حالة الدورة</th>
                                    <th>للتسجيل</th>
                                    <th>التقييم</th>
                                    <th>تكلفة الدورة</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach($courses as $key => $val)
                                <tr>
                                    <td>  
                                        <a href="" data-toggle="modal" data-target="#myModal_show{{$val->id}}">
                                            {{$val->home_title}}     
                                        </a>
                                    </td>

                                    <td>
                                        @if($val->type == 1)
                                            اونلاين
                                        @elseif($val->type == 2)
                                        داخل المركز 
                                        @endif
                                    </td>

                                    <td>
                                        @if($val->current_status == 1)
                                            قائمة
                                        @elseif($val->current_status == 2)
                                            مؤجلة
                                        @elseif($val->current_status == 3)
                                            منتهية
                                        @elseif($val->current_status == 4)
                                            قريبا
                                        @endif
                                    </td>
                                    <td>
                                        <!-- **********************start -->
                                        @if(Auth::guard('talented')->user() )
                                        <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
                                                    ->where('sup_id',Auth::guard('talented')->user()->id)->first() ?>
                                        @endif

                                        @if(
                                        $val->current_sub < $val->max_sub 
                                        && date('Y-m-d') > $val->date_start 
                                        && date('Y-m-d') < $val->date_end )
                                            @if( !Auth::guard('talented')->user() )
                                            <a href="{{asset('login')}}">
                                                <button title="التسجيل للموهوبين فقط"  style="    font-size: 25px;padding: 9px 30px;;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                  تسجيل  
                                                </button>
                                            </a>   
                                            @elseif(Auth::guard('talented')->user() )
                                                @if($check_sub)
                                                    <button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                    تم التسجيل    
                                                    </button>
                                                @else
                                                    <a href="{{asset('course_sub/'.$val->url)}}">
                                                        <button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                            تسجيل  
                                                        </button>
                                                    </a> 
                                                @endif
                                            @endif
                                        @endif
                                        <!-- **********************start -->
                                        <!-- **********************end -->
                                        @if(date('Y-m-d') > $val->date_end )
                                        <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-danger" >
                                            &nbsp; &nbsp; &nbsp; انتهت الدوره  &nbsp; &nbsp; &nbsp;
                                        </button> 
                                        <!-- **********************end -->
                                        <!-- **********************complite -->
                                        @elseif($val->current_sub >= $val->max_sub )
                                        <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="  btn-dark" >
                                            &nbsp; &nbsp; &nbsp; اكتمل العدد  &nbsp; &nbsp; &nbsp;
                                        </button>  
                                        @endif
                                        <!-- **********************complite -->
                                        <!-- **********************sub -->
                                        
                                        <!-- **********************sub -->


                                    </td>
                                    <td>
                                        
                                        @if(Auth::guard('talented')->user())
                                            <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
                                                        ->where('sup_id',Auth::guard('talented')->user()->id)->first() ?>

                                            @if($val->allow_rating == 1 && $check_sub )
                                            <button  data-toggle="modal" data-target="#Modal_rate{{$val->id}}" style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                &nbsp; &nbsp; &nbsp; اضف تقييمك  &nbsp; &nbsp; &nbsp;
                                            </button>  
                                            @endif  

                                        @else  
                                         <button title="متاح للموهوبين المسجلين للدوره فقط" style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                             &nbsp; &nbsp; &nbsp; اضف تقييمك  &nbsp; &nbsp; &nbsp;
                                         </button> 
                                        @endif  

                                    </td>
                                    <td>
                                        @if($val->cost == 1)
                                            مجانية
                                        @elseif($val->cost == 2)
                                            مدفوعه
                                        @endif
                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>


                        <!-- modal modal modal modal modal modal modal modal modal modal modal  -->

                        @foreach($courses as $val)
                        <div id="myModal_show{{$val->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #ba4699;">
                                        <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                                        float: right;
                                        color: #fff;
                                        border: solid;
                                        border-radius: 100%;
                                        border-color: #fff!important;
                                        ">   &nbsp;  &times;  &nbsp;  </button>
                                        @if($val->home_image_one)
                                        <a href="{{asset($val->home_image_one)}}" target="blanck" style="padding: 10px 125px;">
                                            <img style="cursor: pointer;margin: auto;width: 235px;height: 185px;" class="lozad" data-src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                        </a>    
                                        @else
                                            <img   style="cursor: pointer;margin: auto;width: 235px;height: 185px;" class="lozad" data-src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                        @endif
                                    </div>
                                    <div class="modal-body">
                                        <div class="row " style="padding: 13px">
                                            <div class=" col-xs-3 "  >
                                            <p style="color: #ba4699;font-size: 23px;">اسم الدورة : </p>
                                            </div>
                                            <div class=" col-xs-9 "  >
                                            <span style="    font-size: 20px;
                                                color: #000;
                                                padding: 7px 40px;
                                                border: solid;
                                                border-color: #ba4699;
                                                border-radius: 10px;">  {{$val->home_title}}</span>
                                            </div>
                                        </div>
                                        <div class="row " style="padding: 13px">
                                            <div class=" col-xs-2 "  >
                                                <p style="color: #ba4699;font-size: 23px;"> التاريخ   : </p>
                                            </div> 
                                            <div class=" col-xs-10 "  >
                                                <div class=" row " style="    font-size: 20px;
                                                        border: solid;
                                                        border-color: #ba4699;
                                                        border-radius: 10px;" >
                                                    <div class=" col-xs-6 "  >
                                                        <span style="    color: #ba4699;" >من /  </span>
                                                        <span >{{$val->date_start}} </span>

                                                    </div>
                                                    <div class=" col-xs-6 "  >
                                                        <span  style="    color: #ba4699;" >   الى /</span>
                                                        <span >{{$val->date_end}}  </span>
                                                    </div>
                                                </div> 
                                            </div> 
                                        </div>
                                        <div class="row " style="    font-size: 20px;
                                            color: #ba4699;
                                            padding-right: 27px;">
                                        معلومات عن الدورة
                                        </div>
                                        <div class="row " style="padding: 19px;padding-right: 33px;" >
                                            <p style="    border: solid;border-color: #ba4699;border-radius: 10px;padding: 3px 19px;">   {!!$val->home_subject!!}
                                            </p>
                                        </div>
                                        <div class="row " style="padding: 13px">
                                            <div class=" col-xs-4 "  >
                                            <p style="color: #ba4699;font-size: 23px;">عدد المسجلين   : </p>
                                            </div>
                                            <div class=" col-xs-8 "  >
                                            <span style="    font-size: 20px;
                                                color: #000;
                                                padding: 7px 40px;
                                                border: solid;
                                                border-color: #ba4699;
                                                border-radius: 10px;"><span style="    color: red;">{{$val->current_sub}}  </span>/  {{$val->max_sub}}  </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endforeach

                        <!-- modal modal modal modal modal modal modal modal modal modal modal  -->
                        @if(Auth::guard('talented')->user() )

                        @foreach($courses as $val)
                        <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
                                    ->where('sup_id',Auth::guard('talented')->user()->id)->get() ?>
                        <div id="Modal_rate{{$val->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #ba4699;height: 111px;">
                                        <button type="button" class="close" data-dismiss="modal" style="    opacity: 1;
                                        float: right;
                                        color: #fff;
                                        border: solid;
                                        border-radius: 100%;
                                        border-color: #fff!important;
                                        ">   &nbsp;  &times;  &nbsp;  </button>
                                        <p style="     padding: 23px;   color: #fff;font-size: 93px;">
                                            التقييم
                                        </p>
                                    </div>
                                        
                                    <div class="modal-body">
                                    @foreach($check_sub as $val2)

                                    <form id="course_sub_rating" method="post" action="{{ asset('/course_sub_rating') }}" enctype="multipart/form-data" >  {{ csrf_field() }} 
                                    <input type="" name="id" value="{{$val2->id}}" hidden="" >      


                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-8 "  >
                                                <p style="color: #ba4699;font-size: 23px;"> تقييمك لأداء المدرب </p>
                                            </div>
                                            <div class=" col-xs-4 "  >
                                                <div class="rating{{$val->id}} rating_1{{$val->id}}">
                                                    <span class="{!! $val2->rate_one >= 5 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_one"  id="str5{{$val->id}}" value="5" 
                                                        {!! $val2->rate_one <= 5 ? 'checked' : ' '  !!} >
                                                        <label for="str5{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_one >= 4 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_one" id="str4{{$val->id}}" value="4"
                                                        {!! $val2->rate_one <= 4 ? 'checked' : ' '  !!} >
                                                        <label for="str4{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_one >= 3 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_one" id="str3{{$val->id}}" value="3"
                                                        {!! $val2->rate_one <= 3 ? 'checked' : ' '  !!} >
                                                        <label for="str3{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                        <span class="{!! $val2->rate_one >= 2 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_one" id="str2{{$val->id}}" value="2"
                                                        {!! $val2->rate_one <= 2 ? 'checked' : ' '  !!} >
                                                        <label for="str2{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_one >= 1 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_one" id="str1{{$val->id}}" value="1"
                                                        {!! $val2->rate_one <= 1 ? 'checked' : ' '  !!} >
                                                        <label for="str1{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>

                                                    <br>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-8 "  >
                                                <p style="color: #ba4699;font-size: 23px;"> تقييمك لمحتوى الدورة   </p>
                                            </div>
                                            <div class=" col-xs-4 "  >
                                                <div class="rating{{$val->id}} rating_2{{$val->id}}">
                                                    <span class="{!! $val2->rate_two >= 5 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_two" id="str5_two{{$val->id}}" value="5"
                                                        {!! $val2->rate_two <= 5 ? 'checked' : ' '  !!} >
                                                        <label for="str5_two{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_two >= 4 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_two" id="str4_two{{$val->id}}" value="4"
                                                        {!! $val2->rate_two <= 4 ? 'checked' : ' '  !!} >
                                                        <label for="str4_two{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_two >= 3 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_two" id="str3_two{{$val->id}}" value="3"
                                                        {!! $val2->rate_two <= 3 ? 'checked' : ' '  !!} >
                                                        <label for="str3_two{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                        <span class="{!! $val2->rate_two >= 2 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_two" id="str2_two{{$val->id}}" value="2"
                                                        {!! $val2->rate_two <= 2 ? 'checked' : ' '  !!} >
                                                        <label for="str2_two{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_two >= 1 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_two" id="str1_two{{$val->id}}" value="1"
                                                        {!! $val2->rate_two <= 1 ? 'checked' : ' '  !!} >
                                                        <label for="str1_two{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-8 "  >
                                                <p style="color: #ba4699;font-size: 23px;"> تقييمك     لنظام منصة   happy فى ادارة الدورات وعرضها </p>
                                            </div>
                                            <div class=" col-xs-4 "  >
                                                <div class="rating{{$val->id}} rating_3{{$val->id}}">
                                                    <span class="{!! $val2->rate_three >= 5 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_three" id="str5_three{{$val->id}}" value="5"
                                                        {!! $val2->rate_three <= 5 ? 'checked' : ' '  !!}>
                                                        <label for="str5_three{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_three >= 4 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_three" id="str4_three{{$val->id}}" value="4"
                                                        {!! $val2->rate_three <= 4 ? 'checked' : ' '  !!}>
                                                        <label for="str4_three{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_three >= 3 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_three" id="str3_three{{$val->id}}" value="3"
                                                        {!! $val2->rate_three <= 3 ? 'checked' : ' '  !!}>
                                                        <label for="str3_three{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                    <span class="{!! $val2->rate_three >= 2 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_three" id="str2_three{{$val->id}}" value="2"
                                                        {!! $val2->rate_three <= 2 ? 'checked' : ' '  !!}>
                                                        <label for="str2_three{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_three >= 1 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_three" id="str1_three{{$val->id}}" value="1"
                                                        {!! $val2->rate_three <= 1 ? 'checked' : ' '  !!}>
                                                        <label for="str1_three{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-8 "  >
                                                <p style="color: #ba4699;font-size: 23px;">  تقييمك لطريقة عرض الدورة     </p>
                                            </div>
                                            <div class=" col-xs-4 "  >
                                                <div class="rating{{$val->id}} rating_4{{$val->id}}">
                                                    <span class="{!! $val2->rate_four >= 5 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_four" id="str5_four{{$val->id}}" value="5"
                                                        {!! $val2->rate_four <= 5 ? 'checked' : ' '  !!} >
                                                        <label for="str5_four{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_four >= 4 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_four" id="str4_four{{$val->id}}" value="4"
                                                        {!! $val2->rate_four <= 4 ? 'checked' : ' '  !!} >
                                                        <label for="str4_four{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_four >= 3 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_four" id="str3_four{{$val->id}}" value="3"
                                                        {!! $val2->rate_four <= 3 ? 'checked' : ' '  !!} >
                                                        <label for="str3_four{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_four >= 2 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_four" id="str2_four{{$val->id}}" value="2"
                                                        {!! $val2->rate_four <= 2 ? 'checked' : ' '  !!} >
                                                        <label for="str2_four{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_four >= 1 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_four" id="str1_four{{$val->id}}" value="1"
                                                        {!! $val2->rate_four <= 1 ? 'checked' : ' '  !!} >
                                                        <label for="str1_four{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-8 "  >
                                                <p style="color: #ba4699;font-size: 23px;">      تقييمك لمدي الفائدة التى حصلت عليها من الدورة </p>
                                            </div>
                                            <div class=" col-xs-4 "  >
                                                <div class="rating{{$val->id}} rating_5{{$val->id}}">
                                                    <span class="{!! $val2->rate_five >= 5 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_five" id="str5_five{{$val->id}}" value="5"
                                                        {!! $val2->rate_five <= 5 ? 'checked' : ' '  !!}>
                                                        <label for="str5_five{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_five >= 4 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_five" id="str4_five{{$val->id}}" value="4"
                                                        {!! $val2->rate_five <= 4 ? 'checked' : ' '  !!}>
                                                        <label for="str4_five{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_five >= 3? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_five" id="str3_five{{$val->id}}" value="3"
                                                        {!! $val2->rate_five <= 3 ? 'checked' : ' '  !!}>
                                                        <label for="str3_five{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label></span>
                                                    <span class="{!! $val2->rate_five >= 2 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_five" id="str2_five{{$val->id}}" value="2"
                                                        {!! $val2->rate_five <= 2 ? 'checked' : ' '  !!}>
                                                        <label for="str2_five{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <span class="{!! $val2->rate_five >= 1 ? 'checked' : ' '  !!}">
                                                        <input type="radio" name="rate_five" id="str1_five{{$val->id}}" value="1"
                                                        {!! $val2->rate_five <= 1 ? 'checked' : ' '  !!}>
                                                        <label for="str1_five{{$val->id}}">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </label>
                                                    </span>
                                                    <br>
                                                    <br>
                                                </div> 
                                            </div>
                                        </div>



                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-12 "  >
                                                <p style="color: #ba4699;font-size: 25px;">   ملاحظات </p>
                                            </div>
                                            <div class=" col-xs-12 "  >
                                                <textarea style="width: 100%;" name="note" id=""  rows="3">
                                                    {!! $val2->note  !!}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="row " style="padding: 13px;text-align: right;">
                                            <div class=" col-xs-12 "  >
                                                <button type="submit" style="    font-size: 25px;padding: 5px 10px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="  btn-dark" >
                                                    ارسال  
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div> <!-- /.popular-course -->
                </div>
            </div> 

        </div> 
    

    </div>

 
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

    @foreach($courses as $val)
    <script>
        $(document).ready(function(){
            $(".rating_1{{$val->id}} input").click(function () {
                $(".rating_1{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });


            $(".rating_2{{$val->id}} input").click(function () {
                $(".rating_2{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_3{{$val->id}} input").click(function () {
                $(".rating_3{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_4{{$val->id}} input").click(function () {
                $(".rating_4{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $(".rating_5{{$val->id}} input").click(function () {
                $(".rating_5{{$val->id}} span").removeClass('checked');
                $(this).parent().addClass('checked');
            });


        });
    </script>
    @endforeach
<!-- <script type="text/javascript">
    $('input:radio').change(
    function(){
        var userRating = this.value;
    }); 
</script> -->

@endsection 
