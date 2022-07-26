<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
        <button type="button" class="filter__title" data-collapse-trigger>
            Price
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
            </svg>
        </button>
        <div class="filter__body" data-collapse-content>
            <div class="filter__container">
                <?php 
                $products_max         =  App\Models\Product_items::orderBy('new_price','desc')->first();
                $products_min       =  App\Models\Product_items::orderBy('new_price','asc')->first();
                ?>

                <div class="filter-price" 
                    data-min="@if( $products_min->new_price ){{$products_min->new_price}}@endif" 
                    data-max="@if($products_max->new_price){{$products_max->new_price}}@endif" 

                    data-from="@if( app('request')->input('min_value') ) {{app('request')->input('min_value')}} @else  {{$products_min->new_price}} @endif" 
                    data-to="@if( app('request')->input('max_value') && app('request')->input('max_value') > 0 ) {{app('request')->input('max_value')}} @else {{$products_max->new_price}} @endif">

                    <div class="filter-price__slider"></div>
                    <div class="filter-price__title">
                        Price:
                         $
                         <input style="width: 30%;" class="filter-price__min-value_input" type="text" name="min_value" value="@if( app('request')->input('min_value') ) {{app('request')->input('min_value')}} @endif"  >
                        <span class="filter-price__min-value hereee" style="display: none;"></span> 
                        – $
                        <span class="filter-price__max-value" style="display: none;"></span>
                        <input style="width: 30%;" class="filter-price__max-value_input" type="text" name="max_value" value="@if( app('request')->input('max_value') ) {{app('request')->input('max_value')}} @endif"   >

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
 