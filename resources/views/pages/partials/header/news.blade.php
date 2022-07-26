

<link rel="stylesheet" type="text/css" href="{{asset('uploads/news/css/demo-page-styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('uploads/news/css/breaking-news-ticker.css')}}">
<?php 
$news  = App\Models\News::where('lang_id',$languages->id)->get();

?>

<style type="text/css">
    @media (max-width: 600px){
        .bn-controls {
            display: none;
        }
        .bn-news{
            right: 0px!important
        }
    }                    
</style>
<div class="demo-section-box" >
    <div class="section-container" >
        <div class="demo-box" >

            <div class="breaking-news-ticker" id="newsTicker2" style="background-color: #fff;!important;z-index: 9;">

                <div class="bn-news"   >
                    <ul  >

                        @foreach($news as $key => $val)

                            @if($val->url)
                            <?php $x =' <li> <a style="color:'.$val->color.';font-size:'.$val->font_size.'px" href="'.$val->url.'">  '.$val->title .'</a> </li>' ?>
                                {!! $x  !!}
                            @else
                            <?php $y =' <li style="color:'.$val->color.';font-size:'.$val->font_size.'px" >   '.$val->title .' </li>' ?>
                            {!! $y  !!}

                             @endif 
                            <li>&nbsp;<img width="20px" src="{{asset($meta->site_icon)}}">&nbsp;</li>
                        @endforeach
                   
                    </ul>
                </div>
               <!--  <div class="bn-controls">
                    <button><span class="bn-arrow bn-prev"></span></button>
                    <button><span class="bn-action"></span></button>
                    <button><span class="bn-arrow bn-next"></span></button>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="js-n/jquery-2.2.4.min.js"></script>-->
<script src="{{asset('uploads/news/js/breaking-news-ticker.min.js')}}"></script>

<!--<script src="js-n/popper.min.js" type="text/javascript"></script>-->
<!--<script src="js-n/bootstrap.min.js" type="text/javascript"></script>-->
<script src="{{asset('uploads/news/js/breaking-news-ticker.min.js')}}"></script>
<!-- <script type="text/javascript" src="slick/js/slick.min.js"></script> -->
@if( Session::get('locale') == 'ar')
        <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#newsTicker2').breakingNews({
            direction: 'rtl'
        });

    });
</script>
@else
   <script type="text/javascript">
       jQuery(document).ready(function($){
           $('#newsTicker2').breakingNews({
               direction: 'ltr'
           });

       });
   </script>
@endif