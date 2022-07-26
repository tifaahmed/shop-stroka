@extends('layout')

@section('title')
<title>{{ $single_item->tab_title}}</title>
@endsection

@section('meta')
     @if($single_item)
        @include('pages.partials.meta', ['page_meta' => $single_item , 'image' => asset($single_item->image_one)])
     @endif
@endsection

@section('css')
<style type="text/css">
    .service-banner {
        height: auto!important;
    }
    .banner-image-plane {
        background: url({{asset($details->banner_image)}}) no-repeat;
    }
</style>
@endsection

@section('content')
  @include('pages.partials.header')
  <?php
   $lang_session =      Session::get('locale') ;
   $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
   $contact_details  = App\Models\Page_details::find(7);
 
  ?>
  <div class="banner service-banner spacetop">
      <div class="banner-image-plane parallax">
      </div>
      <div class="overlay"></div>
      <div class="banner-text">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                    <h1>{{$details->page_title}}</h1>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <section id="section">
    <div class="section">
      <div class="amazing-features ">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-sm-4">
                    <a href="{{asset($single_item->image_one)}}" target="blanck">
                      <img class="lozad" data-src="{{asset($single_item->image_one)}}" alt="{{$single_item->image_one_alt}}" title="{{$single_item->image_one_alt}}" />
                    </a>
                    <div class="row" style="padding-top: 5px;">
                      @if($single_item->image_two)
                      <div class="col-xs-12 col-sm-4" style="padding: 0px;">
                        <a href="{{asset($single_item->image_two)}}" target="blanck">
                          <img height="68" width="129" class="lozad" data-src="{{asset($single_item->image_two)}}" alt="{{$single_item->image_two_alt}}" title="{{$single_item->image_two_alt}}" />
                        </a>  
                      </div>
                      @endif                   

                      @if($single_item->image_three)
                      <div class="col-xs-12 col-sm-4" style="padding: 0px;">
                        <a href="{{asset($single_item->image_three)}}" target="blanck">
                          <img height="68" width="129" class="lozad" data-src="{{asset($single_item->image_three)}}" alt="{{$single_item->image_three_alt}}" title="{{$single_item->image_three_alt}}" />
                        </a>  
                      </div>
                      @endif                   

                      @if($single_item->image_four)
                      <div class="col-xs-12 col-sm-4" style="padding: 0px;">
                        <a href="{{asset($single_item->image_four)}}" target="blanck">
                          <img height="68" width="129" class="lozad" data-src="{{asset($single_item->image_four)}}" alt="{{$single_item->image_four_alt}}" title="{{$single_item->image_four_alt}}" />
                        </a>                      
                      </div>
                      @endif                   

                    </div>

                  </div>
                  <div class="col-xs-12 col-sm-8">
                      <div class="amazing-text">
                          <div class="heading">
                              <h3>{{$single_item->title1}}</h3>
                          </div>
                           {!! $single_item->subject1 !!}


                      </div>
                  </div>
              </div>
              <br>
              {!! $single_item->subject2 !!}

          </div>
      </div>
    </div>
  </section>

@include('pages.partials.footer')

@endsection
