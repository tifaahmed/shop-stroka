<div class="site-header__middle container">

    <div class="site-header__logo">
        <a href="index.html">
            <!-- logo -->
            <svg xmlns="http://www.w3.org/2000/svg" width="196px" height="26px">
                    <img  src="{{asset('images\logo.png')}}" style="    width: 227px;height: 93px;margin-top: -12px;"  >
            </svg>
            <!-- logo / end -->
        </a>
    </div>

    
    <div class="site-header__search">
        <div class="search search--location--header ">
            <div class="search__body">
                @include('pages.partials.header.submet.search')
            </div>
        </div>
    </div>


    <div class="site-header__phone">
        <div class="site-header__phone-title">Customer Service</div>
        <div class="site-header__phone-number">(800) 060-0730</div>
    </div>

</div>