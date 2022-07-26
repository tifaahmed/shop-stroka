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

<meta name="twitter:image" content="{{asset($details->home_image_one)}}" />
<meta property="og:image"     content="{{asset($details->home_image_one)}}"/>

<meta property="og:url"       content="{{Request::url()}}"/>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/trainers-center.css')}}">
<style type="text/css">
.trainers{
	padding: 16px;
	border-radius: 100%;
	width: 350px;
	height: 350px;
	margin: auto;
}
	
</style>



@endsection 


@section('content')

@include('pages.partials.header')


<div   class="inner-page-banner" style="    height: 494px;background:url( {{ asset( $details->banner_image ) }} ) center center no-repeat;background-size: cover;margin-top:40px;">
    <div class="opacity">
        <div class="container text-center">
            <h1 style="         margin-top: -101px;font-size: 144px!important; text-shadow:5px 5px 5px #9e9e9e;color:white">  {{$details->page_title}}   </h1>
        </div>  
    </div> 
</div> 


<div class="popular-course wow fadeInUp body-bg rate">
	@if($details->table_subject_one)
		@foreach(json_decode($details->table_subject_one) as $key => $subject)

			<div class="container">
			    <div class="new4 row padding_two_sides">
			      
			        <div class="module    padding_two_sides col-lg-12 col-md-12  col-sm-12 col-xs-12">
			            <h2 style="    text-align: right;color: #ba4699;padding: 16px;">  {{$subject->title}}  </h2>
			            <p   style="    padding: 17px;font-size: 17px;  " >
			            	{!! $subject->subject !!}
			                
			            </p>
			        </div>

			    </div>
			    <br> <br>
			</div>

		@endforeach
	@endif


	<!-- ****************************************  latest-->
	<div class="popular-course wow fadeInUp body-bg talent-home" style="padding: 0 0;">
		<div class="container">
	        <div class="row text-center">
	            <div class="col-sm-12">
	                     <h2 style="    text-align: right;color: #ba4699;padding: 16px;">الدورات الجديدة  </h2>
	                    <hr class='new4'>   
	             </div>
	            </div>
	                <div class="row">
	                    <div class="theme-slider course-item-wrapper" dir="ltr">

	                    	@foreach($courses_latest as $key => $val)
	                        <div class="item hvr-float-shadow">
	                            <div class="img-holder">

	                                @if($val->home_image_one)
	                                <a href="" data-toggle="modal" data-target="#myModal{{$val->id}}">
	                                    <img style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
	                                </a>    
	                                @else
	                                <a href="" data-toggle="modal" data-target="#myModal{{$val->id}}">
	                                    <img   style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                    </a>    
	                                @endif
	                            </div>
	                            <div class="row">
	                                <div class="  col-xs-12">
	                                    <div class="txt_holder" style="text-align: center;">
	                                    <br>
	                                    <p>
	                                        <span style="color:#ba4699;padding: 11px 35px;border: solid; border-radius: 10px!important;border-color:#0cb7e3"> 
	                                        	{{$val->home_title}}
	                                        </span>
	                                    </p>
	                                    <br>
	                                    <p>
	                                        <span style="color: #ba4699;padding: 10px 35px;border: solid;border-radius: 10px!important;border-color: #0cb7e3">
	                                        	<?php
	                                        	$trainer  = App\Models\Trainers::where('id',$val->related_id)->first();
                                        		?>
	                                        	{{ $trainer->full_name}}
	                                        </span>
	                                    </p>
	                                    <br>
	                                    @if(Auth::guard('talented')->user() )
	                                    <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
	                                                ->where('sup_id',Auth::guard('talented')->user()->id)->first() ?>
                                        @endif

	                                    @if(
	                                    $val->current_sub < $val->max_sub 
	                                    && date('Y-m-d') > $val->date_start 
	                                    && date('Y-m-d') < $val->date_end )
										<br>
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
	                                    <br>

	                                    <!-- **********************start -->
	                                    <!-- **********************end -->
	                                    @if(date('Y-m-d') > $val->date_end )
	                                    <button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-danger" >
	                                         انتهت الدوره  
	                                    </button> 
	                                    <!-- **********************end -->
	                                    <!-- **********************complite -->
	                                    @elseif($val->current_sub >= $val->max_sub )
	                                    <button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="  btn-dark" >
	                                        اكتمل العدد  
	                                    </button>  
	                                    @endif
	                                    <!-- **********************complite -->


	                                   
	                                    <br>
	                                    
	                                    </div>
	                                </div>
	                            </div>
	                        </div> 
	                        @endforeach





	                    </div> <!-- /.course-slider -->
	                </div>
	            </div> <!-- /.container -->
	        </div> <!-- /.popular-course -->
	    </div>
	</div> 
	<!-- ****************************************  latest-->

