
<style type="text/css">
    .error{
        color: red
    }
</style>


<form id="comment_form" name="comment_form" method="post" action="{{ asset($action) }}" enctype="multipart/form-data" >  
  {{ csrf_field() }}       
 
  <input type="" name="related_id" value="{{$id}}" hidden="">              
    <div class="form-row">
      <div class="col-sm">
        <div class="form-group">
          <label>{{trans('static.Your image')}}</label>
          <input type="file" class="form-control" name="image" placeholder=" {{trans('static.Your image')}}" accept="image/png, image/jpeg">
        </div>
      </div>

    </div>
  <div class="form-row">
    <div class="col-sm">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="{{trans('static.Your Name')}}">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="{{trans('static.email')}} ">
      </div>
    </div>
  </div>
  <div class="form-group">
    <textarea name="subject" rows="8" class="form-control" placeholder=" {{trans('static.Your comment')}}"></textarea>
  </div>
  <div class="d-flex justify-content-end">
    <button style="" class="btn btn-outline-primary hover color" type="submit">{{trans('static.Add Reply')}} </button>
  </div>
</form>


@if(session()->get('sucess_comment'))
<br>
<div class="alert alert-success">
{{session()->get('sucess_comment')}}
</div>
@endif
























<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>



 <script type="text/javascript">
  jQuery(function ($) {
    $('#comment_form').validate({
      rules: {
        name:    {required: true,minlength: 2,},      
        subject:    {required: true,},
        image:    {required: true},
        email: {
             required: true,
             email: true,                         
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
      //       document.getElementById("billing_form").reset();
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