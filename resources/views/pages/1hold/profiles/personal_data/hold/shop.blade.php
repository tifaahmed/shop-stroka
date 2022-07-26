
<div>
  @if($profile_info->subject )
    <h3 style="margin-bottom:20px;">الجملة التعريفية للمتجر</h3>
    <p>
      {!! $profile_info->subject !!}
    </p>
  @endif

  <button class="btn" data-toggle="modal" data-target="#shop"> وضع  بيانات المتجر   </button>
</div>

  <div class="modal fade" id="shop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  تعديل بيانات المتجر     
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h5>
          
        </div>
          <form id="profile_update_shop" class="signup-form" method="post" action="{{ asset('profile_update_shop') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="modal-body">
              <p class="form-input">
                <label>     لوجو المتجر</label>
                <input type="file" class="form-control" name="shop_logo" placeholder=" {{trans('static.Your image')}}" accept="image/png, image/jpeg, image/jpg">
                @if($profile_info->shop_logo)
                  <img src="{{asset($profile_info->shop_logo)}}" alt="{{$profile_users->full_name}}" title="{{$profile_users->full_name}}">
                @endif
              </p>
              <p class="form-input">
                <input type="text" class="form-control" name="shop_name" value="{{$profile_info->shop_name}}" placeholder="اسم المتجر" >
              </p>
              <p class="form-input">
                <input type="number" class="form-control" name="shipping_price" value="{{$profile_info->shipping_price}}"  placeholder=" سعر الشحن    " >
              </p>
              <p class="form-input">
                @include('pages.texteditor.summernote', ['value' => $profile_info->subject ,'name' => 'subject' ])
              </p>
            </div>

            <div class="modal-footer" style="    text-align: center;">
              <button type="submit" class="btn btn-primary">تعديل</button>
            </div>

          </form>

      </div>
    </div>
  </div>    