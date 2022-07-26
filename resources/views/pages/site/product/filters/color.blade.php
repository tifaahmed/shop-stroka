<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
        <button type="button" class="filter__title" data-collapse-trigger>
            Color
            <svg class="filter__arrow" width="12px" height="7px">
                <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-down-12x7')}}"></use>
            </svg>
        </button>
        <div class="filter__body" data-collapse-content>
            <div class="filter__container">
                <div class="filter-color">
                    <div class="filter-color__list">
                        <?php 
                        $colors            = App\Models\Colors::orderBy('lft')->get();
                        $colors_seleted  =  app('request')->input('color_id')  ;
                        ?>

                        @foreach($colors as $key => $color)

                        <label class="filter-color__item">
                            <span class="filter-color__check input-check-color " style="color: {{$color->color_code}};">
                                <label class="input-check-color__body">
                                    <?php $flag = 0 ?>
                                    @if($colors_seleted)
                                        @foreach ($colors_seleted  as $key => $value) 
                                            @if($value == $color->id)
                                                <?php $flag = 1; ?>
                                            @endif

                                        @endforeach
                                    @endif

                                        @if ($flag == 1 )
                                        <input class="input-check-color__input" name="color_id[]" value="{{$color->id}}" type="checkbox" checked  > 
                                        @else
                                        <input class="input-check-color__input" name="color_id[]" value="{{$color->id}}" type="checkbox" > 
                                        @endif


                                    <!-- <input class="input-check-color__input" type="checkbox" > -->
                                    <span class="input-check-color__box"></span>
                                    <svg class="input-check-color__icon" width="12px" height="9px">
                                        <use xlink:href="{{asset('images/sprite.svg#check-12x9')}}"></use>
                                    </svg>
                                    <span class="input-check-color__stick"></span>
                                </label>
                            </span>
                        </label>
                        @endforeach
 
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>