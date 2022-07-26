@extends('layout')


@section('title')
<title>
    بيانات  المحكم
</title>
@endsection

@section('meta')
  <meta property="og:url"       content="{{Request::url()}}"/>
  <meta name="twitter:image" content="{{asset($meta->twitter_image)}}" />
  <meta property="og:image"     content="{{asset($meta->og_image)}}"/>
@endsection 

@section('css')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
  <style>
      label , .form-group{
          color:#ba4699;
          text-align:right
      }
      .row{
          margin : auto;

      }
      @media (min-width: 992px){
          .container {
              padding-right: 190px !important;
              padding-left: 0px !important;
          }
      }
      .logo{
          padding-bottom: 51px !important;
          padding-left: 178px;
      }
      input, select {
      border: 1px solid #CCC;
      width: 25px;
    }
    #phone ,  #phone2 , select{
          border: 1px solid #CCC;
          width: 350px;
      }
      select{
          font-size:20px;
          line-height: 3em;
      }
      .sign-img {
          padding: 0px 100px 0 100px;
      }
      .btn-info {
          display: inline-block;
      }
      select,input,textarea{
          border-image-source: linear-gradient(to right,#b74799,#0cb7e3)  !important;
          border-width: 1pt !important;
          border-image-slice: 1 !important;
      }
  </style>
  
@endsection 

@section('content')
<div class="container" style="padding-right:72px;padding-left: 72px;">
    <div class="row text-center">
        <div class="col-lg-12 col-md-12 logo"  >
            <div class="sign-img">
                <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                    <img width="200px" src="{{asset('asset_ar/img/logo2.png')}}" alt="habby logo">
                </a>
            </div>

        </div>
        <form id="register_judge_secound_form" method="post" action="{{ asset('register_judge_secound_form') }}" enctype="multipart/form-data" >                 
            {{ csrf_field() }}  
            <input type="" name="id" value="{{$judges->id}}" hidden="">  
            <input id="remember_token" type="" name="remember_token" value="{{$judges->remember_token}}" hidden="">  
            <div class="col-lg-10 col-md-9"  >
                <div class="row text-center">
                    <div class="col-lg-6 col-md-12">
                        <fieldset>
                            <div class="form-group">
                                <label for="">الاسم رباعي</label>
                                <input class="form-control" placeholder=" محمد احمد محمد ابراهيم" name="full_name" type="text" value="{{$judges->full_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="">تاريخ  الميلاد  </label>
                                <input class="form-control"  name="birth" type="date" value="{{$judges->birth}}">
                            </div>
                            <div class="form-group">
                                <br>
                                <label for="">الجنس : </label>
                                <label class="form-check-label">  ذكر 
                                	<input type="radio" class="form-check-input" name="gender" id="" value="1"  
                                    {{ $judges->gender == 1 ? 'checked' : ' '  }}   >
                                </label>
                                <label class="form-check-label">  انثى 
                                    <input type="radio" class="form-check-input" name="gender" id="" value="0" 
                                    {{ $judges->gender == 0 ? 'checked' : ' '  }} >
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">  رقم الهاتف  </label>
                                <br>
                                <input id="phone" name="phone_one" type="tel" value="{{$judges->phone_one}}">
                            </div>
                            <div class="form-group">
                                <label for="">  اخر شهادة دراسية حصلت عليها       </label>
                                <select name="education_level" id="">
                                  
                                    <option value="{{$judges->education_level}}" selected="" disabled="">
                                      @if($judges->education_level == 5)
                                      دبلوم
                                      @elseif($judges->education_level == 6)
                                      بكالوريوس
                                      @elseif($judges->education_level == 7)
                                      ماجستير
                                      @endif
                                    </option>

                                    <option value="5">  دبلوم  </option>
                                    <option value="6"> بكالوريوس </option>
                                    <option value="7"> ماجستير  </option>
                                </select>                                
                            </div> 
                            <div class="form-group">
                                <label for=""> عدد سنوات الخبره فى مجال تخصصك     </label>
                                <input class="form-control"  placeholder="2"  name="experience_years" type="number" value="{{$judges->experience_years}}">
                            </div>
                            <div class="form-group">
                                <label for="">ارفاق ملف ال cv  الخاص بك   </label>
                                <input class="form-control"    name="cv" type="file">
                            </div>
                            <div class="form-group">
                                <label for="">مجال التدريب  الذى سوف تقدمه على منصه habby  </label>
                                <br>
                                <select name="talent" id="">
                                  @foreach($talent as $key => $val)
                                      <option value="{{$val->id}}">  {{ $val->home_title }}</option>
                                  @endforeach    
                                </select>
                            </div>   
                        </fieldset>
                    </div>
             
                    

                    <!-- *********************************************** -->

                    <div class="col-lg-6 col-md-12">
                        <fieldset>
                            <div class="form-group">
                                <label for=""> رقم الهويه او جواز  السفر</label>
                                <input class="form-control" placeholder="  12345678910" name="personal_id" type="text" value="{{$judges->personal_id}}">
                            </div>
                            <div class="form-group">
                                <label for=""> مكان السكن     </label>
                                <input class="form-control"  placeholder="  فلسطين      "  name="address" type="text" value="{{$judges->address}}">
                            </div>
                            <div class="form-group">
                                <label for="">  البريد الالكترونى       </label>
                                <input class="form-control"  placeholder="  xxx@xxx.xxx"  name="email" type="email" value="{{$judges->email}}" disabled="">
                            </div>   
                            <div class="form-group" style="padding-top:12px">
                                <label for="">  رقم بديل  </label>
                                <br>
                                <input id="phone2" name="phone_two" type="tel" value="{{$judges->phone_two}}" >
                            </div>
                            <div class="form-group">
                                <label for="">   مجال تخصصك         </label>
                                <input class="form-control"  placeholder=" حاسب الى , تجاره      "  name="job_field"  type="text" value="{{$judges->job_field}}">
                            </div>
                            <div class="form-group">
                                <label for=""> وظيفتك الحالية      </label>
                                <input class="form-control"  placeholder="مهندس مدنى , نجار  "  name="job_name" type="text" value="{{$judges->job_name}}">
                            </div> 
                            <div class="form-group">
                            </div>


                        </fieldset>
                    </div>                
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="">  تحدث عن خبراتك قى مجال تحكيم  المواهب    </label>
                             <textarea name="experience_des" id="" style="width: 100%" rows="5">{{$judges->experience_des}}</textarea>
                        </div>
                    </div>                


                    <div class="col-lg-12  col-md-12">
                            <button  class="btn-info">ارسال</button>
                    </div>

                </div>
            </div>
        </form>


    </div>
</div>

<?php $url = 'conferm_send/1/'.$judges->remember_token ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>
<script type="text/javascript">
 
  jQuery(function ($) {

    $('#register_judge_secound_form').validate({
      rules: {
        full_name:    {required: true},
        birth:    {required: true},
        gender:    {required: true},
        phone_one:    {required: true},
        education_level:    {required: true},
        experience_years:    {required: true},
        cv:    {required: true},
        talent:    {required: true},
        personal_id:    {required: true},
        address:    {required: true},
        email:    {required: true},
        phone_two:    {required: true},
        job_field:    {required: true},
        job_name:    {required: true},
        training_center:    {required: true},
        training_center_name:    {required: true},
        experience_des:    {required: true},
                            
    },
    // submitHandler: function (form, e) {
      // e.preventDefault();
      // var form = $(form);
      // var dataString = form.serialize();
      // $.ajax({
      //   type: "POST",
      //   url: form.attr('action'),
      //   data: dataString,
      //   dataType: "text",
      //   success: function(data)
      //     {
      //       alert('تم  ارسال البيانات بنجاح '+"\n"+'فى حاله حدوث خطا  فى ملئ البيانات تواصل مع الادمن ');        	
      //       var location = "{{asset($url)}}";
      //       	window.location.replace(location);
      //     },
      //   error: function(data)
      //     {
      //   	 alert('حدث خطا حاول مرة اخرى');
      //     },
      // });
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
	var input = document.querySelector("#phone2");
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