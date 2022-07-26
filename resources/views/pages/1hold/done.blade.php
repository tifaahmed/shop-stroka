@extends('layout')

@section('title')

	 @if(\Session::get('locale') == 'ar')
	 	<title>تم التفعيل </title>
	 @else
	 @endif


@endsection
@section('content')
<br><br><br><br><br><br>
<div class="pageContent" style="text-align: center;">
	<h1 style=" color: green">تم الاتفعيل بنجاح </h1>
    <h3> <a href="{{asset('/')}}">للعودة للموقع   اضغط هنا </a></h3>
</div>
<br><br>
@endsection