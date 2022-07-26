@extends('layout')

@section('title')
<title>
  {{Auth::guard('seller')->user()->full_name}}
</title>
@endsection
@section('meta')

    <meta name="keywords" content="{{Auth::guard('seller')->user()->full_name}}">

    <meta property="title"  content="{{Auth::guard('seller')->user()->full_name}}"/>
    <meta property="og:title"  content="{{Auth::guard('seller')->user()->full_name}}"/>
    <meta name="twitter:title" content="{{Auth::guard('seller')->user()->full_name}}" />

    <meta name="description" content="{{Auth::guard('seller')->user()->description}}" />
    <meta property="og:description" content="{{Auth::guard('seller')->user()->description}}" />
    <meta name="twitter:description" content="{{Auth::guard('seller')->user()->description}}" />

    <meta name="twitter:image" content="{{asset(Auth::guard('seller')->user()->avatar)}}" />
    <meta property="og:image"     content="{{asset(Auth::guard('seller')->user()->avatar)}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection 

@section('css')
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/seler_edit.css')}}">
<style type="text/css">
    .li_c{
       display: inline-block;
       color: #ffba1f; 
    }

</style>
@endsection 

@section('content')
@include('pages.partials.header')






<br><br><br><br><br>

<div class="row" style="color: #fff;background-color: #ba4699;text-align: left;padding:100px;margin: auto; background-image: url({{asset(Auth::guard('seller')->user()->shop_logo)}});    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 400px
    ">
    <div class=" col-md-6"  >
        @if(!Auth::guard('seller')->user()->shop_logo)
        <h1 style="    color: #fff">
            اضف صوره
        </h1>
        @endif
    </div>
    <div class=" col-md-6"  >
        <form action="{{asset('profile_seller_update_logo')}}" method="post" enctype="multipart/form-data" style=" float: right;" >  
            {{ csrf_field() }}    
            <label for="shop_logo">
            <img style="     cursor: pointer;   border: solid; border-radius: 50%; width: 59px;border-color: white;" src="{{asset('asset_ar/img/21-08.png')}}" alt=""> 
            </label>
            <input class="here" id="shop_logo" type="file" name="shop_logo" />
        </form> 

    </div>
