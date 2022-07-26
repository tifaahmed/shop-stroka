@extends('website.layout')

@section('title')
  {{ $single->page_title}}
@endsection
@section('meta')
<meta property="title"  content="{{$single->title_ar}}"/>
<meta name="description" content="{{$single->description}}">
<meta name="keywords" content="{{$single->keywords}}">

<meta property="og:title"  content="{{$single->title_ar}}"/>
<meta property="og:description" content="{{$single->description}}"/>
<meta property="og:url"       content="{{asset('single-blog/'.$single->url) }}"/>

@endsection
@section('content')	

	<div class="banner">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 text-center">
	    <div class="titel-banner">
	      <h1>المدونة</h1>
	      <p>
	      <span><a href="{{asset('/')}}">الرئيسية</a></span>
	      <i class="fas fa-angle-double-left"></i>

	      <span><a href="{{asset('/collection/'.$collect->url)}}">{{$collect->title_ar}}</a> </span>
	      <i class="fas fa-angle-double-left"></i>
	      <span><a href="{{asset('/single-blog/'.$single->url)}}">{{$single->title_ar}}</a> </span>

	      </p>
	    </div>
	    </div>
	  </div>
	  </div>
	</div>
	<div class="blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				  <div class="single-blog">
	          <img src="{{asset($single->image)}}" alt="blog" style="width: 100%">
	           <div class="blog-box">
	            <ul>
	              <li>
	                <span><i class="fas fa-calendar-alt"></i>  {{$arabic_date}} </span>
	              </li>
	              <li>
	                <span>.</span>
	              </li>
	              <li>
	                 <span><i class="fas fa-user"></i> {{$single->publisher_ar}}</span>
	              </li>
	               <li>
	                <span>.</span>
	              </li>
	              <li>
	                 <span><i class="far fa-eye"></i> {{$single->count}}</span>
	              </li>
	            </ul>
	           </div>
	            <div class="blog-title">
	              <h4> {{$single->title_ar}}</h4>
	              <span class="line-blog"></span>
	              {!! $single->subject_ar !!}
	           </div>
	         </div>
	        </div>
	         <div class="col-md-4">
				<div class="category-blog">
					<div class="post-side">
						<h4>اقسام المدونة</h4>
					</div>
					<div class="side-info">
                    @foreach($allrelated as $val1)
						<a href="{{asset('/single-blog/'.$val1->url)}}">
							<div class="single-side">
								<div class="row">
									<div class="col-sm-12">
										<h5> {{$val1->title_ar}} </h5>
										<span>({{$val1->count}})</span>
									</div>
								</div>
							</div>
						</a>
						<hr>
                    @endforeach
					</div>
				</div>



	          <!------------------------latest post----------------------------->
	          <div class="latest-post">
	           <div class="post-side">
	             <h4>احدث المدونات</h4>
	           </div>
	           <div class="side-info">


	            @foreach($newest as $key => $val2 ) 
	               
		            <a href="{{asset('/single-blog/'.$val2->url)}}">
		             <div class="single-side">
		              <div class="row">
		                <div class="col-lg-3">
		                  <img src="{{asset($val2->image)}}" style="width: 100%;height: 70px">
		                </div>
		                <div class="col-lg-9">
		                 <h5> {{$val2->title_ar}} </h5>
		                 <span class="here{{$key++}}">
		                 	{!! $val2->subject_ar !!}
		                 </span>
		                </div>
		              </div>
		             </div>
		            </a>
		            <hr>
		            <span style="display: none;" id="count">{{$newest->count()}} </span>

		            		
                @endforeach
        	<script type="text/javascript">
        		$(document).ready(function(){
        			var num =   $("#count").text();


				for (var i = num ; i >= 0; i--) {
        			 // alert(txt); 

$(".here"+[i]+"").text( $(".here"+[i]+"").text().substr(0, $(".here"+[i]+"").text().indexOf('.')) ); 


        		}

        		});
        	</script>
	            </div>
	           </div>
	         </div>
				</div>
			</div>
		</div>
	</div>	
@endsection
