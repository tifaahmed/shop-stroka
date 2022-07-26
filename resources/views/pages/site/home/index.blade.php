@extends('layout')

@section('title')
<title>mmmmmmm</title>
@endsection

@section('css')
@endsection

@section('content')  
<div class="site__body">

    @include('pages.site.home.slider.index', [
        'sliders'              => $sliders ,
        'video'              => $video ,
    ])
    
</div>
@endsection
