
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.js"></script>
<style type="text/css">
  .error{
    color: red;
  }
  .submet_p{
    padding-top: 102px;
  }
</style>
<div id="app" >
  <form id="register_form" method="post"  action="{{ route('register_form', app()->getLocale() ) }}" enctype="multipart/form-data" >                 
           {{ csrf_field() }}

      <div class="row">
          <div class="col-md-6 col-sm-6">
              <div class="input">
                  <input id="reg_username"  class="username-input"   placeholder=" {{trans('static.name')}} " name="full_name" type="text" 
                  value="{{ ( isset($soc_name) && $soc_name != '' ) ? $soc_name : '' }}"  >
              </div>
          </div><!-- end username -->
          <div class="col-md-6 col-sm-6 {{ (isset($soc_email) && $soc_email != '') ? 'hidden' : '' }} ">
              <div class="input">
                  <input id="reg_email"   class="email-input"   placeholder="{{trans('static.email')}}" name="email" type="email" value="{{ (isset($soc_email) && $soc_email != '') ? $soc_email : '' }}">
              </div>
          </div><!-- end email -->
          <div class="col-md-6 col-sm-6 {{ (isset($soc_pass) && $soc_pass != '') ? 'hidden' : '' }} ">
              <div class="input">
                  <input id="password" class="password-input"  placeholder="{{trans('static.password')}}" name="password" type="password" value="{{ (isset($soc_pass) && $soc_pass != '') ? $soc_pass : '' }}"  >
              </div>
          </div><!-- end password -->
          <div class="col-md-6 col-sm-6 {{ (isset($soc_pass) && $soc_pass != '') ? 'hidden' : '' }}">
              <div class="input">
                  <input class="confirm-password-input" name="password_check" type="password" value="{{ (isset($soc_pass) && $soc_pass != '') ? $soc_pass : '' }}"  placeholder="{{trans('static.Confirm Password')}}" >
              </div>
          </div><!-- end confirm password -->
<br>
          <div class="column one">
             <vue-recaptcha @verify="markRecaptchaAsVerified"
                sitekey="6LeuMdcZAAAAAB2Cv6TGkHyR-U0ShUcLcm5cSEEu">
             </vue-recaptcha>
          </div>
          <br>

          <div class="col-md-12 submet_p">
              <div class="input clearfix">
                  <input type="submit" id="reg_submit" class="submit-input grad-btn ln-tr" value="Register">
              </div>
          </div> 
      </div><!-- end row -->
  </form><!-- End form -->



               
</div>


 

   







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>



<script type="text/javascript">
 

  jQuery(function ($) {

    $('#register_form').validate({
      rules: {
        full_name:    {required: true,minlength: 2,},
        email: {
              required: true,
              email: true,
              "remote": {
                  url: "{{   route('register_email_validation', app()->getLocale())  }}",
                  type: "get",
                  data: {
                      email: function() {
                          return $('#register_form :input[name="email"]').val();
                      }
                  }
              }
          }, 


        password:    {required: true,minlength: 6,},
        password_check: {required: true,minlength: 6,equalTo: "#password",},
        rolls: {required: true},        




    },
    // submitHandler: function (form, e) {
    //   e.preventDefault();
    //   var form = $(form);
    //   var dataString = form.serialize();
    //   $.ajax({
    //     type: "POST",
    //     url: form.attr('action'),
    //     data: dataString,
    //     dataType: "text",
    //     success: function(data)
    //     {
    //       document.getElementById("register_form").reset();
    //       // $('#response').css('display', 'block');
    //         var location = " asset( app()->getLocale().'/conferm_email'. )}}";
    //       window.location.replace(location);

    //     },
    //     error: function(data)
    //     {alert('error try again later');},
    //   });
    // }
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








