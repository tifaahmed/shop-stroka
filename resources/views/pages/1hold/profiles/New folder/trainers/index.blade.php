@extends('layout')

@section('title')
    <title>{{ $trainers->full_name}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$trainers->full_name}}">

    <meta property="title"  content="{{$trainers->full_name}}"/>
    <meta property="og:title"  content="{{$trainers->full_name}}"/>
    <meta name="twitter:title" content="{{$trainers->full_name}}" />

    <meta name="description" content="{{$trainers->description}}">
    <meta property="og:description" content="{{$trainers->description}}"/>
    <meta name="twitter:description" content="{{$trainers->description}}" />

    <meta name="twitter:image" content="{{asset($trainers->avatar)}}" />
    <meta property="og:image"     content="{{asset($trainers->avatar)}}"/>
    
    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/trainers-courses.css')}}">
@endsection 

@section('content')
@include('pages.partials.header')

    <div>
        <br>
        <br>
 


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
                                      {!! $trainers->description !!}
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
                                        @if(
                                        $val->current_sub < $val->max_sub 
                                        && date('Y-m-d') > $val->date_start 
                                        && date('Y-m-d') < $val->date_end )


                                        @if(!Auth::guard('talented')->user())
                                        <a href="{{asset('login')}}">
                                            <button title="التسجيل للموهوبين فقط"  style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                &nbsp; &nbsp; &nbsp; تسجيل  &nbsp; &nbsp; &nbsp;
                                            </button>
                                        </a>   
                                        
                                        @elseif(Auth::guard('talented')->user() )
                                            <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
                                                        ->where('sup_id',Auth::guard('talented')->user()->id)->first() ?>
                                            @if($check_sub)
                                            <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                &nbsp; &nbsp; &nbsp; تم التسجيل    &nbsp; &nbsp; &nbsp;
                                            </button>
                                            @endif

                                        @elseif(Auth::guard('talented')->user() && check_sub ==' ')
                                        <a href="{{asset('course_sub/'.$val->url)}}">
                                            <button style="    font-size: 25px;padding: 5px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-primary" >
                                                &nbsp; &nbsp; &nbsp; تسجيل  &nbsp; &nbsp; &nbsp;
                                            </button>
                                        </a> 
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
                    </div> 
                </div>
            </div> 

        </div> 
    

    </div>

 


    @include('pages.partials.footer')
    <script>
        $(document).ready(function(){
            // Check Radio-box
            // $(".rating_1 input:radio").attr("checked", false);
            // $(".rating_2 input:radio").attr("checked", false);
            // $(".rating_3 input:radio").attr("checked", false);
            // $(".rating_4 input:radio").attr("checked", false);
            // $(".rating_5 input:radio").attr("checked", false);

            $('.rating_1 input').click(function () {
                $(".rating_1 span").removeClass('checked');
                $(this).parent().addClass('checked');
            });


            $('.rating_2 input').click(function () {
                $(".rating_2 span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('.rating_3 input').click(function () {
                $(".rating_3 span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('.rating_4 input').click(function () {
                $(".rating_4 span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('.rating_5 input').click(function () {
                $(".rating_5 span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
            function(){
                var userRating = this.value;
            }); 
        });
    </script>
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 
