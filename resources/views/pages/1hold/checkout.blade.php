@extends('website.layout')

@section('title')
 حساب
@endsection
@section('content')       
<style type="text/css">
  .checkout-section input[type="radio"] {
      border: 1px solid #545454;
      border-radius: 0;
      height: 10px;
      width: 10px;
      position: relative;
  }
  .error{
    color: red !important
  }  

</style>
<section class="page-name-sec page-name-sec-01">
  <div class="section-padding">
    <div class="container">
      <h3 class="page-title">كشف حساب</h3>

      <div class="row"> 
        <div class="col-sm-7">
          <p class="description">
             المنتدى العربي لإدارة الموارد البشرية. 
          </p>
        </div>

        <div class="col-sm-5">
          <ol class="breadcrumb text-right">
            <li><a href="index.php">الرئيسية</a></li>
            <li class="active">كشف حساب</li>
          </ol>
        </div>

      </div>
    </div>
  </div>
</section>
<section class="checkout-section">
  <div class="section-padding">
    <div class="container">
      <form accept-charset="utf-8" class="billing-form" id="order_form" action="{{ asset('/order_form') }}" method="post" role="form"  enctype="multipart/form-data"  >         
      {{ csrf_field() }}    
        <div class="row">
          <div class="col-md-7">
           <div class="billing-fields">
              <h3 class="title">تفاصيل الفاتورة  </h3>
              <h3 class="validate" style="color: red;display: none;text-align: center;"> يجب ملئ كافة الخانات</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <input name="country" id="country_selector" type="text" placeholder="الدولة*">
                  </div>
                  <div class="col-md-6">
                    <input name="first_name" type="text" class="input-text " id="billing_first_name" placeholder="الاسم الاول*" value="">
                  </div>
                  <div class="col-md-6">
                    <input name="last_name" type="text" class="input-text "  id="billing_last_name" placeholder="الاسم الاخير*" value="">
                  </div>
                  <div class="col-sm-12">
                    <input name="address1" type="text" class="input-text "  id="billing_address_1" placeholder="عنوان 1*" value="">
                  </div>
                  <div class="col-sm-12">
                    <input name="address2" type="text" class="input-text "  id="billing_address_2" placeholder="عنوان 2*" value="">
                  </div>
                  <div class="col-sm-12">
                    <input name="city" type="text" class="input-text "  id="billing_city" placeholder="المدينة*" value="">
                  </div>
                  <div class="col-md-6">
                    <input name="state" type="text" class="input-text "  id="billing_state" placeholder="المحافظه" value="">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="input-text " name="postal_code" id="billing_postcode" placeholder="الكود البريدى*" value="">
                  </div>
                  <div class="col-md-6">
                    <input type="email" class="input-text " name="email" id="billing_email" placeholder="البريد الالكترونى" value="">
                  </div>
                  <div class="col-md-6">
                    <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="الهاتف*" value="">
                  </div>
                  <div class="col-md-12 bank">
                    <span> حدد الحساب البنكى </span>
                   <div class="form-group ">
                       <select class="form-control" name="bank_acount" required="">
                           <option selected>اختر  الحساب</option>
                           @if($bankacount->count() > 0)
                           @foreach($bankacount as $val)
                           <option value="{{$val->id}}">{{$val->bank_name}} :- {{$val->bank_number}}</option>
                           @endforeach
                           @endif
                       </select>
                   </div>
                  </div>
                  <div class="col-sm-6 bank">
                      <span>صورة الايصال </span>
                      <input id="imgInp" name="image_one" class="spr-form-input spr-form-input-text form-control imgInp1" type="file" >
                      <img style="width: 320px;height: 250px;" class="blah1 img-file" src="img/test-img.jpg" id="blah" alt="your image" />

                  </div>
                  <div class="col-md-6 bank">
                    <span>تاريخ الارسال</span>
                    <input type="date" class="input-text " name="transaction_date" id="billing_postcode" placeholder="الكود البريدى*" value="">
                  </div>
                  <div class="col-md-6 bank">
                    <span>الملاحظات</span>
                    <textarea  rows="10" class="spr-form-input spr-form-input-text form-control" name="comment" id="comment" placeholder="" value="">
                      </textarea>
                  </div>


                  <!-- bank_acount -->



                </div>
              
            </div>
          </div>

          <div class="col-md-5">
            <div id="order_review" class="woocommerce-checkout-review-order">
              <table class="cart-table2">
                <thead>
                  <tr>
                    <th style="width: 260px " class="product-name">المنتجات</th>
                    <th  style="width: 50px " class=" ">العدد</th>
                    <th style="width: 50px " class="product-total pull-right">الاجمالى</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $idswithkey = Session::get('idswithkey'); ?>
                  @foreach($productandcategory as $key => $val)
                    <tr class="cart_item">
                      <td style="width: 210px " class="product-name order-item">
                        <h3  class="item-title">
                          {{$val->product_or_category_title_ar}}
                        </h3>
                        <input type="" name="orders[]" hidden="" value="{{$val->id}}">
                      </td>

                      <td style="width: 50px "  class="product-total pull-right">
                        <span class="amount">${{$val->price_ar * $idswithkey[$val->id]}}</span>           
                      </td>
                      <td style="width: 70px " class="product-total pull-right">
                          <span class="count">(x {{$idswithkey[$val->id]}} )  </span>
                      </td>
                    </tr>
                  @endforeach
                  <input type="" name="orders_count" hidden="" value="{{Session::get('count')}}">

                </tbody>

                <tfoot>
                  <tr class="cart-subtotal">
                    <th>الاجمالى</th>
                    <?php 
                    $x = 0;
                    $idswithkey = Session::get('idswithkey'); 
                    foreach($productandcategory as $val){
                    $x = $x +  ($val->price_ar * $idswithkey[$val->id]) ;
                    }  
                    ?>
                    <td class="pull-right"><span class="amount">${{$x}}</span></td>
                    <input type="" name="total_price" hidden="" value="{{$x}}">

                  </tr>
                </tfoot>

              </table>

              <div class="payment-method">
                  <div class="bank-method" style="border-bottom: 2px solid #e8e8e8;">
                    <input type="radio" name="payment_method" value="1" id="bank_transfer" checked>
                    <label for="bank_transfer">عن طريق البنك مباشرة</label>
                    <p class="description1">
                      {!! $paymentmethod->bank_acount !!}
                    </p>
                  </div>
                  
                  <div class="cheque-method">
                    <input type="radio" name="payment_method" value="2" id="cheque_transfer">
                    <label for="cheque_transfer">2checkout</label>
                    <p class="description2" style="display: none">
                          {!! $paymentmethod->master_visa !!}
    
                    </p>
                  </div>

                  <div class="paypal-method">
                    <input type="radio" name="payment_method" value="3" id="paypal_transfer">
                    <label for="paypal_transfer">باى بيل</label>
                    <p class="description3" style="display: none">
                     {!! $paymentmethod->paypal !!}

                    </p>
                  </div>

                  
                  <input type="submit" class=" by_bank_submit" name="submit" value="ارسال الطلب"  style="display: none;">
                  <input type="button" class="btn by_bank"  value="ارسال الطلب"  >
                  <input type="submit" disabled name="name_by_checkout" type="button" class="btn by_checkout"   value="اكمال الدفع " style="display: none;" data-toggle="modal"  >
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>

  <!-- modal -->
  <!-- Button to Open the Modal -->



  </section>

