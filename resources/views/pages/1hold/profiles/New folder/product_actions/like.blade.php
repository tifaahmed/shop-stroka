@extends('layout')


@section('title')
    <title>{{ $profile_users->full_name}}</title>
@endsection

@section('css')
@endsection

@section('content')
    @include('pages.partials.header')

<section class="page-name-sec page-name-sec-01" style="background:url({{asset('img/pattern-1.jpg')}})">
  <div class="section-padding">
    <div class="container">
      <h3 class="page-title">القائمة المفضلة</h3>
      <div class="row">
        <div class="col-sm-6">
          <ol class="breadcrumb text-right">
            <li><a href="{{asset('/')}}">الرئيسية</a></li>
            <li class="active">القائمة المفضلة</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
 
<section class="shop-contents">
  <div class="section-padding">
    <div class="container">


      <div class="shop-products">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in text-left" id="list">

            @foreach($product_items as $key => $val)
              <?php
              if (Auth::guard('profile_users')->user()) {
                // $likes_count = App\Models\Likes::where('product_id',$val->id)
                //   ->where('user_id',Auth::guard('profile_users')->user()->id)->count();
                $compares_count = App\Models\Compares::where('product_id',$val->id)
                  ->where('user_id',Auth::guard('profile_users')->user()->id)->count(); 
              }else{
                // $likes_count = 5;
                $compares_count = 5;
              }
                
              ?>
              <div class="item media">
                <div class="item-thumbnail media-left">
                  <a href="{{asset('/product/'.$val->url)}}">
                    <img style="height: 258px;width: 100%;" class="lozad" data-src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
                  </a>
                </div><!-- /.item-image -->
               
                <div class="item-content media-body">
                  <h3 class="item-title">
                    <a href="{{asset('/product/'.$val->url)}}">
                      {!! substr(strip_tags($val->home_title), 0, 150) !!}
                    </a>
                  </h3><!-- /.item-title -->

                  <div class="item-price">
                    <div class="current-price">
                      <span class="currency">SAR</span>
                      <span class="price">{{$val->price}}</span>
                    </div><!-- /.current-price -->
                  </div><!-- /.item-price -->

                  <p class="description">
                    {!! substr(strip_tags($val->home_subject), 0, 150) !!}
                  </p><!-- /.description -->

                  <div class="item-bottom">
                    <div class="buttons">
                      <button 
                      style="font-size: 20px;border-left: 1px solid #f0f0f0;" 
                      class="add-to-cart"> 
                        {{$val->order}} 
                        <i class="fa fa-shopping-cart"></i>
                      </button>
                      <button 
                      style="font-size: 20px;border-left: 1px solid #f0f0f0;" 
                      class="wish-list"> 
                        <a href="{{asset('dell_like/'.$val->id)}}">
                          {{$val->wanted}} 
                          <i style="color: #ee7b2a" class="heart fa fa-heart-o"></i>
                        </a>

                       


                      </button>
                   
                      <button style="font-size: 20px;border-left: 1px solid #f0f0f0;" class="compare"> 
                        @if( $compares_count == 0 )
                        <a href="{{asset('add_compare/'.$val->id)}}">
                          {{$val->compared}} 
                          <i class="fa fa-exchange"></i>
                        </a>
                        @else
                        <a href="{{asset('dell_compare/'.$val->id)}}">
                          {{$val->compared}} 
                          <i style="color: #ee7b2a" class="fa fa-exchange"></i>
                        </a>
                        @endif  

                        
                      </button>
                    </div><!-- /.buttons -->

                      @include('pages.profiles.product_actions.rate')





                  </div><!-- /.item-bottom -->
                </div><!-- /.item-details -->
              </div><!-- /.item -->
            @endforeach




          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.shop-products -->

      @include('pages.paginator', ['paginator' => $product_items])

    </div><!-- /.container -->
  </div><!-- /.section-padding -->
</section><!-- /.shop-contents -->

<!-- Button trigger modal -->


      @yield('profile_content')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    @include('vendor.flashy.message')
 


    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 
