<a class="block-slideshow__slide" href="{{$val->url1}}">
    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" 
    style="
    background-image: url({{$val->desktopimage}});
    background-position: center;
    background-size: cover;
    ">
    </div>

    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" 
    style="
    background-image: url({{$val->mobile_image}});
    background-position: center;
    background-size: cover;
    ">
    </div>

    <div class="block-slideshow__slide-content">

        
        <div class="block-slideshow__slide-title">{!! $val->title1 !!}</div>
        <div class="block-slideshow__slide-text">{!! $val->subject1 !!}</div>
 
        <div class="block-slideshow__slide-button">

            <span class="btn btn-primary btn-lg">
                    {{$val->button1}}
            </span>
        </div>

 

    </div>
</a>