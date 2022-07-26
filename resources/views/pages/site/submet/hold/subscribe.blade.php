 <form    id="subscriptions_email_form" action="{{ asset('/subscriptions_email_form') }}" method="post"  role="form" >     {{ csrf_field() }}  

  <div class="d-flex flex-column flex-sm-row form-group">
    <input class="form-control mr-sm-2 mb-2 mb-sm-0 w-auto flex-grow-1 " name="email" placeholder="{{trans('static.email')}}" type="email" required>
    <button type="submit" class="btn btn-primary btn-loading sub_but" data-loading-text="Sending">
      <!-- Icon for loading animation -->
      <svg class="icon bg-white" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>Icon For Loading</title>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g>
            <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>
          </g>
          <path d="M12,4 L12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,10.9603196 17.7360885,9.96126435 17.2402578,9.07513926 L18.9856052,8.09853149 C19.6473536,9.28117708 20,10.6161442 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z"
          fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 12.000000) scale(-1, 1) translate(-12.000000, -12.000000) "></path>
        </g>
      </svg>
      <span> {{trans('static.Go')}}</span>
    </button>
  </div>

    <div class="alert alert-success" id="response2" style="display: none; font-size:16px">
      <strong> {{trans('static.Success!')}}</strong>
    </div>


</form>

<!-- <form  style="position: relative !important;margin-top: 30px !important;" id="subscriptions_email_form" action="{{ asset('/subscriptions_email_form') }}" method="post"  role="form" >     {{ csrf_field() }}  

    
    <input   style="margin-left: 57px !important; " class="form-control" type="email" value="" name="email" id="mce-EMAIL" placeholder="Email" required />

    <input style="margin-top: -46px !important;float: left;height: 47px" type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn main-bg" value="send" />
  
</form> -->



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript" src="{{asset('js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validator/additional-methods.js')}}"></script>



<script type="text/javascript">
    jQuery(function ($) {
        $('#subscriptions_email_form').validate({
            rules: {
                email: {
                      required: true,
                      email: true,
                      "remote": {
                          url: "{{asset('/email_validation')}}",
                          type: "get",
                          data: {
                              email: function() {
                                  return $('#subscriptions_email_form :input[name="email"]').val();
                              }
                          }
                      }
                  },   
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
                    document.getElementById("subscriptions_email_form").reset();
                    $('#response2').css('display', 'block');

                },

                error: function(data)
                {alert('error try again layer');},
            });
        }
        }); 
    });

</script>
 
@if(\Session::get('locale') == 'ar')

    <script type="text/javascript">
        // $(document).ready(function(){



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



            // });

</script>
@endif

 


