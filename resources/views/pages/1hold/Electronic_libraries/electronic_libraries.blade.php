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


 








<div class="inner-page-banner" style="background:url({{asset($details->banner_image)}}) center center no-repeat;background-size: cover;">
    <div class="opacity">
        <div class="container text-center">
            <h2>  {{$details->page_title}}  </h2>
        </div> <!-- /.container -->
    </div> <!-- /.opacity -->
</div> <!-- /.inner-page-banner -->



<div class="event-section wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach( $items as $key => $val )

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 wow fadeInUp hvr-float-shadow">
                        <img src="{{asset( $val->home_image_one) }}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}" > 
                        <div class="single-event theme-bg-color">

                            <div class="date p-color">
                                 @include('pages.arabic.date', ['date' => $val->created_at ])  
                            </div>
                            <a href="{{asset('/electronic-library/'.$val->url)}}"><h6>{{$val->home_title}}</h6></a>
                            <p>{!! $val->home_subject !!}</p>
                            
                        </div> <!-- /.single-event -->
                    </div>
                    @endforeach

 
 
 
                                <!-- /.single-post -->
                                
                </div>
            </div>


                        <!-- _______________ SideBar ___________________ -->
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebarOne">
                            <div class="wrapper-left">
                                @if($details->table_title_one || $details->table_subject_one)
                                <div class="sidebar-box quick-event-list">
                                    <div class="box-wrapper">
                                        <h4>   {{$details->table_title_one}}</h4>
                                        <div id="talent-teacher-carousel" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach( json_decode($details->table_subject_one) as $key => $subject )
                                                <li data-target="#talent-teacher-carousel" data-slide-to="{{$key}}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                @foreach( json_decode($details->table_subject_one) as $key => $subject )
                                                <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                                    <a href="{{$subject->url}}">
                                                        <img src="{{$subject->image}}" alt="Teacher">
                                                    </a>
                                                </div>
                                                @endforeach
                                            </div>
                                            
                                        </div>                                 
                                    </div>  
                                </div>  
                                @endif
                                
                                @if($details->table_title_two || $details->table_subject_two)
                                <div class="sidebar-box talent-teacher">
                                    <div class="box-wrapper">
                                        <h4> {{$details->table_title_two}} </h4>
                                        <div id="talent-teacher-carousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                @foreach( json_decode($details->table_subject_two) as $key => $subject )
                                                <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                                    <a href="{{$subject->url}}">
                                                        <img src="{{$subject->image}}" alt="Teacher">
                                                    </a>                                                
                                                </div>
                                                @endforeach
                                            </div>
                                            <ol class="carousel-indicators">
                                                @foreach( json_decode($details->table_subject_two) as $key => $subject )
                                                <li data-target="#talent-teacher-carousel" data-slide-to="{{$key}}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                        </div> 
                                    </div>
                                </div> 
                                @endif

                                @if($details->table_title_three || $details->table_subject_three)
                                <div class="sidebar-box quick-event-list">
                                    <div class="box-wrapper">
                                        <h4> {{$details->table_title_three}} </h4>
                                        <div id="talent-teacher-carousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                @foreach( json_decode($details->table_subject_three) as $key => $subject )
                                                <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                                    <a href="{{$subject->url}}">
                                                        <img src="{{$subject->image}}" alt="Teacher">
                                                    </a>                                                
                                                </div>
                                                @endforeach
                                            </div>
                                            <ol class="carousel-indicators">
                                                @foreach( json_decode($details->table_subject_three) as $key => $subject )
                                                <li data-target="#talent-teacher-carousel" data-slide-to="{{$key}}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                        </div>                                 
                                    </div>  
                                </div>
                                @endif

                                @if($details->table_title_four || $details->table_subject_four)
                                <div class="sidebar-box quick-event-list">
                                    <div class="box-wrapper">
                                        <h4> {{$details->table_title_four}} </h4>
                                        <div id="talent-teacher-carousel" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @foreach( json_decode($details->table_subject_four) as $key => $subject )
                                                <li data-target="#talent-teacher-carousel" data-slide-to="{{$key}}" class="{{ ($key == 0) ? 'active' : '' }}"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                @foreach( json_decode($details->table_subject_four) as $key => $subject )
                                                <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                                    <a href="{{$subject->url}}">
                                                        <img src="{{$subject->image}}" alt="Teacher">
                                                    </a>                                                
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>                                
                                    </div>  
                                </div>
                                @endif

                            </div>
                        </div>

                    </div>
                    @include('pages.paginator', ['paginator' => $items])

                </div> <!-- /.container -->
            </div> <!-- /.blog-v2 -->
        
    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

@endsection