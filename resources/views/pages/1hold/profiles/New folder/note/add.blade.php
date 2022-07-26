@extends('pages.profiles.index')


@section('profile_content')
 <style type="text/css">
  .error{
    color: red;
  }
 </style>


 <div class="section-padding">
    <div class="container">
      <form id="add_note" method="post" class="wpcf7-form contact-form" action="{{ asset('/add_note') }}" enctype="multipart/form-data" style="padding-top: 0px;" >

      <input  name="user_id" value="{{Auth::guard('profile_users')->user()->id}}" hidden="">

        {{ csrf_field() }}
        <p>
          <span class="wpcf7-form-control-wrap">
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" value="" class="wpcf7-form-control" required="">
          </span>
        </p>
        
        <p>
          <span class="wpcf7-form-control-wrap">
            <label for="phone">التلفون</label>
            <input type="text" id="phone" name="phone" value="" class="wpcf7-form-control">
          </span>
        </p>
       <p>
          <span class="wpcf7-form-control-wrap">
              <label for="email">البريد الالكترونى</label>
            <input type="email" id="email" name="email" value="" class="wpcf7-form-control" >
          </span>
        </p>
        
       

      <p class="choose-table-form" style="text-align: center;"> 
        <input type="submit" value="ارسال" class="wpcf7-form-control wpcf7-submit"> 
      </p>
    </form><!-- /.contact-form -->

  </div>
</div>



<script type="text/javascript">
 

  jQuery(function ($) {

    $('#add_note').validate({
      rules: {
        name:    {required: true},
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

@endsection 