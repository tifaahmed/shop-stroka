<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.js"></script>
<style type="text/css">
  .error{
    color: red;
  }
</style>

<div id="app">

  
<form id="login_form" method="post" action="{{ route('login_form', app()->getLocale() ) }}"  enctype="multipart/form-data" >  {{ csrf_field() }}       
  @csrf  
     <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="input">
              <input class="username-input" id="login_username"  placeholder="{{trans('static.email')}}" name="login_email" type="email">
            </div>
          </div>
         <div class="col-md-6 col-sm-6">
             <div class="input">
              <input class="password-input" id="login_password" placeholder="{{trans('static.password')}}" name="login_password" type="password">
             </div>
         </div>
         <br><br><br><br>
         <div class="column one">
           <vue-recaptcha @verify="markRecaptchaAsVerified"
                sitekey="6LeuMdcZAAAAAB2Cv6TGkHyR-U0ShUcLcm5cSEEu">
           </vue-recaptcha>
         </div>
         <div class="col-md-12">
             <div class="input clearfix">
                 <input type="submit" id="login_submit" class="submit-input grad-btn ln-tr" value="{{trans('static.Login')}} ">
             </div>
         </div>
         <div class="col-md-6 col-sm-6 clearfix">
             <div class="custom-checkbox fl">
                 <input type="checkbox" id="login_remember" class="checkbox-input" checked>
                 <label for="login_remember">{{trans('static.Remember Password')}}</label>
             </div>
         </div><!-- end remember -->
         <div class="col-md-6 col-sm-6 clearfix">
             <div class="forgot fr">
                 <a href="register.php" class="new-user">{{trans('static.Create New Account')}} </a> 
                 / 
                 <a href="#" class="reset"> {{trans('static.Forget Password ?')}}</a>
             </div>
         </div><!-- end forgot password -->
     </div><!-- end row -->
 



<!--       <div class="sign-google">
      <a href="{{asset('login/google')}}"><i class="fa fa-google-plus" aria-hidden="true"></i>سجل دخولك بGoogle</a>
      </div>
      <div class="sign-face">
      <a href="{{asset('login/facebook')}}"><i class="fa fa-facebook" aria-hidden="true"></i>سجل دخولك بFacebook</a>
      </div>
      <div class="or">
        <h2><span>أو</span></h2>
      </div> -->
                    
 


                      
     


         
     

     
    </form>
</div>

@if (count($errors) > 0)
   <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
 

   







   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @include('vendor.flashy.message')

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

 
 <script type="text/javascript">
  jQuery(function ($) {
    $('#login_form').validate({
      rules: {
        login_email: {
              required: true,
              email: true,
              "remote": {
                url: "{{   route('login_email_validation', app()->getLocale())  }}",

                  type: "get",
                  data: {
                      email: function() {
                          return $('#login_form :input[name="login_email"]').val();
                      }
                  }
              }
          },        
        login_password: {required: true,minlength: 6 },
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
      remote: "البريد الالكترونى   ليس  موجود  فى قاعدة البيانات",
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
            alert('form would be posted!');
                  this.$refs.form.submit()
           }
        }
      })
     </script>








