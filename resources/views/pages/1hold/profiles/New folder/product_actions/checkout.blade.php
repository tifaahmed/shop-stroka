@extends('layout')


@section('title')
    <title>{{ $profile_users->full_name}}</title>
@endsection

@section('css')
@endsection

@section('content')
  @include('pages.partials.header')

  <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
  </script>
  <script src="https://unpkg.com/vue"></script>
  <script src="https://unpkg.com/vue-recaptcha@latest/dist/vue-recaptcha.js"></script>

  <link rel="stylesheet" href="{{asset('/uploads/phone/build/css/intlTelInput.css')}}">
  <link rel="stylesheet" href="{{asset('/uploads/phone/build/css/demo.css')}}">

  <style type="text/css">
    .error{
      color: red!important;
    }
    .iti__country-list {
      position: unset!important;
    }
    .iti--allow-dropdown{
      width: 100%
    }
  </style>


  <style type="text/css">
    .cart-table .order-item {
        padding: 19px 22px 10px 10px;
        position: relative;
        text-align: right;
      }
  </style>
  <section class="page-name-sec page-name-sec-01" style="background:url( 
    {{asset( 'img/pattern-1.jpg' )}} 
  )">
    <div class="section-padding">
      <div class="container">
        <h3 class="page-title">الفاتورة</h3>
        <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb text-right">
              <li><a href="{{asset('/')}}">الرئيسية</a></li>
              <li class="active">  الفاتورة  </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="checkout-section">
    <div class="section-padding">
      <div class="container">
        <form id="checkout_form" method="post" action="{{ asset('checkout_form') }}" enctype="multipart/form-data"  class="billing-form" >  
        <div class="row">
          <div class="col-md-7">
            <div class="billing-fields">
              <h3 class="title">بيانات الفاتورة</h3>

              
                <input  name="user_id" value="{{Auth::guard('profile_users')->user()->id}}" hidden="">
                <input  name="order_code" value="{{$cart->order_code}}" hidden="">
                <input  name="order_total_price" value="{{$total_order_shipping + $total_order_price}}" hidden="">

                {{ csrf_field() }}        
                <div class="row">
                  <div class="col-sm-12">
                    <input type="text" class="input-text " name="full_name" id="full_name" placeholder=" الاسم   رباعي   " value="" required=""> 
                  </div>
                  <div class="col-sm-12">
                    <input type="text" class="input-text " name="address_one" id="address_one" placeholder="عنوان  " value="" required="">
                  </div>
                  <div class="col-sm-12">
                    <input type="text" class="input-text " name="state" id="state" placeholder="المحلفظة*" value="" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="input-text " name="city" id="city" placeholder="المنطقة" value="" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="input-text " name="mail_code" id="mail_code" placeholder="الكود البريدى    (اختيارى)  " value="" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="input-text " name="email" id="email" placeholder="البريد الالكترونى       " value="" required="">
                  </div>
                  <div class="col-md-6">
                    <input type="tel" class="input-text " name="phone" id="phone" placeholder="الهاتف*" value=""required="">
                  </div>
                </div>
            </div><!-- /.billing-fields -->
          </div>

          <div class="col-md-5">
          
            <div id="order_review" class="woocommerce-checkout-review-order">
              <h3 class="title">طلبك</h3>

              <table class="cart-table">
                <thead>
                  <tr>
                    <th class="product-name"> المنتج</th>
                    <th class="product-total pull-right">الاجمالى</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($order_products as $value)
                  <?php 
                  $product_items = App\Models\Product_items::where('id',$value->product_id)->first();
                  ?> 
                    <tr class="cart_item">
                      <td class="product-name order-item">
                        <h3 class="item-title"> 
                            {!! substr(strip_tags($product_items->home_title), 0,50) !!}  
  
                          <span class="count"> x                         
                            @include('pages.arabic.number', ['number' => $value->quantity ])
                          </span>
                        </h3>              
                      </td>
                      <td class="product-name order-item">
                        <span class="amount">                     
                          @include('pages.arabic.number', ['number' => $value->product_total_price ])  ريال
                        </span>           
                      </td>
                    </tr>
                  @endforeach

                </tbody>

                <tfoot>
                  <tr class="cart-subtotal">
                    <th>الاجمالى</th>
                    <td class="pull-right">
                      <span class="amount">                        
                        @include('pages.arabic.number', ['number' => $total_order_price ])  ريال
                      </span>
                    </td>
                  </tr>

                  <tr class="shipping-total">
                    <th>الشحن</th>
                    <td class="pull-right">
                      <span class="amount">                        
                        @include('pages.arabic.number', ['number' => $total_order_shipping ])  ريال
                      </span>
                    </td>
                  </tr>

                  <tr class="order-total">
                    <th>اجمالى التكلفة</th>
                    <td class="pull-right">
                      <strong>
                        <span class="amount">
                        @include('pages.arabic.number', ['number' => $total_order_shipping + $total_order_price ]) ريال
                        </span>
                      </strong> 
                    </td>
                  </tr>
                </tfoot>

              </table>

              <div class="payment-method">
                  <div class="bank-method">
                    <input type="checkbox" name="bank_transfer" value="" id="bank_transfer" checked>
                    <label for="new-customer">نقدي    </label>
                  </div><!-- /.bank-method -->
                  <input type="submit" class="btn" name="submit" value="ارسل طلبك">

              </div><!-- /.payment-method -->
            </div><!-- /.order_review -->
          </div>
        </div><!-- /.row -->
        </form>

      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /.checkout-section -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->






    @include('vendor.flashy.message')
 


    @include('pages.partials.footer')


 
    <script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>
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

    <script type="text/javascript">
      jQuery(function ($) {

        $('#checkout_form').validate({
          rules: {
            full_name:    {required: true},
            address_one:    {required: true},
            state:    {required: true},
            mail_code:    {required: true},
            email:    {required: true},
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

    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 
