@extends('layout')


@section('title')
    <title>{{ $profile_users->full_name}}</title>
@endsection

@section('css')
@endsection

@section('content')
  @include('pages.partials.header')
  <section class="page-name-sec page-name-sec-01" style="background:url('img/pattern-1.jpg')">
        <div class="section-padding">
      <div class="container">
        <h3 class="page-title">سلة المشتريات</h3>
        <div class="row">
          <div class="col-sm-6">
            <ol class="breadcrumb text-right">
              <li><a href="{{asset('/')}}">الرئيسية</a></li>
              <li class="active">سلة المشتريات</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
 </section>

  <section class="cart-section">
    <div class="section-padding">
      <div class="container">
        <div class="per-order-items">

          <table class="cart-table">
            <tbody>
              <tr class="order-head">
                <th>المنتجات</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الاجمالى</th>
              </tr>
              @foreach($order_products as $value)
              <?php 
              $product_items = App\Models\Product_items::where('id',$value->product_id)->first();
              ?> 
                <tr>
                  <td class="order-item">

                    <button class="del">
                      <a href="{{asset('dell_cart/'.$product_items->id)}}">
                        <i class="ti-trash"></i>
                      </a>
                    </button>

                    <div class="item-thumbnail">
                      <a href="{{asset('/product/'.$product_items->url)}}">
                        <img  class="lozad" data-src="{{asset($product_items->image_one)}}" alt="{{$product_items->image_one_alt}}" title="{{$product_items->image_one_alt}}"  >
                      </a>
                    </div><!-- /.item-thumbnail -->

                    <div class="item-details">
                      <h3 class="item-title">  
                        {!! substr(strip_tags($product_items->home_title), 0,50) !!}  
                       </h3>
                     
                    </div><!-- /.item-details -->
                  </td>
                  <td class="unit-price">
                    <span class="price">
                      @include('pages.arabic.number', ['number' => $value->product_price ])
                    </span>
                    <span class="currency">ريال</span>
                  </td>

                  <td class="order-count">
                    <div class="cart-counter">
                      <button class="item-minus">
                        <a href="{{asset('reduce_cart/'.$product_items->id)}}">
                          <i class="ti-minus"></i>
                        </a>
                      </button>
                      <span class="item-count">
                        @include('pages.arabic.number', ['number' => $value->quantity ])
                      </span>
                      <button class="item-plus">
                        <a href="{{asset('add_cart/'.$product_items->id)}}">
                          <i class="ti-plus"></i>
                        </a>
                      </button>
                    </div><!-- /.cart-counter -->
                  </td>

                  <td class="total-price">
                    <span class="price">
                      @include('pages.arabic.number', ['number' => $value->product_total_price ]) 
                    </span>
                    <span class="currency">يال</span>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table><!-- /.cart-table -->

        </div><!-- /.per-order-items -->

        <div class="billing-table">   
          <div class="row">
            
<!--        <div class="shipping-details col-md-4 col-sm-6">
              <h3 class="title">تكلفة الشحن</h3>
              <form action="#">
                  <select name="country" id="Country-name" class="form-input">
                    <option value="">الدولة*</option>
                    <option value="1">USA</option>
                    <option value="2">Franch</option>
                    <option value="3">Germany</option>
                    <option value="4">Russia</option>
                  </select>

                  <select name="country" id="state-province" class="form-input">
                    <option value="">المنطقة*</option>
                    <option value="1">Florida</option>
                    <option value="2">NY</option>
                    <option value="3">LA</option>
                    <option value="4">PH</option>
                  </select>

                  <input id="zip-code" class="form-input" type="text" placeholder="الكود البريدى" required="">

                  <button class="btn btn-xs" type="submit">التكلفة</button>

              </form>
            </div> 
 -->
            <div class="billing-order col-md-5 col-sm-7">
              <div class="order-cost">
                <ul>
                  <li>
                    <div class="bill-name">اجمالى المشتريات</div>
                    <div class="amount">
                      <span class="count">
                        @include('pages.arabic.number', ['number' => $total_order_price ]) 
                      </span>
                      <span class="currency">ريال</span>

                    </div>
                  </li>
                  <li> 
                    <div class="bill-name">الشحن</div>
                    <div class="amount">
                      <span class="count">
                        @include('pages.arabic.number', ['number' => $total_order_shipping ]) 
                      </span>
                      <span class="currency">ريال</span>
                    </div>
                  </li>
                  <li>
                    <div class="bill-name total">الاجمالى</div>
                    <div class="amount total">
                      <span class="count">
                        @include('pages.arabic.number', ['number' => $total_order_shipping + $total_order_price ]) 
                      </span>
                      <span class="currency">ريال</span>
                    </div>
                  </li>
                </ul>
                
                <a href="{{asset('checkout')}}">
                  <button class="btn">
                  تاكيد عملية الشراء
                  </button>
                </a>
                
              </div><!-- /.order-cost -->
            </div><!-- /.billing-order -->
          </div><!-- /.row -->
        </div><!-- /.billing-table -->
      </div><!-- /.contaier -->
    </div><!-- /.section-padding -->
  </section><!-- /.cart-section -->


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    @include('vendor.flashy.message')
 


    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')

@endsection 
