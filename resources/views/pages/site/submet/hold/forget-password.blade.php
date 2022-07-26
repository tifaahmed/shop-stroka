
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
	<form id="forget_password_form" method="post" action="{{ asset($action) }}" enctype="multipart/form-data" >  {{ csrf_field() }}       <!-- One Third (1/3) Column -->
		<div class="row text-center">
			<div class="col-lg-12 col-md-12">
				<fieldset>


                <div class="form-group">
						<label for="">  البريد الالكترونى  </label>
						<input class="form-control"   placeholder="xxx@xx.xxx " name="email" type="email" required="">
					</div>
							
				</fieldset>
			</div>
				<div class="column one">
			  	</div>	
			<div class="col-lg-12 col-md-12">
					<button class="btn-info "style="padding:10px 20px 10px 20px">  استعاده كلمة السر </button> <br>
					<vue-recaptcha @verify="markRecaptchaAsVerified"sitekey="6LdhK-oUAAAAAN2UbbVzvrakJly-6B_I79BX3fE8"></vue-recaptcha>
			</div>
		</div>
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
 

@if(session()->get('success'))
   <div class="alert alert-success">
        <ul>
                <p id="response" style="color: green">

                {{session()->get('success')}}</p>
        </ul>
    </div>
@endif
 








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>




<script type="text/javascript">
jQuery(function ($) {

 $('#forget_password_form').validate({
   rules: {
	   	email: {
	   	      required: true,
	   	      email: true,
	   	      "remote": {
	   	          url: "{{asset('/login_email_validation')}}",
	   	          type: "get",
	   	          data: {
	   	              email: function() {
	   	                  return $('#forget_password_form :input[name="email"]').val();
	   	              }
	   	          }
	   	      }
	   	  },   


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
 //       document.getElementById("forget_password_form").reset();
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








