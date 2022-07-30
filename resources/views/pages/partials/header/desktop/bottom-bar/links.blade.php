<div class="nav-panel__nav-links nav-links">
    <ul class="nav-links__list">
        <li class="nav-links__item ">
            <a class="nav-links__item-link" href="{{asset(Request::segment(1).'home/'.'/contact-us/'.$contact_details->url)}}">
                <div class="nav-links__item-body">
                   {{trans('static.Contact Us')}}
                </div>
            </a>
        </li>
        <!--<li class="nav-links__item  nav-links__item--has-submenu ">
            <a class="nav-links__item-link" href="contest.php">
                <div class="nav-links__item-body">
                    contests
                    <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                    </svg>
                </div>
            </a>
            <div class="nav-links__submenu nav-links__submenu--type--menu">
                <div class="menu menu--layout--classic ">
                    <div class="menu__submenus-container"></div>
                    <ul class="menu__list">
                        <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" href="about-us.html">
                               bla
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li> -->



        {{-- <li class="nav-links__item  nav-links__item--has-submenu ">
            <a class="nav-links__item-link" href="{{asset(Request::segment(1).'/shop/'.$store_details->url)}}">
                <div class="nav-links__item-body">
                    {{$store_details->page_title}}
                    <svg class="nav-links__item-arrow" width="9px" height="6px">
                        <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-down-9x6')}}"></use>
                    </svg>
                </div>
            </a>
            <div class="nav-links__submenu nav-links__submenu--type--menu">
                <div class="menu menu--layout--classic ">
                    <div class="menu__submenus-container"></div>
                    <ul class="menu__list">
                        foreach($product_categories as $val_cat)
                        <li class="menu__item">
                            <div class="menu__item-submenu-offset"></div>
                            <a class="menu__item-link" 
                            href="{{asset(Request::segment(1).'/shop/'.$store_details->url.'?category_id%5B%5D='.$val_cat->id)}}">
                                {{$val_cat->LimitTilte}}
                            </a>
                        </li>
                        endforeach 
                    </ul>
                </div>
            </div>
        </li> --}}
        <li class="nav-links__item  nav-links__item--has-submenu ">
            <a class="nav-links__item-link" href="{{ asset('/') }}">
                <div class="nav-links__item-body">
                    {{trans('static.Home')}}
                </div>
            </a>
        </li>
    </ul>
</div>