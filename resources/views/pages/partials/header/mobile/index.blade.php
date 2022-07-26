<!-- mobile site__header / end -->
<header class="site__header d-lg-none vedio_slider">
    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
        <div class="mobile-header__panel">
            <div class="container">
                <div class="mobile-header__body">


                    <button class="mobile-header__menu-button">
                        <svg width="18px" height="14px">
                            <use xlink:href="images/sprite.svg#menu-18x14"></use>
                        </svg>
                    </button>

                    <a class="mobile-header__logo" href="index.html" style="margin: 0;    margin-left: 10px;">
                        <!-- mobile-logo -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px">
                            <img  src="img/logo_mob.jpg" style="    width: 200px; margin-top: -20px;margin-right: 10px;">
                        </svg>
                        <!-- mobile-logo / end -->
                    </a>

                    @include('pages.partials.header.mobile.search')
                    @include('pages.partials.header.mobile.indicators')

                </div>
            </div>
        </div>
    </div>
</header>
<!-- mobile site__header / end -->
