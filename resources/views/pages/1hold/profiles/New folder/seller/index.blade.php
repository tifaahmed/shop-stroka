@extends('layout')


@section('title')
<title>
 {{$seller->full_name}}
</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/seller-index-profile.css')}}">

@endsection 

@section('meta')
    <meta name="keywords" content="{{$seller->full_name}}">

    <meta property="title"  content="{{$seller->full_name}}"/>
    <meta property="og:title"  content="{{$seller->full_name}}"/>
    <meta name="twitter:title" content="{{$seller->full_name}}" />

    <meta name="description" content="{{$seller->description}}">
    <meta property="og:description" content="{{$seller->description}}"/>
    <meta name="twitter:description" content="{{$seller->description}}" />

    <meta name="twitter:image" content="{{asset($seller->avatar)}}" />
    <meta property="og:image"     content="{{asset($seller->avatar)}}"/>
    
    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection
@section('content')
	@include('pages.partials.header')
 
    <br><br><br><br><br>



	<div class="row" style="color: #fff;background-color: #ba4699;text-align: left;padding:100px;margin: auto; background-image: url({{asset($seller->shop_logo)}});    background-repeat: no-repeat;
	    background-position: center;
	    background-size: cover;
	    height: 400px;
	    ">
	    <div class=" col-md-6"  >
 
	    </div>

	</div>


        <div class="container container2">
            <div class="">

                <div class="row">

                    <div class="col-lg-4 col-md-12"  >
                        <br><br><br><br><br><br><br>
                        <div class="new4 row">
                            <div class="module col-lg-12 col-md-12"  >

                            	@if($seller->avatar)
 								<img   class="img_profile  margin_img radios_image lozad" data-src="{{asset($seller->avatar)}}" alt="{{$seller->full_name}}" title="{{$seller->full_name}}">
 								@else
 								<img class="img_profile  margin_img radios_image lozad" data-src="{{asset('asset_ar/img/17-06.jpg')}}">
 								@endif

                                
                                <img class="handy w50  margin_img radios_image" src="img/17-04.jpg" alt="">
                                
                                <br>
                               <div class="new4">
                                   <div class="module">    {{$seller->full_name}}</div>
                                </div> 
                                <br>
     
                                
                                <div class="new4">
                                	<?php       
                                	    $selected_talent = App\Models\Shop_talent::find($seller->talent);
                                	?> 
                                	<div class="module">  {{ $selected_talent->home_title }}  
                                	</div>                                
                                </div> 
                                <br> 
                                <div class="new4">
                                   <div class="module">  {{$seller->address}}   </div>
                                </div>  
                                <br> 
                                <div class="new4">
                                   <div class="module">  عدد مرات طلب الخدمة :  {{$poduct_buy}}     </div>
                                </div> 
                                <div class="module col-xs-12 star_rate"  >
                                <ul>
                                	<?php 
                                	$avg =  $seller->rating ;
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

                            </div> 
                        </div> 
                        <br>
                        @if(Auth::guard('seller')->user()   )
                            @if(Auth::guard('seller')->user()->id != $seller->id)
                            <div class="row">
                                <a href="{{asset('order_product/'.$seller->remember_token)}}">
                                    <button class="sub_b btn-primary btn-lg">اطلب الخدمة الان</button>
                                </a>
                            </div> 
                            @endif

                        @else
                        <div class="row">
                            <a href="{{asset('register-seller')}}">
                                <button title="يجب التسجيل اولا " class="sub_b btn-primary btn-lg">اطلب الخدمة الان</button>
                            </a>
                        </div> 
                        @endif


                    </div>  

                    <div class="col-lg-8 col-md-12"  >
                        <br><br><br><br>
                        <h2>  {!! $seller->shop_name !!}</h2>
                        <hr class='new4'>   
                        <p class="fild_title">نبذه عن المتجر</p> <br>

                        <div class="new4"  >
                             <p  class="module" >
                             {!! $seller->description !!}

                             </p>
                        </div>

                    </div>
                   

     



                </div> 


                <br>
                <br>
                        
                <div class="row " >
                    <div class="  col-xs-12" >
                        <h2>
                          الخدمات: 
                        </h2> 
                        <hr class='new4'>   
                    </div> 
                </div> 
                <br>

                <div class="row new4">
                    <div class="module col-lg-12 col-md-12 col-sm-12"  >
 
 
 
                             <div class="popular-course wow fadeInUp body-bg talent-home">
                        		<div class="container">
                                    <div class="row text-center">
                                        <div class="theme-slider course-item-wrapper" dir="ltr">
                        	@foreach($products as $val)
                        	@if($val->image_one || $val->youtube )
                        	<div class="item hvr-float-shadow" style="height: 450px">
                        	    <div class="img-holder  " >
                        	        <div class="col-sm-12"    >
                        	            <a href="#" data-toggle="modal" data-target="#myModal_{{$val->id}}">
                        	                @if($val->image_one || $val->youtube )
                        	                    @if($val->image_one )
                        	                        <img style="height: 300px" class="radios_image" src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}"> 
                        	                    @elseif($val->youtube)
                        	                        <?php 
                        	                          if(strlen($val->youtube) > 11)
                        	                          {
                        	                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                        	                          }
                        	                        ?>
                        	                        @if($match[1])
                        	                            <iframe class="" width="100%" height="300" src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                        	                        @endif 
                        	                    @endif
                        	                @else
                        	                <h2>صورة او فديو</h2>
                        	                <img class="  w30   radios_image" src="{{asset('asset_ar/img/21-08.png')}}" alt=""> 
                        	                @endif
                        	                
                        	             </a>
                        	        </div>
                        	        <a href="#" data-toggle="modal" data-target="#myModal_{{$val->id}}">
                        	            <div class="row">
                        	                <div class="  col-xs-12">
                        	                    <br> 
                        	                    <div class="txt_holder" style="text-align: center;">
                        	                             <p>
                        	                                <span style="
                        	                                    padding: 10px;
                        	                                    border: solid;
                        	                                    border-radius: 10px!important;
                        	                                    border-color: #0cb7e3
                        	                                    ">
                                                                <?php $seller_blade = App\Models\Seller::where('id',$val->seller_id)->first() ?>

                                                                {{$seller_blade->full_name}}</span>
                        	                            </p>
                        	                            <br>
                        	                        @if($val->home_title )
                        	                            <p>
                        	                                <span style="
                        	                                    padding: 10px;
                        	                                    border: solid;
                        	                                    border-radius: 10px!important;
                        	                                    border-color: #0cb7e3
                        	                                    ">   {{$val->home_title}}         </span>
                        	                            </p>
                        	                            <br>
                        	                        @endif
                        	                     </div>
                        	                </div>
                        	            </div>
                        	        </a>
                        	
                        	    </div>
                        	</div> <!-- /.item -->
                        	@endif
                        	@endforeach

                                        </div> <!-- /.course-slider -->
                                    </div> <!-- /.popular-course -->
                                </div>
                            </div>

 




                    </div>
                </div>

            </div>  
                        
        </div> 


    @foreach($products as $val)             
     <div id="myModal_{{$val->id}}" class="modal fade" role="dialog">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">
                     	<?php 
                     	$seller  = App\Models\Seller::where('id',$val->seller_id)->first();
                     	?>

                     	{{$seller->shop_name}}
                     </h4>
                 </div>
                 <div class="modal-body">
                     <div class="row " style="    text-align: center;">    
                         	<p>  عنوان الخدمة      :  {{$val->home_title}}</p>
                         	<br>
                         	<p>  وصف الخدمة     :  {!!  $val->home_subject  !!}</p>

                         
                        
                     </div>
                     <div class="modal-footer">
                     	<button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                     </div>
                 </div>

             </div>
         </div>
     </div> 
     @endforeach


    <script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('vendor.flashy.message')

@endsection

