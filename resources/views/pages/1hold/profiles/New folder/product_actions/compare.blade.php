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
        <h3 class="page-title">مقارنة المنتجات</h3>
        <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb text-right">
              <li><a href="{{asset('/')}}">الرئيسية</a></li>
              <li class="active">مقارنة المنتجات</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 </section>
  <section class="list-panels text-center">
    <div class="lists shop-products">
      <div class="section-padding">
        <div class="container">
          <div class="row">
            @foreach($product_items as $key => $val)
            <?php
            $likes_count = App\Models\Likes::where('product_id',$val->id)
              ->where('user_id',Auth::guard('profile_users')->user()->id)->count(); 
            ?>
              <div class="col-sm-3">
                <div class="panel panel-default">  
                  <div class="item">
                    <div class="item-thumbnail">
                      <a href="{{asset('/product/'.$val->url)}}">
                        <img class="lozad" data-src="{{asset($val->image_one)}}" alt="{{$val->image_one_alt}}" title="{{$val->image_one_alt}}">
                      </a>
                    </div><!-- /.item-thumbnail -->
                    
                    <div class="item-content">
                      <div class="buttons">

                        <button style="font-size: 20px;border-left: 1px solid #f0f0f0;width: 30%;" class="add-to-cart">
                          <i  class="fa fa-shopping-cart"></i>
                          {{$val->order}} 
                        </button>

                        <button style="font-size: 20px;border-left: 1px solid #f0f0f0;width: 30%;" class="wish-list">
                            @if( $likes_count == 0 )
                            <a href="{{asset('add_like/'.$val->id)}}">
                              <i   class="fa fa-heart"></i> 
                                {{$val->wanted}}
                            </a>
                            @else
                            <a href="{{asset('dell_like/'.$val->id)}}">
                              <i style="color: #ee7b2a" class="fa fa-heart"></i> 
                              {{$val->wanted}}
                            </a>
                            @endif
                           
                        </button>

                        <button style="font-size: 20px;border-left: 1px solid #f0f0f0;width: 30%;" class="trash">
                          <a href="{{asset('dell_compare/'.$val->id)}}">
                            <i class="fa fa-trash"></i>
                          </a>
                        </button>
                      </div>
                      <h3 class="item-title">                    
                        <a href="{{asset('/product/'.$val->url)}}">
                          {!! substr(strip_tags($val->home_title), 0, 150) !!}
                        </a>
                      </h3>

                      <div class="item-price">
                        <span class="currency">SAR</span>
                        <span class="price">{{$val->price}}</span>
                      </div><!-- /.item-price -->
                      @include('pages.profiles.product_actions.rate')


                    </div><!-- /.item-content -->
                  </div><!-- /.item -->
                </div>
              </div>
              @endforeach

            </div>
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.section-padding -->
 
    </div><!-- /.panels -->
  </section><!-- /.list-panels -->
 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    @include('vendor.flashy.message')
 


    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 
