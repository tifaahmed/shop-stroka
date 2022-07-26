@extends('website.layout')

@section('title')
 {{ __("static.join the course") }}
@endsection

@section('content')
<style type="text/css">
	.error{
		color: red
	}
</style>


<div class="inner-head">
     <div class="container">
        <h1 class="entry-title"> {{ __("static.Request to join the course") }} </h1>
            <div class="breadcrumb">
                 <ul class="clearfix">
                 	<li class="ib"><a href="{{asset('/')}}">{{trans('static.Home')}}</a></li>
                    <li class="ib current-page"> {{ __("static.Request to join the course") }} </li>
                </ul>
            </div>
        </div>
</div>
<div class="clearfix"></div>
 <section class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="login-form register">
                            <form id="register_form" action="{{ asset('/register_form') }}" method="post" role="form" >  				{{ csrf_field() }}		
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input">
                                            <input name="name" type="text" class="username-input" placeholder="{{trans('static.Your Name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input">
                                            <input  name="email"  type="text"  class="email-input" placeholder="   {{trans('static.Email Address')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="input">
                                            <input type="text" name="address" class="address-input" placeholder="{{trans('static.Address')}}">
                                        </div>
                                    </div>
                                   <div class="col-md-12 col-sm-12">
                                        <div class="input">
                                            <input  name="phone"  type="text"  class="phone-input" placeholder="{{trans('static.Number Phone')}}">
                                        </div>
                                    </div>
                                      <div class="col-md-12 col-sm-12">
                                        <div class="input">
                                            <select name="course" class="selectedd">
                                                <option disabled="" value="">{{trans('static.Select the course')}} </option>
                                                @foreach($products as $val)
                                                @if(\Session::get('locale') == 'ar')

                                                <option value="{{$val->id}}">
                                                	{{$val->product_or_category_title_ar}}
                                                </option>
                                                @else
                                                <option value="{{$val->id}}">
                                                	{{$val->product_or_category_title_en}}
                                                </option>

                                                @endif


                                                @endforeach    

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input clearfix">
                                            <input type="submit" id="reg_submit" class="submit-input grad-btn ln-tr" value="   {{trans('static.Registration in the course')}}">
                                        </div>
                                    </div>

                                    @if(\Session::get('locale') == 'ar')

                                    <span id="response" style="display: none;color: green">
                                    	تلقينا رسالتك وسنعاود الاتصال بك فى اقرب وقت 
                                    </span>
                                    @else
                                    <span id="response" style="display: none;color: green">
                                    	 message sent we will call you back
                                    </span>

                                    @endif
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
<div class="clearfix"></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validator/additional-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validator/amessages_ar.js')}}"></script>


<script type="text/javascript">
	jQuery(function ($) {
	// clint        Contact::create(request(['email','name_one','name_two','phone','message']));


		$('#register_form').validate({
			rules: {
			  name:    {required: true,minlength: 2,},
			  email: {required: true,email: true },
			  phone: {required: true,minlength: 11 ,digits: true,},
			  course:    {required: true,},
			  address:    {required: true,},
		},
		submitHandler: function (form, e) {
		  e.preventDefault();
		  var form = $(form);
		  var dataString = form.serialize();
		  $.ajax({
				type: "POST",
				url: form.attr('action'),
				data: dataString,
				dataType: "text",
				success: function(data)
				{
					document.getElementById("register_form").reset();
					$('#response').css('display', 'block');;
									},
				error: function(data)
				{alert('error try again layer');},
			});
		}
		}); 
	});



</script>
 
@if(\Session::get('locale') == 'ar')

	<script type="text/javascript">
		// $(document).ready(function(){



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



			// });

</script>
@endif
@endsection
