<div class="block block--highlighted block-categories block-categories--layout--classic">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">الاكثر شهرة  فى الاقسام</h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-categories__list">
            @if($categories)
            @foreach($categories as $categories_val)
            <?php

                $product_category_relation  =  App\Models\Product_category_relation::
                                                where('product_categories_id',$categories_val->id)
                                                ->limit($limit)
                                                ->pluck('product_items_id')
                                                ->toArray();

                $products                    =  App\Models\Product_items::
                                                where('lang_id',$languages->id)
                                                ->whereIn('id',$product_category_relation);

                                                if ($order_type == 'most commented products') {
                                                  $products = $products->orderBy('comment','desc');//comment;
                                                }
                                                else if ($order_type == 'most rated products') {
                                                  $products =  $products->orderBy('order','desc');//sell
                                                }
                                                else if ($order_type == 'most Famous products') {
                                                  $products =  $products->orderBy('count','desc');//visit //populer
                                                }
                                                else if ($order_type == 'most ordered products') {
                                                  $products = $products->orderBy('order','desc');
                                                }
                                                else if ($order_type == 'most favoret products') {
                                                  $products = $products->orderBy('wanted','desc');//wishlisted
                                                }


                                                else if ($order_type == 'lowest price') {
                                                  $products = $products->orderBy('new_price');//wishlisted
                                                }
                                                else if ($order_type == 'highest price') {
                                                  $products = $products->orderBy('new_price','desc');//wishlisted
                                                }


                                                else if ($order_type == 'latest products') {
                                                  $products = $products->latest();
                                                }
                                                else if ($order_type == 'oldest products') {
                                                }
                                                else if ($order_type == 'random') {
                                                  $products = $products->inRandomOrder();
                                                }
                                                else if ($order_type == 'admin order') {
                                                  $products = $products->orderBy('lft');
                                                }                                                
                                                $products = $products->get();
            ?>

            <div class="block-categories__item category-card category-card--layout--classic">
                <div class="category-card__body">
                    <div class="category-card__image">
                        <a href=""><img src="images/categories/category-1.jpg" alt=""></a>
                    </div>
                    <div class="category-card__content">
                        <div class="category-card__name">
                            <a href="">{{$categories_val->LimitTilte}} </a>
                        </div>
                        <ul class="category-card__links">
                            @foreach($products as $product_val)
                                <li><a href="">{{$product_val->LimitTilte}}</a></li>
                            @endforeach
                        </ul>
                        <div class="category-card__all">
                            <a href="">Show All</a>
                        </div>
                        <!-- <div class="category-card__products">
                            572 Products
                        </div> -->
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>