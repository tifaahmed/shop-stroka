@extends('layout')


@section('title')
<title>
       {{$test->tab_title}}
</title>
@endsection
@section('css')
<style>
    *{
        font-family: cl;
    }
    label , .form-group{
        color:#ba4699;
        text-align:right;
        font-size: 20px;
    }
    input, select {
    border: 1px solid #CCC;
    width: 25px;
    }
    #phone ,  #phone2 , select{
        border: 1px solid #CCC;
        width: 350px;
    }
    select{
        font-size:20px;
        line-height: 3em;
    }
    .sign-img {
        padding: 0px 100px 0 100px;
    }
    .btn-info {
        display: inline-block;
    }
    select,input,textarea{
        border-image-source: linear-gradient(to right,#b74799,#0cb7e3)  !important;
        border-width: 1pt !important;
        border-image-slice: 1 !important;
    }
    .row{
        margin : auto;
    }
    @media (min-width: 992px){
        .container {
            padding-right: 50px !important;
            padding-left:  50px !important;
        }
    }
    /* ********************* */
    .fild_title{
        text-align: right;                 
        color:#ba4699;
    }
    .new4 {
     padding: 2px;
     padding-bottom: 2px !important;
    position: relative;
    background: linear-gradient(to right,#b74799,#0cb7e3)!important; 
    padding: 3px;
    }
    .new5 {
      padding-bottom: 7px !important;
    position: relative;
    background: #ba4699!important; 
    padding: 7px;
    }
    .module {
        background: #fff;
        color:#ba4699;
        padding: 0.5rem;
    }
    button{
        padding-top: 0px;
    }
    body {
        background: url({{asset('asset_ar/img/signin.png')}}) center center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>
@endsection 
@section('content') 


        <br><br>
        <div class="container" style="padding-right:0px;padding-left:0px; background-color:#fff">
            <div class="row text-center">

                <div class="col-lg-12 col-md-12 logo"  >
                    <div class="sign-img">
                        <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                            <img width="250px" src="{{asset('asset_ar/img/logo2.png')}}" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 fild_title"  >
                    <h2 class="" style="color:#ba4699;">{{$test->home_title}}‏ </h2>
                    <hr class='new4'>   
                </div>




                <form id="test_end_form" method="post" action="{{ asset('test_end_form') }}" enctype="multipart/form-data" >
                     {{ csrf_field() }}

                    <input  name="sud_id"  value="{{Auth::guard('talented')->user()->id}}"  hidden="">
                    <input  name="test_id"  value="{{$test->id}}"  hidden="">
                    <input  name="end"  value="{{date('Y-m-d H:m:s')}}"  hidden="">

                    <div class="col-lg-12 col-md-12"  >
                        <div class="row text-center">
                            <div class="col-lg-12  ">
                                <fieldset>
                                    @if($test->question_answer)
                                    @foreach(json_decode($test->question_answer) as $key=> $subject)
                                    <div class="form-group">
                                        <br>
                                        <label for="">
                                            {!! $subject->question !!}
                                        </label>
                                        <br>   <br>
                                        <div class="row text-center">
                                            <div class="col-lg-12 ">
                                                <label class="form-check-label">{!!  $subject->answer_one !!}
                                                    <input type="radio" class="form-check-input" name="answer_{{$key}}" id="" value="{{ ( $subject->correct_one == 1 ?  $subject->dgree : 0  ) }}  "  >
                                                </label>
                                                <br><br>
                                                <label class="form-check-label"> {!!  $subject->answer_two !!}
                                                    <input type="radio" class="form-check-input" name="answer_{{$key}}" id="" value="{{ ( $subject->correct_two == 1 ?  $subject->dgree : 0  ) }}  "  >
                                                </label>
                                                <br><br>
                                                <label class="form-check-label"> {!!  $subject->answer_three !!}
                                                    <input type="radio" class="form-check-input" name="answer_{{$key}}" id="" value="{{ ( $subject->correct_three == 1 ?  $subject->dgree : 0  ) }}  "  >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </fieldset>
                            </div>
                        </div> 
 

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <br>
                                <button type="submit" class="btn-info" style="font-size: 25px;">تم الانتهاء</button>
                            </div>
                        </div>
                    </div>
            
                </form>


            </div>
        </div>
 

        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s p-color-bg">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </button>
        


 


        <!-- Js File_________________________________ -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


@endsection 