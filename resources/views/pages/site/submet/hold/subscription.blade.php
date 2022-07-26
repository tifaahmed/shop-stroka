

            <form id="subscription_form" name="subscription_form" method="post" action="{{ asset('/subscription_form') }}" enctype="multipart/form-data" >  
              {{ csrf_field() }}     
            <form id=" ">
                <h4>انضم للقائمه البريدية  للحصول على احدث الاخبار</h4>
                <p>
                    <span>
                        <input type="email" name="email"   size="40" aria-required="true" aria-invalid="false" placeholder="Your email" />


                    </span>
                    <input type="submit" value="اشترك" id="submit_popup" >
                </p>
            </form>
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


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
            <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>


             <script type="text/javascript">
              jQuery(function ($) {

                $('#subscription_form').validate({
                  rules: {
                    email: {required: true,email: true,}     
                },
                submitHandler: function (form, e) {
                  e.preventDefault();
                  var form = $(form);
                  var dataString = form.serialize();
                  $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: dataString,
                    dataType: "text",
                    success: function(data)
                    {
                      document.getElementById("subscription_form").reset();
                      $('#response').css('display', 'block');
                              },
                    error: function(data)
                    {alert('error try again layer');},
                  });
                }
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