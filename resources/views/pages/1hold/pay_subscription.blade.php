@extends('layout')

@section('title')
	<title>{{ $details->tab_title}}</title>
@endsection

@section('meta')
    <meta name="keywords" content="{{$details->keywords}}">

    <meta property="title"  content="{{$details->page_title}}"/>
    <meta property="og:title"  content="{{$details->page_title}}"/>
    <meta name="twitter:title" content="{{$details->page_title}}" />

    <meta name="description" content="{{$details->description}}">
    <meta property="og:description" content="{{$details->description}}"/>
    <meta name="twitter:description" content="{{$details->description}}" />

    <meta name="twitter:image" content="{{asset($details->banner_image)}}" />
    <meta property="og:image"     content="{{asset($details->banner_image)}}"/>
    <meta property="og:image:alt"     content="{{$details->banner_image_alt}}"/>

    <meta property="og:url"       content="{{Request::url()}}"/>

@endsection

@section('css')
    <style>
        body{
            /* line-height: 0; */
            height:1000px
        }
        @media (min-width: 1335px){
            /* .sign-bg {
                background:url('img/signin-m.png') center  center;    background-size: cover;
            } */
        }
        .btn-info {
            display: inline-block;
        }

        .sign-img {
            padding:0px 70px 0 100px;
        }
        body{
            /* padding-bottom: 141px; */

        }
        @media (min-width: 1200px){
            .container {
                width: 90%;
            }
            #phone ,  #phone2 {
            border: 1px solid #CCC;
            width: 360px;
            }
        }
        select,input,textarea{
            border-image-source: linear-gradient(to right,#b74799,#0cb7e3)  !important;
            border-width: 1pt !important;
            border-image-slice: 1 !important;
        }
        label , .form-group{
            color:#ba4699;
            text-align:right;
            padding:6px;
        }
        select {
            height: 35px;
            width: 100%;        
        }
        textarea{
            width:100%
        }
        .new4 {
             padding-bottom: 2px !important;
            position: relative;
            background: linear-gradient(to right,#b74799,#0cb7e3)!important; */
            padding: 1px;
        }
        .module {
            background: #fff;
            color:#ba4699;
            padding: 0.3rem;
        }
        /* ************************ */
        .background_perpel{
            margin-top:-105px;
            color : #fff;
        }
        .textalgin{
            text-align:center;
        }
        .padding_two_sides{
            margin: auto!important;
        }
        body{

            background: url({{asset('asset_ar/img/signin.png')}}) center center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection

@section('content')


 
<div class="container"  style="margin: auto;    background-color: white;     width: 86%; margin-top: 112px;   border: solid; border-radius: 37px;border-color: white" >
    <div class="row text-center">
        <div class=" col-md-12 col-md-offset-1">
            <div class="row " style="padding: 0 26%;">

                <div class="  col-xs-4"   style=" z-index: 2;">
                    <a href="{{asset('/')}}">

                    <img class="side_image radios_image" src="{{asset($details->banner_image)}}" alt=""  style="float: left;
                        height: 160px!important;
                        width: 160px!important;
                        margin-left: 0;">
                        </a> 

                </div> 
                <div class="side_text  col-xs-8" style="   border: solid;
                            margin-top: 38px;
                            padding: 23px;
                            border-color: #ba4699;
                            margin-right: -8%;
                            " >
                    <h3>
                        <span style="    font-size: 30px;color: #ba4699;">{{$details->home_title}}</span> 
                    </h3> 
                </div>

            </div>
        </div>
    </div>

    <div class="row text-center"  style="  
        text-align: center;
        font-size: 17px;
        padding: 10px;
        color: #ba4699;"
        >

        @foreach($items as $key => $val)

        <div class="col-lg-4 of col-md-6 col-sm-12">
            <div  style="    border: solid;
                border-radius: 10px;
                border-color: #ba4699;
                padding: 27px 24px;">
                <p style="font-size: 45px;">{{$val->home_title}}</p>
                <br>
                <p style="font-size: 30px;">{!!$val->home_subject!!} </p>
                <br>
 
            </div>
        </div>
        @endforeach



    </div>

    <hr class="new4">
    @if($details->table_subject_one)
    @foreach(json_decode($details->table_subject_one) as $key => $subject)

    <div class="row text-center"  style="  
        text-align: center;
        font-size: 17px;
        padding: 10px;
        color: #ba4699;"
        >
        <div class=" padding_two_sides textalgin " >
            <img   style="width:550px;height:180px" class=" padding_two_sides textalgin " src="{{asset('asset_ar/img/m-17.png')}}" alt="">
            <h2 class="background_perpel"> {{$subject->title}}  </h2>

        </div>
    </div>


    <div class="row text-center"  style="  
        text-align: center;
        font-size: 17px;
        padding: 0px 2%;color: #ba4699;"
        >
        <br><br>
        <div class=" col-sm-12" style="    border: solid;
                border-radius: 10px;
                border-color: #ba4699;
                padding: 27px 24px;">
            {!! $subject->subject !!}
        </div>
    </div>

    @endforeach
    @endif
 

 
</div>




    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')

@endsection