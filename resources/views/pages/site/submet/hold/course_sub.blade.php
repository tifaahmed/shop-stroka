<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.js"></script>
<style type="text/css">
  .error{
    color: red;
  }
</style>
<div id="app" style="    height: 271px;">

  <form id="course_sub_form" method="post" action="{{ asset($action) }}" enctype="multipart/form-data" >                 
           {{ csrf_field() }}
    <input type="" name="course_id" value="{{$courses->id}}" hidden="">
    <div class="row text-center">
      <div class="col-lg-4 col-lg-offset-2 col-md-11 col-lg-offset-1">
        <fieldset>
          <div class="form-group">
            <label for="">  البريد الالكترونى  </label>
            <input class="form-control"   placeholder="محمد احمد " name="email" type="email" value="{{Auth::guard('talented')->user()->email}}" disabled="">
          </div>
         <div class="form-group">
           <label for="">     لماذا تريد الاشتراك فى  الدورة  </label>
           <textarea name="why_sub" style="width: 100%"></textarea>
         </div>

        </fieldset>
      </div>
      <div class="col-lg-5 col-lg-offset-2 col-md-11 col-lg-offset-1">
        <fieldset>
          <div class="form-group">
              <label for="">  رقم الهاتف  </label>
              <br>
              <input id="phone" name="phone_one" type="tel" value="{{Auth::guard('talented')->user()->phone_one}}">
          </div>
          <div class="form-group">
            <label for="">  المواعيد المناسبة لحضور الدورة </label>
            <textarea name="free_time" style="width: 100%"></textarea>
          </div>    
        
        </fieldset>       
      </div>

    </div>
 


    <div class="column one" style="    text-align: center;">
       <vue-recaptcha @verify="markRecaptchaAsVerified"
          sitekey="6LdhK-oUAAAAAN2UbbVzvrakJly-6B_I79BX3fE8">
       </vue-recaptcha>
    </div>
   
     
    <div class="col-lg-12 col-md-12" style="    text-align: center;">
          <button class="btn-info "style="padding:10px 20px 10px 20px">  تسجيل</button> 
    </div>
   
    



  </form>                   
</div>


 

   







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>



<script type="text/javascript">
 

  jQuery(function ($) {

    $('#course_sub_form').validate({
      rules: {
        phone_one:    {required: true},
        why_sub:    {required: true},
        free_time:    {required: true},
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
<script>
  var input = document.querySelector("#phone");
  window.intlTelInput(input, {
    nationalMode: false,
    placeholderNumberType:"MOBILE",
    separateDialCode:false,
    initialCountry:"pa",
    formatOnDisplay:true,
    geoIpLookup:'ar',
    localizedCountries: { 'ar': 'Palestine','ar': 'palestine', },
    utilsScript: "{{asset('/uploads/phone/build/js/utils.js')}}",
    onlyCountries: ['eg', 'pa', 'ps', 'uk', 'ly' ,'SD'  , 'IQ' , 'QA', 'SA' ,'PS'],
  });
</script>








