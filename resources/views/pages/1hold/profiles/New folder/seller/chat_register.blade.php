
@extends('layout')
<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>

@section('title')
<title>
التواصل مع المتاجر
</title>
@endsection

@section('css')
<style>
    label , .form-group{
        color:#ba4699;
        text-align:right
    }
    .row{
        margin : auto;

    }
    @media (min-width: 992px){
        .container {
            padding-right: 190px !important;
            padding-left: 0px !important;
        }
    }
    .logo{
        /* padding-bottom: 51px !important; */
        padding-left: 178px;
    }
    input, select {
    border: 1px solid #CCC;
    width: 25px;
	}
	#phone ,  #phone2 , select{
        border: 1px solid #CCC;
        width: 350px;
    }
    select{
        font-size:20px;
        line-height: 3em;
    }
    .sign-img {
        padding: 0px 100px 0 100px;
    }
    .btn-info {
        display: inline-block;
    }
    select,input,textarea{
        border-image-source: linear-gradient(to right,#b74799,#0cb7e3)  !important;
        border-width: 1pt !important;
        border-image-slice: 1 !important;
    }
</style>
@endsection

@section('content')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">

 
   
    <div class="container" style="padding-right:72px;padding-left: 72px;">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 logo"  >

                <div class="sign-img">
                    <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                       <img width="200px" src="{{asset('asset_ar/img/logo2.png')}}" alt="happy logo">
                   </a>
                </div>

            </div>
            
            <form   id="poduct_buys_form" method="post" action="{{ asset('poduct_buys_form') }}" enctype="multipart/form-data" >                 
            	         {{ csrf_field() }}
<input type="" name="seller_id" value="{{$seller->id}}" hidden="">

            <div class="col-lg-10 col-md-9"  >
                <div class="row text-center">
                    <div class="col-lg-6 col-md-12">
                        <fieldset>
                            <div class="form-group">
                                <label for="">الاسم  الاول</label>
                                <input class="form-control" placeholder=" محمد  " name="full_name" type="text" value="{{$buyer->full_name}}" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="">  البريد الالكترونى       </label>
                                <input class="form-control"  placeholder="  xxx@xxx.xxx      "  name="email" type="email" value="{{$buyer->email}}" disabled="">
                            </div> 
                           <!--  <div class="form-group">
                                <label for="">كلمة المرور   </label>
                                <input class="form-control" placeholder=" ************  " name="name" type="password">
                            </div> -->



                        </fieldset>
                    </div>
                    

                    <div class="col-lg-6 col-md-12">
                        <fieldset>
                            
                            <div class="form-group">
                                <label for="">  العنوان     </label>  
                                	<textarea name="adress"   rows="5" style="width: 100%" >{{$buyer->address}}</textarea>
                            </div>
                           
                        </fieldset>
                    </div>      





         			<div class="col-lg-12  col-md-12">
                        <div class="form-group">
                            <label for="">   عنوان الرسالة</label>
                            <input class="form-control"   name="title" type="title" value="
                            {{ ($count > 0) ? $poduct_buy->title : ' ' }}" >
                        </div>
                        <div class="form-group">
                            <label for="">نص الرسالة                                   </label>
                            <textarea  id="" name="subject" rows="5" style="width: 100%" >
                            	{{ ($count > 0) ? $poduct_buy->subject : ' ' }}
                            </textarea>
                    	</div>
                    </div>

                    <div class="col-lg-12  col-md-12">
                        <a href="conferm_send.php">
                            <button class="btn-info">ارسال</button>
                        </a>
                    </div>

                </div>
            </div>
            


            </form>


        </div>
    </div>


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>

    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>


    <script type="text/javascript">
     

      jQuery(function ($) {

        $('#poduct_buys_form').validate({
          rules: {
            full_name:    {required: true,minlength: 2,},
            email: {required: true,}, 
            address: {required: true,}, 
            title: {required: true,}, 
            subject: {required: true,}, 
        },
 
        }); 
      });

     
    </script> 

    @if(\Session::get('locale') == 'ar')

      <script type="text/javascript">
        (function( factory ) {
          if ( typeof define === "function" && define.amd ) {
            define( ["jquery", "../jquery.validate"], factory );
          } else if (typeof module === "object" && module.exports) {
            module.exports = factory( require( "jquery" ) );
          } else {
            factory( jQuery );
          }
        }(function( $ ) {

        /*
         * Translated default messages for the jQuery validation plugin.
         * Locale: AR (Arabic; العربية)
         */
        $.extend( $.validator.messages, {
          required: "هذا الحقل إلزامي",
          remote: "موجود بالفعل",
          email: "رجاء إدخال عنوان بريد إلكتروني صحيح",
          url: "رجاء إدخال عنوان موقع إلكتروني صحيح",
          date: "رجاء إدخال تاريخ صحيح",
          dateISO: "رجاء إدخال تاريخ صحيح (ISO)",
          number: "رجاء إدخال عدد بطريقة صحيحة",
          digits: "رجاء إدخال أرقام فقط",
          creditcard: "رجاء إدخال رقم بطاقة ائتمان صحيح",
          equalTo: "رجاء إدخال نفس القيمة",
          extension: "رجاء إدخال ملف بامتداد موافق عليه",
          maxlength: $.validator.format( "الحد الأقصى لعدد الحروف هو {0}" ),
          minlength: $.validator.format( "الحد الأدنى لعدد الحروف هو {0}" ),
          rangelength: $.validator.format( "عدد الحروف يجب أن يكون بين {0} و {1}" ),
          range: $.validator.format( "رجاء إدخال عدد قيمته بين {0} و {1}" ),
          max: $.validator.format( "رجاء إدخال عدد أقل من أو يساوي {0}" ),
          min: $.validator.format( "رجاء إدخال عدد أكبر من أو يساوي {0}" )
        } );
        return $;
        }));
      </script>
    @endif 

         <script type="text/javascript">
          Vue.component('vue-recaptcha', VueRecaptcha);

          new Vue({
            el: '#app',
            data: {
              loginForm: {
                recaptchaVerified: false,
                pleaseTickRecaptchaMessage: ''
              }
            },
            methods: {
              markRecaptchaAsVerified(response) {
                this.loginForm.pleaseTickRecaptchaMessage = '';
                this.loginForm.recaptchaVerified = true;
              },
              checkIfRecaptchaVerified() {
                if (!this.loginForm.recaptchaVerified) {
                  this.loginForm.pleaseTickRecaptchaMessage = 'Please tick recaptcha.';
                  return true; // prevent form from submitting
                }
                // alert('form would be posted!');
                      this.$refs.form.submit()
               }
            }
          })
         </script>
  
 	</body>
</html>
@endsection

	