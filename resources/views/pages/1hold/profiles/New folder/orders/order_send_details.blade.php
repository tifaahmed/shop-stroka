 @extends('pages.profiles.index')


 @section('profile_content')

  

  

  <section class="shop-contents">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <h2 style="text-align: center;">تفاصيل  الطلب  الصادر</h2>

          <div class="col-md-4">
            <ul class="list-group" style="margin-top:60px;">
            <li class="list-group-item">
            <div class="text-center">
              @foreach($shops_users as $val)
              <?php                   
               $profile_info = App\Models\Profile_info::where('user_id', $val->id)->first();
              ?>
              <a href="{{asset('shop-store/'.$val->url)}}">
                <img src="{{asset($profile_info->shop_logo)}}" style="width: 150px;height: 150px;border-radius: 50%;">
              </a>  
              @endforeach

            </div>
            </li>

            <li class="list-group-item">
              @foreach($shops_users as $val)
              <?php                   
               $profile_info = App\Models\Profile_info::where('user_id', $val->id)->first();
              ?>
                <strong>اسماء المتاجر     :</strong>
                <span>{{$profile_info->shop_name}}</span>
              @endforeach
            </li>
            <li class="list-group-item">
              <strong>اسم  الطلب :</strong>
              <span>{{$orders->full_name}}</span>
            </li>
            <li class="list-group-item">
              <strong>  كود   الطلب :     :</strong>
              <span>{{$orders->order_code}}</span>
            </li>
            <li class="list-group-item">
              <strong>تاريخ الطلب :</strong>
              <span>@include('pages.arabic.date', ['date' => $orders->created_at ])</span>
            </li>
            <!-- <li class="list-group-item"><strong>حالة الطلب :</strong><span>حالة الطلب</span></li> -->
            <li class="list-group-item">
              <strong>البريد الالكترونى :</strong>
              <span>{{$orders->email}}</span>
            </li>
            <li class="list-group-item">
              <strong>الهاتف :</strong>
              <span>{{$orders->phone}}</span>
            </li>
            <li class="list-group-item">
              <strong>العنوان : </strong>
              <span>{{$orders->address_one}}</span>
            </li>

            <li class="list-group-item">
              <strong>الشحن : </strong>
              @foreach($shops_users as $val)
              <?php                   
               $profile_info = App\Models\Profile_info::where('user_id', $val->id)->first();
              ?> 
              <span>{{$profile_info->shop_name}} ( {{$profile_info->shipping_price}} )</span>

              @endforeach

            </li>

            <li class="list-group-item">
              <strong>الاجمالى  : </strong>
              <span>{{$orders->order_total_price}}</span>
            </li>
            
               <!-- <li class="list-group-item"><strong>العنوان المضاف : </strong><span>العنوان</span></li> -->
             <!-- <li class="list-group-item"><strong>ملاحظه المتجر : </strong><span>وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.</span></li> -->
             </ul>
             <!-- <button class="btn" data-toggle="modal" data-target="#editModalProfile" style="line-height: 37px;">تعديل</button> -->

             <a href="{{asset('order_send_details_print/'.$orders->id)}}" class="btn" style="margin-bottom: 20px;">طباعة</a>

          </div>
          <div class="col-md-8 pull-right">
            <div class="shop-products">
              <div class="row">
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in text-center" id="grid">

                    @foreach($order_products as $val)
                    <?php
                    $product_items =App\Models\Product_items::
                        where('id',$val->product_id)->first();
                        $shop = App\Models\Profile_info::where('user_id', $val->shop_id)->first();

                    ?>
                      <div class="col-sm-4">
                        <div class="item">

                          <div class="item-thumbnail">
                            <a href="{{asset('/product/'.$product_items->url)}}">
                              <img class="lozad" data-src="{{asset($product_items->image_one)}}" alt="{{$product_items->image_one_alt}}" title="{{$product_items->image_one_alt}}">
                            </a>
                          </div>
                          
                          <div class="item-content">
                            <h3 class="item-title">
                              <a href="{{asset('/product/'.$product_items->url)}}">
                                {!! substr(strip_tags($product_items->home_title), 0, 150) !!}  
                              </a>
                            </h3>
                            <div class="item-price">
                              <span class="price">المتجر  : {{$shop->shop_name}} ريال</span> <br>

                              <span class="price">السعر : {{$val->product_price}} ريال</span> <br>
                              <span class="">العدد : {{$val->quantity}} </span> <br>
                              <span class="">الاجمالى  : {{$val->product_total_price}} ريال</span>

                            </div><!-- /.item-price -->
                            @include('pages.profiles.product_actions.rate', ['val' => $product_items ])
 
                          </div><!-- /.item-content -->

                        </div><!-- /.item -->
                      </div>
                    @endforeach  


                  </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
              </div><!-- /.row -->
            </div><!-- /.shop-products -->
          </div>
        </div>

<!--         <div class="pagination pagination-02 text-center">
          <a href="#" class="prev"><i class="ti-angle-double-left"></i></a>
          <a href="#" class="active">1</a>
          <a href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#" class="next"><i class="ti-angle-double-right"></i></a>
        </div>  -->

      </div>
    </div>
  </section>

<!-- <div class="modal fade" id="editModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تعديل الطلب</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="signup-form" action="#" method="post">
                
                <p class="form-input">
                  <select class="form-control">
                      <option>حالة الطلب</option>
                      <option>عام</option> 
                       <option>خاص</option> 
                  </select>
                </p>
                
             
                
                 <p class="form-input">            
            <textarea id="message" rows="6" name="message" class="form-control" required="" placeholder="ملاحظه المتجر"></textarea>
            </p>
          
              </form>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary">تعديل البيانات</button>
      </div>
    </div>
  </div>
</div> -->
          
@endsection 
