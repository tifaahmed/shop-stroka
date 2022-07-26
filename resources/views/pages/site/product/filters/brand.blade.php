<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
        <button type="button" class="filter__title" data-collapse-trigger>
            Brand
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
            </svg>
        </button>
        <div class="filter__body" data-collapse-content>
            <div class="filter__container">
                <div class="filter-list">
                    <div class="filter-list__list">
                        <?php 
                       
                        $brands            = App\Models\Brand::orderBy('lft')->get();
                        $brands_seleted  =  app('request')->input('brand_id')  ;

                        ?>


                        @if($brands)
                            @foreach ($brands  as $key => $brand) 
                            <?php $flag = 0 ?>
                            @if($brands_seleted)
                                @foreach ($brands_seleted  as $key => $value) 
                                    @if($value == $brand->id)
                                        <?php $flag = 1; ?>
                                    @endif
                                @endforeach
                            @endif
                            <label class="filter-list__item ">
                                <span class="filter-list__input input-radio">
                                    <span class="input-radio__body">
                                        @if ($flag == 1 )
                                        <input class="input-radio__input" name="brand_id[]" type="checkbox" value="{{$brand->id}}"  checked >
                                        @else
                                        <input class="input-radio__input" name="brand_id[]" type="checkbox" value="{{$brand->id}}"  >
                                        @endif
                                        <span class="input-radio__circle"></span>
                                    </span>
                                </span>
                                <span class="filter-list__title">
                                   {{ $brand->name }}
                                </span>
                                <!-- <span class="filter-list__counter">42</span> -->
                            </label>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>