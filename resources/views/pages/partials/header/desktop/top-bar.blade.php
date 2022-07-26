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
        </div>
    </div>
</div>