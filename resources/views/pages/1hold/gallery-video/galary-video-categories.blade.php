@extends('layout')

@section('title')
<title>{{ $galary_video_details->page_title_ar}}</title>
@endsection
@section('meta')
<meta name="description" content="{{$galary_video_details->description}}">
<meta name="keywords" content="{{$galary_video_details->keywords}}">

     <meta property="og:title"  content="{{$galary_video_details->page_title_ar}}"/>
     <meta property="title"  content="{{$galary_video_details->page_title_ar}}"/>

<meta property="og:description" content="{{$galary_video_details->description}}"/>
<meta property="og:url"       content="{{asset('/projects-videos/'.$galary_video_details->url_ar)}}"/>
@endsection





@section('content')

<div class="pageContent">

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{asset('/')}}">الرئيسية</a>
            <i class="fa fa-long-arrow-left"></i><span>             فديوهات المشاريع</span>
        </div>
    </div>
    <!------------------------------------------------------------------------------------------------------------------------------------>


    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-md-3 md-padding lft-cell sidebar">
                <div class="sidebar-widgets">
                    <ul>
                        <li class="widget w-recent-posts">
                            <h4 class="widget-title"><span class="main-color">احدث   صور مشاريع التنمية</span><h4/>
                            <div class="widget-content">
                                <ul>
                                    @foreach($galary_video_category_latest as $val)
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
                                            <a href="{{asset('/projects-vedio-collection/'.$val->url_ar)}}">
                                                <img height="65" width="100%" src="{{asset($val->image)}}" alt="{{$val->image_alt_ar}}">
                                            </a>
                                        </div>
                                        <div class="widget-post-info">
                                            <h5><a href="{{asset('/projects-vedio-collection/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
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
                                    @foreach($galary_video_category_random as $val)
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
                                            <a href="{{asset('/projects-vedio-collection/'.$val->url_ar)}}">
                                                <img height="65" width="100%"  src="{{asset($val->image)}}" alt="{{$val->image_alt_ar}}">
                                            </a>
                                        </div>
                                        <div class="widget-post-info">
                                            <h5><a href="{{asset('/projects-vedio-collection/'.$val->url_ar)}}">{{$val->title_ar}}</a></h5>
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
                            <div class="blog-posts news grid gall">
                                <div class="row">
                                    @foreach($galary_video_category as $val)
                                    <?php
                                    $galary =  App\Models\Galary::orderBy('lft', 'asc')->where('galary_category_id',$val->id)->paginate(3);
                                    ?>

                                    <div class="col-md-6" style="height: 300px !important ; max-height: 300px !important ;min-height: 300px !important;" >
                                        <div class="post-item" style="height: 300px !important ; max-height: 300px !important ;min-height: 300px !important;" >
                                            <article class="post-content">
                                                <div class="post-image main-border bot-4-border">
                                                        <div class="">
                                                            <img width="300" height="250" src="{{asset($val->image)}}" alt="{{$val->image_title_ar_one}}">
                                                        </div>
                                                </div>
                                                <div class="post-item-rit">
                                                    <div class="post-info-container">
                                                        <div class="post-info">
                                                        <h5><a href="{{asset('/projects-vedio-collection/'.$val->url_ar)}}"> {{ str_limit($val->title_ar, 250) }}</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            @include('pages.default', ['paginator' => $galary_video_category])



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
