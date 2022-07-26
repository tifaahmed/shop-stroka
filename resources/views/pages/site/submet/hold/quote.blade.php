
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



       <!-- One Third (1/3) Column -->
            <!-- <input type="text" name="name" id="name" size="40" aria-required="true" aria-invalid="false" placeholder="{{trans('static.Please type your name')}} " /> -->
      <!-- One Third (1/3) Column -->
            <!-- <input type="email" name="email" id="email" size="40" aria-required="true" aria-invalid="false"  placeholder="xxx@xxx.xxx" /> -->
      <!-- One Third (1/3) Column -->
                  <!-- <input type="text" name="phone" id="subject" size="40" aria-invalid="false" placeholder="رقم الهاتف" /> -->



  <form id="quote_form" method="post" action=" {{ route('quote_form', app()->getLocale() ) }}  " enctype="multipart/form-data" >  
    {{ csrf_field() }}    
      <div class="row">
          <input id="name" name="name" class="contact-name" type="text" placeholder="{{trans('static.Your Name')}}*" />
          <input id="phone" name="phone_one" class="contact-Phone" type="text" placeholder="{{trans('static.Phone')}}*" />
          <input id="email" name="email" class="contact-mail" type="text" placeholder=" {{trans('static.Email')}} *"/>
          <p>Upload Your C.V</p>
          <input id="file" name="file" class="contact-subject" type="file" placeholder="Subject*"/>
          <textarea name="note" placeholder="{{trans('static.Message')}}*" id="message"></textarea>
          <vue-recaptcha @verify="markRecaptchaAsVerified"
            sitekey="6LdhK-oUAAAAAN2UbbVzvrakJly-6B_I79BX3fE8">
          </vue-recaptcha>
          <button type="submit" class="submit comment-submit qoute-sub" id="submit">Send</button>
      </div>
  </form>

</div>







   @if(\Session::get('locale') == 'ar')
   <br>
     <div class="alert alert-success" id="response" style="display: none; font-size:20px ">
       <strong>تم الارسال !</strong>
     </div>
   @else
     <div class="alert alert-success" id="response" style="display: none; font-size:20px">
       <strong>Success!</strong>  message sent we will call you back
     </div>
   @endif

   




   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>




 <script type="text/javascript">
  jQuery(function ($) {

    $('#quote_form').validate({
      rules: {
        name:    {required: true,minlength: 2,},
        email: {required: true,email: true,},        
        phone: {required: true,minlength: 11 },
        message:    {required: true},
 

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
    //       document.getElementById("quote_form").reset();
    //       $('#response').css('display', 'block');
    //               },
    //     error: function(data)
    //     {alert('error try again layer');},
    //   });
    // }
    }); 
  });



</script> 



















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
      remote: "يرجى التحقق من البريد الإلكتروني",
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

