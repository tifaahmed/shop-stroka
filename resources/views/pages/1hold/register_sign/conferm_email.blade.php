 


<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>{{$meta->title}}</title>


<style>
body {
    background: linear-gradient(to right,#ef7c2b,#019644)!important;
    padding: 1em 2em;
    text-align: center;
    margin: auto;
}
h2{
    color: white;
}
h5{
    color: #fff
}
button {
   border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
    border-radius: 50px;
}
</style>



<body >
<br>
<br>

    <a href="{{asset('/')}}" style="vertical-align:middle;">
        <img  class="  " src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}" style="width:200px;">
    </a>
 
   <h2 > <b>أهلا بك معنا في    </b></h2>
   <h2>{{$meta->title}}</h2>
    <h2 > <b>شكرا على تسجيلك</b></h2>
    <h2 > <b>  سيتم ارسال رسالة الى بريدك الالكتروني لتفعيل اشتراكك</b></h2>
    <br>

      <form id="conferm_send" class="signup-form" method="post" action="{{ route('conferm_send', app()->getLocale() ) }}" enctype="multipart/form-data">
         
        {{ csrf_field() }}
        <p class="form-input">
          <input style="    letter-spacing: 60px;height: 39px;font-size: 23px;" class="  h"   placeholder="1234" name="code" type="text" 
          value="{{ ( isset($code) && $code != '' ) ? $code : '' }}"  required >
           <input type="submit" id="reg_submit" name="signup-form-submit" class="btn btn-success" value="submit">

        </p>
      </form> 
      @if($email)
      <a href="{{ asset( app()->getLocale().'/resend_activation_code/'.$email)  }}">
        <button class="btn btn-danger "><h5>اعادة الارسال للبريد</h5> </button>
      </a>
      @endif

<!--     <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
        <button class=" "><h5>           </h5> </button>
    </a>
     -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<!--      <script type="text/javascript">
     	$(document).ready(function(){
     		function loadlink(){

 			  	var location = "{{asset('/')}}";
     			window.location.replace(location);

     		}
     		setInterval(function(){
     		    loadlink() 
     		}, 7000);
 		});
     </script> -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
     <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>




