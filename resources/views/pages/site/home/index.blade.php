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



    @include('pages.site.home.block-banner')


 

        @foreach(json_decode($store_details->home_slider_sort) as $key => $subject)
            @include('pages.component.products.modal.links')


            @if($subject->slider_type == 'moving_one_row_with_tabs_5')
            <?php $product_in_row = 5 ;?>
                @include('pages.component.products.moving_one_row_with_tabs.index', [
                    'order_type'     => $subject->order_type,
                    'product_in_row' => 6, 
                    'limit'          => 20, 
                    'title'          => "منتجات عشوائية", 
                    'rand'            => rand(),
                ])
          @endif 
        @endforeach







</div>
@endsection
