@extends('layout')

@section('title')
    <title>{{ $details->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$details->keywords}}">

    <meta property="title"  content="{{$details->page_title}}"/>
    <meta property="og:title"  content="{{$details->page_title}}"/>
    <meta name="twitter:title" content="{{$details->page_title}}" />

    <meta name="description" content="{{$details->description}}">
    <meta property="og:description" content="{{$details->description}}"/>
    <meta name="twitter:description" content="{{$details->description}}" />

    <meta name="twitter:image" content="{{asset($details->home_image_one)}}" />
    <meta property="og:image"     content="{{asset($details->home_image_one)}}"/>
    
    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection
 
@section('css')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
<style>
    *{
        font-family: cl;
    }
    label , .form-group{
        font-size: 15px;
        color:#ba4699;
        text-align:right
    }
    body{
        background: url( {{asset('asset_ar/img/signin.png')}} ) center center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    

    .row{
        margin : auto;

    }
    .iti__country-list {
    position: relative!important;
    }
    @media (min-width: 992px){
        .container {
            padding-right: 50px !important;
            padding-left:  50px !important;
        }
    }

    input, select {
        border: 1px solid #CCC;
        width: 25px;
    }
    #phone ,  #phone2 , select{
        border: 1px solid #CCC;
        width: 300px;
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
    /* ********************* */
    .fild_title{
        text-align: right;                 
        color:#ba4699;

    }
    .new4 {
     padding: 2px;
     padding-bottom: 2px !important;
    position: relative;
    background: linear-gradient(to right,#b74799,#0cb7e3)!important; 
    padding: 3px;
    }
    .new5 {
      padding-bottom: 7px !important;
    position: relative;
    background: #ba4699!important; 
    padding: 7px;
    }
    .module {
        background: #fff;
        color:#ba4699;
        padding: 0.5rem;
    }
    button{
        padding-top: 0px;
    }
 
   body .main-page-wrapper {
        overflow-x: unset;
   }
</style>
@endsection


@section('content')
<br><br>
    <div class="container" style="padding-right:0px;padding-left:0px; background-color:#fff">
        <div class="row text-center">

            <div class="col-lg-12 col-md-12 logo"  >
                <div class="sign-img">
                    <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                        <img width="200" src="{{asset('asset_ar/img/logo2.png')}}" alt="logo">
                    </a>
                </div>
            </div>

            <div class="col-xs-12 fild_title"  >
                <h2 class="" style="color:#ba4699;">{{$details->page_title}}‏  </h2>
                <hr class='new4'>   

            </div>




            <form id="donate_form" method="post" action="{{ asset('donate_form') }}" enctype="multipart/form-data" >                 
                {{ csrf_field() }}  
                <div class="col-lg-12 col-md-12"  >
                    <div class="row text-center">
                        <div class="col-lg-4  ">
                            <h2 class="" style="color:#ba4699;">برجاء تحديد قيمه التبرع</h2>
                        </div>
                        <div class="col-lg-5  ">
                                <div class=" ">
                                    <input style ="font-size: 30px;height: 54px;text-align: center;padding-left: 8px;" class="form-control" placeholder="  $0.0      " name="mony" type="number">
                                </div> 
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="col-lg-5 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for=""> البرنامج                                      
                                    </label>

                                        <select name="talent" id="" style="width: 100%;height: 37px;">
                                          @foreach($talent as $key => $val)
                                              <option value="{{$val->id}}">  {{ $val->home_title }}</option>
                                          @endforeach    
                                        </select>
                                    <span style="font-size: 16px;">اختر البرنامج المراد التبرع له</span>
                            
                                </div>
                                <div class="form-group">
                                    <label for="">  البريد الالكترونى       </label>
                                    <input class="form-control"  placeholder="  xxx@xxx.xxx"  name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="hide" id="" value="1" checked>
                                        اريد ان يكون تبرعي مجهول الهويه
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">   اسم المتبرع   </label>
                                    <input class="form-control" placeholder=" محمد احمد ابراهيم " name="full_name" type="text">
                                </div>
                                
                                <br><br>
                                <div class="form-group">
                                    <label for="">  رقم الهاتف  </label>
                                    <br>
                                    <input id="phone" name="phone_one" type="tel">
                                </div>
                            </fieldset>
                            <br>
                        </div> 
                    </div>

                    <div class="row  ">
                    <br> 
                        <h2  style="    color: #ba4699; text-align: right; "> العنوان البريدي  </h2> 
                        <br>  
                    </div> 
                    <div class="row new4">
                        <div class="module col-lg-6 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">   الدولة </label>
                                    <input class="form-control" placeholder=" فلسطين , القدس  " name="country" type="text">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="">العنوان 2  </label>
                                    <input class="form-control" placeholder="  محافظه - مدينه - منطقه - شارع - عماره  " name="address_two" type="text">
                                </div>
                            </fieldset>
                        </div>   
                        <div class="module col-lg-6 col-md-12">
                            <fieldset>
                                <div class="form-group">
                                    <label for="">  العنوان 1 </label>
                                    <input class="form-control" placeholder=" محافظه - مدينه - منطقه - شارع - عماره  " name="address_one" type="text">
                                </div>
                                
                                 
                                <div class="form-group">
                                    <label for=""> المدينة </label>
                                    <input class="form-control" placeholder=" اسم المدينة " name="city" type="text">
                                </div>
                            </fieldset>
                        </div>               
                    </div>       



                    <br>
                    <br>

                    <div class="row " style="text-align :right">
                        <div class="new5 col-lg-12 col-md-12">
                            <h2 style="color:#fff" >{{$details->table_title_one}}</h2>
                        </div>   
                        <div class=" col-lg-12 col-md-12" style="border-style: solid;border-color: #ba4699;">
                            @if($details->table_subject_one)
                            @foreach(json_decode($details->table_subject_one) as $key => $subject)
                                <p style="font-size: 20px;color: #ba4699;padding: 8px;" > 
                                    {!! $subject->subject !!}
                                </p>
                            @endforeach
                            @endif
                         </div>        
                    </div> 

                    <br>




                    <div class="row">
                        <div class="col-lg-12  col-md-12">
                            <button type="submit" class="btn-info" style="font-size: 25px;">متابعة</button>
                        </div>
                    </div>

                </div>
            


            </form>


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('/uploads/phone/build/js/intlTelInput.js')}}"></script>

    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>
    <script type="text/javascript">
     
      jQuery(function ($) {

        $('#donate_form').validate({
            rules: {
                mony:    {required: true},

                full_name:    {required: true},
                talent:    {required: true},
                email:    {required: true},
                phone_one:    {required: true},

                // anonymous:    {required: true},

                country:    {required: true},
                address_one:    {required: true},
                 city:    {required: true}
            }
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