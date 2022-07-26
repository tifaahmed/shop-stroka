<ul class="suggestions__list">
    @foreach($search_result as $search_result_val)
    <li class="suggestions__item">
        <div class="suggestions__item-image product-image">
            <div class="product-image__body">
                <img class="product-image__img" src="images/products/product-1.jpg" alt="">
            </div>
        </div>
        <div class="suggestions__item-info">
            <a class="suggestions__item-name">
                {{$search_result_val->home_title}}
            </a>
            <div class="suggestions__item-meta">  
                @include('pages.arabic.number', ['number' => $search_result_val->code ]) 
                : 
                {{trans('static.Code')}}
            </div>
        </div>
        <div class="suggestions__item-price">
             @include('pages.arabic.number', ['number' => $search_result_val->new_price ]) :  جنيها 
        </div>
        <div class="suggestions__item-actions">
            <button type="button" title="Add to cart" class="btn btn-primary btn-sm btn-svg-icon">
                <svg width="16px" height="16px">
                    <use xlink:href="{{asset('images/sprite.svg#cart-16')}}"></use>
                </svg>
            </button>
        </div>
    </li>
    @endforeach
 
</ul>