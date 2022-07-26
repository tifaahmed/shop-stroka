@extends('layout')


@section('title')
<title>
   التسجيل
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
  <style type="text/css">
    body{
              background-image: linear-gradient(to right, rgb(188,69,152) , rgb(36,167,217));
    }
  </style>
@endsection

@section('content')



<section>
  <div class="sign-up">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12 text-center ">
               <br>
               <br>
               <br>
                <h1 style="color: #fff">اختر نوع الحساب الذي  تريدة </h1>               
                <br>
               <br>
               <br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">

          <div class="col-md-3">
            <a href="{{asset('register-judge/'.$soc_email.'/'.$soc_name.'/'.$soc_pass)}}">
              <div class="reg-img">
                <img src="{{asset('asset_ar/img/signup3.png')}}" alt="signup">
                <h3>محكم</h3>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="{{asset('register-trainer/'.$soc_email.'/'.$soc_name.'/'.$soc_pass)}} ">
                <div class="reg-img">
                <img src="{{asset('asset_ar/img/signup2.png')}}" alt="signup">
                <h3>مدرب</h3>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="{{asset('register-talented/'.$soc_email.'/'.$soc_name.'/'.$soc_pass)}} ">
              <div class="reg-img">
                <img src="{{asset('asset_ar/img/signup1.png')}}" alt="signup">
                <h3>موهوب</h3>
              </div>
            </a>
          </div>

          <div class="col-md-3">
            <a href="{{asset('register-seller/'.$soc_email.'/'.$soc_name.'/'.$soc_pass)}} ">
              <div class="reg-img">
                <img src="{{asset('asset_ar/img/21-142.png')}}" alt="signup" style="    border-color: transparent;
                opacity: 0.8;
                border: solid;
                border-radius: 18px;
                width: 293px;
                height: 263px;">
                <h3>المتاجر</h3>
              </div>
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>



 
@endsection
