<?php 
$location = GeoIP::getLocation();
 ?>

<input type="" value="{{ csrf_token() }}" hidden name="_token" hidden=""> 
<input type="" name="ip" value="{{$location->ip}}" hidden="">
<input type="" name="iso_code" value="{{$location->iso_code}}" hidden="">
<input type="" name="country" value="{{$location->country}}" hidden="">
<input type="" name="city" value="{{$location->city}}" hidden="">
<input type="" name="state" value="{{$location->state}}" hidden="">
<input type="" name="state_name" value="{{$location->state_name}}" hidden="">
<input type="" name="postal_code" value="{{$location->postal_code}}" hidden="">
<input type="" name="lat" value="{{$location->lat}}" hidden="">
<input type="" name="lon" value="{{$location->lon}}" hidden="">
<input type="" name="timezone" value="{{$location->timezone}}" hidden=""> 
<input type="" name="continent" value="{{$location->continent}}" hidden="">
<input type="" name="currency" value="{{$location->currency}}" hidden="">
<input type="" name="url" value="{{Request::url()}}" hidden="">
<input type="" name="date" value="{{date('Y-m-d')}}" hidden="">
<input type="" name="unique" value="1" hidden="">


<script type="text/javascript">
  var token       = $('input[name=_token]').val();
  var ip          = $('input[name=ip]').val();
  var iso_code    = $('input[name=iso_code]').val();
  var country    = $('input[name=country]').val();
  var city        = $('input[name=city]').val();
  var state       = $('input[name=state]').val();
  var state_name  = $('input[name=state_name]').val();
  var postal_code = $('input[name=postal_code]').val();
  var lat         = $('input[name=lat]').val();
  var lon         = $('input[name=lon]').val();
  var timezone    = $('input[name=timezone]').val();
  var continent   = $('input[name=continent]').val();
  var currency    = $('input[name=currency]').val();
  var url    = $('input[name=url]').val();
  var date    = $('input[name=date]').val();
  var unique    = $('input[name=unique]').val();

  $(document).ready(function(){

    $.ajax({
      type: "POST",
      url: "{{asset('/site_visitor')}}",
      data:{'_token': token,
      'ip': ip,
      'iso_code': iso_code,
      'country': country,
      'city':city,
      'state':state,
      'state_name':state_name,
      'postal_code':postal_code,
      'lat':lat,
      'lon':lon,
      'timezone':timezone,
      'continent':continent,
      'currency':currency,
      'url':url,
      'date':date,
      'unique':unique,
      } ,

      success: function(data)
      {
      // if (data.fail) {
      //   $('.conferm').removeAttr("disabled");
      //  // $('.conferm').removeAttr("disabled");
      // alert('برجاء اكمال كافه بيانات الطلب  او احذف الطلب بأمله');
      // }else{
      //   $('.conferm').removeAttr("disabled");
      //   location.reload(true);
      // }
      },

    });  
  });
</script>