<!-- **************************************** -->
<div class="popular-course wow fadeInUp body-bg talent-home" style="padding: 0 0;">
	<div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <h2 style="    text-align: right;color: #ba4699;padding: 16px;">الدورات الاعلى تقييما  </h2>
                <hr class='new4'>   
             </div>
            </div>
                <div class="row">
                    <div class="theme-slider course-item-wrapper" dir="ltr">


                    	@foreach($courses_rate as $key => $val)
	                        <div class="item hvr-float-shadow">
	                            <div class="img-holder">

	                            	<a href="" data-toggle="modal" data-target="#myModal{{$val->id}}">
									@if($val->home_image_one)
	                                    <img style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
 	                                @else
 	                                    <img   style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
	                                @endif
	                                </a>    
	                                                              
	                            </div>
	                            <div class="row">
	                                <div class="  col-xs-12">
	                                    <div class="txt_holder" style="text-align: center;">
	                                    	<br>
		                                    <p>
		                                        <span style="color:#ba4699;padding: 11px 35px;border: solid; border-radius: 10px!important;border-color:#0cb7e3"> 
		                                        	{{$val->home_title}}
		                                        </span>
		                                    </p>
		                                    <br>
		                                    <p>
		                                        <span style="color: #ba4699;padding: 10px 35px;border: solid;border-radius: 10px!important;border-color: #0cb7e3">
		                                        	<?php
		                                        	$trainer  = App\Models\Trainers::where('id',$val->related_id)->first();
	                                        		?>
		                                        	{{ $trainer->full_name}}
		                                        </span>
		                                    </p>
	                                    	<br>
		                                    <p>

		                                        <div class="module col-xs-12 star_rate"  >
		                                            <ul>
		                                            	@if($val->rating > 0)
		                                            	<?php
		                                            	$x = 0;
		                                            	$full =$val->rating ;
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
		                                            	$half =$i - $val->rating ;
 		                                            	if ($half >= 0.5 ) {
		                                            	    $x =1;
		                                            	?>
		                                            	<li class="li_c"><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
		                                            	<?php
		                                            	}
		                                            	?>

		                                            	
		                                            	<?php
		                                            	$empty =5 - $full -$x ;
		                                            	for ($i=0; $i < $empty; $i++) {                                     
		                                            	?>
		                                            	<li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
		                                            	<?php
		                                            	}
		                                            	?>
		                                            	@endif


		                                            </ul>
		                                        </div> 
		                                    </p>
		                                    <br><br><br>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        @endforeach



                    </div> <!-- /.course-slider -->
                </div>
            </div> <!-- /.container -->
        </div> <!-- /.popular-course -->
    </div>


