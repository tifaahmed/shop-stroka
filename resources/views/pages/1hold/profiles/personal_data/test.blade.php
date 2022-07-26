@extends('pages.profiles.index')


@section('profile_content')


  <section class="list-panels text-center">
    <div class="lists list-profile">
      <div class="section-padding">
        <div class="container">
          <div class="row">         
            <div class="list-details text-left">

              <div class="col-sm-3 text-center">
                <h2> {{$profile_info->shop_name}}  </h2>
                  <div class="rating" style="margin-bottom:10px;margin-top:20px;"><input type="hidden" class="rating-tooltip-manual" data-filled="fa fa-star" data-empty="fa fa-star" data-fractions="5"/>
                  </div>
                  <div class="profile-img">
                    <a href="{{asset($profile_users->avatar)}}" target="blanck">
                      <img src="{{asset($profile_users->avatar)}}" alt="{{$profile_users->full_name}}" title="{{$profile_users->full_name}}">
                    </a>
                  </div>
              </div>

              <div class="col-sm-9 info">
                <ul class="list-group">
                  <li class="list-group-item"><strong>الاسم :</strong><span>{{$profile_users->full_name}} </span></li>
                  <li class="list-group-item"><strong>البريد الالكترونى :</strong><span>{{$profile_users->email}}</span></li>
                  <li class="list-group-item"><strong>الهاتف :</strong><span>{{$profile_users->phone}}</span></li>
                  <li class="list-group-item"><strong>العنوان : </strong><span>{{$profile_info->address}}</span></li>
                  <li class="list-group-item"><strong>قيمة الشحن : </strong><span>SAR {{$profile_info->shipping_price}}  </span></li>
                </ul>
                <button class="btn" data-toggle="modal" data-target="#user_data" style="margin-bottom:30px;">تعديل البيانات</button>
              </div>
              
            </div>
          </div>
          @include('pages.profiles.personal_data.social')
          @include('pages.profiles.personal_data.shop')
        </div>
      </div>
    </div>
  </section>

    @include('pages.profiles.personal_data.edit')

    <div class="container">
      <br> 
      <h3 style="margin-bottom:20px;color:#009440;font-size:22px;">{{$privilege_first->title}}</h3>
      <ul class="list-group" style="text-align: right;">

        <li class="list-group-item">
          <strong>عدد ايام الصلاحية: </strong>
          <span>{!! $privilege_first->days !!}</span>
        </li>
        
        <li class="list-group-item">
          <strong>عدد المنتجات المسموح بيها : </strong>
          <span>{{$privilege_first->num_products}} منتج</span>
        </li>
        
        <li class="list-group-item">
          <strong>وصف الباقات : </strong>
          <span>{!! $privilege_first->des !!}</span>
        </li>
      </ul>
      @foreach($privilege as $val)
        @include('pages.profiles.personal_data.package')
      @endforeach
    
    </div>


@endsection 
