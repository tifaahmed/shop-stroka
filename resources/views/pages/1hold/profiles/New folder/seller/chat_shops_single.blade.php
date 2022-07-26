
@extends('layout')
<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>

@section('title')
<title>
التواصل مع المتاجر
</title>
@endsection
@section('css')
<style type="text/css">
	.send-message .message-box {
	width: 100%;
	    height: 400px;
	    border: 1px solid #2da0d6;
	    padding: 20px;
	}
	.send-message .messages .import, .send-message .messages .export {
	    padding: 10px 15px;
	    background: #ba4699;
	    color: #fff;
	    margin-bottom: 20px;
	    font-size: 18px;
	}
	.send-message .box-title h2 {
	    background: #2da0d6;
	}
	.error{
        color: red
	}
</style>
@endsection

@section('content')
@include('pages.partials.header')
<br><br><br><br><br><br> 
<div class="send-message body-bg">
 	<div class="container">
 		<div class="row text-center">
 		<div class="col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-5">
 			<div class="box-title">
 				<h2>رسائل  المتاجر</h2>
 			</div>
 		</div>
 		</div>
 		<div class="row messages">
            <div class="col-md-4">
                     @foreach($shops as $val)
                     <div  class="col-md-8">
                         <?php 
                         $single_chat_count =  App\Models\Shop_chat::
                         where('buyer_id',Auth::guard('seller')->user()->id)
                         ->where('seller_id',$val->id)
                         ->where('message_seller',0)
                         ->where('mark',0)
                         ->count();
                         ?>
                         <a href="{{asset('chat_buying_specified/'.$val->remember_token)}}" style="width: 100%">
                             <div class="import">
                                 <img src="{{asset($val->avatar)}}" alt="chat" style="width: 33px;height: 33px;border-radius: 50%;display: inline;margin-left: 5px;">
                                 <strong>{{$val->shop_name}}</strong><span style="background-color: #fff;color: #ba4699;padding: 2px 7px;float: left;">{{$single_chat_count}}</span>
                             </div>
                         </a>
                     </div>
                     <div  class="col-md-4">
                         <button  data-toggle="modal" data-target="#Modal_info{{$val->id}}" class="  btn-info btn-block ">معلومات</button>
                         <button  data-toggle="modal" data-target="#Modal_rate{{$val->id}}" class="  btn-info btn-block ">التقييم</button>
                     </div>
                     @endforeach

                 </div>

 		<div class="col-md-8">
 			<div class="message-box"  style="    overflow-y: scroll;">

            @foreach($single_chat as $val)
            
            	@if($val->buyer_id == Auth::guard('seller')->user()->id && $val->message_buyer != null)
	 			<div class="recive" style="padding:5px;">
	 			    <p><img src="{{asset(Auth::guard('seller')->user()->avatar)}}" alt="chat" style="width: 33px;height: 33px;border-radius: 50%;display: inline;margin-left: 5px;"> {!! $val->message_buyer !!}</p>
	 			</div>
	 			@endif

	 			@if($val->seller_id == $single_seller->id && $val->message_seller != null)
	 			<div class="replay" style="background: #dad8d8;margin-top:20px;padding:5px;direction: ltr;">
	 			    <p><img src="{{asset( $single_seller->avatar)}}" alt="chat" style="width: 33px;height: 33px;border-radius: 50%;display: inline;margin-left: 5px;"> {!! $val->message_seller !!}.</p>
	 			</div>
	 			@endif

 			@endforeach


 			</div>

 			<form id="chat_form" method="post" action="{{ asset('chat_form') }}" enctype="multipart/form-data" >                 
 			         {{ csrf_field() }}	 			
	         	<div class="write-message" style="margin-top:20px;border:1px solid #2da0d6;padding:5px;">
	 			    <input type="" name="seller_id" value="{{$single_seller->id}}" hidden>
	 			    <input type="" name="buyer_id" value="{{Auth::guard('seller')->user()->id}}" hidden>
	 			    <input type="" name="poduct_buy_id" value="{{$poduct_buy->id}}" hidden>
                    <textarea rows="1"  name="message_buyer" style="width:100%;border:none"></textarea>

	 			</div>
	 			<div class="send-btns" style="margin-top:20px;">
	 			    <button type="submit" class="btn" style="background: #2da0d6;color:#fff;font-size: 18px;float: left;">أرسل الرسالة</button>
	 			</div>
 			</form>

 		</div>


      </div>
 	</div>
</div>

@include('pages.profiles.seller.shop_rate' )
@include('pages.profiles.seller.shop_info' )
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>




<script type="text/javascript">
    jQuery(function ($) {
        $('#chat_form').validate({
            rules: {
                message: {required: true,},   
        },

        }); 
    });

</script>
 

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



</script>
@include('vendor.flashy.message')

@endsection