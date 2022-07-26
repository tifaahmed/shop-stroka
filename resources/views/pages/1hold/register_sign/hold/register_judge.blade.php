@extends('layout')
<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>

@section('title')
<title>
   التسجيل  للمحكم
</title>
@endsection

@section('meta')
  <!--   
    <meta name="keywords" content="$details->keywords}}">
    <meta property="title"  content="$details->page_title}}"/>
    <meta property="og:title"  content="$details->page_title}}"/>
    <meta name="twitter:title" content="$details->page_title}}" />
    <meta name="description" content="$details->description}}">
    <meta property="og:description" content="$details->description}}"/>
    <meta name="twitter:description" content="$details->description}}" /> 
  -->
  <meta property="og:url"       content="{{Request::url()}}"/>
  <meta name="twitter:image" content="{{asset($meta->twitter_image)}}" />
  <meta property="og:image"     content="{{asset($meta->og_image)}}"/>
@endsection

@section('css')
	<style>
		@media (min-width: 1335px){
            body {
				background:url({{asset('asset_ar/img/signin.png')}}) center  center;    background-size: cover;
            }
        }
		.btn-info {
            display: inline-block;
        }
		.sign-img {
			padding: 119px 70px 0 100px;
		}
		label{
		    color: #b74799
		}
	</style>
@endsection

@section('content')

<section  >
    <div class=" " style="">
		<div class="container">
		    <div class="row text-center">

				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
					<div class="sign-img">
						<a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
							<img src="{{asset('asset_ar/img/logo2.png')}}" alt="logo">
						</a>
	
						<div class="sign-p">
						</div>
					</div>
					<?php 
					if( isset($soc_email) && $soc_email 
						&& isset($soc_name) && $soc_name 
						&& isset($soc_pass) && $soc_pass 
					){
						$soc_email = $soc_email;
						$soc_name = $soc_name ;
						$soc_pass = $soc_pass ;
					}else{
						$soc_email = '';
						$soc_name = '';
						$soc_pass ='';
					}
					?>


					@include('pages.submet.register', ['action' => 'register-judge-form',
					'soc_email'=>$soc_email,
					'soc_name'=>$soc_name,
					'soc_pass'=>$soc_pass,

					])
					<div class="col-lg-12 col-md-12 forget">
					  <br>
					  <a href="{{asset('login')}}"> لديك حساب ؟</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

	