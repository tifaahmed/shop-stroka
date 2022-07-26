@extends('layout')

@section('title')
<title>{{$title}}</title>

@endsection


@section('content')  

<div class="pageContent">   
  <div class="breadcrumbs">
        <div class="container">
            <a href="#">الرئيسية</a><i class="fa fa-long-arrow-left main-color"></i><a href="#">المكتبة المرئية</a><i class="fa fa-long-arrow-left main-color"></i><span>اعمال فنية</span>
        </div>
    </div>

    <div class="md-padding">
        <div class="container">
            <div class="row row-eq-height">
                <div class="col-md-12  main-content">
<!-- blog  blog  blog  blog   -->
                    <h3 class="main-color">المركز الاعلامى</h3>
                    <blockquote>
                    @if($blog_order->count() > 0) 

                        <div class=" no-padding main-content">
                            <div class="  ">
                                <div class=" row-eq-height">
                                    <div class=" ">
                                        <div class="blog-posts news grid gall">
                                            <div class="row">
                                            @foreach($blog_order as $val)
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
                                        <div class="col-md-3">
                                            <div class="post-item">
                                                <article class="post-content">
                                                    <div class="main-border bot-4-border">
                                                        <a href="{{asset('/نشاطات-اجتماعية/'.$val->url_ar)}}">
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
                                                        <p>{{ str_limit($val->home_subject_ar, 100) }} <a class="more_btn main-color" href="{{asset('/نشاطات-اجتماعية/'.$val->url_ar)}}">... اقرا المزيد</a></p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                            @endforeach
                                        
                                    </div>

                                @include('pages.default', ['paginator' => $blog_order])


                                </div>

                             </div>
                        </div>
                    </div>
                    </div> 
                    @endif    
                    </blockquote>
<!-- blog  blog  blog  blog   -->

                    <hr>
<!-- electronic_library  electronic_library  electronic_library  electronic_library   -->
                    <h3 class="main-color">   انساب</h3>
                    <blockquote>

                    @if($electronic_library_order->count() > 0) 

                        <div class="  no-padding main-content">
                            <div class="container-fluid">
                                <div class=" ">
                                    <div class="">
                                        <div class="blog-posts news grid gall">
                                            <div class="row">
                                            @foreach($electronic_library_order as $val)
                                                <div class="col-md-3">
                                                    <div class="post-item">
                                                        <article class="post-content">
                                                            <div class="main-border bot-4-border">
                                                                <a  href="{{asset('/انساب/'.$val->url_ar)}}">
                                                                    <img src="{{asset($val->image)}}" alt="{{ $val->image_alt_ar}}" title="{{ $val->image_alt_ar}}">
                                                                </a>
                                                            </div>
                                                             <div class="post-item-rit">
                                                            <div class="post-info-container">
                                                                <div class="post-info">
                                                                <h4><a href="{{asset('/انساب/'.$val->url_ar)}}">{{$val->home_title_ar}}</a></h4>
                                                                </div>
                                                            </div>
                                                            </div>
                                                           
                                                        </article>
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                            <div class="clearfix"></div>
                                            @include('pages.default', ['paginator' => $electronic_library_order])

                                        </div>
                                    </div>  
                                </div>  
                            </div>  
                        </div>  
                    @endif                   
                    </blockquote>
<!-- electronic_library  electronic_library  electronic_library  electronic_library   -->

                    <hr>
                    <h3 class="main-color"> نشاطات اجتماعية</h3>
                    <blockquote>
                    @if($visual_library_order->count() > 0)
                    <div class=" no-padding main-content">
                        <div class="  ">
                            <div class=" row-eq-height">
                                <div class=" ">
                                    <div class="blog-posts news grid gall">
                                        <div class="row">
                                @foreach($visual_library_order as $val)
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
                                        <div class="col-md-3">
                                            <div class="post-item">
                                                <article class="post-content">
                                                    <div class="main-border bot-4-border">
                                                        <a href="{{asset('/نشاطات-اجتماعية/'.$val->url_ar)}}">
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
                                                        <p>{{ str_limit($val->home_subject_ar, 100) }} <a class="more_btn main-color" href="{{asset('/نشاطات-اجتماعية/'.$val->url_ar)}}">... اقرا المزيد</a></p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="clearfix"></div>
                                @include('pages.default', ['paginator' => $visual_library_order])
                                        </div>

                                     </div>
                                </div>
                            </div>
                            </div>  
                    @endif                       
                    </blockquote>
                    
                    <hr>
                    <h3 class="main-color">   دراسات تاريخية </h3>
                    <blockquote>
                    @if($cultural_library_order->count() > 0)
    
                    <div class=" no-padding main-content">
                        <div class="  ">
                            <div class=" row-eq-height">
                                <div class=" ">
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
                                        <div class="col-md-3">
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
                                                        <p>{{ str_limit($val->home_subject_ar, 100) }} <a class="more_btn main-color" href="{{asset('/دراسات-تاريخية/'.$val->url_ar)}}">... اقرا المزيد</a></p>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                            @endforeach
                            </div>
                            <div class="clearfix"></div>

                            @include('pages.default', ['paginator' => $cultural_library_order])
                                                            </div>

                                     </div>
                                </div>
                            </div>
                            </div> 
                    @endif                       
                    </blockquote>
                    
                    <hr>

 
                   




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
