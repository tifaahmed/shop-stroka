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

    <h2 > <b>     يتم تسجيل الوقت  عند الدخول للامتحان    </b></h2>
    <br>
    <a href="{{asset('test_start/'.$test)}}">
        <button class=" "><h5>     البدئ الان    </h5> </button>
    </a>
    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@include('vendor.flashy.message')



@endsection