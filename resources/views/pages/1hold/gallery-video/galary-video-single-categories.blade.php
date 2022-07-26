@extends('layout')

@section('title')
<title>{{ $galary_video_single_category->title_ar}}</title>
@endsection

@section('meta')
    <meta name="description" content="{{$galary_video_single_category->description_ar}}">
    <meta name="keywords" content="{{$galary_video_single_category->keywords_ar}}">

         <meta property="og:title"  content="{{$galary_video_single_category->title_ar}}"/>
         <meta property="title"  content="{{$galary_video_single_category->title_ar}}"/>


    <meta property="og:description" content="{{$galary_video_single_category->description_ar}}"/>
    <meta property="og:url"       content="{{asset('/visual-collection/'.$galary_video_single_category->url_ar)}}"/>

@endsection

@section('content')
    

<div class="pageContent">


	<div class="breadcrumbs">
	    <div class="container">
	        <a href="{{asset('/')}}">الرئيسية</a>
	        <i class="fa fa-long-arrow-left"></i><span>       فديوهات المشاريع</span>
	        <i class="fa fa-long-arrow-left"></i><span>{{$galary_video_single_category->title_ar}}</span>
	    </div>
	</div>
	<!------------------------------------------------------------------------------------------------------------------------------------>

	<div>
		<div class="container-fluid">
			<div class="row row-eq-height">
				<div class="col-md-3 md-padding lft-cell sidebar">
					<div class="sidebar-widgets">
						<ul>
							<li class="widget w-recent-posts">
								<h4 class="widget-title"><span class="main-color">احدث   صور مشاريع التنمية</span><h4/>
								<div class="widget-content">
									<ul>
										@foreach($galary_video_single_category_latest as $val)
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
												<a href="{{asset('/single-visual-book/'.$val->url_ar)}}"><img src="{{asset($val->image)}}" alt="{{$val->image_alt_ar}}"></a>
											</div>
											<div class="widget-post-info">
												<h5><a href="{{asset('/single-visual-book/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
												<div class="meta">
													<span style="font-size: 14px"><i class="fa fa-clock-o"></i>{{$ar_month }} {{$d_date }} , {{$y_date }}</span>
												</div>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
							</li>
							
							<li class="widget  w-recent-posts">
								<h4 class="widget-title"><span class="main-color">اهم   صور  مشاريع التنمية</span></h4>
								<div class="widget-content">
									<ul>
										@foreach($galary_video_single_category_latest as $val)
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
												<a href="{{asset('/single-visual-book/'.$val->url_ar)}}"><img src="{{asset($val->image)}}" alt="{{$val->image_alt_ar}}"></a>
											</div>
											<div class="widget-post-info">
												<h5><a href="{{asset('/single-visual-book/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
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
							<style type="text/css">
							    h1 {
							        font-family: Arial, Helvetica, sans-serif !important;
							    }
							    p span{  font-family: Arial, Helvetica, sans-serif !important;}
							</style>
					        <div class="container-fluid">
				                <div class="row row-eq-height">
				                    <div class="col-md-12 ">
				                        <div class="blog-single">
				                            <h2><i class="fa fa-pencil post-icon main-color"></i>{{$galary_video_single_category->title_ar}}
				                            	

				                            </h2>
				                            <div class="post-item">
				                        <?php 
				                            $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
				                            $your_date = $galary_video_single_category->created_at->format('y-m-d'); // The Current Date
				                            $en_month = $galary_video_single_category->created_at->format("M", strtotime($your_date)) ;
				                            foreach ($months as $en => $ar) {
				                                if ($en == $en_month) { $ar_month = $ar; }
				                            }

				                            $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
				                            $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
				                            $ar_day_format = $galary_video_single_category->created_at->format('D'); // The Current Day
				                            $ar_day = str_replace($find, $replace, $ar_day_format);

				                            header('Content-Type: text/html; charset=utf-8');
				                            $standard = array("0","1","2","3","4","5","6","7","8","9");
				                            $eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
				                            $y_date =$galary_video_single_category->created_at->format('Y');
				                            $d_date =$galary_video_single_category->created_at->format('d');
				                            // $y_date = str_replace($standard , $eastern_arabic_symbols , $y_date);
				                            // $d_date = str_replace($standard , $eastern_arabic_symbols , $d_date);
				                        ?>
					                    <?php 
					                    if ($galary_video_single_category->youtube_video) {
					                    	foreach(json_decode($galary_video_single_category->youtube_video) as $key=>$subject){
					                             if($key == 'url'){
					                               $subject;
					                             }
					                         }
					                        $embed = Embed::make($subject)->parseUrl();
					                        if ($embed) {
					                         $embed->setAttribute(['width' => 600]);
					                         echo $embed->getHtml();
					                        }
					                    }
					                    ?>
					                    @if($galary_video_single_category->face_video)
					                    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

					                    <!-- Your embedded video player code -->
					                    <div  style="width: 100%;" class="fb-video" data-href="{{$galary_video_single_category->face_video}}"  data-show-text="false">
					                      <div class="fb-xfbml-parse-ignore">
					                        <blockquote  style="width: 100%;" cite="{{$galary_video_single_category->face_video}}">
					                          <a href="{{$galary_video_single_category->face_video}}">للمشاركة</a>
					                        </blockquote>
					                      </div>
					                    </div>  
					                    @endif    
				                            <article class="post-content" style="width: 100%;">
				                                <div class="post-info-container" style="">
				                                    <div class="post-info post-lib">
				                                        <ul class="post-meta">
				                                        	<li class="meta_date" style="width: 100% ">
				                                        		<div style="font-size: 18px;float: right; width: 80%" >
				                                                	<i class="fa fa-clock-o"></i>{{ $d_date }} {{ $ar_month }},  {{$y_date}}
				                                                </div>	
				                                            	<div style="font-size: 25px;float: left; width: 20%;left: 10px" >
				                                            	<a style="color: #4267b2" target="blanck" href="https://www.facebook.com/sharer/sharer.php?u={{asset('/projects-vedio-collection/'.$galary_video_single_category->url_ar)}}" class="social-button " id=""><span class="fa fa-facebook-official"></span></a>

				                                            	<a style="color: #00acee "  target="blanck" href="https://twitter.com/intent/tweet?text={{$galary_video_single_category->title_ar}}&amp;url={{asset('/projects-vedio-collection/'.$galary_video_single_category->url_ar)}}" class="social-button " id=""><span class="fa fa-twitter"></span></a>
				                                            	
				                                            	<a style="color: #4FCE5D"  target="blanck" href="https://wa.me/?text={{asset('/projects-vedio-collection/'.$galary_video_single_category->url_ar)}}" class="social-button " id=""><span class="fa fa-whatsapp"></span></a>
				                                                </div>	
				                                            </li>
				                                        </ul>
				                                    </div>
				                                
				      
				                               
				                                </div>

				                                <h1>{{$galary_video_single_category->title_ar}}</h1>
				                                <p style="font-size: 14px!important">{!! $galary_video_single_category->subject_ar  !!}
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
										<div class="fb-like-box fb_iframe_widget">

											<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faljabhaalshabya%2F&tabs=timeline&width=310&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

										</div>

									</div>
								</div>
							</li>
							<li class="widget">
								<h4 class="widget-title"><span class="main-color">تابعنا على تويتر</span></h4>
								<div class="widget-content">
									<a class="twitter-timeline" href="https://twitter.com/jabhaalshaabiya" height="380">Tweets by aljabha alshaabiya</a>
						            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
						            <script>
						            	!function (d, s, id) {
						                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
						                    if (!d.getElementById(id)) {
						                        js = d.createElement(s);
						                        js.id = id;
						                        js.src = p + "://platform.twitter.com/widgets.js";
						                        fjs.parentNode.insertBefore(js, fjs);
						                    }
						                }(document, "script", "twitter-wjs");
						            </script>
							    </div>
							</li> 
						</ul>	   
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!------------------------------------------------------------------------------------------------------------------------------------->


<!-- Content start -->

@endsection