<script type="text/javascript">
  $(document).on("change", "input[name=country] , input[name=first_name] ,input[name=address1],input[name=city],input[name=state],input[name=postal_code],input[name=email],input[name=phone]", function () {
    var country = $('input[name=country]').val();
    var first_name = $('input[name=first_name]').val();
    var address1 = $('input[name=address1]').val();
    var city = $('input[name=city]').val();
    var state = $('input[name=state]').val();
    var postal_code = $('input[name=postal_code]').val();
    var email = $('input[name=email]').val();
    var phone = $('input[name=phone]').val();

      if (country == '' || first_name == ''|| phone == ''|| address1 == ''|| city == ''|| postal_code == ''|| state == ''|| email == ''  ) {
        // alert('1');
        $('.validate').css('display', 'block');
      }else{
                // alert('2');
        $('.validate').css('display', 'none');
        $(".by_checkout").removeAttr("disabled") 

        $(".by_checkout").attr("title","متابعه عملية الشراء ");

      }
  });
  $(".by_checkout").prop("disabled","true");
  $(".by_checkout").attr("title","يجب ملئ الخانات اولا ");


</script>

  <script type="text/javascript">
    $('.description2').parent('div').children('p').hide('slow');
    $('.description3').parent('div').children('p').hide('slow');

     $('input[name=payment_method]').on('change', function(){
       var x = $("input[name='payment_method']:checked").val();
    if (x == 1 ) {
      $('.description1').parent('div').children('p').show('slow');
            $('.bank').show('slow');
            $('.by_bank').show('slow');
            $('.by_checkout').hide('slow');

            
      $('.description2').parent('div').children('p').hide('slow');
      $('.description3').parent('div').children('p').hide('slow');
     }else if(x == 2){
      $('.description1').parent('div').children('p').hide('slow');
            $('.bank').hide('slow');
            $('.by_bank').hide('slow');
            $('.by_checkout').show('slow');
            
      $('.description2').parent('div').children('p').show('slow');
      $('.description3').parent('div').children('p').hide('slow');
     }
     else if(x == 3){
      $('.description1').parent('div').children('p').hide('slow');
            $('.bank').hide('slow');
            $('.by_bank').hide('slow');
            $('.by_checkout').hide('slow');

      $('.description2').parent('div').children('p').hide('slow');
      $('.description3').parent('div').children('p').show('slow');
    }
     });
  </script>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) { $('#blah').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {readURL(this);});
    
    $(document).on('click', '.by_bank', function () {$('.by_bank_submit').click();});
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script type="text/javascript" src="{{asset('js/validator/jquery.validate.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/validator/additional-methods.js')}}"></script>

  <script type="text/javascript">
    
    jQuery(function ($) {
    // clint        Contact::create(request(['email','name_one','name_two','phone','message']));


      $('#order_form').validate({
        rules: {
          transaction_date:    {required: true,},
          email: {required: true,email: true },
          image_one: {required: true,},
          bank_acount: {required: true,},
          first_name: {required: true,},
          country: {required: true,},
          address1: {required: true,},
          city: {required: true,},
          state: {required: true,},
          postal_code: {required: true,},
          phone: {required: true,}
        }
      });
    });
  </script>
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





@endsection
