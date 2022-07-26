@extends('pages.profiles.index')


@section('profile_content')
 <style type="text/css">
  .error{
    color: red;
  }
 </style>

<div class="section-padding">
  <div class="container">
    <form id="add_product" method="post" class="wpcf7-form contact-form" action="{{ asset('/add_product') }}" enctype="multipart/form-data" style="padding-top: 0px;" >

      {{ csrf_field() }}

      <input  name="user_id" value="{{Auth::guard('profile_users')->user()->id}}" hidden="">
      <input  name="url"  hidden="" >

      <!-- ************ -->
      <p>
        <input type="button" class="btn" id="addcat-btn" style="line-height:35px;padding: 0px;" value="اضف قسم جديد"> 
        <input type="button" class="btn" id="choose-btn" style="line-height:35px;padding: 0px;" value=" اختيار قسم">
      </p>
      <p id="choose-field" >
        <span class="wpcf7-form-control-wrap" >
          <label for="cat">تحديد القسم</label>
          <select name="product_category_id"  id="cat" class="wpcf7-form-control">
            <option disabled="" selected=""> اختر القسم </option> 
            @foreach($product_categories as $val)
              <option value=" {{$val->id}}"> {{$val->home_title}}</option> 
            @endforeach   
          </select>
        </span>
      </p>
      <p id="addcat-field" >
        <span class="wpcf7-form-control-wrap" >
          <label for="home_title">اضف قسم جديد</label>
          <input type="text" id="home_title" name="home_title" value="" class="wpcf7-form-control"  placeholder="اضف قسم جديد">
        </span>
      </p>
      <!-- ************ -->

      <p>
        <span class="wpcf7-form-control-wrap">
          <label for="product_home_title">اسم المنتج</label>
          <input type="text" id="product_home_title" name="product_home_title" class="wpcf7-form-control" required="" placeholder="اسم المنتج مثال طبق السعادة ">
        </span>
      </p>
        
      <p>
        <span class="wpcf7-form-control-wrap">
          <label for="price">السعر</label>
          <input required="" type="number" id="price" name="price"   class="wpcf7-form-control" placeholder="80 SAR ">
        </span>
      </p>

      <p>
        <span class="wpcf7-form-control-wrap">
          <label for="home_subject">جملة تعريفية للمنتج</label>
          <textarea  id="home_subject" name="home_subject" class="wpcf7-form-control" style="height: 80px;" rows="2"  placeholder="جملة تعريفية للمنتج مكونه من 10 ل 15 كلمة"></textarea>
        </span>
      </p>
      <p>
        <span class="wpcf7-form-control-wrap">
          <label for="subject"> وصف المنتج</label>
          @include('pages.texteditor.summernote', [
            'value'=>'يمكنك وضع اى شىء هنا   <br> كلمات  -  الوان  -  اشكال   نسخت  من اى مكان  - صور  -  فديوهات من اليوتيوب', 
            'name' => 'subject',
            'placeholder'=>'جملة تعريفية للمنتج مكونه من 10 ل 15 كلمة  ' 
          ])
        </span>
      </p>

      <p>

        <div class="col-md-3 col-sm-6">
          <span class="wpcf7-form-control-wrap">
            <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
            <label for="image_one" style ="    width: 100%;">
                <img id="blah" class="lozad" data-src="{{asset('img/upload.jpg')}}" alt="your image" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
            </label>
            <input style="display: none;" id="image_one" type="file" class="form-control here" name="image_one" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
          </span>
        </div>

        <div class="col-md-3 col-sm-6">
          <span class="wpcf7-form-control-wrap">
            <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
            <label for="image_two" style ="    width: 100%;">
                <img id="blah2" class="lozad" data-src="{{asset('img/upload.jpg')}}" alt="your image" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
            </label>
            <input style="display: none;" id="image_two" type="file" class="form-control here" name="image_two" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
          </span>
        </div>

        <div class="col-md-3 col-sm-6">
          <span class="wpcf7-form-control-wrap">
            <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
            <label for="image_three" style ="    width: 100%;">
                <img id="blah3" class="lozad" data-src="{{asset('img/upload.jpg')}}" alt="your image" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
            </label>
            <input style="display: none;" id="image_three" type="file" class="form-control here" name="image_three" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
          </span>
        </div>

        <div class="col-md-3 col-sm-6">
          <span class="wpcf7-form-control-wrap">
            <p style="margin-bottom: 10px">رفع صورة المنتج بحجم 225 * 220</p>
            <label for="image_four" style ="    width: 100%;">
                <img id="blah4" class="lozad" data-src="{{asset('img/upload.jpg')}}" alt="your image" style="width: 225px;height:170px;margin-top: 10px;cursor: pointer" />
            </label>
            <input style="display: none;" id="image_four" type="file" class="form-control here" name="image_four" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
          </span>
        </div>

      </p>
   





      <p>
        <div class="col-md-6 col-sm-12">
          <br>
          <span class="wpcf7-form-control-wrap">
            <label for="search">الموضوع البحثى (لذياده فرص  ظهورك   فى محركات البحث )</label>
            <textarea style="height: 80px;" rows="2"  id="search-word" name="description" class="wpcf7-form-control"placeholder="   متجر  السعاده   طبق يسمى كذا  ضمن نوعيه الحلويات الممتازه"></textarea>

          </span>
        </div>

        <div class="col-md-6 col-sm-12">
          <br>
          <span class="wpcf7-form-control-wrap">
            <label for="search-word">الكلمات البحثية (لذياده فرص  ظهورك   فى محركات البحث )</label>
            <textarea style="height: 80px;" rows="2"  id="search-word" name="keywords" class="wpcf7-form-control"  placeholder="   متجر السعادة , طبق حلوى ممتاز , قسم الحلويات , توصيل الطلبات للمنازل "></textarea>
          </span>
        </div>
      </p>
      <p class="choose-table-form" style="text-align: center;"> 
         
        <input type="submit" value="اضافة منتج" class="wpcf7-form-control wpcf7-submit"> 
      </p>
    </form><!-- /.contact-form -->
  </div>
</div>


<script type="text/javascript">
 

  jQuery(function ($) {

    $('#add_product').validate({
      rules: {
        product_home_title:    {required: true},
        home_subject:    {required: true},
        image_one:    {required: true},
        price:    {required: true},
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











    <script>
      
      $("#addcat-field").css("display","none");
      $("#choose-btn").css("display","none");



      $("#addcat-btn").click(function(){
        $("#addcat-btn").css("display","none");
        $("#choose-btn").css("display","block");

        $("#choose-field").css("display","none");
        // $("#choose-field").empty();
        $("#addcat-field").css("display","block");


      });
      $("#choose-btn").click(function(){
        $("#choose-btn").css("display","none");
        $("#addcat-btn").css("display","block");


        $("#addcat-field").css("display","none");
        $("#addcat-field").empty();
        $("#choose-field").css("display","block");



      });
    </script>
@endsection 