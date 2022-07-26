<div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Latest discount</h3>
            <div class="block-header__divider"></div>
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
                @foreach($items as $key => $items_descound)
                @if($items_descound->new_price && $items_descound->new_price > 0 && $key < 10)
                <?php
                $products_related_random_symbol =  App\Models\Product_symbol::
                    where('product_items_id',$items_descound->id)
                    ->pluck('id')->toArray();

                $products_symbol =  App\Models\Symbol::
                    whereIn('id',$products_related_random_symbol)
                    ->get();

                ?>

                <div class="block-products-carousel__column"  >
                    <div class="block-products-carousel__cell">
                        @include('pages.component.products.single_product.small_box', [
                           'products_val' => $items_descound,
                         ])
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>