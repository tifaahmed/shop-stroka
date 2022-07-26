@extends('layout')

@section('title')
<title>{{$meta->title}}</title>
@endsection

@section('meta')
  <meta property="og:url"       content="{{Request::url()}}"/>
  <meta name="twitter:image" content="{{asset($meta->twitter_image)}}" />
  <meta property="og:image"     content="{{asset($meta->og_image)}}"/>
@endsection 

@section('css')
	<style>
        body{
            /* line-height: 0; */
            height:1000px
            background: url( {{asset('asset_ar/img/signin.png')}} ) center center;
                background-size: cover;
                background-repeat: no-repeat;
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
	</style>
@endsection
@section('content')
    <body class="shop-bg" style="">
 
 		<div class="container">
			<div class="row text-center" style="    background-color: white;   margin: auto; margin-top: 112px;width: 92%;    border: solid;
    border-radius: 37px;
    border-color: white" >
  				<div class=" col-md-10 col-md-offset-1">
					<div class="sign-img">
                        <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}">
                            <img width="200px" src="{{asset('asset_ar/img/logo2.png')}}" alt="happy logo">
							<div class="">
						</a>
					</div>
				</div>
				

					<div class="row text-center"  style="    text-align: right;font-size: 17px;">
						<div class="col-lg-12 ">
                            <style>
                                table td  , table tr, table th {
                                    font-size:25px;border: solid;border-color: #ba4699;color: #ba4699;text-align: center;
                                }

                            </style>
                            <table class="table" >
                                <thead>
                                    <tr >
                                        <th>#</th>
                                        <th>اسم المشترك</th>
                                        <th>البريد الالكترونى   </th>
                                        <th>رقم التواصل  </th>
                                        <th>المواعيد المناسبه للاشتراك </th>
                                        <th>تقييم المشترك</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses_subs as $key => $val)
                                    <?php  $talented = App\Models\Talented::where('id', $val->sup_id)->first(); ?>

                            
                                    <tr>
                                        <td>  {{++$key}}</td>
                                        <td><a href="{{asset('profile-talented/'.$talented->remember_token)}}"> {{$talented->full_name}}</a></td>
                                        <td>{{$talented->email}}</td>
                                        <td><a href="tel:{{$val->phone_one}}">{{$val->phone_one}}</a></td>
                                        <td>{{$val->free_time}}</td>
                                        <td>{{$val->rate}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>




                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-lg-12 col-md-12">
								<button class="btn-info "style="padding:10px 20px 10px 20px">  التالى</button> <br>
                        </div>
                    </div> -->
                    <br>
                    <br>
                    <br>
                    <br>

				</div>
			</div>
		</div>
 
	<!-- j Query -->
		<script type="text/javascript" src="vendor/jquery-2.1.4.js"></script>

		<!-- Bootstrap JS -->
		<script type="text/javascript" src="vendor/bootstrap/bootstrap.min.js"></script>

		<!-- Bootstrap Select JS -->
		<script type="text/javascript" src="vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>
		
		<!-- js count to -->
		<script type="text/javascript" src="vendor/jquery.appear.js"></script>
		<script type="text/javascript" src="vendor/jquery.countTo.js"></script>

		<!-- Theme js -->
		<script type="text/javascript" src="js/theme.js"></script>
         <script type="text/javascript">
         	$(".search").click(function() {
          $('.in-search').toggle();
            });
         </script>


		</div> 
    </body>   
@endsection 