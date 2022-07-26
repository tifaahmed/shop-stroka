@include('pages.component.products.modal.links')

<div class="block block-products-carousel" data-layout="horizontal" data-mobile-grid-columns="3">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">{{$title}}</h3>
            <div class="block-header__divider"></div>
            <ul class="block-header__groups-list">
                <li><button type="button" class="block-header__group {{ ($cat_id == 'all') ? 'block-header__group--active' : ''}}    ">{{trans('static.All')}}</button></li>
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
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">



                <?php $count = $products->count() ?>
                @for ($i=0; $i < $count; $i++)
                    
                
                


                <div class="block-products-carousel__column"  >
                    <div class="block-products-carousel__cell">
                        <?php 
                        $products_val_one = $products->skip($i)->take(1)->first();

                        $products_related_random_symbol =  App\Models\Product_symbol::
                            where('product_items_id',$products_val_one->id)
                            ->pluck('id')->toArray();

                        $products_symbol =  App\Models\Symbol::
                            whereIn('id',$products_related_random_symbol)
                            ->get();
                        ?>
                            @include('pages.component.products.single_product.tiny_box', [
                               'products_val' => $products_val_one,
                            ])
                    </div>
                    
                    <div class="block-products-carousel__cell">
                       <?php 
                       $products_val_two = $products->skip(++$i)->take(1)->first();
                       $products_related_random_symbol =  App\Models\Product_symbol::
                           where('product_items_id',$products_val_two->id)
                           ->pluck('id')->toArray();
                       $products_symbol =  App\Models\Symbol::
                           whereIn('id',$products_related_random_symbol)
                           ->get();
                       ?>  
                        @include('pages.component.products.single_product.tiny_box', [
                           'products_val' => $products_val_two,
                        ])
                    </div>
                    
                </div>
                @endfor

 
            </div>
        </div>
    </div>
</div>




 



@include('pages.component.products.modal.scripts')


