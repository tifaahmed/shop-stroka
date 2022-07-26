@extends('layout')

@section('title')

<title>{{ $single_item->tab_title}}</title>
@endsection
@section('meta')
<meta name="keywords" content="{{$single_item->keywords}}">

<meta property="og:title"  content="{{$single_item->page_title}}"/>
<meta property="title"  content="{{$single_item->page_title}}"/>
<meta name="twitter:title" content="{{$single_item->page_title}}" />


<meta property="og:description" content="{{$single_item->description}}"/>
<meta name="twitter:description" content="{{$single_item->description}}" />
<meta name="description" content="{{$single_item->description}}">


<meta property="og:image"     content="{{asset($single_item->image_one)}}"/>
<meta property="og:image:alt"     content="{{asset($single_item->image_one_alt)}}"/>
<meta property="og:url"       content="{{Request::url()}}"/>
<meta name="twitter:image" content="{{asset($single_item->image_one)}}" />


@endsection

@section('content')





        <!-- Banner Area -->
        <div class="cleaning-mini-banner">
            <div class="d-table">
                <div class="d-tablecell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> {{$single_item->title1}}</h2>
                            </div>
                            <div class="col-md-8">
                                <div class="cleaning-breadcumb">
                                   <a href="{{asset('/')}}">{{trans('static.Home')}}</a> / {{$details->page_title}} / {{$single_item->title1}}
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Banner Area -->
        
        <!-- Start Main Content Area -->
        <section class="cleaning-content-block gray-bg">
            <div class="container">
                <div class="row">
                    <!-- Blog Main-content area -->
                    <div class="col-lg-12 col-md-12">
                        <div class="post-details-area">

                            <style type="text/css">
                                iframe{
                                    width: 100%;
                                    height:500px;
                                }
                            </style>

                            <div class="blog-slides">
                                @foreach($single_item->multiple_images as $subject)
                                    <div class="single-blog-slide">
                                        <a class="lightbox-gallery" href="{{asset('/uploads/'.$subject)}}"><img src="{{asset('/uploads/'.$subject)}}" alt="Image"></a>
                                    </div>
                                @endforeach


                            </div>

                            <br>

                            @if($single_item->youtube)
                                {!! $single_item->youtube !!}
                                <br>
                            @endif
                            @if($single_item->youtube)
                                {!! $single_item->facebook !!}
                                <br>
                            @endif
 
                            @if($single_item->pdf)
                                <object class="col-xs-12 pdf-lib"  data="oMcy93LKVoufWm5ecVHd.pdf" type="application/pdf">
                                    <embed  height="600" width="100%" src="http://localhost/itqan\ccsp2\demo\canabi_template/getting.pdf" type="application/pdf" />
                                </object>
                                 to download the file  
                                <a href="{{asset($single_item->pdf)}}">
                                    click here
                                </a>
                            @endif
                                                
                            
                            <div class="post-description">
                                <h2>{{$single_item->title1}}</h2>

                                {!! $single_item->subject1 !!}
                            </div>
                        </div> 
                    </div>
                    <!-- End Blog Main-content area -->
                    
                </div>
            </div>
        </section>
        <!-- End Main Content Area -->
        









@endsection

