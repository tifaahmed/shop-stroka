<!-- .block-slideshow -->
<div class="block-slideshow block-slideshow--layout--full block">
    {{-- if($video->file) --}}
        {{-- include('pages.site.home.slider.video', [
            'video'              => $video ,
        ]) --}}
    {{-- elseif($sliders) --}}
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="block-slideshow__body"> --}}
                        <div class="owl-carousel">
                            @include('pages.site.home.slider.slider', [
                                'sliders'              => $sliders ,
                            ])
                            
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    {{-- endif --}}
</div>
<!-- .block-slideshow / end -->