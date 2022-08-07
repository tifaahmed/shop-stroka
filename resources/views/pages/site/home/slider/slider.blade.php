@foreach($sliders as $key => $val)
    <a class="block-slideshow__slide" href="{{$val->url1}}">
        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" 
        style="
        background-image: url({{asset('storage/'.$val->desktop_image)}});
        background-position: center;
        background-size: cover;
        ">
        </div>
        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" 
        style="
        background-image: url({{asset('storage/'.$val->mobile_image)}});
        background-position: center;
        background-size: cover;
        ">
        </div>

        <div class="block-slideshow__slide-content">

            @if($val->title1)
            <div class="block-slideshow__slide-title"> {!! $val->title1 !!}</div>
            @endif

            @if($val->subject1)
            <div class="block-slideshow__slide-text">{!! $val->subject1 !!}</div>
            @endif

            @if($val->button1)
            <div class="block-slideshow__slide-button">
                <span class="btn btn-primary btn-lg">
                        {{$val->button1}}
                </span>
            </div>
            @endif

    

        </div>
    </a>
@endforeach
