<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
        <button type="button" class="filter__title" data-collapse-trigger>
            Categories Alt
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
            </svg>
        </button>
        <div class="filter__body" data-collapse-content>
            <div class="filter__container">
                <div class="filter-categories-alt">
                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--1" data-collapse-opened-class="filter-categories-alt__item--open">
                        
                        <?php 
                        $categories            = App\Models\Product_categories::orderBy('lft')->get();
                        $category_seleted  =  app('request')->input('category_id')  ;
                        ?>

                        @foreach ($categories  as $key => $categories_value) 
                            <?php 
                                $product_category_relation  =  App\Models\Product_category_relation::
                                                          where('product_categories_id',$categories_value->id)
                                                          ->pluck('product_items_id')->toArray();
                                $products         =  App\Models\Product_items::
                                                        whereIn('id',$product_category_relation)
                                                        ->orderBy('lft')->limit(10)->get();
                                $category_seleted  =  app('request')->input('category_id')  ;

                            ?>

                        <li class="filter-categories-alt__item 

                        filter-categories-alt__item-  

                        " data-collapse-item>
                            <span class="filter-categories-alt__expander" data-collapse-trigger>
                                <div style="padding: 2px 17px 0px 3px!important;" class="filter-categories__counter">
                                    {{$products->count()}}
                                </div>
                            </span>

                            <?php $flag = 0 ?>
                            @if($category_seleted)
                                @foreach ($category_seleted  as $key => $value) 
                                    @if($value == $categories_value->id)
                                        <?php $flag = 1; ?>
                                    @endif
                                @endforeach
                            @endif



                            @if ($flag == 1 )
                            <span class="category" href="" style="font-weight: 700;cursor: pointer;color:red  ">
                                {{$categories_value->limittilte}}
                                <span style="display: none;" class="category_id">{{$categories_value->id}}</span>
                                <input style="display: none;" class="category_input" type="checkbox" name="category_id[]" value="{{$categories_value->id}}" checked>
                            </span>                            
                            @else
                            <span class="category" href="" style="font-weight: 700;cursor: pointer; ">
                                {{$categories_value->limittilte}}
                                <span style="display: none;" class="category_id">{{$categories_value->id}}</span>
                                <input style="display: none;"  class="category_input" type="checkbox" name="category_id[]" value="{{$categories_value->id}}">

                            </span>                            
                            @endif

                            <div class="filter-categories-alt__children" data-collapse-content>
                                <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                    @foreach ($products  as $key => $products_value) 

                                    <li class="filter-categories-alt__item" data-collapse-item>
                                        <a href="">{{$products_value->LimitTilte}}</a>
                                    </li>
                                    @endforeach
                                     
                                </ul>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    
    $(document).on('click', '.category', function (event) {
        // var x = '<input   class="category_input" type="" name="category_id[]" value="">';
       
       // var id = $(this).children('.category_id').text();
       if ( $(this).children('.category_input').is(':checked')  ) {
        $(this).children('.category_input').prop("checked", false);   
        $(this).css('color','black');
       }else{
        $(this).children('.category_input').prop("checked", true);   
        $(this).css('color','red');
       }
   });
</script>