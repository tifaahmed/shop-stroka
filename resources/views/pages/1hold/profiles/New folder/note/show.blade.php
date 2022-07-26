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
<div class="section-padding">
  <div class="container">
    <span class="addprofile-btn">
      <a href="{{asset('profile-add-note/'.$profile_users->url)}}" class="btn"><i class="fa fa-plus"></i>   اضف   مندوب</a>
    </span>

    <table class="table"> 
      <thead> 
        <tr> 
          <th>#</th> 
          <th>الاسم</th> 
          <th>التلفون</th> 
          <th>البريد الالكترونى</th> 
          <th>التحكم</th> 
        </tr> 
      </thead> 
      <tbody>
        @foreach($notes as $key => $val)
        <tr> 
          <th scope="row">{{++$key}}</th> 
          <td> {{ $val->name }} </td> 
          <td> {{ $val->phone }} 
            <a  href="https://api.whatsapp.com/send?phone={{$val->phone}}&text=مرحبا اطلب التواصل  معك" target="_blank">              
              <i style="background-color: #fff!important ;font-size: 30px;font-family: 'FontAwesome';" class="fa fa-whatsapp" style=""></i>
            </a>
            <a href="tel:{{$val->phone}}">  
            <i class="fa fa-phone" style="background-color: #fff!important ;font-size: 30px;font-family: 'FontAwesome';"></i>
            </a>
          </td> 
          <td> {{ $val->email }}
            <a href="mailto:{{$val->email}}">
              <i class="fa fa-envelope" style="background-color: #fff!important ;font-size: 30px;font-family: 'FontAwesome';">
            </a>
          </td> 
          <td> 
            <button style="line-height: 0px; background: green" class="btn edit-shop" data-toggle="modal" data-target="#editnote{{$val->id}}">تعديل </button>

            <a href="{{asset('dell_note/'.$val->id)}}">
              <button style="line-height: 0px;background: #af0f0f;" class="btn remove-shop" >حذف</button>
            </a> 
          </td> 

        </tr>
        @include('pages.profiles.note.edit')

        @endforeach


      </tbody> 
    </table>
    @include('pages.paginator', ['paginator' => $notes])

  </div>
</div>
          
@endsection 