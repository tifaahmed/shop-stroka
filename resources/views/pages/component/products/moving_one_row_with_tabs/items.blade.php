@include('pages.component.products.modal.links')  

<div class="block block-products-carousel" data-layout="grid-{{$product_in_row}}" data-mobile-grid-columns="1">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">{{$title}}</h3>
            <div class="block-header__divider"></div>
            <ul class="block-header__groups-list">
                <li>
                    <button type="button" class="block-header__group  {{ ($cat_id == 'all') ? 'block-header__group--active' : ''}}   ">{{trans('static.All')}}</button>
                </li>
                @if($all_product_categories)
                @foreach($all_product_categories as $val)
                <li>
                    <button type="button" class="block-header__group cat {{ ($cat_id == $val->id) ? 'block-header__group--active' : ''}}">
                        <input type="" name="" class="cat_id" value="{{$val->id}}" hidden="">
                        {{$val->home_title}}
                    </button>
                </li>
                @endforeach
                @endif
            </ul>
            <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-left-7x11')}}"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-7x11')}}"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">

              
                @foreach($product_one_row_with_tabs as $row_with_tabs_val)
                 
                
                <?php
                $products_related_random_symbol =  App\Models\Product_symbol::
                    where('product_items_id',$row_with_tabs_val->id)
                    ->pluck('id')->toArray();

                $products_symbol =  App\Models\Symbol::
                    whereIn('id',$products_related_random_symbol)
                    ->get();

                ?>

                
                        @include('pages.component.products.single_product.small_box', [
                           'products_val'     => $row_with_tabs_val,
                           'products_symbol'  => $products_symbol
                         ])
 
                @endforeach

 


            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".cat").click(function(){
        var id = $(this).children(".cat_id").val();

        var order_type = "{{$order_type}}";
        var product_in_row = "{{$product_in_row}}";
        var limit = "{{$limit}}";
        var title = "{{$title}}";
        var cat_id         = id;

            $.ajax({
                type:'GET',
                data:{'order_type':order_type,'product_in_row':product_in_row,'limit':limit,'title':title,'cat_id':cat_id} ,

                url: "{{asset('here_moving_one_row_with_tabs')}}",

                success: function(data) {
                   $('.test').html(data);
                }
            });
        });
    });
    
</script>
@include('pages.component.products.modal.scripts')
