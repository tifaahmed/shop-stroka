<div class="page-header__container container">
    <div class="page-header__breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{asset('/')}}">{{trans('static.Home')}} </a>
                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                    </svg>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{asset(Request::segment(1).'/'.Request::segment(2))}}"> {{trans('static.'.Request::segment(2))}}</a>
                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                    </svg>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$last_page_name}}</li>
            </ol>
        </nav>
    </div>
    <div class="page-header__title">
        <h3> 
            <span>{{$last_page_name}}</span> 
            <span style="float: left;" >الرصيد : 0.00</span>

        </h3>
    </div>
</div>
