@extends('layout')

@section('title')
<title>{{$meta->title}}</title>
@endsection

@section('css')
    <style>
        body{
            height:1000px
        }
        .btn-info {
            display: inline-block;
        }

        .sign-img {
            padding:0px 70px 0 100px;
        }
        body{
            background: url( {{asset('asset_ar/img/signin.png')}} ) center center;
            background-size: cover;
            background-repeat: no-repeat;
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
    </style>
@endsection
@section('content')


 		<div class="container">
			<div class="row text-center" style="    background-color: white;   margin: auto; margin-top: 112px;width: 92%;border: solid;border-radius: 37px;border-color: white" >
  				<div class=" col-md-10 col-md-offset-1">
					<div class="sign-img">
                        <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                            <img width="200" src="{{asset('asset_ar/img/logo2.png')}}" alt="logo">
                        </a>
					</div>
				</div>
				

					<div class="row text-center"  style="    text-align: right;font-size: 17px;">
						<div class="col-lg-12 ">
                            @include('pages.submet.course_sub', ['action' => 'course_sub_form','courses'=>$courses])


                        </div>
                    </div>
                    

                    <br>
                    <br>
                    <br>
                    <br>

				</div>
			</div>
		</div>
 


@endsection
