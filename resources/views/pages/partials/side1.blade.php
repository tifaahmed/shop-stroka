 <div class="page-header">
    <div class="page-header__container container" style="padding-bottom: 0px!important">
        <div class="page-header__breadcrumb" >
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{asset('/')}}">{{trans('static.Home')}}</a>
                        @if($first_title)
	                        <svg class="breadcrumb-arrow" width="6px" height="9px">
	                            <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
	                        </svg>
                        @endif
                    </li>
                    @if($first_title)
                    <li class="breadcrumb-item">
                    	@if($first_url)
                        	<a href="{{$first_url}}"> {{$first_title}}</a>
                        @else
                        	{{$first_title}}
                        @endif
                        
                        @if($second_title)
	                        <svg class="breadcrumb-arrow" width="6px" height="9px">
	                            <use xlink:href="{{asset('images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
	                        </svg>
                        @endif
                    </li>
                    @endif
                    @if($second_title)
                    <li class="breadcrumb-item">
                    	@if($second_url)
                        	<a href="{{$second_url}}"> {{$second_title}}</a>
                        @else
                        	{{$second_title}}
                        @endif
                    </li>
                    @endif
                </ol>
            </nav>
        </div>
        <div class="page-header__title">
            <h1>{{$main_title}}</h1>
            <br>
        </div>
    </div>
</div>