@extends('layout')

@section('title')

<title>{{ $visual_library_single_item->tab_title_ar}}</title>
@endsection
@section('meta')
<meta name="description" content="{{$visual_library_single_item->description_ar}}">
<meta name="keywords" content="{{$visual_library_single_item->keywords_ar}}">

     <meta property="og:title"  content="{{$visual_library_single_item->page_title_ar}}"/>
     <meta property="title"  content="{{$visual_library_single_item->page_title_ar}}"/>


<meta property="og:description" content="{{$visual_library_single_item->description_ar}}"/>
 

<meta property="og:image"     content="{{asset($visual_library_single_item->image)}}"/>


@endsection

@section('content')
<div class="pageContent">
       
    <div class="breadcrumbs">
        <div class="container">
            <a href="{{asset('/')}}">الرئيسية</a><i class="fa fa-long-arrow-left"></i>
            <a href="{{asset('/كافة-النشاطات-الاجتماعية')}}">   نشاطات اجتماعية  </a><i class="fa fa-long-arrow-left"></i>
            <span>{{$visual_library_single_item->page_title_ar}}</span>
        </div>
    </div>
    
           
	<div class="container-fluid">
		<div class="row row-eq-height">
			@include('pages.partials.side1', ['items_one' => $visual_library_latest ,'items_two' => $Visual_library_random , 'name' => 'الدراسات تاريخية' , 'url'=>'نشاطات-اجتماعية'])

			<div class="col-md-6 md-padding main-content">
		        <div class="container-fluid">
                    <div class="row row-eq-height">
                        <div class="col-md-12 main-content">

                            <div class="blog-single">
                                
                                <div class="post-item">
                                    <h3><i class="fa fa-book post-icon main-color"></i>  {{$visual_library_single_item->title_ar}}</h3>
                                    <div class="details-img">
                                        <img src="{{asset($visual_library_single_item->image)}}" alt="{{$visual_library_single_item->image_alt_ar}}" title="{{$visual_library_single_item->image_alt_ar}}">
                                    </div>
                                    
                                    <article class="post-content">
                                    	<?php 
                                    	    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                    	    $your_date = $visual_library_single_item->created_at->format('y-m-d'); // The Current Date
                                    	    $en_month = $visual_library_single_item->created_at->format("M", strtotime($your_date)) ;
                                    	    foreach ($months as $en => $ar) {
                                    	        if ($en == $en_month) { $ar_month = $ar; }
                                    	    }

                                    	    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
                                    	    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                                    	    $ar_day_format = $visual_library_single_item->created_at->format('D'); // The Current Day
                                    	    $ar_day = str_replace($find, $replace, $ar_day_format);

                                    	    header('Content-Type: text/html; charset=utf-8');
                                    	    $standard = array("0","1","2","3","4","5","6","7","8","9");
                                    	    $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
                                    	    $y_date =$visual_library_single_item->created_at->format('Y');
                                    	    $d_date =$visual_library_single_item->created_at->format('d');
                                    	    // $y_date = str_replace($standard , $eastern_arabic_symbols , $y_date);
                                    	    // $d_date = str_replace($standard , $eastern_arabic_symbols , $d_date);
                                    	?>
                                        <h4> {{$visual_library_single_item->title_ar}}    </h4>
                                        <div class="post-info-container">
                                            <div class="post-info">
                                                <ul class="post-meta">
                                                    <li class="meta_date"><i class="fa fa-clock-o"></i>{{$d_date }} {{ $ar_month }}  {{ $y_date }} </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        {!! $visual_library_single_item->subject_ar!!}                                        
                                    </article>
                                </div>
                            </div>

                        </div>
                
                    </div>
               </div>
			</div>

			@include('pages.partials.side2')
				
		</div>
    </div>
</div>
 

@endsection

