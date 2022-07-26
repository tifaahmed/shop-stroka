<?php 
if (isset($disabled)) {
  # code...
}else{
 $disabled = 0 ; 
}
?>
<div class="rating">
	<form id="rate_form{{$val->id}}" class="signup-form" method="post" action="{{ asset('rate_form') }}" enctype="multipart/form-data">
		@if(Auth::guard('profile_users')->user())
			<input  
			value="{{Auth::guard('profile_users')->user()->id}}"
			name="user_id" 
			hidden="">
		@endif
		<input 
		value="{{$val->id}}"
		name="product_id" 
		hidden="">

	  {{ csrf_field() }}
  	<input type="hidden"
 
  	class="rating-tooltip-manual rate_product{{$val->id}}" 
  	data-filled="fa fa-star" 
  	data-empty="fa fa-star-o" 
  	data-fractions="2"
  	value="{{$val->rate}}" 
  	name="rate"
  	{{ Auth::guard('profile_users')->user() &&  $disabled == 0 ? '' : 'disabled'}}

  	/>
  	<button type="submit" class="submit{{$val->id}}" hidden=""></button>
</form>

<script>
  $(".rate_product{{$val->id}}").change(function() {
       $( ".submit{{$val->id}}" ).click();
  });
</script>
<!-- 		                  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('/js/validator/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/validator/additional-methods.js')}}"></script>

<script type="text/javascript">
  jQuery(function ($) {
    $("#rate_form{{$val->id}}").validate({
      rules: {
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
      });
    }
    }); 
  });
</script> -->


</div>