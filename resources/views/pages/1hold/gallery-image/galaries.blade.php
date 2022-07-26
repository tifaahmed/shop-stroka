@extends('layout')

@section('title')
	<title>{{ $details->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$details->keywords}}">

    <meta property="title"  content="{{$details->page_title}}"/>
    <meta property="og:title"  content="{{$details->page_title}}"/>
    <meta name="twitter:title" content="{{$details->page_title}}" />

    <meta name="description" content="{{$details->description}}">
    <meta property="og:description" content="{{$details->description}}"/>
    <meta name="twitter:description" content="{{$details->description}}" />

    <meta name="twitter:image" content="{{asset($details->banner_image)}}" />
    <meta property="og:image"     content="{{asset($details->banner_image)}}"/>
    <meta property="og:image:alt"     content="{{$details->home_image_one_alt}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
@endsection

@section('content')
    @include('pages.partials.header')

    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section mcb-section mcb-section-1d2bf82id" style="padding-top:220px; padding-bottom:220px; background-image:url({{ asset( $details->banner_image ) }}); background-repeat:no-repeat; background-position:center bottom;">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap mcb-wrap-0cejiz4z0 one valign-top clearfix">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column mcb-item-gb8yux6pn one column_column">
                                        <div class="column_attr clearfix" style>
                                            <h2 style="color: #e7f4ff;">{{$details->page_title}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section mcb-section mcb-section-51op7v3r7" style="padding-top:80px; padding-bottom:80px; background-color:">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap mcb-wrap-do89phads one valign-top clearfix">
                                <div class="mcb-wrap-inner">
                                  
                                  @foreach($items as $key => $val )

                                    <div class="column mcb-column mcb-item-fjr8hezst one-third column_column">
                                        <div class="gallery-img">
                                            <a href="{{asset( $val->image_one) }}">
                                                <img class="lozad" data-src="{{asset( $val->image_one) }}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
                                            </a>
                                                                    
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                            
                        </div>
                    </div>
                </div>
            </div>
  
      
    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

@endsection