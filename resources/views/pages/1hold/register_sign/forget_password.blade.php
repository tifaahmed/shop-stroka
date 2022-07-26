
@extends('layout')


<?php 
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
?>


@section('title')
<title>{{$meta->title}}</title>
@endsection


@section('meta')
@endsection

@section('css')
@endsection


@section('content')  
    @include('pages.partials.header')

<section class="page-name-sec page-name-sec-01" style="background:url('img/pattern-1.jpg')">
        <div class="section-padding">
      <div class="container">
        <h3 class="page-title">استعادة الرقم السرى</h3>
        <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb text-right">
              <li><a href="index.php">الرئيسية</a></li>
              <li class="active">استعادة الرقم السرى</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="checkout-section">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="title">
                    استعادة الرقم السرى
                    </h2>

                    <div class="methods">
                      @include('pages.submet.forget-password', ['action' => 'forget_password_form'])


                     
                    </div><!-- /.methods -->
                </div>
            </div>
        </div>
    </div>
</section>
    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')
@endsection





