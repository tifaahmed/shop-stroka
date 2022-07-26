
<video   
    poster="{{asset($meta->site_logo_one)}}" 
    style="width: 100%;max-height: 484px; " 
    class="jarallax-img  vedio_start  jquery-background-video" 
    {{ ($video->controls == 1) ? 'controls' : '' }}
    
    {{ ($video->autoplay == 1) ? 'autoplay' : '' }}
    {{ ($video->sound == 1) ? 'muted' : '' }}
    {{ ($video->loop == 1) ? 'loop' : '' }}
        >
     <source  src=""  type="video/mp4"> 
</video>
    

<script type="text/javascript">
    $(function(){
        $(window).scroll(function(){
            var aTop = $('.vedio_slider').height();
            if($(this).scrollTop()>=aTop){
        $( ".vedio_start" ).attr('src', "{{asset($video->file)}}");
        $( ".vedio_start" ).removeClass("vedio_start");

            }
        });
    });
</script>
