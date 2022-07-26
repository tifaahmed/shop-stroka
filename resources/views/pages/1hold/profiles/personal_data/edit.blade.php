





<div class="modal fade" id="user_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">
          تعديل البيانات
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </h3>

      </div>

      <form id="profile_update_iformation" class="signup-form" method="post" action="{{ asset('profile_update_iformation') }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="modal-body">
            <p class="form-input">
              <label>رفع صورة</label>
                <input type="file" class="form-control" name="avatar" placeholder=" {{trans('static.Your image')}}" accept="image/png, image/jpeg, image/jpg">

              @if($profile_users->avatar)
              <img src="{{asset($profile_users->avatar)}}" alt="{{$profile_users->full_name}}" title="{{$profile_users->full_name}}">
              @endif
            </p>
            <p class="form-input">
              <input type="text" class="form-control" value="{{$profile_users->full_name}}" name="full_name" placeholder="الاسم" required>
            </p>
           
            <p class="form-input">
               <textarea placeholder="العنوان" style="width: 100%" name="address">
                 {!! $profile_info->address !!}
               </textarea>
            </p>
           
 
            <p class="form-input" style="    height: 71px;
    padding-top: 19px;">
              <input type="email" name="email" id="email"   class="form-control" placeholder="البريد الالكترونى"  >
              <br>
            </p>            
            <p class="form-input"  >
              <input type="text" name="phone" id="phone"   class="form-control" placeholder="الهاتف"   >
              <br>
            </p>

            <p class="form-input"  style="padding-top: 19px;">                             
              <input type="password" id="password" class="form-control" name="login_password"  placeholder="تغيير كلمة السر" >
            </p>
            <p class="form-input">                               
              <input type="password" class="form-control"  name="password_check" placeholder="تاكيد كلمة السر" >
            </p>

        </div>
        <div class="modal-footer" style="    text-align: center;">
          <button type="submit" class="btn btn-primary">تعديل البيانات</button>
        </div>
      </form>

    </div>
  </div>
</div>










<script type="text/javascript">
 

  jQuery(function ($) {

    $('#profile_update_iformation').validate({
      rules: {
        full_name:    {required: true,minlength: 2,},
        phone: {
          "remote": {
            url: "{{asset('/register_phone_validation')}}",
            type: "get",
            data: {
              phone: function() {
                  return $('#profile_update_iformation :input[name="phone"]').val();
              }
            }
          }
        },  
        email: {
          "remote": {
            url: "{{asset('/register_email_validation')}}",
            type: "get",
            data: {
              email: function() {
                  return $('#profile_update_iformation :input[name="email"]').val();
              }
            }
          }
        },       
        address: {required: true,}, 
        password_check: {equalTo: "#password",},
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