<!-- **************************************** -->
<div class="popular-course wow fadeInUp body-bg talent-home" style="padding: 0 0;">
	<div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <h2 style="    text-align: right;color: #ba4699;padding: 16px;"> المدربين      </h2>
                <hr class='new4'>   
             </div>
            </div>
                <div class="row">
                	@foreach($trainers as $val)
                	<div class="col-lg-4 col-sm-6  col-xl-12">
                	    <a href="{{asset('trainer-courses/'.$val->remember_token)}}" >
                	        <div class="row">
                	            <div class=" img-holder">
                	                @if( $val->avatar)
                	                <img  class="img_profile  margin_img radios_image lozad trainers" title="{{$val->full_name}}"  data-src="{{asset($val->avatar)}}" alt="{{$val->full_name}}">
                	                @else
                	                <img class="img_profile  margin_img radios_image lozad trainers"    data-src="{{asset('asset_ar/img/17-06.jpg')}}" >
                	                @endif
                	                        
                	            </div>
                	            <div class="row">
                	                <div class="  col-xs-12">
                	                    <div class="txt_holder" style="text-align: center;">
                	                    <br>
                	                    <p>
                	                        <span style="color: #ba4699;padding: 10px 14px;border: solid;border-radius: 10px!important;border-color: #0cb7e3"> 
                	                        	{{$val->full_name}}                	                        
                	                        </span>
                	                    </p>
                	                    <br>
                	                    <p>
                	                        <div class="module col-xs-12 star_rate"  >
                	                            <ul>

                	                            	<?php
                	                            
                	                            	if(	is_numeric($val->rating) )  {
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
                    	                            	<li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    	                            	<?php
                    	                            	}
                	                            	}else{
                	                            	    ?>
    
                    	                            	<?php
                    	                            	$empty =5  ;
                    	                            	for ($i=0; $i < $empty; $i++) {                                     
                    	                            	?>
                    	                            	<li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                    	                            	<?php
                    	                            	}
                	                            	}	
                	                            	?>
                	                                
                	                            </ul>
                	                        </div> 
                	                    </p>
                	                    <br><br><br>
                	                    </div>
                	                </div>
                	            </div>
                	        </div> <!-- /.item -->

                	    </a>  
                	</div>

                	@endforeach




                </div>
            </div> <!-- /.container -->
        </div> <!-- /.popular-course -->
    </div>
</div>


    <!-- model  -model  -model  -model  -model  -model  -model  -model  -model  -model  -->
    @foreach($courses_latest as $key => $val)
	<div class="modal fade" id="myModal{{$val->id}}">
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
                        <img style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                    </a>
                    @else
                        <img   style="cursor: pointer;margin: auto;width: 100%;height: 310px;" class="lozad" data-src="{{asset('asset_ar/img/26-010.jpg')}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
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
                            border-radius: 10px;">{{$val->home_title}}</span>
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
                                    <span >{{$val->date_start}}</span>

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
                        <p style="    border: solid;border-color: #ba4699;border-radius: 10px;padding: 3px 19px;">                        
                       {!!$val->home_subject!!}
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
                            border-radius: 10px;"><span style="    color: red;">{{$val->current_sub}}  </span>/  {{$val->max_sub}}   </span>
                        </div>
                    </div>
                    <div class="row " style="padding: 13px;text-align: center;q32q">
                        <div class=" col-xs-12 "  >
                        @if(Auth::guard('talented')->user() )
                            <?php $check_sub = App\Models\Courses_subs::where('course_id',$val->id)
                                        ->where('sup_id',Auth::guard('talented')->user()->id)->first() ?>
                            @endif

                            @if(
                            $val->current_sub < $val->max_sub 
                            && date('Y-m-d') > $val->date_start 
                            && date('Y-m-d') < $val->date_end )
							<br>
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
                            <br>
                        	<!-- **********************start -->
                        	<!-- **********************end -->
                        	@if(date('Y-m-d') > $val->date_end )
                        	<button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="btn-danger" >
                        	     انتهت الدوره  
                        	</button> 
                        	<!-- **********************end -->
                        	<!-- **********************complite -->
                        	@elseif($val->current_sub >= $val->max_sub )
                        	<button style="    font-size: 25px;padding: 9px 30px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;" class="  btn-dark" >
                        	    اكتمل العدد  
                        	</button>  
                        	@endif
                        	<!-- **********************complite -->                        
                        </div>
                    </div>
            	</div>
        	</div>
	    </div>
	</div> 
	@endforeach
    <!-- model  -model  -model  -model  -model  -model  -model  -model  -model  -model  -->

	@include('pages.partials.footer')

    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

@endsection 
