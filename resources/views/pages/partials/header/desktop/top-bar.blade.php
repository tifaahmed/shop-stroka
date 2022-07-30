<div class="site-header__topbar topbar">
    <div class="topbar__container container">
        <div class="topbar__row">
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" 
                    href="{{asset(Request::segment(1).'/about-us/'.$about_details->url)}}">
                    {{trans('static.About Us')}}
                </a>
            </div>
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" href="track-order.php">{{trans('static.Track Order')}}</a>
            </div>
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" href="questions.php">{{trans('static.privesy policy')}}</a>
            </div>
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" href="terms_and_conditions.php">{{trans('static.Terms And Conditions')}} </a>
            </div>
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" href="questions.php">{{trans('static.common questions')}} </a>
            </div>
            <div class="topbar__item topbar__item--link">
                <a class="topbar-link" href="visitor_questions.php">{{trans('static.visitor questions')}}  </a>
            </div>
            <div class="topbar__spring"></div>

            <div class="topbar__item">
                <div class="topbar-dropdown">
                    <button class="topbar-dropdown__btn" type="button">
                        {{-- Language --}}
                        اللغة
                        : 
                        <span class="topbar__item-value">
                            ar
                        </span>
                        <svg width="7px" height="5px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                        </svg>
                    </button>
                    <div class="topbar-dropdown__body">
                        <!-- .menu -->
                        <div class="menu menu--layout--topbar  menu--with-icons ">
                            <div class="menu__submenus-container"></div>
                            <ul class="menu__list">
                                <li class="menu__item">
                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="">
                                        <div class="menu__item-icon"><img srcset="images/languages/language-1.png 1x, images/languages/language-1@2x.png 2x" src="images/languages/language-1.png" alt=""></div>
                                        English
                                    </a>
                                </li>
                                <li class="menu__item">
                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                    <div class="menu__item-submenu-offset"></div>
                                    <a class="menu__item-link" href="">
                                        <div class="menu__item-icon"><img srcset="images/languages/language-2.png 1x, images/languages/language-2@2x.png 2x" src="images/languages/language-2.png" alt=""></div>
                                        العربية 
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- .menu / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>