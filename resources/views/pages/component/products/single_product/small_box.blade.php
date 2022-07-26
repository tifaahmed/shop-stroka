@if( isset($list__item) && $list__item = 1 )
<div class="products-list__item">
    @else
    <div class="block-products-carousel__column"  >
        <div class="block-products-carousel__cell">
@endif

<div class="product-card product-card--hidden-actions ">
    <button class="product-card__quickview" type="button" data-toggle="modal" data-target="#quickview-modal" >
        <input type="" name="" class="quickview_url" value="{{$products_val->url}}" hidden="">
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
            <img class="product-image__img " src="{{asset($products_val->image_one)}}" title="{{$products_val->image_one_alt}}" alt="{{$products_val->image_one_alt}}">
        </a>
    </div>

    <div class="product-card__info">
        <div class="product-card__name">
            <a href="product_details.php">{{$products_val->LimitTilte}}</a>
        </div>
        @include('pages.component.products.rate_review_product',[
        'products_val'  =>$products_val
        ])

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
            جنية   @include('pages.arabic.number', ['number' => $products_val->new_price ])
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
@if( isset($list__item) && $list__item = 1 )
</div>
@else
</div></div>
@endif


 