@extends('pages.profiles.index')


@section('profile_content')

 

 <section class="list-panels text-center">
    <div class="lists list-profile"><br>
      <h2 style="text-align: center;">الطلبات الصادرة</h2>

      <div class="section-padding">
        <div class="container">
          <div class="row">  
            <div class="list-details text-left">
              <div class="col-sm-12">
                <ul class="list-group">
                  @foreach($orders as $valuse)
                  <?php 
                  
                  $first_order_products = App\Models\Order_products::
                     where('order_code',$valuse->order_code)
                     ->first();
                  $first_product_items = App\Models\Product_items::
                      where('id',$first_order_products->product_id)
                      ->first();
                  ?>

                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-sm-2">
                        <a href="{{asset('sent_orders_details/'.$valuse->id)}}">
                          <img src="{{asset($first_product_items->image_one)}}" alt="talb" style="width:150px;">
                        </a>
                      </div>
                      <div class="col-sm-10">
                        <div style="margin-bottom: 30px;">
                          <a href="{{asset('sent_orders_details/'.$valuse->id)}}" style="color:#ee7b2a;font-size: 20px">اسم الطلب  : {{$valuse->full_name}}
                          </a>
                        </div>
                        <span style="display: block;margin-bottom: 10px;">
                          <strong> كود   الطلب : </strong>
                          {{$valuse->order_code}}
                        </span>
                        <span>
                          <strong>تاريخ الطلب : </strong>
                          @include('pages.arabic.date', ['date' => $valuse->created_at ])
                        </span>
                      </div>
                    </div>
                  </li>
                  @endforeach
                
               </ul>
              </div>
            </div>
          </div>
              
        @include('pages.paginator', ['paginator' => $orders])

      </div>
    </div>
  </div>
</section>


@endsection 