</div>
<div class="container container2">
    <div class="">

        <div class="row">

            <div class="col-lg-4 col-md-12"  >
                <br><br><br><br><br><br><br>
                <div class="new4 row">
                    <div class="module col-lg-12 col-md-12"  >

                        @if(Auth::guard('seller')->user()->avatar)
                        <img class="img_profile  margin_img   lozad" title="{{Auth::guard('seller')->user()->full_name}}"  data-src="{{asset(Auth::guard('seller')->user()->avatar)}}" alt="{{Auth::guard('seller')->user()->full_name}}">
                        @else
                        <img class="img_profile  margin_img radios_image lozad"    data-src="{{asset('asset_ar/img/17-06.jpg')}}" >
                        @endif

                        <div  class="image-upload puls_link margin_img">

                            <form action="{{asset('profile_seller_update_avatar')}}" method="post" enctype="multipart/form-data" >  
                                {{ csrf_field() }}      
                                <label for="avatar" style ="    width: 100%;">
                                    <img style ="cursor: pointer;" class="puls w30 radios_image lozad" data-src="{{asset('asset_ar/img/21-08.png')}}" alt="">  
                                </label>
                                <input id="avatar" type="file" class="form-control here" name="avatar" placeholder=" {{trans('static.Your image')}}" accept="image/png,image/jpeg,image/jpg">
                            </form> 

                        </div>


                        @if(Auth::guard('seller')->user()->handicap)
                        <br>
                        <img class="handy w50  margin_img radios_image lozad"  data-src="{{asset('asset_ar/img/17-04.jpg')}}" alt="">
                        @endif
                         
                        <br>
                       <div class="new4">
                           <div class="module"> {{Auth::guard('seller')->user()->full_name}} </div>
                        </div> 
                        <br>

 
                        <div class="new4">
                           <div class="module"> 
                                <?php       
                                    $selected_talent = App\Models\Shop_talent::find(Auth::guard('seller')->user()->talent);
                                ?> 
                                    {{ $selected_talent->home_title }}     
                                </div>
                        </div> 
                        <br> 
                        <div class="new4">
                           <div class="module">   {{Auth::guard('seller')->user()->address}}   </div>
                        </div>                        
                    </div> 
                </div>  

            </div>  
            <form  method="post" action="{{ asset('profile_seller_update_description') }}" enctype="multipart/form-data" >  
            {{ csrf_field() }} 
            <div class="col-lg-8 col-md-12"  >
                <br><br><br><br>
                <h2>   اسم المتجر     
                    <input type="text" name="shop_name" id="" style="width: 60%;" value="{{Auth::guard('seller')->user()->shop_name}}"> 
                </h2>
                <hr class='new4'>   
                <p class="fild_title">نبذه عن  المتجر </p> <br>

                <div class="new4  ">
                     <textarea class="module  h_about " name="description" id="" cols="30" rows="10">
                        {!!  Auth::guard('seller')->user()->description  !!}
                     </textarea>
                </div>

            </div>
            <br>
            <div class="col-lg-12 col-md-12" style="direction: ltr;" >
            <br>
                    <button class=" btn-info btn-lg">حفظ</button>
            </div> 
            </form> 


        </div> 


        <br> 
                
        <div class="row " >
            <div class="  col-xs-12" >
                <h2>
                الخدمات     : 
                </h2> 
                <hr class='new4'>   
            </div> 
            <div class="col-md-4  col-xs-12 text-center" >
                <a href="{{asset('seller_add_product')}}">
                    <br>
                    <button class="sub_b btn-primary btn-lg" style="height: auto;">اضف خدمة جديدة</button>
                    <br>
                </a>
            </div> 
            <div class="col-md-4  col-xs-12 text-center" >
                <a href="{{asset('chat_selling')}}">
                    <br>
                    <button class="sub_b btn-primary btn-lg" style="height: auto;">رسائل العملاء    </button>
                    <br>
                </a>
            </div>
            <div class="col-md-4  col-xs-12 text-center" >
                <a href="{{asset('chat_buying')}}">
                    <br>
                    <button class="sub_b btn-primary btn-lg" style="height: auto;">رسائل  المتاجر    </button>
                    <br>
                </a>
                <br>
            </div>  
        </div> 
        <br>

        <div class="row new4">
            <div class="module col-lg-12 col-md-12 col-sm-12"  >

                <div class=" col-sm-12"  >
                    <div class="popular-course wow fadeInUp body-bg talent-home">
                        <div class="container">
                            <div class="row text-center">
                                <div class="theme-slider course-item-wrapper" dir="ltr">
                                    <!--                                     
                                    <div class="item hvr-float-shadow">
                                        <div class="img-holder">
                                            <a href="" data-toggle="modal" data-target="#myModal1">
                                                <img class="slider_img" src="img/Love-your-product.png" alt="Image">
                                            </a>

                                        </div>
                                    </div> -->
        @foreach($products as $val)
        <div class="item hvr-float-shadow" style="height: 450px">
            <div class="img-holder  " >
                <div class="col-sm-12"    >
                    <a href="#" data-toggle="modal" data-target="#myModal_{{$val->id}}">
                        @if($val->image_one || $val->youtube )
                            @if($val->image_one )
                                <img style="height: 300px" class="radios_image" src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}"> 
                            @elseif($val->youtube)
                                <?php 
                                  if(strlen($val->youtube) > 11)
                                  {
                                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                                  }
                                ?>
                                @if($match[1])
                                    <iframe class="" width="100%" height="300" src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                                @endif 
                            @endif
                        @else
                        <h2>صورة او فديو</h2>
                        <img class="  w30   radios_image" src="{{asset('asset_ar/img/21-08.png')}}" alt=""> 
                        @endif
                        
                     </a>
                </div>
                <a href="#" data-toggle="modal" data-target="#myModal_{{$val->id}}">
                    <div class="row">
                        <div class="  col-xs-12">
                            <br> 
                            <div class="txt_holder" style="text-align: center;">
                                     <p>
                                        <span style="
                                            padding: 10px;
                                            border: solid;
                                            border-radius: 10px!important;
                                            border-color: #0cb7e3
                                            ">{{Auth::guard('seller')->user()->full_name}}</span>
                                    </p>
                                    <br>
                                @if($val->home_title )
                                    <p>
                                        <span style="
                                            padding: 10px;
                                            border: solid;
                                            border-radius: 10px!important;
                                            border-color: #0cb7e3
                                            ">   {{$val->home_title}}         </span>
                                    </p>
                                    <br>
                                @endif
                             </div>
                        </div>
                    </div>
                </a>
    
            </div>
        </div> <!-- /.item -->
        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  


   @foreach($products as $val)             
    <div id="myModal_{{$val->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{$val->home_title}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row ">
                    <form  method="post" action="{{ asset('profile_seller_update_product') }}" enctype="multipart/form-data" style="padding: 39px;text-align: center;">  
                    {{ csrf_field() }}     
                        <fieldset>
                            <input class="form-control"   value="{{$val->id}}"  name="id" type="text" hidden="" style="display: none;">

                            <div class="form-group">
                                <label for=""> رابط الفديو  </label>
                                <input class="form-control"   value="{{$val->youtube}}"  name="youtube" type="text">
                            </div>
                            <br>
                            <div class="or">
                                <h2><span>أو</span></h2>
                            </div>
                            <br>

                            <div class="form-group">
                                @if($val->image_one)
                                <img src="{{asset($val->image_one)}}">
                                @endif
                                <label for=""> صورة   </label>
                                <input class="form-control"    name="image_one" type="file" value="{{$val->image_one}}">
                            </div>
                            <hr class=new4> 
                            <div class="form-group">
                                <label for=""> عنوان الخدمة   </label>
                                <input class="form-control"   value="{{$val->home_title}}"  name="home_title" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">وصف الخدمة </label>
                                <textarea name="home_subject" id=""   rows="3" style="width:100%">
                                    {!!  $val->home_subject  !!}
                                </textarea>
                            </div>
                        </fieldset>
                        
                        <div class="col-lg-12  col-md-12">
                            <button type="submit" style="padding: 11px;" class="btn-info">حفظ</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <a href="{{asset('profile_seller_delete_product/'.$val->id)}}">
                        <button type="button" class="btn btn-danger" >حذف</button>
                        </a>

                            <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                        
                    </div>
                </div>

            </div>
        </div>
    </div> 
    @endforeach








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
    $("#shop_logo").change(function() {
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



@include('pages.partials.footer')
@include('pages.partials.side1')
@include('vendor.flashy.message')

@endsection
