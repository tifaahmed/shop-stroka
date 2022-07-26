@extends('layout')

@section('title')

<title>{{ $victim_single_item->page_title_ar}}</title>
@endsection
@section('meta')
<meta name="description" content="{{$victim_single_item->description_ar}}">
<meta name="keywords" content="{{$victim_single_item->keywords_ar}}">

     <meta property="og:title"  content="{{$victim_single_item->title_ar}}"/>
     <meta property="title"  content="{{$victim_single_item->title_ar}}"/>


<meta property="og:description" content="{{$victim_single_item->description_ar}}"/>
<meta property="og:url"       content="{{asset('/single-victim/'.$victim_single_item->url_ar)}}"/>
<meta property="og:image"     content="{{asset($victim_single_item->image)}}"/>

@endsection

@section('content')

<div class="pageContent">
               
    <div class="breadcrumbs">
        <div class="container">
            <a href="index.php">الرئيسية</a><i class="fa fa-long-arrow-left"></i><span>المركز الاعلامى</span><i class="fa fa-long-arrow-left"></i><span>المقالات</span>
        </div>
    </div>
            
                



	<div class="container-fluid">
		<div class="row row-eq-height">
			
			<div class="col-md-3 md-padding lft-cell sidebar">
				<div class="sidebar-widgets">
					<ul>
						
						<li class="widget w-recent-posts">
							<h4 class="widget-title"><span class="main-color">احدث  المستجدات {{$victim_category->home_title_ar}}</span></h4>
							<div class="widget-content">
								<ul>
									@foreach($victim_latest as $val)
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
									<li>
										<div class="post-img">
											<a href="{{asset('/single-victim/'.$val->url_ar)}}">
												<img height="80px" style="width: 100px !important" src="{{asset($val->image)}}" alt="{{$val->image_alt_ar}}">
											</a>
										</div>
										<div class="widget-post-info">
											<h5><a href="{{asset('/single-victim/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
											<div class="meta">
												<span style="font-size: 14px"><i class="fa fa-clock-o"></i>{{$ar_month }} {{$d_date }} , {{$y_date }}</span>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</li>

						
					</ul>
				</div>
					
				</div>

				<div class="col-md-6 md-padding main-content">
				      <div class="container-fluid">
            <div class="row row-eq-height">
                <div class="col-md-12 main-content">

                    <div class="blog-single">
                        
                        <div class="post-item">
                            
                            <div class="details-img">
                                <img src="{{asset($victim_single_item->image)}}" alt="{{$victim_single_item->image_alt_ar}}">
                            </div>
                            
                            <article class="post-content">
                                
                                <div class="post-info-container">
                                    <div class="post-info">
                                        <ul class="post-meta">
                                            
                                            <li class="meta-user"><i class="fa fa-user"></i>  {{$victim_single_item->title_ar}}</li>
                                            <?php 
                                                $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                                $your_date = $victim_single_item->created_at->format('y-m-d'); // The Current Date
                                                $en_month = $victim_single_item->created_at->format("M", strtotime($your_date)) ;
                                                foreach ($months as $en => $ar) {
                                                    if ($en == $en_month) { $ar_month = $ar; }
                                                }

                                                $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
                                                $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                                                $ar_day_format = $victim_single_item->created_at->format('D'); // The Current Day
                                                $ar_day = str_replace($find, $replace, $ar_day_format);

                                                header('Content-Type: text/html; charset=utf-8');
                                                $standard = array("0","1","2","3","4","5","6","7","8","9");
                                                $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
                                                $y_date =$victim_single_item->created_at->format('Y');
                                                $d_date =$victim_single_item->created_at->format('d');
                                                // $y_date = str_replace($standard , $eastern_arabic_symbols , $y_date);
                                                // $d_date = str_replace($standard , $eastern_arabic_symbols , $d_date);
                                            ?>
                                            <li class="meta_date"><i class="fa fa-clock-o"></i>{{$d_date }} {{ $ar_month }}  {{ $y_date }} </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <p>
                                  {!!  $victim_single_item->subject_ar !!}
                                </p>
                                
                            </article>
                        </div>
                    </div>
                </div>
                
                              </div>
                               </div>
	    				</div>

	    				<div class="col-md-3 md-padding sidebar">
	    					<div class="sidebar-widgets">
					<ul>
						<li class="widget">
							<h4 class="widget-title"><span class="main-color">تابعنا على الفيسبوك</span></h4>
							<div class="widget-content">
							   <div class="fbContainer">
				                    <div class="fb-like-box fb_iframe_widget" style="width:100%">

				                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faljabhaalshabya%2F&tabs=timeline&width=310&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
				                        width="450" height="350" style="border:none;overflow:hidden;width:100%" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				                    </div>
			                    </div>
							</div>
						</li>
						<li class="widget">
							<h4 class="widget-title"><span class="main-color">تابعنا على تويتر</span></h4>
							<div class="widget-content">
									   <a class="twitter-timeline" href="https://twitter.com/jabhaalshaabiya" height="380">Tweets by aljabha alshaabiya</a>
			                	<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			                	<script>!function (d, s, id) {
			                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
			                        if (!d.getElementById(id)) {
			                            js = d.createElement(s);
			                            js.id = id;
			                            js.src = p + "://platform.twitter.com/widgets.js";
			                            fjs.parentNode.insertBefore(js, fjs);
			                        }
			                    }(document, "script", "twitter-wjs");</script>
						    </div>
							
						</li>
					</ul>
				</div>
					
			</div>
				
		</div>
    </div>
</div>


@endsection