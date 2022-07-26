@extends('layout')

@section('title')
<title>{{$details->tab_title}} </title>
@endsection

@section('meta')

  <meta name="keywords" content="{{$details->keywords}}">

  <meta property="title"  content="{{$details->page_title}}"/>
  <meta property="og:title"  content="{{$details->page_title}}"/>
  <meta name="twitter:title" content="{{$details->page_title}}" />

  <meta name="description" content="{{$details->description}}">
  <meta property="og:description" content="{{$details->description}}"/>
  <meta name="twitter:description" content="{{$details->description}}" />

  <meta property="og:url"       content="{{url()->full()}}"/>
  <meta name="twitter:image" content="{{asset($details->home_image_one)}}" />
  <meta property="og:image"     content="{{asset($details->home_image_one)}}"/>
@endsection

@section('content')

<div id="Subheader">
    <div class="container">
        <div class="column one">
            <h1 class="title">{{trans('static.most impotrant news')}}</h1>
        </div>
    </div>
</div>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="entry-content">
                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px;">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one valign-top clearfix">
                            <div class="mcb-wrap-inner">

                                                              
                                @include('pages.submet.search', ['action_autocomplete' => 'blog_search_autocomplete' , 'field'=> 'home_title' ,'filter'=> 'blog'  ])


                                <div class="column mcb-column one column_blog ">
                                    <div class="column_filters">
                                        <div class="blog_wrapper isotope_wrapper clearfix">
                                            <div class="posts_group lm_wrapper col-3 classic">


                                              @foreach($items as $key => $val)

                                                <div class="post-item isotope-item clearfix post type-post format-standard has-post-thumbnail hentry category-classic tag-themeforest">
                                                    <div class="date_label">
                                                         @include('pages.arabic.date', ['date' => $val->created_at])
                                                    </div>
                                                    <div class="image_frame post-photo-wrapper scale-with-grid image">
                                                        <div class="image_wrapper">
                                                            <a href="{{asset('/blog/'.$val->url)}}">
                                                                <div class="mask"></div>
                                                                <img width="960" height="750" src="{{asset( $val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}" class="scale-with-grid wp-post-image" >
                                                            </a>
                                                            <div class="image_links double">
                                                                <a href="{{asset( $val->image_one)}}" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="{{asset('/blog/'.$val->url)}}" class="link"><i class="icon-link"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-desc-wrapper">
                                                        <div class="post-desc">
                                                            <div class="post-head">
                                                                <div class="post-meta clearfix">
                                                                    <div class="author-date">
                                                                        <span class="vcard author post-author">
                                                                          <i class="icon-user"></i> 
                                                                          <span class="fn"> 
                                                                            {{$val->publisher}} 
                                                                          </span>
                                                                        </span>
                                                                        <span class="date"><i class="icon-clock"></i> 
                                                                          <span class="post-date updated">
                                                                            @include('pages.arabic.date', ['date' => $val->created_at])
                                                                          </span>
                                                                        </span>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="post-title">
                                                                <h2 class="entry-title" itemprop="headline"><a href="{{asset('/blog/'.$val->url)}}">   {{$val->home_title}}</a></h2>
                                                            </div>
                                                            <div class="post-excerpt">
                                                                <span class="big">
                                                                  {{ $val->home_subject }}
                                                                </span>
                                                            </div>
                                                            <div class="post-footer">
                                                              
                                                                <div class="post-links">
                                                                    <i class="icon-doc-text"></i><a href="{{asset('/blog/'.$val->url)}}" class="post-more">
                                                                      {{trans('static.read more')}}
                                                                     </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              @endforeach




                                              @include('pages.paginator', ['paginator' => $items])

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
</div>
@endsection