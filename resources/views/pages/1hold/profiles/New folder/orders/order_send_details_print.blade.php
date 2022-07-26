
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('asset_ar/css/et-line-icons.css')}}">  

  <link rel="stylesheet" href="{{asset('asset_ar/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/slick.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/magnific-popup.css')}}"> 
  <link rel="stylesheet" href="{{asset('asset_ar/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/themes.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/home/home-01.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/shop/shop.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/blog/grid-01.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/pages/contact.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/shop/shop-details.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/blog/blog-single.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/pages/about-01.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/pages/register.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/shop/cart.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/shop/checkout.css')}}">
  <link rel="stylesheet" href="{{asset('asset_ar/css/pages/pricing.css')}}">
</head>
<body dir="rtl">

  <section class="cart-section">
    <div class="">
      <div class="">
        <div class="per-order-items">

        <style type="text/css">
          th{
            text-align: center;
            padding: 5px;
          } td{
            text-align: center;
            padding-bottom: 0px;

          }
          @media screen and (max-width: 1550px)
          {.cart-table .order-item {
                        padding: 10px 7px 13px 12px;
            }
          }
        </style>
        <div class="item-thumbnail" style="text-align: center;padding-bottom: 20px;    padding-top: 20px;">
          <img width="150px" src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}" >
        </div>
        


        <table class="cart-table">
          <thead>
            <tr>
              <th  >  المتجر</th>
              <th  > المنتجات</th>
              <th>سعر المنتج</th>
              <th>العدد</th>
              <th>الاجمالى</th>
            </tr>

          </thead>
          <tbody>
            @foreach($order_products as $val)
            <?php
            $product_items =App\Models\Product_items::
                          where('id',$val->product_id)
                          ->first();
            $shop = App\Models\Profile_info::where('user_id', $val->shop_id)->first();
            ?>

              <tr>
                <td >
                  <div >
                    <p >{{$shop->shop_name}}</p>
                </td>

                <td >
                  <div >
                    <p  > {{$product_items->home_title}}  </p> 
                </td>

                <td >
                  <span >{{$val->product_price}}</span>
                  <span >ريال</span>
                </td>

                <td >
                  <div >
                    <span >{{$val->quantity}}</span>
                  </div><!-- /.cart-counter -->
                </td>

                  <td >
                    <span >{{$val->product_total_price}}</span>
                    <span >ريال</span>
                  </td>                
                </tr>
              @endforeach
            </tbody>
        </table>


        <div>
          <br>
        </div>


        <table class="cart-table">
          <thead>
            <tr>
              <th colspan="3">  المتجر </th>
              <th  >  التكلفة </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $shop_ids = $order_products->pluck('shop_id')->toArray();
            $shops = App\Models\Profile_info::whereIn('user_id', $shop_ids)->get();

            ?>
            @foreach($shops as $val)
            <?php 
            $order_products_shops = App\Models\Order_products::
                where('order_code',$orders->order_code)
                ->where('shop_id',$val->user_id)
                ->get();
            $count = 0;
            foreach ($order_products_shops as $key => $valuxxxe) {
              $count  = $count + $valuxxxe->product_total_price;
            }    
            
            ?>
            <tr>
              <th colspan="3">
                <h2 class="item-title">{{$val->shop_name}}</h2>
              </th>
              <th >
                <h2 class="item-title">{{$count}}</h2>
              </th>
            </tr>
            @endforeach
          </tbody>
        </table>



        <div>
          <br>
        </div>


        <table class="cart-table">
          <thead>
            <tr>
              <th colspan="3">  المتجر </th>
              <th  >  الشحن </th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $shop_ids_two = $order_products->pluck('shop_id')->toArray();
            $shops_two = App\Models\Profile_info::whereIn('user_id', $shop_ids_two)->get();

            ?>
             @foreach($shops_two as $val)
            <tr>
              <td colspan="3">
                <p class="item-title">{{$val->shop_name}}</p>
              </td>
              <td >
                <p class="item-title">{{$val->shipping_price}}</p>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>






        <div>
          <br>
        </div>


        <table class="cart-table">
          <tr>
            <td colspan="3">
              <p class="item-title">الاجمالى  للطلب</p>
            </td>
            <td >
              <p class="item-title"> {{ $orders->order_total_price }} </p>
            </td>
          </tr>
        </table>

        <div>
          <br>
        </div>


        <table class="cart-table">
          <tr>
            <td colspan="3">
              <p class="item-title">كود الطلب</p>
            </td>
            <td >
              <p>{{ $orders->order_code }}</p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="item-title">اسم الطلب  </p>
            </td>
            <td >
              <p>{{$orders->full_name}}</p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="item-title"> تاريخ الطلب     </p>
            </td>
            <td >
              <p>@include('pages.arabic.date', ['date' => $orders->created_at ])</p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="item-title">    البريد الالكترونى      </p>
            </td>
            <td >
              <p>{{$orders->email}}</p> 
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="item-title">الهاتف</p>
            </td>
            <td >
              <p>{{$orders->phone}}</p>
            </td>
          </tr>
          <tr>
            <td colspan="3">
              <p class="item-title">العنوان</p>
            </td>
            <td >
              <p>{{$orders->address_one}}</p>
            </td>
          </tr>
        </table>





        </div>
      </div>
    </div>
  </section>
  <?php 
  $url = asset('sent_orders_details/'.$orders->id);
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script type="text/javascript">
    $(document).ready(function () {
        window.print();
        setTimeout("closePrintView()", 3000);
    });
    function closePrintView() {
        document.location.href = "{{$url}}";
    }
</script>
</body>
</html>


