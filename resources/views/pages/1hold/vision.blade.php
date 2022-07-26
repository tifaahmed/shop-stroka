@extends('layout')

@section('title')

	 @if(\Session::get('locale') == 'ar')
	 	{{ $vision->page_title_ar}}
	 @else
		{{ $vision->page_title_en}}
	 @endif


@endsection

@section('content')
<section class="bredcrumb">
		<div class="bg-image text-center" style="background-image: url({{asset('images/resources/banner.jpg')}});">
			<h1>
				 @if(\Session::get('locale') == 'ar')
				 	{{ $vision->our_vision_ar}}
				 @else
					{{ $vision->our_vision_en}}
				 @endif			</h1>
		</div>
		<div class="">
			<ul class= "middle">
				<li><a href="{{asset('/')}}">{{trans('static.home')}}  </a></li>
				<li>{{trans('static.our vision')}}</li>
			</ul>
		</div>
</section>

			<section class="about">
			<div class="container">
				<div class="item-list">
					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							 <div class="sec-title">
								 @if(\Session::get('locale') == 'ar')
								 <h2 class=""> {{ $vision->our_vision_ar}}</h2>
								 @else
									<h2 class="left"> {{ $vision->our_vision_en}}</h2>
								 @endif	
								  @if(\Session::get('locale') == 'ar')
								   {!! $vision->our_vision_subject_ar!!}
								  @else
								 	 {!! $vision->our_vision_subject_en!!}
								  @endif	
							</div>
							
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="item">
								<figure class="image-box">
									<img src="{{asset($vision->our_vision_image)}}" alt="about" style="width: 100%" />
								</figure>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection
