<!-- Modal -->
<div class="modal fade" id="editnote{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="editnote{{$val->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editproduct">تعديل المنتج</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_note" method="post" class="signup-form" action="{{ asset('/edit_note') }}" enctype="multipart/form-data" style="padding-top: 0px;" >
        {{ csrf_field() }}
        <div class="modal-body">
          <input  name="user_id" value="{{Auth::guard('profile_users')->user()->id}}" hidden="">
          <input  name="id" value="{{$val->id}}" hidden="">


                
          <p class="form-input">
            <label>الاسم</label>
            <input type="text" class="form-control" name="name" placeholder="الاسم" value="{{$val->name}}" required>
          </p>
          <p class="form-input">
            <label>الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="الهاتف" value="{{$val->phone}}" >
          </p>
          <p class="form-input" style="    padding-top: 14px;">
            <label>البريد الالكترونى</label>
            <input type="email" class="form-control" name="email" placeholder="الاسم" value="{{$val->email}}" >
          </p>

 
        
        </div>
        <div class="modal-footer">            <br>
          <p class="choose-table-form" style="text-align: center;"> 
            <br>
            <button type="submit" class="btn btn-primary" style="    background: #ee7b2a;border-color: #ee7b2a;color: #fff;">تعديل البيانات</button>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
 

  jQuery(function ($) {

    $('#edit_note').validate({
      rules: {
        name:    {required: true},
        phone:    {required: true},

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
@endif 



