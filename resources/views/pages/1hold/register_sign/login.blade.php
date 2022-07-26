
<!-- extends('layout') -->


<!-- <?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?> -->


<!-- section('title') -->
<!-- <title>$meta->title}}</title> -->
<!-- endsection -->


<!-- section('meta') -->
<!-- endsection -->

<!-- section('css') -->
<!-- endsection -->


<!-- section('content')   -->
	<!-- include('pages.partials.header') -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="popup-content">
            <div class="login-page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-form">
                            <div class="login-title">
                                <span class="icon"><i class="fa fa-group"></i></span>
                                <span class="text">{{trans('static.Login Area')}} </span>
                                <a href="#" class="close-modal fr" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </a>
                            </div><!-- End Title -->
                            @include('pages.submet.sign_in')

                        </div><!-- end login form -->
                        <div class="login-options">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{asset('login/facebook')}}" class="login-op-btn grad-btn ln-tr fb">{{trans('static.Login with Facebook Account')}} </a>
                                </div><!-- end FB login -->
                                <div class="col-md-6 col-sm-6">
                                    <a href="{{asset('login/google')}}" class="login-op-btn grad-btn ln-tr gp">{{trans('static.Login with Google Account')}}</a>
                                </div><!-- end GP login -->

                            </div>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 


<!-- 						<a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
							<img src="{{asset('asset_ar/img/logo2.png')}}" alt="logo">							
						</a> -->




				<!-- 				include('pages.submet.sign_in', ['action' => 'login_form'])
 -->
					<!-- include('pages.submet.register', ['action' => 'register-judge-form', -->

<!-- 				<div class="forget">  
				  <br>
				    <a href="{{asset('register')}}"> ليس لديك حساب ؟</a>
				    <a href="{{asset('forget_password')}}">      نسيت كلمه المرور ؟</a>
				</div>
 -->

<!--   	include('pages.partials.footer')
  	include('pages.partials.side1')
  	include('pages.partials.side2')
    include('vendor.flashy.message') -->
<!-- endsection -->


















	

