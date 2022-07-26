@extends('layout')

@section('title')
<title> دراسات تاريخية   </title>
@endsection

@section('meta')
    <meta name="description" content="  دراسات تاريخية    ">
    <meta name="keywords" content=" دراسات تاريخية  ">

         <meta property="og:title"  content=" دراسات تاريخية  "/>
         <meta property="title"  content=" دراسات تاريخية  "/>


    <meta property="og:description" content="عناصر   دراسات تاريخية  "/>
@endsection

@section('content')
<div class="pageContent">
	                
	<div class="breadcrumbs">
	    <div class="container">
	         <a href="{{asset('/')}}">الرئيسية</a><i class="fa fa-long-arrow-left"></i><span>    دراسات تاريخية  </span>
	    </div>
	</div>

	<div>
		<div class="container-fluid">
			<div class="row row-eq-height">
				
				@include('pages.partials.side1', ['items_one' => $cultural_library_latest ,'items_two' => $cultural_library_random , 'name' => 'الدراسات تاريخية'  , 'url'=>'دراسات-تاريخية'])

				<div class="col-md-6 md-padding main-content">
			      	<div class="container-fluid">
	                    <div class="row row-eq-height">
	                        <div class="col-md-12">
	                          	<div class="blog-posts news grid gall">
	                            	<div class="row">
	                            		@foreach($cultural_library_order as $val)
	                            		<?php 
	                            		    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
	                            		    $your_date = $val->created_at->format('y-m-d'); // The Current Date
	                            		    $en_month = $val->created_at->format("M", strtotime($your_date)) ;
	                            		    foreach ($months as $en => $ar) {
	                            		        if ($en == $en_month) { $ar_month = $ar; }
	                            		    }

	                            		    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
	                            		    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
	                            		    $ar_day_format = $val->created_at->format('D'); // The Current Day
	                            		    $ar_day = str_replace($find, $replace, $ar_day_format);

	                            		    header('Content-Type: text/html; charset=utf-8');
	                            		    $standard = array("0","1","2","3","4","5","6","7","8","9");
	                            		    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
	                            		    $y_date =$val->created_at->format('Y');
	                            		    $d_date =$val->created_at->format('d');
	                            		    // $y_date = str_replace($standard , $eastern_arabic_symbols , $y_date);
	                            		    // $d_date = str_replace($standard , $eastern_arabic_symbols , $d_date);
	                            		?>
										<div class="col-md-6">
		                                 	<div class="post-item">
			                                    <article class="post-content">
			                                        <div class="main-border bot-4-border">
			                                            <a href="{{asset('/دراسات-تاريخية/'.$val->url_ar)}}">
			                                                <img src="{{asset($val->image)}}" alt="{{ $val->image_alt_ar}}" title="{{ $val->image_alt_ar}}">
			                                            </a>
			                                        </div>
			                                        <h4>{{$val->home_title_ar}}</h4>
			                                        <div class="post-item-rit">
			                                            <div class="post-info-container">
			                                                <div class="post-info">
			                                                    <ul class="post-meta">

			                                                        <li class="meta_date"><i class="fa fa-clock-o"></i>{{ $d_date}}   {{$ar_month }}    {{$y_date}}</li>
			                                                        <li class="meta_date"><i class="fa fa-eye"></i>{{$val->count}}</li>
			                                                    </ul>
			                                                </div>
			                                            </div>
			                                            <p>{{ str_limit($val->home_subject_ar, 150) }}<a class="more_btn main-color" href="{{asset('/دراسات-تاريخية/'.$val->url_ar)}}">اقرا المزيد</a></p>
			                                        </div>
			                                    </article>
			                                </div>
		                                </div>
			                            @endforeach
	                           		</div>
	                            </div>
	                            @include('pages.default', ['paginator' => $cultural_library_order])
	                        </div>
	                    </div>
	    			</div>
				</div>
				@include('pages.partials.side2')
	         </div>
		</div>
	</div>
</div>
@endsection