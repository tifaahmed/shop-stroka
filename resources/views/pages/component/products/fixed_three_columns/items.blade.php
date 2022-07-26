@include('pages.component.products.modal.links')
 
<div class="block block-product-columns d-lg-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="block-header">
                    <h3 class="block-header__title">{{$column_one_title}}</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-product-columns__column">
                    <div class="block-product-columns__item">
                        @foreach($products_one as $products_one_val)

                            <?php 
                            $products_related_random_symbol =  App\Models\Product_symbol::
                                where('product_items_id',$products_one_val->id)
                                ->pluck('id')->toArray();
                            $products_symbol =  App\Models\Symbol::
                                whereIn('id',$products_related_random_symbol)
                                ->get();
                            ?>  
                            @include('pages.component.products.single_product.tiny_box', [
                                'products_val' => $products_one_val,
                                'horizontal' => true
                            ])
                        @endforeach 

                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="block-header">
                    <h3 class="block-header__title">{{$column_two_title}}</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-product-columns__column">
                    <div class="block-product-columns__item">
                        @foreach($products_two as $products_two_val)
                            <?php 
                            $products_related_random_symbol =  App\Models\Product_symbol::
                                where('product_items_id',$products_two_val->id)
                                ->pluck('id')->toArray();
                            $products_symbol =  App\Models\Symbol::
                                whereIn('id',$products_related_random_symbol)
                                ->get();
                            ?>  
                            @include('pages.component.products.single_product.tiny_box', [
                                'products_val' => $products_two_val,
                                'horizontal' => true
                            ])
                        @endforeach 
                    </div>

                </div>
            </div>
            <div class="col-4">
                <div class="block-header">
                    <h3 class="block-header__title">{{$column_three_title}}</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-product-columns__column">
                    <div class="block-product-columns__item">
                        @foreach($products_three as $products_three_val)
                            <?php 
                            $products_related_random_symbol =  App\Models\Product_symbol::
                                where('product_items_id',$products_three_val->id)
                                ->pluck('id')->toArray();
                            $products_symbol =  App\Models\Symbol::
                                whereIn('id',$products_related_random_symbol)
                                ->get();
                            ?>  
                            @include('pages.component.products.single_product.tiny_box', [
                                'products_val' => $products_three_val,
                                'horizontal' => true
                            ])
                        @endforeach 
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@include('pages.component.products.modal.scripts')
