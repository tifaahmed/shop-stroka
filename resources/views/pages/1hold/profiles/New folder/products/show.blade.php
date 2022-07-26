@extends('pages.profiles.index')


@section('profile_content')

<style type="text/css">
	.shop-products #list .buttons button, .shop-products #list .buttons a.fancybox {
	    padding: 9px 20px;
	}
	.shop-products button.add-to-cart i {
	    padding-right: 0px;
	}
</style>

  <section class="shop-contents">
    <div class="section-padding">
      <div class="container">

		<span class="addprofile-btn">
			<a href="{{asset('profile-add-product/'.$profile_users->url)}}" class="btn"><i class="fa fa-plus"></i>   اضف عرض</a>
		</span>

        <div class="shop-products">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in text-left" id="list">

            	
        		@foreach($product_items as $key => $val)
	            	<?php
	            	if (Auth::guard('profile_users')->user()) {
	            		$likes_count = App\Models\Likes::where('product_id',$val->id)
	            			->where('user_id',Auth::guard('profile_users')->user()->id)->count();
	            		$compares_count = App\Models\Compares::where('product_id',$val->id)
	            			->where('user_id',Auth::guard('profile_users')->user()->id)->count();	
            		}else{
            			$likes_count = 5;
            			$compares_count = 5;
            		}
	            		
            	 	?>
	              <div class="item media">
	             	<div class="update-shop">

	                  	<button class="btn edit-shop" data-toggle="modal" data-target="#editproduct{{$val->id}}">تعديل </button>

	                  	<a href="{{asset('dell_product/'.$val->url)}}">
	                  		<button class="btn remove-shop" >حذف</button>
	                  	</a>
	                  	
	              	</div>
	                <div class="item-thumbnail media-left">
	                	<a href="{{asset('/product/'.$val->url)}}">
	                  		<img width="304" height="304" class="lozad" data-src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
	                  	</a>
	                </div>
	               
	                <div class="item-content media-body">
	                  <h3 class="item-title">
	                  	<a href="{{asset('/product/'.$val->url)}}">{!! substr(strip_tags($val->home_title), 0, 150) !!}</a>
	                  </h3>
  
	                  <div class="item-price">
	                    <div class="current-price">
	                    	<span class="price">
	                    		@include('pages.arabic.number', ['number' => $val->price ])
	                    	</span>
	                    	<span class="currency">ريال</span>
	                    </div>
	                  </div>
                            

	                  <div class="">
	                  	<br>
	                  	<span class=""> رقم المنتج   : </span>
                    	<span class="">
                    		@include('pages.arabic.number', ['number' => $val->id ])
                    	</span>
	                  </div>



	                  <p class="description">
	                    {!! substr(strip_tags($val->home_subject), 0, 120) !!}
	                  </p>

	                  <div class="item-bottom">
	                    <div class="buttons">
	                      <button style="font-size: 20px;border-left: 1px solid #f0f0f0;" class="add-to-cart"> {{$val->order}} <i class="fa fa-shopping-cart"></i></button>
	                      <button  
	                      style="font-size: 20px;border-left: 1px solid #f0f0f0;" 
	                      class="wish-list"> 


	                      	@if( $likes_count == 0 )
	                      	<a href="{{asset('add_like/'.$val->id)}}">
	                      	  {{$val->wanted}} 
	                      	  <i class="fa fa-heart"></i>
	                      	</a>
	                      	@else
	                      	<a href="{{asset('dell_like/'.$val->id)}}">
	                      	  {{$val->wanted}} 
	                      	  <i style="color: #ee7b2a" class="fa fa-heart"></i>
	                      	</a>
	                      	@endif


	                      </button>
	                   
	                      <button 
	                      style="font-size: 20px;border-left: 1px solid #f0f0f0;" 
	                      class="compare"> 
	                      @if( $compares_count == 0 )
	                      <a href="{{asset('add_compare/'.$val->id)}}">
                         	{{$val->compared}} 
                        	<i  class="fa fa-exchange"></i>
	                      </a>
	                      @else
	                      <a href="{{asset('dell_compare/'.$val->id)}}">
	                        {{$val->compared}} 
	                        <i style="color: #ee7b2a" class="fa fa-exchange"></i>
	                      </a>
	                      @endif


		                      
		                  </button>


	                    </div>

	                   @include('pages.profiles.product_actions.rate')


	                  </div>
	                </div>
	              </div>
	              @include('pages.profiles.products.edit')

             	 @endforeach




            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.shop-products -->


        @include('pages.paginator', ['paginator' => $product_items])

      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /.shop-contents -->

<!-- Button trigger modal -->






@endsection 
