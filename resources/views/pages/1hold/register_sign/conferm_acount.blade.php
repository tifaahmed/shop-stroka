<!DOCTYPE html>
<html lang="en">

<?php 
  $lang_session =      Session::get('locale') ;
  $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
  if ($languages) {
    $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
  }else{
    $meta  = App\Models\Meta::find(1);
  }
?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($meta->site_icon)}}"  sizes="56x56"  >

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$meta->title}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<style>
body {
    background: linear-gradient(to right,#b74799,#0cb7e3)!important;
    padding: 1em 2em;
    text-align: center;
    margin: auto;
}
h2{
    color: white;
}
h5{
    color: #b74799
}
button {
   border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
    border-radius: 50px;
}
</style>
<body >
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>
    <h2 > <b>  تم تفعيل  الحساب     </b></h2>
    <br>
    <a href="{{$url}}">
        <button class=" "><h5>اضغط هنا إذا لم تحويلك تلقائيا‏</h5> </button>
    </a>
    

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script type="text/javascript">
     	$(document).ready(function(){
     		function loadlink(){

          var location = "{{$url}}";
     			window.location.replace(location);

     		}

     		setInterval(function(){
     		    loadlink() // this will run after every 5 seconds
     		}, 5000);

 		});


     </script>
</body>
</html>