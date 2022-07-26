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
<meta property="og:url"       content="{{Request::url()}}"/>
<meta name="twitter:image" content="{{asset($single_item->image_one)}}" />


@endsection

@section('content')




<div id="Subheader">
        <div class="container">
            <div class="column one">
                <h1 class="title">{{$single_item->title1}}</h1>
            </div>
        </div>
    </div>
</div>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="post type-post format-standard has-post-thumbnail hentry category-single">
                  
                <div class="section section-post-header">
                    <div class="section_wrapper clearfix">
                        <div class="column one post-header">
                            
                            <div class="title_wrapper">
                                <h1 class="entry-title" itemprop="headline">{{$single_item->title1}}</h1>
                                <div class="post-meta clearfix">
                                    <div class="author-date">
                                        <span class="vcard author post-author">  <i class="icon-user"></i> <span class="fn"><a href="#">{{$single_item->publisher}}   </a></span> </span><span class="date"><i class="icon-clock"></i>
                                        <time class="entry-date" datetime="{{$single_item->created_at}}" itemprop="datePublished" pubdate>
                                            @include('pages.arabic.date', ['date' => $single_item->created_at])

                                        </time>
                                        </span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="column one single-photo-wrapper image">

                            <div class="image_frame scale-with-grid news">
                                <div class="image_wrapper">
                                    <a href="{{asset($single_item->image_one)}}" rel="prettyphoto">
                                        <div class="mask"></div>
                                        <img width="1200" height="480"  src="{{asset($single_item->image_one)}}" alt="{{$single_item->image_one_alt}}" title="{{$single_item->image_one_alt}}"  class="scale-with-grid wp-post-image" >
                                    </a>

                                </div>
                            </div>
                            @if($single_item->video)
                            <video style="width: 77.9%" class="jarallax-img   jquery-background-video" 
                            {{ ($single_item->controls == 1) ? 'controls' : '' }}
                            {{ ($single_item->autoplay == 1) ? 'autoplay' : '' }}
                            {{ ($single_item->sound == 1) ? 'muted' : '' }}
                            {{ ($single_item->loop == 1) ? 'loop' : '' }}
                                >
                             <source src="{{asset($single_item->video)}}" type="video/mp4">
                            </video>  
                            @endif
                        </div>
                    </div>
                </div>
                <div class="post-wrapper-content">
                    <div class="section mcb-section" style="padding-top:10px; padding-bottom:0px;">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one valign-top clearfix">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one-fifth column_placeholder">
                                        <div class="placeholder">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="column mcb-column three-fifth column_column">
                                        <div class="column_attr clearfix">
                                            <p class="big">
                                              {!! $single_item->subject1 !!}


                                            </p>

                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection





