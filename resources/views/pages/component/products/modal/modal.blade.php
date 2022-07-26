<!-- fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
<!-- css -->
<!-- <link rel="stylesheet" href="asset_ar/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="asset_ar/vendor/owl-carousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="asset_ar/vendor/photoswipe/photoswipe.css">
<link rel="stylesheet" href="asset_ar/vendor/photoswipe/default-skin/default-skin.css">
<link rel="stylesheet" href="asset_ar/vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="asset_ar/css/style.css"> -->
<!-- font - fontawesome -->
<!-- <link rel="stylesheet" href="asset_ar/vendor/fontawesome/css/all.min.css"> -->
<!-- font - stroyka -->
<!-- <link rel="stylesheet" href="asset_ar/fonts/stroyka/stroyka.css"> -->


<div class="quickview">
    <button class="quickview__close" type="button">
        <svg width="20px" height="20px">
            <use xlink:href="{{asset('images/sprite.svg#cross-20')}}"></use>
        </svg>
    </button>
    <div class="product product--layout--quickview" data-layout="quickview">
        <div class="product__content">
            <!-- .product__gallery -->
            <div class="product__gallery">
                <div class="product-gallery">
                    <div class="product-gallery__featured">
                        <button class="product-gallery__zoom">
                            <svg width="24px" height="24px">
                                <use xlink:href="{{asset('images/sprite.svg#zoom-in-24')}}"></use>
                            </svg>
                        </button>
                        <div class="owl-carousel" id="product-image">
                            <div class="product-image product-image--location--gallery">
                                <a href="{{asset($product->image_one)}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                    <img class="product-image__img" src="{{asset($product->image_one)}}" alt="">
                                </a>
                            </div>
                            @if($product_details->multy_images)
                            @foreach(json_decode($product_details->multy_images) as $key => $subject)
                            <div class="product-image product-image--location--gallery">
                                <a href="{{asset('uploads/'.$subject)}}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                    <img class="product-image__img" src="{{asset('uploads/'.$subject)}}" alt="">
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>


                    <div class="product-gallery__carousel">
                        <div class="owl-carousel" id="product-carousel">
                            <a href="{{asset($product->image_one)}}" class="product-image product-gallery__carousel-item">
                                <div class="product-image__body">
                                    <img class="product-image__img product-gallery__carousel-image" src="{{asset($product->image_one)}}" alt="">
                                </div>
                            </a>
                            @if($product_details->multy_images)
                            @foreach(json_decode($product_details->multy_images) as $key => $subject)

                            <a href="{{asset('uploads/'.$subject)}}" class="product-image product-gallery__carousel-item">
                                <div class="product-image__body">
                                    <img class="product-image__img product-gallery__carousel-image" 
                                    src="{{asset('uploads/'.$subject)}}" alt="">
                                </div>
                            </a>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <!-- .product__gallery / end -->
            <!-- .product__info -->
            <div class="product__info">
                <div class="product__wishlist-compare">
                    <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                        <svg width="16px" height="16px">
                            <use xlink:href="{{asset('images/sprite.svg#wishlist-16')}}"></use>
                        </svg>
                    </button>
                    <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                        <svg width="16px" height="16px">
                            <use xlink:href="{{asset('images/sprite.svg#compare-16')}}"></use>
                        </svg>
                    </button>
                </div>
                <h1 class="product__name">{{$product->home_title}}</h1>


                @include('pages.component.products.rate_review_product', ['product_rating' => $product->rating ])

                <div class="product__description">
                    {!! $product_details->home_subject !!}
                </div>
                <ul class=" ">
                    
                    
                    @if($product_details->home_table_one)
                    @foreach(json_decode($product_details->home_table_one) as $key => $subject)

                    <li>{{$subject->title}}: {{$subject->subject}}</li>

                    @endforeach
                    @endif
                </ul>
                <ul class="product__meta">
                    <li>القسم :  
                        @foreach($categories as $key => $val)
                        <a href=""> {{$val->home_title }}</a> / 
                        @endforeach
                    </li>
                </ul>
                <ul class="product__meta">
                    <li>الماركة: 
                        @foreach($brands as $key => $val)
                        <a href=""> {{$val->name }}</a> / 
                        @endforeach                    
                    </li>
                </ul>
                <ul class="product__meta">
                    <!-- <li class="product__meta-availability">Availability: <span class="text-success">In Stock</span></li> -->
                    <li> كود المنتج    : {{$product->code }}</li>

                </ul>
            </div>
            <!-- .product__info / end -->
            <!-- .product__sidebar -->
            <div class="product__sidebar">
                <!-- <div class="product__availability">
                    Availability: <span class="text-success">In Stock</span>
                </div> -->
                <div class="product__prices">
                    @if($product->old_price)
                    <span style="color: green">  
                        @include('pages.arabic.number', ['number' => $product->new_price ])  جنيها  
                    </span>
                    <span>&nbsp;    &nbsp;  بدلا من   &nbsp;  &nbsp;    </span>
                    <del style="color: red"> 
                        @include('pages.arabic.number', ['number' => $product->old_price ])  جنيها
                    </del> 
                    @else
                    <span > 
                        @include('pages.arabic.number', ['number' => $product->new_price ])  جنيها   
                    </span>
                    @endif
                </div>
                <!-- .product__options -->
                <form class="product__options">
                    <div class="form-group product__option">
                        <label class="product__option-label">الالوان</label>
                        <div class="input-radio-color">
                            <div class="input-radio-color__list">

                                @foreach($colors_existing as $key => $val)
                                <label class="input-radio-color__item input-radio-color__item--white" style="color: {{$val->color_code}}" data-toggle="tooltip" title="{{$val->color_name}}">
                                    <input type="radio" name="color">
                                    <span></span>
                                </label>
                                @endforeach

                                @foreach($colors_sold as $key => $val)
                                <label class="input-radio-color__item input-radio-color__item--disabled" style="color: {{$val->color_code}};" data-toggle="tooltip" title="{{$val->color_name}}">
                                    <input type="radio" name="color" disabled>
                                    <span></span>
                                </label>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="form-group product__option">
                        <label class="product__option-label">الخامة</label>
                        <div class="input-radio-label">
                            <div class="input-radio-label__list">
                            @foreach($material as $key => $val)
                                <label>
                                    <input type="radio" name="material">
                                    <span>{{$val->name}}</span>
                                </label>
                            @endforeach   
                            </div>
                        </div>
                    </div>
                    <div class="form-group product__option">
                        <label class="product__option-label" for="product-quantity">Quantity</label>
                        <div class="product__actions">
                            <div class="product__actions-item">
                                <div class="input-number product__quantity">
                                    <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                    <div class="input-number__add"></div>
                                    <div class="input-number__sub"></div>
                                </div>
                            </div>
                            <div class="product__actions-item product__actions-item--addtocart">
                                <button class="btn btn-primary btn-lg">Add to cart</button>
                            </div>
                            <div class="product__actions-item product__actions-item--wishlist">
                                <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="product__actions-item product__actions-item--compare">
                                <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Compare">
                                    <svg width="16px" height="16px">
                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- .product__options / end -->
            </div>
            <!-- .product__end -->
            <div class="product__footer">
                <div class="product__tags tags">
                    <div class="tags__list">
                        @foreach($tags as $key => $val)
                        <a href=""> {{$val->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="product__share-links share-links">
                    <ul class="share-links__list">
                        <li class="share-links__item share-links__item--type--like">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{asset(Request::segment(1).'/single-product/'.$product->url)}}"  target="black">
                            Like</a>
                        </li>
                        <li class="share-links__item share-links__item--type--tweet">
                            <a href="https://twitter.com/intent/tweet?text=Share+title&amp;url={{asset(Request::segment(1).'/single-product/'.$product->url)}}" target="black" >
                            Tweet</a>
                        </li>
                        <li class="share-links__item share-links__item--type--pin">
                            <a href="http://pinterest.com/pin/create/link/?url={{asset(Request::segment(1).'/single-product/'.$product->url)}}" target="black" >Pin It</a>
                        </li>

                        <li class="share-links__item share-links__item--type--counter">
                            <a href="#">
                                @include('pages.arabic.number', ['number' => $product->count ]) زائر
                            </a>
                               

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


 