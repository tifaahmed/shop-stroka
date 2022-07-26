<div class="product__rating">
    <div class="product__rating-stars">
        <div class="rating">
            <div class="rating__body">
            @if( isset($products_val->rating) && $products_val->rating > 0)
                <?php
                $rate= 0 ;$avg= 0 ;$average= 0 ;$star= 0 ;$dif= 0 ; $x = 0;
                $rate=  $rate + $products_val->rating ;
                ?>
                <!--  -->
                <?php 
                $avg =  $rate ;
                $average =  substr($avg, 0, 3);
                $star =  substr($avg, 0, 1);
                $dif = $average - $star ;
                ?>

                <?php
                $full =$star ;
                if ($full >= 5 ) {
                  $full = 5 ;
                }
                ?>

                @for($i=0; $i < $full; $i++)
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
                @endfor




                <?php
                $half =$dif ;
                if ($half >= 0.5 ) {
                  $x =1;
                ?>
                <svg class="rating__star rating__star--active" width="13px" height="12px">
                    <g class="rating__fill">
                        <use xlink:href="{{asset('images/sprite.svg#star-normal')}}"></use>
                    </g>
                    <g class="rating__stroke">
                        <use xlink:href="{{asset('images/sprite.svg#star-normal-stroke')}}"></use>
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
                <?php
                }
                ?>


                <?php
                 $empty =5 - $average -$x ;
                ?>
                @for ($i=0; $i < $empty; $i++)                                     
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
                @endfor
                   




             
            @endif
            </div>
        </div>
    </div>
    <div class="product__rating-legend">
        @if( isset($products_val) && $products_val->rating_count > 0)
        <a href="">  
            @include('pages.arabic.number', ['number' => $products_val->rating_count ]) ت
            قييم 
        </a><span>/
        @endif

        </span><a href="">    اكتب تقييم </a>
    </div>
</div>