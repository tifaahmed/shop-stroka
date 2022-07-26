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
  
<!--            <div class="column one-second">
               <input placeholder="*" type="text" name="name" id="contact_name" size="40" aria-required="true" aria-invalid="false" required>
           </div> -->
<!--            <div class="column one-second">
               <input  placeholder="   *"  type="email" name="email" id="contact_email" size="40" aria-required="true" aria-invalid="false" required>
           </div> -->
<!--            <div class="column one">
               <input placeholder="{{trans('static.title')}}*"  type="text" name="subject" id="contact_subject" size="40" aria-invalid="false" required >
           </div> -->
<!--            <div class="column one">
               <textarea placeholder="{{trans('static.Message')}}*"  name="message" id="contact_message" style="width:100%;" rows="10" aria-invalid="false"></textarea>
           </div> -->



<!--            <div class="column one">
               <input type="submit" value="{{trans('static.Send A Message')}} " id="submit"  >
           </div>
       </form>         -->    
                     
                    
<!--       
 
      <div class="col-md-12">
          <div class="form-group">
            <input type="file" class="form-control-file" name="date_one">
          </div>
      </div>
  -->

  <form id="contatc_form" method="post" action=" {{ route('contact_form', app()->getLocale() ) }}" enctype="multipart/form-data" >  
     {{ csrf_field() }}       
    <div class="row">
          <input id="name" name="name" class="contact_name" type="text" placeholder="{{trans('static.Your Name')}}*" />

          <input id="phone" name="phone" class="contact_phone" type="text" placeholder="{{trans('static.Phone')}}*" restrict="A-Z\a-z\0-9" />

          <input id="email" name="email" class="contact_email" type="email" placeholder="{{trans('static.Email')}}*"/>

          <input id="sub" name="subject" class="contact_subject" type="text" placeholder="Subject*"/>

          <textarea name="msg" class="contact_message" placeholder="{{trans('static.Message')}}*" id="message"></textarea>

          <div class="column one">
             <vue-recaptcha @verify="markRecaptchaAsVerified"
               sitekey="6LfmGOMZAAAAAN7952FO5VWO4uyEbXFVY2zR9HSe">              
             </vue-recaptcha>
          </div>
          <button type="submit" class="comment-submit qoute-sub">Submit</button>
    </div>
  </form>
 
    @if(\Session::get('locale') == 'ar')
   <br>
     <div class="alert alert-success" id="response" style="display: none; font-size:20px;color: green ">
       <strong>تم الارسال !</strong>تلقينا رسالتك وسنعاود الاتصال بك فى اقرب وقت .
     </div>
   @else
     <div class="alert alert-success" id="response" style="display: none; font-size:20px;color: green">
       <strong>Success!</strong>  message sent we will call you back
     </div>
   @endif

   


</div>




   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>




 <script type="text/javascript">
  jQuery(function ($) {

    $('#contatc_form').validate({
      rules: {
        name:    {required: true,minlength: 2,},
        email: {required: true,email: true,},        
        // phone: {required: true,minlength: 11 },
        message:    {required: true},
        subject:    {required: true,},
        // date_one:    {required: true,},
        // title:    {required: true,},


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
    //       document.getElementById("contact_form").reset();
    //       $('#response').css('display', 'block');
    //               },
    //     error: function(data)
    //     {alert('error try again layer');},
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








