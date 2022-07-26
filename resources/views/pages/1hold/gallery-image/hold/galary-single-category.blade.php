@extends('layout')

@section('title')
<title>{{ $galary_single_category->page_title_ar}}</title>
@endsection
@section('meta')
<meta name="description" content="{{$galary_single_category->description}}">
<meta name="keywords" content="{{$galary_single_category->keywords}}">

     <meta property="og:title"  content="{{$galary_single_category->page_title_ar}}"/>
     <meta property="title"  content="{{$galary_single_category->page_title_ar}}"/>

<meta property="og:description" content="{{$galary_single_category->description}}"/>
<meta property="og:url"       content="{{asset('/projects/'.$galary_single_category->url_ar)}}"/>
@endsection





@section('content')

<div class="pageContent">

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{asset('/')}}">الرئيسية</a>
            <i class="fa fa-long-arrow-left"></i><span>صور مشاريع التنمية</span>
            <i class="fa fa-long-arrow-left"></i><span> {{$galary_single_category->title_ar}}  </span>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------------------------>


    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-3 md-padding lft-cell sidebar">
                <div class="sidebar-widgets">
                    <ul>
                        <li class="widget w-recent-posts">
                            <h4 class="widget-title"><span class="main-color">احدث    صور مشاريع التنمية</span><h4/>
                            <div class="widget-content">
                                <ul>
                                    @foreach($galary_category_latest as $val)
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
                                            <a href="{{asset('/projects-collection/'.$val->url_ar)}}">
                                                <img height="65" width="100%" src="{{asset($val->image_one)}}" alt="{{$val->image_title_ar_one}}">
                                            </a>
                                        </div>
                                        <div class="widget-post-info">
                                            <h5><a href="{{asset('/projects-collection/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
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
                            <h4 class="widget-title"><span class="main-color">اهم  صور مشاريع التنمية</span></h4>
                            <div class="widget-content">
                                <ul>
                                    @foreach($galary_category_random as $val)
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
                                            <a href="{{asset('/projects-collection/'.$val->url_ar)}}">
                                                <img height="65" width="100%"  src="{{asset($val->image_one)}}" alt="{{$val->image_title_ar_one}}">
                                            </a>
                                        </div>
                                        <div class="widget-post-info">
                                            <h5><a href="{{asset('/projects-collection/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
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
                        <div class="col-md-12">
                            <style type="text/css">
                               .lg-slider-cam.camera_wrap img {
                                   width: 80px;
                                   height: 80px;
                                   } 
                            </style>


                            <h3> {{$galary_single_category->title_ar}}  </h3>

                            <div class="camera_wrap camera-slider lg-slider-cam" data-hide-pagination data-hide-play-pause data-height="500px" data-fx="simpleFade">
                                @if($galary_single_category->image_one)
                                    <div data-height="550" style="height: 550px" data-thumb="{{asset($galary_single_category->image_one)}}" data-src="{{asset($galary_single_category->image_one)}}">
                                        <div class="camera_caption fadeFromBottom">
                                        {{$galary_single_category->image_title_ar_one}}
                                        </div>
                                    </div>
                                @endif

                                @if($galary_single_category->image_two)
                                <div data-thumb="{{asset($galary_single_category->image_two)}}" data-src="{{asset($galary_single_category->image_two)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_two}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_three)
                                <div data-thumb="{{asset($galary_single_category->image_three)}}" data-src="{{asset($galary_single_category->image_three)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_three}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_four)
                                <div data-thumb="{{asset($galary_single_category->image_four)}}" data-src="{{asset($galary_single_category->image_four)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_four}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_five)
                                <div data-thumb="{{asset($galary_single_category->image_five)}}" data-src="{{asset($galary_single_category->image_five)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_five}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_six)
                                <div data-thumb="{{asset($galary_single_category->image_six)}}" data-src="{{asset($galary_single_category->image_six)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_six}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_seven)
                                <div data-thumb="{{asset($galary_single_category->image_seven)}}" data-src="{{asset($galary_single_category->image_seven)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_seven}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_eight)
                                <div data-thumb="{{asset($galary_single_category->image_eight)}}" data-src="{{asset($galary_single_category->image_eight)}}">
                                    <div class="camera_caption fadeFromBottom">
                                        {{$galary_single_category->image_title_ar_eight}}
                                    </div>
                                </div>
                                @endif

                                @if($galary_single_category->image_nine)

                                <div data-thumb="{{asset($galary_single_category->image_nine)}}" data-src="{{asset($galary_single_category->image_nine)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_nine}}
                                    </div>
                                </div>
                                @endif
                                
                                @if($galary_single_category->image_ten)
                                <div    data-thumb="{{asset($galary_single_category->image_ten)}}" data-src="{{asset($galary_single_category->image_ten)}}">
                                    <div class="camera_caption fadeFromBottom">
                                    {{$galary_single_category->image_title_ar_ten}}
                                    </div>
                                </div>
                                @endif

                            </div>
                            <br>
                            <div class="row" >
                                <h2>{{$galary_single_category->title_ar}}</h2>
                                <p>{!! $galary_single_category->subject_ar !!}</p>
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
@endsection
