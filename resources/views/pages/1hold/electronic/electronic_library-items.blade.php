@extends('layout')

@section('title')
<title>انساب</title>
@endsection

@section('meta')
    <meta name="description" content="عناصر انساب">
    <meta name="keywords" content="انساب">

         <meta property="og:title"  content="انساب"/>
         <meta property="title"  content="انساب"/>


    <meta property="og:description" content="عناصر انساب"/>
@endsection

@section('content')
<div class="pageContent">
	                
	<div class="breadcrumbs">
	    <div class="container">
	         <a href="{{asset('/')}}">الرئيسية</a><i class="fa fa-long-arrow-left"></i><span>   انساب</span>
	    </div>
	</div>

	<div>
		<div class="container-fluid">
			<div class="row row-eq-height">
				
				@include('pages.partials.side1', ['items_one' => $electronic_library_latest ,'items_two' => $electronic_library_random , 'name' => 'الانساب'  , 'url'=>'انساب'])

				<div class="col-md-6 md-padding main-content">
			      	<div class="container-fluid">
	                    <div class="row row-eq-height">
	                        <div class="col-md-12">
	                          	<div class="blog-posts news grid gall">
	                            	<div class="row">
	                            		@foreach($electronic_library_order as $val)
		                                <div class="col-md-6">
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
	                            </div>
	                            @include('pages.default', ['paginator' => $electronic_library_order])
	                        </div>
	                    </div>
	    			</div>
				</div>
				@include('pages.partials.side2')
	         </div>
		</div>
	</div>
</div>
@endsection