@extends('layout')

@section('title')
<title>
  {{Auth::guard('trainer')->user()->full_name}}
</title>
@endsection
@section('meta')

    <meta name="keywords" content="{{Auth::guard('trainer')->user()->full_name}}">

    <meta property="title"  content="{{Auth::guard('trainer')->user()->full_name}}"/>
    <meta property="og:title"  content="{{Auth::guard('trainer')->user()->full_name}}"/>
    <meta name="twitter:title" content="{{Auth::guard('trainer')->user()->full_name}}" />

    <meta name="description" content="{{Auth::guard('trainer')->user()->description}}" />
    <meta property="og:description" content="{{Auth::guard('trainer')->user()->description}}" />
    <meta name="twitter:description" content="{{Auth::guard('trainer')->user()->description}}" />

    <meta name="twitter:image" content="{{asset(Auth::guard('trainer')->user()->avatar)}}" />
    <meta property="og:image"     content="{{asset(Auth::guard('trainer')->user()->avatar)}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection 
@section('css')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/edit-profile.css')}}">
@endsection 

@section('content')
@include('pages.partials.header')
    <br><br><br><br><br><br><br>
    <div class="container container2">
        
        <div class=" row">
            <div class="col-md-12">
                <h2>تعديل الحساب</h2>
                <hr class="new4">
            </div> 
        </div> 
                
        <div class="new4 row">
            <div class="col-lg-4 col-md-12">

                <div class="  row"  >
                    <div class="module  col-md-12"  >
                        @if(Auth::guard('trainer')->user()->avatar)
                        <img class="img_profile  margin_img radios_image lozad" title="{{Auth::guard('trainer')->user()->full_name}}"  data-src="{{asset(Auth::guard('trainer')->user()->avatar)}}" alt="{{Auth::guard('trainer')->user()->full_name}}">
                        @else
                        <img class="img_profile  margin_img radios_image lozad"    data-src="{{asset('asset_ar/img/17-06.jpg')}}" >
                        @endif
                    </div> 

                    <div class="module col-lg-3 col-md-5 col-sm-4  col-xs-4"  style="">
                        <form action="{{asset('profile_trainer_update_avatar')}}" method="post" enctype="multipart/form-data" >  
                            {{ csrf_field() }}      
                            <label for="avatar" style ="    width: 100%;">
                                <img style ="cursor: pointer; float: left;   margin-top: -87px;" class="w30 lozad" data-src="{{asset('asset_ar/img/21-08.png')}}" alt="">  
                            </label>
                            <input id="avatar" type="file" class="form-control here" name="avatar" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg">
                        </form> 
 
                    </div> 
                    <div class="module col-lg-9 col-md-7 col-sm-8 col-xs-8"  style="float: left;">
                    <br>
                    </div>
                        <br>
                        <div class="module col-xs-12 star_rate"  >
                            
                            <ul>
                                <?php
                                $average =  substr(Auth::guard('trainer')->user()->rating, 0, 3);
                                $star =  substr(Auth::guard('trainer')->user()->rating, 0, 1);
                                $dif = $average - $star ;


                                $x = 0;
                                $full =$star ;
                                if ($full >= 5 ) {
                                    $full = 5 ;
                                }
                                for ($i=0; $i < $full; $i++) {                                  
                                ?>
                                <li class="li_star"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <?php
                                }
                                ?>

                                <?php
                                $half =$dif ;
                                if ($half >= 0.5 ) {
                                    $x =1;
                                ?>
                                <li class="li_star"><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                <?php
                                }
                                ?>

                                <?php
                                $empty =5 - $average -$x ;
                                for ($i=0; $i < $empty; $i++) {                                     
                                ?>
                                <li class="li_star"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                <?php
                                }
                                ?>
                          
                            </ul>
                        </div> 
                </div>  
            </div> 
            <div class="module col-lg-1 hidden-md hidden-sm hidden-xs ">
                <img style="    height: 408px;" class="  margin_img radios_image" src="{{asset('asset_ar/img/10-02.png')}}" alt="">
            </div> 

            <div class="module col-lg-7 col-md-12" style=" padding-left: 24px; padding-right: 24px;padding-bottom: 19px;">
                <br>
                
                <form id="profile_trainer_update_iformation" method="post" action="{{ asset('profile_trainer_update_iformation') }}" enctype="multipart/form-data" >  
                {{ csrf_field() }}    
                    <div class="row"  >
                        <div class="col-lg-6 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">تعديل الاسم رباعي</label>
                                    <input class="form-control" placeholder=" محمد احمد محمد ابراهيم" name="full_name" type="text" value="{{Auth::guard('trainer')->user()->full_name}}">
                                </div>
                                <div class="form-group">
                                    <label for=""> مكان السكن     </label>
                                    <input class="form-control"  placeholder="  فلسطين , القدس  "  name="address" type="text" value="{{Auth::guard('trainer')->user()->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="">    كلمة المرور    </label>
                                    <input id="password" class="form-control" placeholder="**************" name="password" type="password" >
                                </div>
                                <div class="form-group">
                                    <label for="">تاريخ  الميلاد  </label>
                                    <input class="form-control"  name="birth" type="date" value="{{Auth::guard('trainer')->user()->birth}}">
                                </div>
                                <div class="form-group">
                                    <label for="">  رقم الهاتف  </label>
                                    <br>
                                    <input id="phone" name="phone_one" type="tel" value="{{Auth::guard('trainer')->user()->phone_one}}">
                                </div>

                            </fieldset>
                        </div> 

                        <div class="col-lg-6 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">تعديل  البريد الالكترونى       </label>
                                    <input class="form-control"  placeholder="xxx@xxx.xxx"  name="email" type="email" value="{{Auth::guard('trainer')->user()->email}}">
                                </div> 
                                <div class="form-group">
                                    <label for="">مجال التدريب     </label>
                                    <br>
                                    <select name="hoppy" id="">
                                        <option value="{{Auth::guard('trainer')->user()->talent}}" selected="" disabled=""> 
                                        <?php       
                                            $selected_talent = App\Models\Talent::find(Auth::guard('trainer')->user()->talent);
                                        ?> 
                                            {{ $selected_talent->home_title }}
                                        </option>
                                        @foreach($talent as $key => $val)
                                            <option value="{{$val->id}}">  {{ $val->home_title }}</option>
                                        @endforeach   
                                    </select>                           
                                </div> 
                                <div class="form-group">
                                    <label for="">  تاكيد  كلمة المرور    </label>
                                    <input class="form-control" placeholder="**************" name="password_check" type="password">
                                </div> 
                                <div class="form-group">
                                <br>
                                    <label for="birth" style="    width: 34%;" class="form-check-label">  اظهار تاريخ الميلاد  </label> 
                                     <input style="       height: 19px;width: 10%;" type="checkbox" class="form-check-input" name="show_birth" id="birth" value="1" {{ Auth::guard('trainer')->user()->show_birth  == 1 ? 'checked' : ' '  }}>
                                 </div> 

                                <div class="form-group"  >
                                    <label for="">  رقم بديل  </label>
                                    <br>
                                    <input style="width:100%"  id="phone2" name="phone_two" type="tel" value="{{Auth::guard('trainer')->user()->phone_two}}">
                                </div>  
                            </fieldset>
                            <!-- <input type="submit" name="click" class="click" value="click" > -->
                            <button type="submit" class="click" hidden=""></button>

                        </div> 
                    </div>  
                </form>
            </div> 
        </div>
        <br>
        <div class=" col-md-12" style="direction: ltr;" >
            <button class="update_iformation_submet" style="    padding-top: 5px;" class=" btn-info btn-lg">حفظ</button>

        </div> 

         <!--*********************************************************  -->
         <!--first  -->
        <div class="row " >
            <div class="   col-xs-10" style="    margin-top: 20px;"  >
                <h2>
                     تعديل النبذه الشخصية   : 
                </h2> 
            </div> 
        </div> 
        <form  method="post" action="{{ asset('profile_trainer_update_description') }}" enctype="multipart/form-data" >  
        {{ csrf_field() }}              
        <div class="new4 row">
                <div class="col-xs-12 " style="    padding: 1px;">
                    <textarea class="module  h_about " name="description" id=""  rows="3">
                        {!! Auth::guard('trainer')->user()->description !!}

                    </textarea>
                </div> 
            </div> 
            <br>
            <div class="  col-lg-12 col-md-12" style="direction: ltr;" >
                    <button style="    padding-top: 5px;" class=" btn-info btn-lg" type="submit">حفظ</button>
            </div> 
        </form>    
         <!--*********************************************************  -->
         <!--secound  -->
         <div class=" row">
            <div class="col-md-12">
                <h2>لوحة التحكم  </h2>
                <hr class="new4">
            </div> 
        </div> 

         <div class=" row">
            <div class=" col-xs-12 col-sm-6" style="  ">
            <a href="{{asset('profile-trainer-courses')}}">
                <button style="       font-size: 25px;padding: 24px 8px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;line-height: 2px;" class="btn-info" >
                   اضافه / تعديل الدورات 
                </button>   
                </a>    
            </div> 
            <div class=" col-xs-12 col-sm-6" style="  ">
                <button style="       font-size: 25px;padding: 24px 8px;border-radius: 10px!important;border-color: #0cb7e3;margin: auto;line-height: 2px;" class="btn-info"  disabled="">
                       اضافه / تعديل البرامج التدريبيه المسجلة
                </button>   
             </div> 
        </div> 
        <br>




 
    </div> 
    <script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

    <script type="text/javascript">
        $("#avatar").change(function() {
             this.form.submit();
        });
    </script> 
    <script type="text/javascript">
        $(document).ready(function(){
            $(function() {
                $('.update_iformation_submet').click(function(e) {
                    // $('#profile_trainer_update_iformation').submit();
                     $(".click").click();
                     
                 });
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(function ($) {
            $('#profile_trainer_update_iformation').validate({
            rules: {
              full_name:  {required: true,minlength: 2,},
              email: {
                    required: true,
                    email: true,
                    "remote": {
                        url: "{{asset('/profile_edit_email_validation')}}",
                        type: "get",
                        data: {
                            email: function() {
                                return $('#profile_trainer_update_iformation :input[name="email"]').val();
                            }
                        }
                    }
                }, 
              password:    {},
              password_check: {equalTo: "#password",},
              birth:  {required: true,},
              phone_one:  {required: true,},
              phone_two:  {required: true,},

              
              rolls: {required: true},        
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

    <script>
        $(document).ready(function(){
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);

            $('.rating input').click(function () {
                $(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
            function(){
                var userRating = this.value;
                // alert(userRating);
            }); 
        });
    </script>

@include('pages.partials.footer')
@include('pages.partials.side1')
@include('vendor.flashy.message')

@endsection
