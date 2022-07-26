@extends('layout')

@section('title')
	<title>{{ $search_word}}</title>
@endsection



@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/products.css')}}">

@endsection

@section('content')
    @include('pages.partials.header')

    <div class="inner-page-banner" style="background:url({{asset($details->banner_image)}}) center center no-repeat;background-size: cover;">
        <div class="opacity">
            <div class="container text-center">
                <h2>  {{$details->page_title}}  </h2>
            </div> <!-- /.container -->
        </div> <!-- /.opacity -->
    </div> <!-- /.inner-page-banner -->


    <div class="row padding_two_sides  image_sides" style="    text-align: center;">
        @foreach($shop_talent as $key => $val)
            <div class="col-lg-2  col-lg-offset-1 col-md-4   col-sm-6 col-xs-12" style="    padding-bottom: 20px;" >
                <a href="{{asset('shop_talent/'.$val->home_title)}}">
                    <img style="width: 100%;height: 160px" class="image_shop lozad" data-src="{{asset($val->image_one)}}"  alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
                    <p class="shop_name"  >{{$val->home_title}}  </p>
                </a>
            </div>
        @endforeach
    </div>


    <div class="row search_row"  style="background-color: #ba4699;padding: 64px;">

        @include('pages.search.product_search', ['action_autocomplete' => 'product_search_autocomplete' , 'action_form'=> 'product_search' ,'field'=> 'home_title' ])
    </div>

     <div class="popular-course wow fadeInUp body-bg rate">
      @foreach($shop_talent as $val)
       <div class="row " style="padding: 0 26%;">
           
           <div class="  col-xs-4"   style=" z-index: 2;">
               <img class="side_image radios_image lozad" data-src="{{asset($val->image_one)}}" alt="{{$val->home_title}} " title="{{$val->home_title}} "  style="float: left;
                   height: 190px;
                   width: 190px;
                   margin-left: 0;">
           </div> 

           <div class="side_text  col-xs-8" style="   border: solid;
                       margin-top: 38px;
                       padding: 23px;
                       border-color: #ba4699;
                       margin-right: -7%;
                       " >
               <h3>
                   <span style="    padding-right: 8%;
                       font-size: 65px;
                       color: #ba4699;"> {{$val->home_title}} </span> 
               </h3> 
            </div> 
       </div>

       <?php 

       $sellers_ids = App\Models\Seller::where('talent',$val->id)->get()->pluck('id')->toArray();

       $products  = App\Models\Products::where('home_title','LIKE','%'.$search_word.'%')
       ->whereIn('seller_id',$sellers_ids)
       ->get();
        ?>
         <div class="row text-center" style="    padding: 139px;">
          @foreach($products as $val)
          <?php $seller_blade = App\Models\Seller::where('id',$val->seller_id)->first() ?>
          @if($seller_blade && $seller_blade->shop_name )
          @if($val->image_one || $val->youtube )
           <div class="col-lg-4  hvr-float-shadow">
               <div class="img-holder" style="height: 310px">
                  @if($val->image_one || $val->youtube )
                       @if($val->image_one )
                           <img style="width: 300px" class="slider_img" src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}"> 
                       @elseif($val->youtube)
                           <?php 
                             if(strlen($val->youtube) > 11)
                             {
                               preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $val->youtube , $match);
                             }
                           ?>
                           @if($match[1])
                               <iframe class="" width="100%" height="300" src="https://www.youtube.com/embed/{{$match[1]}}" frameborder="0"></iframe>
                           @endif 
                       @endif
                   @else
                   <h2>صورة او فديو</h2>
                   <img class="  w30   radios_image" src="{{asset('asset_ar/img/21-08.png')}}" alt=""> 
                   @endif
               </div>
               <div class="row">
                   <div class="  col-xs-12">
                       <div class="txt_holder" style="text-align: center;">
                       <br>
                       <a href="#" data-toggle="modal" data-target="#myModal_{{$val->id}}">

                       <p>
                        @if($seller_blade)

                           <span style="
                               padding: 10px;
                               border: solid;
                               border-radius: 10px!important;
                               border-color: #0cb7e3
                               "> 
                               {{$seller_blade->shop_name}}
                             </span>
                        @endif     
                       </p>
                       <br>
                       <p>
                           <span style="
                               padding: 10px;
                               border: solid;
                               border-radius: 10px!important;
                               border-color: #0cb7e3
                               ">    {{$val->home_title }}      </span>
                       </p>
                       <br>
                       <p>
                           <div class="module col-xs-12 star_rate"  >
                            @if( isset($seller_blade) && $seller_blade->rating > 0)
                               <ul>
                                  <?php 
                                  $avg =  $seller_blade->rating ;
                                  $average =  substr($avg, 0, 3);
                                  $star =  substr($avg, 0, 1);
                                  $dif = $average - $star ;
                                  ?>

                                  <?php
                                  $x = 0;
                                  $full =$star ;
                                  if ($full >= 5 ) {
                                      $full = 5 ;
                                  }
                                  for ($i=0; $i < $full; $i++) {                                  
                                  ?>
                                  <li class="li_c"><i class="fa fa-star" aria-hidden="true"></i></li>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  $half =$dif ;
                                  if ($half >= 0.5 ) {
                                      $x =1;
                                  ?>
                                  <li class="li_c"><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                  <?php
                                  }
                                  ?>

                                  <?php
                                  $empty =5 - $average -$x ;
                                  for ($i=0; $i < $empty; $i++) {                                     
                                  ?>
                                  <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                  <?php
                                  }
                                  ?>
                               </ul>
                               @else
                               <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                               <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                               <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                               <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                               <li class="li_c"><i class="fa fa-star-o" aria-hidden="true"></i></li>

                              @endif 
                           </div> 
                       </p>
                       <br><br><br>
                      </a>
                       </div>
                   </div>
               </div>
           </div> 
           @endif
           @endif
           @endforeach
          </div>

      @endforeach
    </div>



 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    @include('pages.partials.footer')


@endsection         
