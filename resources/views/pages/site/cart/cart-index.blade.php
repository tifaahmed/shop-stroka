@extends('layout')

@section('title')
<title>mmmmmmm</title>
@endsection

@section('css')
@endsection

@section('content')  
<div class="site__body">
    <div class="cart block">
        <div class="container">
            @include('pages.site.cart.cart-table')
            @include('pages.site.cart.cart-cuopon')
            @include('pages.site.cart.cart-total')
        </div>
    </div>
</div>
@endsection
