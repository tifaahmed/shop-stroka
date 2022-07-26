@extends('website.layout')

@section('title')
 |  {{ __("static.Products") }}
@endsection

@section('content')

<div id="page_header" class="page-subheader site-subheader-cst uh_hg_def_header_style maskcontainer--mask6">
<div class="bgback"></div>
<div class="th-sparkles"></div>

<div class="ph-content-wrap d-flex">
	<div class="container align-self-center">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<ul class="breadcrumbs fixclear">
	        		<li><a href="{{asset('/')}}">{{ __("static.الرئيسية") }}</a></li>
					<li>  {{ __("static.العروض") }}</li>
				</ul>

				<div class="clearfix"></div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="subheader-titles">
					<h2 class="subheader-maintitle">
						{{ __("static.العروض") }}
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Sub-Header bottom mask style 6 -->
<div class="kl-bottommask kl-bottommask--mask6">
	<svg width="2700px" height="57px" class="svgmask" viewBox="0 0 2700 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		<defs>
			<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-mask6">
				<feOffset dx="0" dy="-2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
				<feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
				<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0" in="shadowBlurOuter1" type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
				<feMerge>
					<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
					<feMergeNode in="SourceGraphic"></feMergeNode>
				</feMerge>
			</filter>
		</defs>
		<g transform="translate(-1.000000, 10.000000)">
			<path d="M0.455078125,18.5 L1,47 L392,47 L1577,35 L392,17 L0.455078125,18.5 Z" fill="#000000"></path>
			<path d="M2701,0.313493752 L2701,47.2349598 L2312,47 L391,47 L2312,0 L2701,0.313493752 Z" fill="#fbfbfb" class="bmask-bgfill" filter="url(#filter-mask6)"></path>
			<path d="M2702,3 L2702,19 L2312,19 L1127,33 L2312,3 L2702,3 Z" fill="#cd2122" class="bmask-customfill"></path>
		</g>
	</svg>
</div>
</div>
<section id="content" class="hg_section pt-80 pb-100">
<div class="container">
	<div class="row">
		<div class="right_sidebar col-sm-12 col-md-12 col-lg-9">
			<div class="product">
				<div class="row product-page">
					<div class="single_product_main_image col-sm-12 col-md-5 col-lg-5 mb-sm-40">
						
						<div class="images">
							@if($offers->image_one)
							<a href="{{asset($offers->image_one)}}" class="kl-store-main-image zoom">
								<img src="{{asset($offers->image_one)}}" alt="product-image" />
							</a>
							@endif

							<!-- Main image -->

							<!-- Thumbnails -->

							<div class="thumbnails columns-4">
								<!-- Thumb #1 -->
								@if($offers->image_two)
								<a href="{{asset($offers->image_two)}}" class="zoom first">
									<!-- Image -->
									<img src="{{asset($offers->image_two)}}" alt="product-image" />
								</a>
								@endif

								<!-- Thumb #2 -->
								@if($offers->image_three)
								<a href="{{asset($offers->image_three)}}" class="zoom">
									<!-- Image -->
									<img src="{{asset($offers->image_three)}}" alt="product-image" />
								</a>
								@endif
 
								<!-- Thumb #3 -->
								@if($offers->image_four)
								<a href="{{asset($offers->image_four)}}" class="zoom first">
									<!-- Image -->
									<img src="{{asset($offers->image_four)}}" alt="product-image" />
								</a>
								@endif
								<!-- Thumb #4 -->
								@if($offers->image_five)
								<a href="{{asset($offers->image_five)}}" class="zoom">
									<!-- Image -->
									<img src="{{asset($offers->image_five)}}" alt="product-image"/>
								</a>
								@endif
							</div>
							<!--/ Thumbnails -->
						</div>
					</div>
				
					<div class="main-data col-sm-12 col-md-7 col-lg-7">
						<div class="summary entry-summary">
							<h2 class="product_title entry-title">
						        @if ( Session::get('locale') == 'en')
									{{ $offers->title }}
								@else
									{{ $offers->title_ar }}
								@endif
							</h2>

							<!-- Description -->
							<div>
								<p class="desc kw-details-desc">
									@if ( Session::get('locale') == 'en')
		                     			{!! $offers->subject !!}
		                     		@else
		                     			{!! $offers->subject_ar !!}
		                     		@endif
								</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="related products">
					<h2>
						
						{{trans('static.عروض متعلقة')}}

					</h2>

					<!-- Products -->
					<ul class="products">
						@foreach($similar_offers as $val)
						<li class="product">
							<div class="product-list-item prod-layout-classic">
								<a href="{{asset('single-offer/'.$val->id)}}">
									<span class="image kw-prodimage">
										<img class="kw-prodimage-img" src="{{asset($val->image_one)}}" alt="product"/>
									</span>

									<div class="details kw-details fixclear">
										<h3 class="kw-details-title">
									        @if ( Session::get('locale') == 'en')
												{{ $val->title }}
											@else
												{{ $val->title_ar }}
											@endif										
										</h3>
									</div>
								</a>
							</div>
						</li>
						@endforeach	



					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-3">
			<div id="sidebar-widget" class="sidebar">
<!-- 				<div class="widget">
					<h3 class="widgettitle title">
						
						{{trans('static.بحث عن  العروض')}}

					</h3>

					<div class="widget_search">
						<div class="search gensearch__wrapper">
							<form id="searchform-sidebar" action="{{ asset('/product_search') }}" method="post" role="form"  class="gensearch__form">
								{{ csrf_field() }}	
								<input id="s" name="name" maxlength="20" class="inputbox gensearch__input" type="text" size="20" placeholder="بحث"><button type="submit" id="searchsubmit-sidebar" value="go" class="gensearch__submit fas fa-search"></button>
								<input type="hidden" id="sq" name="q">
							</form>
						</div>
					</div>
				</div> -->
			  	<div id="kl-store_product_categories-2" class="widget kl-store widget_product_categories">
					<h3 class="widgettitle title">
						
						{{trans('static.العروض')}}
					</h3>
					<ul class="product-categories">
                        @foreach($all_offers as $val)
								<a href="{{asset('single-offer/'.$val->id)}}">
							        @if ( Session::get('locale') == 'en')
										{{ $val->title }}
									@else
										{{ $val->title_ar }}
									@endif
								</a>
							<br>
						@endforeach	
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@endsection
