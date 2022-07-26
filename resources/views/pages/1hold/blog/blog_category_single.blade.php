
@extends('layout')

@section('title')
    <title>{{$single_category->tab_title}}</title>
@endsection

@section('meta')
<meta name="keywords" content="{{$single_category->keywords}}">

<meta property="title"  content="{{$single_category->page_title}}"/>
<meta property="og:title"  content="{{$single_category->page_title}}"/>
<meta name="twitter:title" content="{{$single_category->page_title}}" />

<meta name="description" content="{{$single_category->description}}">
<meta property="og:description" content="{{$single_category->description}}"/>
<meta name="twitter:description" content="{{$single_category->description}}" />

<meta property="og:url"       content="{{url()->full()}}"/>
<meta name="twitter:image" content="{{asset($single_category->home_image_one)}}" />
<meta property="og:image"     content="{{asset($single_category->home_image_one)}}"/>
@endsection


@section('css')
    @if( Session::get('locale') == 'ar')
        <link href="{{asset('assets/ar/css/pages/service-single-category.css')}}" rel="stylesheet" type="text/css"   />
    @else
        <link href="{{asset('assets/en/css/pages/service-single-category.css')}}" rel="stylesheet" type="text/css"   />
    @endif

@endsection

@section('content')


 
 

<body>
  <div class="loader">
    <div class="loading-animation"></div>
  </div>

  <section class="search_dev p-r h50"  >
    <div class="container">
       

            <div class="row p-r" >
                <div class="col-md-7">
                  <br> 

                      @include('pages.submet.product_search', ['action_autocomplete' => 'product_autocomplete' , 'action_form'=> 'product_search' ,'field'=> 'home_title' ])


                </div> 
                <div class="col-md-5 " >
                 <div class="col"  >
                   <h6> {{trans('static.Select Status From')}}  " {{$single_category->home_title}} " </h6>
                   <div class="d-flex flex-wrap" >
                     <div class="col-md-6">
                       <div class="dropdown z2"  >
                         <button aria-expanded="false" aria-haspopup="true" class="hover  btn btn-sm btn-primary dropdown-toggle arrow-bottom-white  radios_all f21" data-toggle="dropdown" type="button">
                           
                                @if($filter == 'soon')
                               {{trans('static.soon')}}
                               @elseif($filter == 'start')
                               {{trans('static.started')}}
                               @elseif($filter == 'finished')
                               {{trans('static.finished')}}
                               @elseif($filter == 'all')
                               {{trans('static.all')}}
                               @endif
 
                         </button>
                         <?php 
                          $lang_session =       Session::get('locale') ;
                         $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
                         
                         $sub_categories_1  =  App\Models\Blog::where('blog_category_id',$single_category->id)->orderBy('lft', 'asc')->where('lang_id',$languages->id)->where('data_two',1)->first();

 
                         $sub_categories_2  =  App\Models\Blog::where('blog_category_id',$single_category->id)->orderBy('lft', 'asc')->where('lang_id',$languages->id)->where('data_two',2)->first();

 
                         $sub_categories_3  =  App\Models\Blog::where('blog_category_id',$single_category->id)->orderBy('lft', 'asc')->where('lang_id',$languages->id)->where('data_two',3)->first();
 
                         ?>
                         <div class="dropdown-menu" >
                           <a class="dropdown-item hover" href="{{asset('/single-category-service/all/'.$single_category->url)}}" >{{trans('static.all')}} </a>
                            @if($sub_categories_1 )
                           <a class="dropdown-item hover" href="{{asset('/single-category-service/soon/'.$single_category->url)}}" >{{trans('static.soon')}}</a>
                           @endif
                            @if($sub_categories_2 )
                           <a class="dropdown-item hover" href="{{asset('/single-category-service/start/'.$single_category->url)}}">{{trans('static.started')}}</a>
                           @endif
                           @if($sub_categories_3 )
                           <a class="dropdown-item hover" href="{{asset('/single-category-service/finished/'.$single_category->url)}}">{{trans('static.finished')}} </a>
                           @endif
                         </div> 
                       </div>
                     </div>
                   </div>
                 </div>
                </div>
            </div>
        
    </div>
  </section>  
 
    
    <section class="bg-light py-5 z0"  >
      <div class="container">
        @foreach($sub_categories_chosen as $key => $val)
        @if($key == 0)
        <div class="row">
          <div class="col">
            <div class="d-flex flex-column flex-lg-row no-gutters border rounded bg-white o-hidden" >
              <a href="{{asset('/single-item-service/'.$val->url)}}" class="d-block position-relative bg-gradient col-xl-5  " >
                <img class="flex-fill hover-fade-out"  src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}" >
                <div class="divider divider-side bg-white d-none d-lg-block rotate180   " ></div>
              </a>
              <div class="p-4 p-md-5 col-xl-7 d-flex align-items-center">
                <div class="p-lg-4 p-xl-5">
                  <div class="d-flex justify-content-between align-items-center mb-3 mb-xl-4">
                    <a href="{{asset('/product-sub-category/'.$val->url)}}" class="badge badge-pill {{ ($val->data_two == 1) ? 'badge-danger':'' }} {{ ($val->data_two == 2) ? 'badge-primary':'' }}  {{ ($val->data_two == 3) ? 'badge-dark ':'' }}">
                      @if($val->data_two == 1)
                      {{trans('static.soon')}}
                      @elseif($val->data_two == 2)
                      {{trans('static.started')}}
                      @elseif($val->data_two == 3)
                      {{trans('static.finished')}}
                      @endif
                     </a>
                    <div class="text-small text-muted">{{$val->data_one}} </div>
                  </div>
                  <a href="{{asset('/single-item-service/'.$val->url)}}">
                    <h1>{{$val->home_title}}</h1>
                  </a>
                    <p class="lead">
                        {!! $val->home_subject !!}                  
                    </p>
                  <a href="{{asset('/single-item-service/'.$val->url)}}" class="lead">{{trans('static.Read more')}} </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
        @endforeach

        <div class="row mt-3 mt-lg-5">
            @foreach($sub_categories_chosen as $key => $val)
                @if($key >= 1 && $key <= 3)
                  <div class="col-lg-4 my-2 my-md-3 my-lg-0">
                    <div class="row">
                      <a class="col-5" href="{{asset('/single-item-service/'.$val->url)}}">
                        <img style="width: 185px;height:122px " class="rounded img-fluid hover-fade-out" src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                      </a>
                      <div class="col">
                        <a class="h6" href="{{asset('/single-item-service/'.$val->url)}}">{{$val->home_title}}</a>
                        <div class="text-small text-muted mt-2">{{$val->data_one}} </div>
                      </div>
                    </div>
                  </div>
                @endif
            @endforeach
        </div>
      </div>
    </section>
