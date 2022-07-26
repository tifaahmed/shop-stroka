@include('pages.component.products.modal.links')

<div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">الاكثر مبيعا</h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">
            @if($single_first_product)

            <?php
            $products_related_random_symbol =  App\Models\Product_symbol::
                where('product_items_id',$single_first_product->id)
                ->pluck('id')->toArray();

            $products_symbol =  App\Models\Symbol::
                whereIn('id',$products_related_random_symbol)
                ->get();
            ?>

            <div class="block-products__featured">
                <div class="block-products__featured-item">
                    <div class="product-card product-card--hidden-actions ">
                        <button class="product-card__quickview" type="button" data-toggle="modal" data-target="#quickview-modal" >
                            <input type="" name="" class="quickview_url" value="{{$single_first_product->url}}" hidden="">
                            <svg width="16px" height="16px">
                                <use xlink:href="{{asset('images/sprite.svg#quickview-16')}}"></use>
                            </svg>
                            <span class="fake-svg-icon"></span>
                        </button>

                        <div class="product-card__badges-list">
                            @foreach($products_symbol as $symbol_val)
                            <div class="product-card__badge product-card__badge--new">
                                {{$symbol_val->symbol_name}}
                            </div>
                            @endforeach
                        </div>
                        <div class="product-card__image product-image">
                            <a href="product_details.php" class="product-image__body">
                                <img class="product-image__img" 
                                src="{{asset($single_first_product->image_one)}}" title="{{$single_first_product->image_one_alt}}" alt="{{$single_first_product->image_one_alt}}"
                                >
                            </a>
                        </div>
                        <div class="product-card__info">
                            <div class="product-card__name">
                                <a href="product_details.php">
                                    {{$single_first_product->home_title}} 
                                </a>
                            </div>
                            <div class="product-card__rating">
                                <div class="product-card__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body">
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star " width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge ">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-card__rating-legend">9 Reviews</div>
                            </div>
                            <ul class="product-card__features-list">
                                <li>Speed: 750 RPM</li>
                                <li>Power Source: Cordless-Electric</li>
                                <li>Battery Cell Type: Lithium</li>
                                <li>Voltage: 20 Volts</li>
                                <li>Battery Capacity: 2 Ah</li>
                            </ul>
                        </div>
                        <div class="product-card__actions">
                            <div class="product-card__availability">
                                Availability: <span class="text-success">In Stock</span>
                            </div>
                            <div class="product-card__prices">
                                @include('pages.arabic.number', ['number' => $single_first_product->new_price ])  
                                {{$store_details->currency }}   
                            </div>
                            <div class="product-card__buttons">
                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                </button>
                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                    </svg>
                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="block-products__list">
                @if($products)
                @foreach($products as $products_val)
                @if($products_val->id != $single_first_product->id)
                <div class="block-products__list-item">
                    @include('pages.component.products.single_product.small_box', [
                       'products_val' => $products_val,
                     ])
                </div>
 
                @endif

                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>




@include('pages.component.products.modal.scripts')
