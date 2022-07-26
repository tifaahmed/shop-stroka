@extends('website.layout')

@section('title')
 |  {{ __("static.Products") }}
@endsection

@section('content')

<div id="page_header" class="page-subheader site-subheader-cst uh_hg_def_header_style maskcontainer--mask6">
<div class="bgback"></div>
<div class="kl-bg-source">

</div>

<div class="th-sparkles"></div>

<div class="ph-content-wrap d-flex">
	<div class="container align-self-center">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<ul class="breadcrumbs fixclear">
					<li><a href="{{asset('/')}}">{{trans('static.الرئيسية')}}  </a></li>
					<li>
					
					{{trans('static.العروض')}}

					</li>
				</ul>

				<div class="clearfix"></div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="subheader-titles">
					<h2 class="subheader-maintitle">
					{{trans('static.العروض')}}
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

<!-- Products category section with custom top padding -->

<section class="hg_section pb-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title pb-20">
					<h3 class="tbk__title kl-font-alt fs-m fw-bold">
						
						{{trans('static.احدث العروض')}}
					</h3>
				</div>

				<div class="limited-offers-carousel lt-offers fixclear">
					<ul class="hg_limited_offers products lt-offers-carousel js-slick" data-slick='{
						"infinite": true,
						"slidesToShow": 4,
						"slidesToScroll": 1,
						"swipeToSlide": true,
						"autoplay": true,
						"autoplaySpeed": 3000,
						"speed": 500,
						"cssEase": "ease-in-out",
						"arrows": true,
						"appendArrows": ".limited-offers-carousel .hgSlickNav",
						"responsive": [
							{
								"breakpoint": 1199,
								"settings": {
									"slidesToShow": 3
								}
							},
							{
								"breakpoint": 767,
								"settings": {
									"slidesToShow": 2
								}
							},
							{
								"breakpoint": 480,
								"settings": {
									"slidesToShow": 1
								}
							}
						]
					}'>


					@foreach($offers as $key => $val)

						<li class="product-list-item">
							<a href="{{asset('single-offer/'.$val->id)}}">
								<span class="">
									<img style="width:300px !important ;height:250px !important ;  " width="300px" height="300px" src="{{asset($val->image_one)}}" alt="product"/>
								</span>
								
								<div class="details kw-details fixclear">
									<h3 class="kw-details-title">
								        @if ( Session::get('locale') == 'en')
											{{ $val->title }}
										@else
											{{ $val->title_ar }}
										@endif									</h3>
								</div>
							</a>
						</li>

                    @endforeach
					</ul>
					<div class="hgSlickNav clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="hg_section pb-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title pb-20">
					<h3 class="tbk__title kl-font-alt fs-m fw-bold">
						
						{{trans('static.احدث عروض جوميا')}}
					</h3>
				</div>

				<div class="limited-offers-carousel lt-offers fixclear">
					<ul class="hg_limited_offers products lt-offers-carousel js-slick" data-slick='{
						"infinite": true,
						"slidesToShow": 4,
						"slidesToScroll": 1,
						"swipeToSlide": true,
						"autoplay": true,
						"autoplaySpeed": 3000,
						"speed": 500,
						"cssEase": "ease-in-out",
						"arrows": true,
						"appendArrows": ".limited-offers-carousel .hgSlickNav",
						"responsive": [
							{
								"breakpoint": 1199,
								"settings": {
									"slidesToShow": 3
								}
							},
							{
								"breakpoint": 767,
								"settings": {
									"slidesToShow": 2
								}
							},
							{
								"breakpoint": 480,
								"settings": {
									"slidesToShow": 1
								}
							}
						]
					}'>


					@foreach($jumia as $key => $val)

						<li class="product-list-item">
							<a href="{{ $val->url }}">
								<span class="">
									<img style="width:300px !important ;height:250px !important ;  " width="300px" height="300px" src="{{asset($val->image)}}" alt="product"/>
								</span>
								
								<div class="details kw-details fixclear">
									<h3 class="kw-details-title">
								        @if ( Session::get('locale') == 'en')
											{{ $val->title }}
										@else
											{{ $val->title_ar }}
										@endif									</h3>
								</div>
							</a>
						</li>

                    @endforeach
					</ul>
					<div class="hgSlickNav clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="hg_section pb-80">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title pb-20">
					<h3 class="tbk__title kl-font-alt fs-m fw-bold">
					
												{{trans('static.احدث عروض سوق')}}

					</h3>
				</div>

				<div class="limited-offers-carousel lt-offers fixclear">
					<ul class="hg_limited_offers products lt-offers-carousel js-slick" data-slick='{
						"infinite": true,
						"slidesToShow": 4,
						"slidesToScroll": 1,
						"swipeToSlide": true,
						"autoplay": true,
						"autoplaySpeed": 3000,
						"speed": 500,
						"cssEase": "ease-in-out",
						"arrows": true,
						"appendArrows": ".limited-offers-carousel .hgSlickNav2",
						"responsive": [
							{
								"breakpoint": 1199,
								"settings": {
									"slidesToShow": 3
								}
							},
							{
								"breakpoint": 767,
								"settings": {
									"slidesToShow": 2
								}
							},
							{
								"breakpoint": 480,
								"settings": {
									"slidesToShow": 1
								}
							}
						]
					}'>

						@foreach($souq as $key => $val)

							<li class="product-list-item">
								<a href="{{ $val->url }}">
									<span class="">
									<img style="width:300px !important ;height:250px !important ;  " width="300px" height="300px" src="{{asset($val->image)}}" alt="product"/>
									</span>
									
									<div class="details kw-details fixclear">
										<h3 class="kw-details-title">
									        @if ( Session::get('locale') == 'en')
												{{ $val->title }}
											@else
												{{ $val->title_ar }}
											@endif									</h3>
									</div>
								</a>
							</li>

	                    @endforeach
					


					</ul>
					<div class="hgSlickNav2 clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
