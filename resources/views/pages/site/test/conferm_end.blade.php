@extends('layout')


<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>


@section('title')
<title>{{$meta->title}}</title>

@endsection

@section('css')
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
@endsection
@section('content')  



<body >
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <h2 >   تم الانتهاء من الامتحانات  </h2>
    <br>
    
    @foreach( $test_sub as $key=> $val)
      <?php $test= App\Models\Test::where('id',$val->test_id)->first(); ?>

          <h2 >   عنوان الامتحان   : <b>{{$test->home_title}} </b></h2>
          <h2 >  الدرجة    <b> {{$val->degree}}       </b></h2>
          <br>
    @endforeach


    <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
      <button class=" "><h5>اضغط هنا       للعودة للرئيسية  </h5> </button>
    </a>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('vendor.flashy.message')



@endsection