<br>

   
     <section class="z1 p50"  >
      <div class="container">
        <div class="row">

            @foreach($sub_categories as $key => $val)
              <div class="col-md-6 col-lg-4 mb-3 mb-md-4">
                <div class="card h-100 hover-box-shadow">
                  <a href="{{asset('/single-item-service/'.$val->url)}}" class="d-block bg-gradient rounded-top">
                    <img height="243" class="card-img-top hover-fade-out" src="{{asset($val->home_image_one)}}" alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                  </a>
                  <div class="card-body">
                    <a href="{{asset('/single-item-service/'.$val->url)}}">
                      <h3>{{$val->home_title}}</h3>
                    </a>
                    <p>
                        {!! $val->home_subject !!}                  
                    </p>
                    <a href="{{asset('/single-item-service/'.$val->url)}}">{{trans('static.Read more')}} </a>
                  </div>
                  <div class="card-footer d-flex justify-content-between align-items-center">
                    <a href="{{asset('/single-item-service/'.$val->url)}}" class="badge badge-pill {{ ($val->data_two == 1) ? 'badge-danger':'' }} {{ ($val->data_two == 2) ? 'badge-primary':'' }}  {{ ($val->data_two == 3) ? 'badge-dark ':'' }}  " class="state">
                      @if($val->data_two == 1)
                      {{trans('static.soon')}}
                      @elseif($val->data_two == 2)
                      {{trans('static.started')}}
                      @elseif($val->data_two == 3)
                      {{trans('static.finished')}}
                      @endif
                    </a>  
                    <div class="text-small text-muted">{{$val->data_one}}</div>
                  </div>
                </div>
              </div>
          @endforeach

        </div>
        @include('pages.paginator', ['paginator' => $sub_categories])

      </div>
      <div class="divider position-absolute bottom bg-primary-3"></div>    
    </section>
 @endsection