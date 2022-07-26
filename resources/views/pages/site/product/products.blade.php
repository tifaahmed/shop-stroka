@extends('layout')

@section('title')
<title>{{$details->tab_title}}</title>
@endsection

@section('meta')
    @include('pages.partials.meta', [

        'og_title'              => $details->page_title ,
        'og_image_alt'          => $details->page_title ,
        'twitter_title'         => $details->page_title ,
        'title'                 => $details->page_title ,
        'name'                  => $details->page_title ,

        'og_type'               => 'website' ,
        'keywords'              => $details->keywords ,

        'twitter_description'   => $details->description ,
        'og_description'        => $details->description ,
        'description'           => $details->description ,

        'og_image'             => '' ,
        'twitter_image'        => ''  ,
        'image'                => '' ,
     ])
@endsection 

@section('css')
@endsection


@section('content')
    @include('pages.partials.header')

    <div class="site__body">

        @include('pages.partials.side1', [
           'first_title' => 'shop',
           'first_url' => '',

           'second_title' => '',
           'second_url' => '',

           'main_title' => 'shop',
         ])

        <!-- include('pages.product.slider.index') -->

        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">

                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                        <div class="block-sidebar__backdrop"></div>
                        <div class="block-sidebar__body">
                            @include('pages.product.filters.index')
                            @include('pages.product.widget-products.index')
                        </div>
                    </div>
                </div>

                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options view-options--offcanvas--mobile">
                                    <!-- filter -->
                                    <div class="view-options__filters-button">
                                        <button type="button" class="filters-button">
                                            <svg class="filters-button__icon" width="16px" height="16px">
                                                <use xlink:href="{{asset('images/sprite.svg#filters-16')}}"></use>
                                            </svg>
                                            <span class="filters-button__title"> {{ trans('static.Filters') }} </span>
                                            <span class="filters-button__counter">
                                                <?php 
                                                    $count_request=0;
                                                    if (app('request')->input('brand_id')) {
                                                        $count_request= $count_request +count( app('request')->input('brand_id') );
                                                    }
                                                    if (app('request')->input('category_id')) {
                                                        $count_request= $count_request +count( app('request')->input('category_id') );
                                                    }
                                                    if (app('request')->input('color_id')) {
                                                        $count_request= $count_request +count( app('request')->input('color_id') );
                                                    }
                                                    if (app('request')->input('max_value') && app('request')->input('min_value') ) {
                                                        $count_request= $count_request +1;
                                                    }
                                                ?>
                                                {{$count_request}}
                                            </span>
                                        </button>
                                    </div>
                                    <!-- filter -->


                                    <div class="view-options__layout">
                                        <div class="layout-switcher">
                                            <div class="layout-switcher__list">
                                                <button data-layout="grid-3-sidebar" data-with-features="false" title=" {{ trans('static.Grid') }} " type="button" class="layout-switcher__button  layout-switcher__button--active ">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="{{asset('images/sprite.svg#layout-grid-16x16')}}"></use>
                                                    </svg>
                                                </button>
                                                <button data-layout="grid-3-sidebar" data-with-features="true" title="{{ trans('static.Grid With Features') }} " type="button" class="layout-switcher__button ">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="{{asset('images/sprite.svg#layout-grid-with-details-16x16')}}"></use>
                                                    </svg>
                                                </button>
                                                <button data-layout="list" data-with-features="false" title="{{ trans('static.List') }} " type="button" class="layout-switcher__button ">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="{{asset('images/sprite.svg#layout-list-16x16')}}"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-options__legend">
                                        {{ trans('static.Products') }}  {{$shop_items->count()}} 
                                    </div>
                                    <div class="view-options__divider"></div>
                                    <div class="view-options__control">
                                        <label for="">{{ trans('static.Sort By') }} </label>
                                        <div>
                                            <select class="form-control form-control-sm" name="sort_by" id="sort_by">
                                                <optgroup label="{{ trans('static.Admin Order') }}">
                                                    <option value="all">         {{ trans('static.All') }}     </option>
                                                </optgroup>

                                                <optgroup label="{{ trans('static.A To Z') }}">
                                                    <option value="name">        {{ trans('static.Name') }}        </option>
                                                </optgroup>

                                                <optgroup label="{{ trans('static.price') }}">
                                                    <option value="low to high"> {{ trans('static.Low to High') }} </option>
                                                    <option value="high to low"> {{ trans('static.High to Low') }} </option>
                                                </optgroup>

                                                <optgroup label="{{ trans('static.Interaction') }}">
                                                    <option value="comments">    {{ trans('static.Comments') }}    </option>
                                                    <option value="rate">        {{ trans('static.Rate') }}        </option>
                                                    <option value="famous">      {{ trans('static.Famous') }}      </option>
                                                    <option value="order">       {{ trans('static.Order') }}       </option>
                                                    <option value="favoret">     {{ trans('static.Favoret') }}     </option>
                                                </optgroup>
   
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                                <div class="products-list__body">
 
                                     @foreach($shop_items as $key => $shop_item)
                                    <?php
                                    $products_related_random_symbol =  App\Models\Product_symbol::
                                        where('product_items_id',$shop_item->id)
                                        ->pluck('id')->toArray();

                                    $products_symbol =  App\Models\Symbol::
                                        whereIn('id',$products_related_random_symbol)
                                        ->get();

                                    ?>  
                                            <!-- include('pages.product.box.single') -->
                                            @include('pages.component.products.single_product.small_box', [
                                               'products_val' => $shop_item,
                                               'list__item' => 1,
                                             ])
                                            @include('pages.component.products.modal.scripts')
                                    @endforeach
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.partials.footer')

    <script type="text/javascript">
        
        
        $(document).on('change', '#sort_by', function (event) {
            // var x = '<input   class="category_input" type="" name="category_id[]" value="">';
           
           // var id = $(this).children('.category_id').text();
            $('#sort_by_form').val( $(this).val() )  ;   
            $('.real_submet').click();
       });
    </script>

@endsection
