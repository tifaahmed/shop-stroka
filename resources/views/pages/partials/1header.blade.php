<?php
$lang_session =      Session::get('locale') ;

 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
 $meta  =  App\Models\Meta::where('lang_id',$languages->id)->first();

$info     = App\Models\Info::where('lang_id',$languages->id)->first();
$social   = App\Models\Social::find(1);

// .........................
// $services =  App\Models\Service_item::where('lang_id',$languages->id)->where('related_id',null)->orderBy('lft')->get();
// $services_category =  App\Models\Service_category::where('lang_id',$languages->id)->orderBy('lft')->take(7)->get();

// $contact_details  = App\Models\Page_details::find(7);
// $register_details  = App\Models\Page_details::find(6);
// $blog_details  = App\Models\Page_details::find(5);
// $store_details  = App\Models\Page_details::find(4);
// $service_details  = App\Models\Page_details::find(3);
// $about  = App\Models\Page_details::find(2);

?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>

<style type="text/css">
    @media only screen and (max-width: 767px)
    {.social-wrap {
        margin: 0 auto;
         width: 100%; 
        float: right;
    }
</style>
<header id="header" class="header">
    <div class="primary-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5" style="    padding: 0;">
                    <div class="mail">
                       <span style="color:#333">
                        <a href="mailto:{{$info->email_one}}">
                            <i class="fa fa-envelope-o"></i> {{$info->email_one}}
                        </a>
                       </span>  

                        <span style="color:#333">
                            <a href="tel:{{$info->phone_one}}">
                                <i class="fa fa-phone"></i> {{$info->phone_one}}
                            </a>
                        </span>  

                    </div>
                </div>
                <div class="col-xs-12 col-sm-7" style="    padding: 0;">
                    <div class="social-wrap clearfix">
                        <a href="{{asset($languages->lang_name.'/contact-us/'.$contact_details->url)}}" class="request">{{trans('static.Contact Us')}}</a>
                        <ul class="social">
                            @if($social->whatsapp) 
                           <li>
                               <a href="https://api.whatsapp.com/send?phone={{$social->whatsapp}}&text=مرحبا اطلب التواصل  معك" target="_blank" class="yt-icon ln-tr">
                                   <i class="fa fa-whatsapp" style="font-family: 'FontAwesome';"></i></a>
                           </li>
                           @endif
                           @if($social->facebook)
                           <li><a href="{{$social->facebook}}" class="fb-icon ln-tr"><i class="fa fa-facebook" style="font: normal normal normal 14px/1 FontAwesome;"></i></a></li>
                           @endif
                           @if($social->twitter) 
                           <li><a href="{{$social->twitter}}" class="tw-icon ln-tr"><i class="fa fa-twitter" style="font: normal normal normal 14px/1 FontAwesome;"></i></a></li>
                           @endif
                                      
                           @if($social->linkedin)   
                           <li><a href="{{$social->linkedin}}" class="in-icon ln-tr"><i class="fa fa-linkedin" style="font-family: 'FontAwesome';"></i></a></li>

                           @endif
                                                                         


                           @if($social->instagram)
                           <li><a href="{{$social->instagram}}" class="fb-icon ln-tr"><i class="fa fa-instagram"style="font-family: 'FontAwesome';"></i></a></li>
                           @endif


                           @if($social->youtube)    
                           <li><a href="{{$social->youtube}}" class="yt-icon ln-tr"><i class="fa fa-youtube-play" style="font-family: 'FontAwesome';"></i></a></li>
                           @endif

                           @if($social->google)   
                           <li><a href="{{$social->google}}" class="gp-icon ln-tr"><i class="fa fa-google-plus" style="font-family: 'FontAwesome';"></i></a></li>
                           @endif

                           @if($social->pinterest) 
                           <li><a href="{{$social->pinterest}}" class="pn-icon ln-tr"><i class="fa fa-pinterest"style="font-family: 'FontAwesome';"></i></a></li>
                           @endif


                           @if($social->dribbble) 
                           <li><a href="{{$social->dribbble}}" class="yt-icon ln-tr"><i class="fa fa-dribbble"style="font-family: 'FontAwesome';"></i></a></li>
                           @endif
 

                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-header"id="fix" >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-2">
                    <a href="{{asset('/'.$languages->lang_name)}}" class="logo">
                        <img src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}"/> 
                    </a>
                </div>
           
                
                <div class="col-xs-12 col-sm-10 custom-nav">
                    <nav>
                        <div id='cssmenu'>
                            <ul class="navigation">
                                
                                <li class='active'>
                                    <a href="{{asset('/'.$languages->lang_name)}}" style="padding: 14px 20px;">
                                        {{trans('static.Home')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/about-us/'.$about->url)}}"style="padding: 14px 20px;">
                                        {{$about->page_title}} 
                                    </a>
                                </li>
                                <li>
                                    <a href="#" style="padding: 14px 20px;"> {{$service_details->page_title}} </a>
                                    <ul class="sub-menu">
                                      
                                      @foreach($services_category as $val_cat)
                                      <li>
                                          <a href="{{asset($lang_session.'/service-category/'.$val_cat->url)}}">{{$val_cat->home_title}}</a>
                                          <?php 
                                          $related_services =  App\Models\Service_item::where('lang_id',$languages->id)->where('related_id',$val_cat->id)->orderBy('lft')->get();

                                          ?>
                                          <ul class="sub-menu">
                                            @foreach($related_services as $val)
                                              <li>
                                                <a href="{{asset($lang_session.'/service/'.$val->url)}}">{{$val->home_title}}</a>
                                              </li>
                                            @endforeach
                                          </ul>
                                      </li>
                                      @endforeach
                                      @foreach($services as $val)
                                      <li>
                                          <a href="{{asset($lang_session.'/service/'.$val->url)}}">{{$val->home_title}}</a>
                                      </li>
                                      @endforeach

                                    </ul>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/products/'.$store_details->url)}}" style="padding: 14px 20px;">  {{$store_details->page_title}} </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/blogs/'.$blog_details->url )}}" style="padding: 14px 20px;">
                                        {{$blog_details->page_title}} 
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/register-page/'.$register_details->url )}}" style="padding: 14px 20px;">{{$register_details->page_title}}</a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/contact-us/'.$contact_details->url)}}" style="padding: 14px 20px;">  {{$contact_details->page_title}}   </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="nav-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main header Ends Here -->
</header>

<header id="Header" class="">
    <div id="Top_bar">
        <div class="container ">
            <div class="column one vedio_slider">
                <div class="top_bar_left clearfix"  style="background:#fff;">
                    <div class="logo">
                        <a id="logo" href="{{asset('/'.$languages->lang_name)}}" data-height="60" data-padding="50">
                            <img class="logo-main scale-with-grid lozad" data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}" data-retina="img/logo.png" data-height="70" data-no-retina>
                            <img class="logo-sticky scale-with-grid lozad"  data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}"  data-retina="img/logo.png" data-height="70" data-no-retina>
                            <img class="logo-mobile scale-with-grid lozad"  data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}"  data-retina="img/logo.png" data-height="70" data-no-retina>
                            <img class="logo-mobile-sticky scale-with-grid lozad"  data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}"  data-retina="img/logo.png" data-height="70" data-no-retina>
                        </a>
                    </div>
                    <div class="menu_wrapper">
                        <nav id="menu">
                            <ul id="menu-main-menu" class="menu menu-main">
                                <li class=" menu-item-home current-menu-item page_item current_page_item">
                                    <a href="{{asset('/'.$languages->lang_name)}}">
                                        <span>{{trans('static.Home')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/about-us/'.$about->url)}}">
                                        <span>{{trans('static.About Us')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/products/'.$store_details->url)}}">
                                        <span>{{trans('static.Products')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/galleries/'.$galary_details->url)}}">
                                        <span>{{trans('static.Gallery')}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{asset($languages->lang_name.'/contact-us/'.$contact_details->url)}}">
                                        <span>{{trans('static.Contact Us')}}</span>
                                    </a>
                                </li>
                                @if($lang_session == 'en')
                                <li  >
                                    <a href="{{asset('ar/'.Request::segment(2).'/'.Request::segment(3))}}">
                                        <span>AR</span>
                                    </a>
                                </li>
                                @elseif($lang_session == 'ar')
                                <li  >
                                    <a href="{{asset('en/'.Request::segment(2).'/'.Request::segment(3))}}">
                                        <span>EN</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu-fine"></i></a>
                    </div>
                </div>
                <!--<div class="top_bar_right">-->
                <!--    <div class="top_bar_right_wrapper">-->
                <!--        <a href="#" class="action_button" target="_blank">Ar<i class="icon-left-open"></i></a>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>@include('pages.partials.news')
    </div>
</header>



<?php 
 
 $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
 $lang_session =      Session::get('locale') ;
 $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
    $meta  =  App\Models\Meta::where('lang_id',$languages->id)->first();

 $info     = App\Models\Info::where('lang_id',$languages->id)->first();
 $social   = App\Models\Social::find(1);

$social   = App\Models\Social::find(1);

$about              = App\Models\About::where('lang_id',$languages->id)->first();
$contact_details    = App\Models\Contact_details::where('lang_id',$languages->id)->first();
// $service_detail     = App\Models\Service_detail::where('lang_id',$languages->id)->first();
// $blog_details       = App\Models\Blog_details::where('lang_id',$languages->id)->first();
// $articale_details   = App\Models\Articale_details::where('lang_id',$languages->id)->first();
// $galary_details     = App\Models\Galary_details::where('lang_id',$languages->id)->first();
// $payment_method     = App\Models\Payment_method::where('lang_id',$languages->id)->first();




?>
     
<div class="top-bar clearfix">
    <div class="container">
        <div class="fl top-social-icons">
            <ul class="clearfix">
                <!-- <li><a href="#" class="vm-icon ln-tr"><i class="fa fa-vimeo-square"></i></a></li> -->
 


                @if($social->twitter) 
                <li><a href="{{$social->twitter}}" class="tw-icon ln-tr"><i class="fa fa-twitter"></i></a></li>
                @endif
                           
                @if($social->linkedin)   
                <li><a href="{{$social->linkedin}}" class="in-icon ln-tr"><i class="fa fa-linkedin"></i></a></li>

                @endif
                                                              
                @if($social->facebook)
                <li><a href="{{$social->facebook}}" class="fb-icon ln-tr"><i class="fa fa-facebook"></i></a></li>
                @endif

                <!-- @if($social->instagram)      -->
                <!-- <a href="{{$social->instagram}}" class="insta"><i class="fa fa-instagram"></i></a>  -->
                <!-- @endif -->

                @if($social->youtube)    
                <li><a href="{{$social->youtube}}" class="yt-icon ln-tr"><i class="fa fa-youtube-play"></i></a></li>
                @endif

                @if($social->google)   
                <li><a href="{{$social->google}}" class="gp-icon ln-tr"><i class="fa fa-google-plus"></i></a></li>
                @endif

                @if($social->pinterest) 
                <li><a href="{{$social->pinterest}}" class="pn-icon ln-tr"><i class="fa fa-pinterest"></i></a></li>
                @endif


                @if($social->dribbble) 
                <li><a href="{{$social->dribbble}}" class="yt-icon ln-tr"><i class="fa fa-dribbble"></i></a></li>
                @endif

            </ul>
        </div><!-- End Social Container -->
        <div class="fr top-contact">
            <ul class="clearfix">
                <li class="fl">
                    <i class="fa fa-phone"></i>
                    <span class="text"><a href="tel:{{$info->phone_one}}"> Call Us:{{$info->phone_one}}</a></span>
                </li>
                <li class="fl divider"><span>&#124;</span></li>

                <li class="fl">
                    <i class="fa fa-whatsapp"></i>
                    <span class="text"> <a href="https://api.whatsapp.com/send?phone={{$info->phone_two}}&text=مرحبا اطلب التواصل  معك" target="_blank">  {{$info->phone_two}}</a> </span>
                </li>
                           

                <li class="fl divider"><span>&#124;</span></li>
                <li class="fl"><i class="fa fa-envelope"></i><span class="text">Email Us: <a href="mailto:{{$info->email_one}}">{{$info->email_one}}</a></span></li>
            </ul>
        </div><!-- End Top Contact -->
    </div>
</div><!-- End Tob Bar -->
<header class="alt">
    <div class="container">
        <div class="logo-container fl clearfix">
            <a href="{{asset('/'.$languages->lang_name)}}" style="vertical-align:middle;" class="ib">
                <img  class=" lozad fl" data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}"  >
                <span class="site-name">{{$meta->title}} <span>.</span></span>
            </a>
        </div><!-- End Logo Container -->
        <nav class="main-navigation fr">
            <ul class="clearfix">
                <li>
                    <a href="{{asset('/'.$languages->lang_name)}}" class="ln-tr">{{trans('static.Home')}}</a>
                    
                </li>
                <li>
                    <a href="create-exam.php" class="ln-tr">Create Test</a>
                    
                </li>
                <li>
                    <a href="blog.php" class="ln-tr">Blog</a>
                    
                </li>



                @if(Auth::guard('teachers_students')->user())
                <li class="parent-item login">
                    <a href="#" class="ln-tr" ><span class="grad-btn">{!! substr(strip_tags( Auth::guard('teachers_students')->user()->full_name ), 0, 20) !!}</span>
                    </a>
                </li> 


                @else
                <li class="parent-item login">
                    <a href="#" class="ln-tr" data-toggle="modal" data-target="#login-modal"><span class="grad-btn">{{trans('static.Login')}}</span></a>

                </li>
                <li class="parent-item login">
                    <a href="{{asset($languages->lang_name.'/register-page')}}" class="ln-tr"><span class="grad-btn">{{trans('static.Register')}} </span></a>
                </li>
                @endif



                @if($lang_session == 'en')
                <li class="active"><a href="{{asset('ar/'.Request::segment(2).'/'.Request::segment(3))}}">AR</a></li>
                @elseif($lang_session == 'ar')
                <li class="active"><a href="{{asset('en/'.Request::segment(2).'/'.Request::segment(3))}}">EN</a></li>
                @endif


            </ul>
        </nav><!-- End NAV Container -->
        <div class="mobile-navigation fr">
            <a href="#" class="mobile-btn"><span></span></a>
            <div class="mobile-container"></div>
        </div><!-- end mobile navigation -->
    </div>
</header><!-- End Main Header Container -->


                    @include('pages.register_sign.login')

// $clints  = App\Models\Clint::where('lang_id',$languages->id)->first();

// $register_details     = App\Models\Register_details::where('lang_id',$languages->id)->first();

// $laws  = App\Models\Lows::find(1);
// $galary_video_details  = App\Models\Galary_video_details::find(1);

// $product_categories  = App\Models\Product_categories::orderBy('lft', 'asc')->where('home_page',0)->where('lang_id',$languages->id)->get();
// $service  = App\Models\Service_item::where('lang_id',$languages->id)->orderBy('lft', 'asc')->get();
// $service_category =  App\Models\Service_category::where('lang_id',$languages->id)->orderBy('lft', 'asc')->get();

// $blog_category =  App\Models\Blog_category::orderBy('lft', 'asc')->where('home_page',0)->where('lang_id',$languages->id)->get();
// $electronic_library_category =   App\Models\Electronic_library_category::orderBy('lft', 'asc')->get();

// $visual_library_category =  App\Models\Visual_library_category::orderBy('lft', 'asc')->get();
// $cultural_library_category =  App\Models\Cultural_library_category::orderBy('lft', 'asc')->get();
// 
// $victim_category =  App\Models\Victim_category::orderBy('lft', 'asc')->get();
// $product_items =  App\Models\Product_items::orderBy('lft', 'asc')->get();

?>
<!--  info->email_one  phone_one      --> 
 <!--{{$social->facebook}}  twitter youtube linkedin instagram --> 

<!-- <img src="asset($meta->site_logo_one)" alt="$meta->site_logo_one_alt_ar" title=""$meta->site_logo_one_alt_ar/> -->

<!-- 
{{asset('/')}}    
asset('/about-us/'.$about->url)  
asset('/contact-us/'.$contact_details->url) 
asset('/services/'.$service_detail->url)
asset('/blogs/'.$blog_details->url)
asset('/articles/'.$articale_details->url)
asset('/galleries/'.$galary_details->url)

-->
<?php
 // $items  = App\Models\Product_items::where('parent_id',$val->id)->where('depth',2)->orderBy('lft', 'asc')->get();  
 ?>


<!-- {{trans('static.Contact Us')}}
    asset('/clints/'.$clints->url)
    asset('/about-us/'.$about->url)  {{trans('static.About Us')}}              
 -->

<!-- 
<style type="text/css">

.fa-facebook , .icon-facebook{
    color: #3b5998!important;
}
.fa-twitter, .icon-twitter{
    color: #00acee!important;
}
.fa-instagram, .icon-instagram{
    color: #3f729b!important;
}
.fa-youtube-play, .icon-play{
    color: #c4302b!important;
}
.fa-google-plus, .icon-google{
    color: #db3236!important;
}
.fa-pinterest, .icon-pinterest{
    color: #c8232c!important;
}
.fa-dribbble, .icon-dribbble{
    color: #ea4c89!important;
}
</style> -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <a href="mailto:{{$info->email_one}}"><i class="fa fa-envelope"></i> Mail us at: {{$info->email_one}}</a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="social-icon"> 

                    @if($social->facebook)
                    <a href="{{$social->facebook}}"><i class="fa fa-facebook"></i></a>
                    @endif

                    @if($social->instagram)
                    <a href="{{$social->instagram}}"><i class="fa fa-twitter"></i></a>
                    @endif

                    @if($social->google)
                    <a href="{{$social->google}}"><i class="fa fa-google-plus"></i></a>
                    @endif

                    @if($social->pinterest)
                    <a href="{{$social->pinterest}}"><i class="fa fa-pinterest"></i></a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{asset('/')}}">
                        <img class="light-logo lozad"    data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}">
                    </a>

                </div>
                <!-- Responsive Menu -->
                <div class="responsive-menu-wrap"></div>
            </div>
            <div class="col-lg-9"> 
                <div class="mainmenu">
                    <ul id="navigation">
                        <li><a href="{{asset('/')}}">{{trans('static.Home')}}</a></li>
                        <li><a href="{{asset('/about-us/'.$about->url)}}">{{trans('static.About Us')}} </a></li>

                        <li><a href="{{asset('/blogs/'.$blog_details->url) }}">{{trans('static.Latest News')}} </a></li>
                        <li><a href="{{asset('/services/'.$service_detail->url) }}">{{trans('static.Cases')}}</a></li>
                        <li><a href="{{asset('/articles/'.$articale_details->url) }}">{{trans('static.Articles')}}</a></li>
                        <li><a href="{{asset('/galleries/'.$galary_details->url)}}">{{trans('static.Art & Culture')}}</a></li>

                        <li><a href="{{asset('/payment-methods/'.$payment_method->url)}}">{{trans('static.Support Canabi')}}</a></li>


                        @if($lang_session == 'en')
                        <li class="active"><a href="{{asset('lang/ar')}}">AR</a></li>
                        @elseif($lang_session == 'ar')
                        <li class="active"><a href="{{asset('lang/en')}}">EN</a></li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>  
@include('pages.partials.news')

   <!-- include('pages.partials.visitor') -->
<?php 
$lang_session =      Session::get('locale') ;
$languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
$meta  = App\Models\Meta::where('lang_id',$languages->id)->first();

$training_center_details     = App\Models\Training_center_details::where('lang_id',$languages->id)->first();

$about                       = App\Models\About::where('lang_id',$languages->id)->first();
$team_details                = App\Models\Team_details::where('lang_id',$languages->id)->first();
$council_details                 = App\Models\Council_details::where('lang_id',$languages->id)->first();
$clint_details               = App\Models\Clint_details::where('lang_id',$languages->id)->first();

$program_details                 = App\Models\Program_details::where('lang_id',$languages->id)->first();
$competition_details             = App\Models\Competition_details::where('lang_id',$languages->id)->first();
$electronic_library_detail       = App\Models\Electronic_library_detail::where('lang_id',$languages->id)->first();
$galary_details                  = App\Models\Galary_details::where('lang_id',$languages->id)->first();
$blog_details                    = App\Models\Blog_details::where('lang_id',$languages->id)->first();
$articale_detail                 = App\Models\Articale_detail::where('lang_id',$languages->id)->first();
$store_details                 = App\Models\Store_details::where('lang_id',$languages->id)->first();

?>
<style>
.special-img 
{
    position: relative;
    top: -5px;
    float: left;
    left: -5px;
}
.new4 {
        padding: 3px;
        padding-bottom: 2px !important;
         background: linear-gradient(to right,#b74799,#0cb7e3)!important; */
        padding: 3px;
}
.module {
    background: #fff;
    color:#ba4699;
    padding: 0.5rem;
}
.profile_drop_memu{
    color:green!important
}
.ul1{
    border-style: solid;
    border-radius: 17px!important;
    text-align: center;}
.imp{
    width: 60px;margin-top: 24px;
}
.li1{
    border-style: solid;border-radius: 13px 13px 0px 0px !important;border-bottom: none;border-width: 0px;
}
.li2{
    background-color: #fff
}
.li3{
    border-style: solid;border-radius: 0px 0px 13px 13px;border-bottom: none;border-width: 0px; 
}
.liimg{
    margin-right: auto;width: 136px;margin-left: auto;
}
.a3{
    color:#ba4699!important;
}
</style>
<header class="main-header">
    <div class="main-menu-wrapper clear-fix">
        <div class="container-fluid">
            <div class="logo float-left">
                <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}" style="vertical-align:middle;">
                    <img  class=" lozad" data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}" style="height:90px;">
                </a>
            </div>

            <nav class="navbar float-right">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                 </button>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="navbar-collapse-1">
                 <ul class="nav navbar-nav">
                  
                   <li class="dropdown-holder"><a  >حول Habby</a>
                   <ul class="sub-menu">
                        <li><a href="{{asset('/about-us/'.$about->url)}}" class="tran3s">من نحن</a></li>
                        <li><a href="{{asset('/councils/'.$council_details->url)}}" class="tran3s">المجلس الاستشارى</a></li>
                        <li><a href="{{asset('/teams/'.$team_details->url)}}" class="tran3s">فريق Habby</a></li>
                        <li><a href="{{asset('/clints/'.$clint_details->url)}}" class="tran3s">شركاء النجاح</a></li>
                    </ul>
                   </li>
                   <li><a href="{{asset('/programs/'.$program_details->url)}}">برامج Habby</a></li>
                   <li class="dropdown-holder"><a href="{{asset('/competitions/'.$competition_details->url)}} ">المسابقات و الجوائز</a></li>
                   <li><a href="{{asset('/electronic-libraries/'.$electronic_library_detail->url)}}">المكتبة الرقمية</a></li>

                   <li><a href="{{ asset( ($training_center_details->url) ? 'trainer-center/'.$training_center_details->url : 'trainer-center'  )}}">مركز التدريب</a></li>

                   <li class="dropdown-holder"><a >مركز الاعلام</a>
                    <ul class="sub-menu">
                        <li><a href=" {{asset('/blogs/'.$blog_details->url)}}" class="tran3s">اخبار الموقع</a></li>
                        <li><a href=" {{asset('/articles/'.$articale_detail->url)}} " class="tran3s">آخر الاعلانات</a></li>
                        <li><a href=" {{asset('/galaries/'.$galary_details->url)}}" class="tran3s">معرض الصور</a></li>
                    </ul>
                   </li>
               
                   <li><a href="{{asset('/store/'.$store_details->url)}}">متجر Habby</a>
                   </li>

                    @if(Auth::guard('judge')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
                                @if(Auth::guard('judge')->user()->avatar)
                                <img title="{{Auth::guard('judge')->user()->full_name}}"  alt="{{Auth::guard('judge')->user()->full_name}}"  data-src="{{asset(Auth::guard('judge')->user()->avatar)}}" class="img-circle special-img lozad imp"> 
                                @else
                                <img title="{{Auth::guard('judge')->user()->full_name}}" alt="{{Auth::guard('judge')->user()->full_name}}"   data-src="{{asset('asset_ar/img/17-06.jpg')}}" class="img-circle special-img lozad imp">  
                                @endif

                            </a>
                                <ul class="dropdown-menu dropdown-menu-right new4 ul1" >
                                    <li class="module li1">
                                        <a href="{{asset('profile-judge/'.Auth::guard('judge')->user()->remember_token)}}" class="profile_drop_memu" > عرض الملف الشخصي</a></li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt="" class="lozad liimg">
                                    </li>
                                    <li class="module">
                                        <a href="{{asset('profile-judge-edit/'.Auth::guard('judge')->user()->remember_token)}}" class="profile_drop_memu" >تعديل الملف الشخصي    </a>
                                    </li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt=""  class="lozad liimg">
                                    </li>
                                    <li class="module li3">   
                                        <a href="{{asset('logout/1/ ')}}" ><i class="fa fa-sign-out a3"></i> تسجيل الخروج</a></li>
                                </ul>
                            </a>
                        </li>
                    @elseif(Auth::guard('trainer')->user())
                        <li class="dropdown">
                            <a href="{{asset('profile-trainer/'.Auth::guard('trainer')->user()->remember_token)}}" class="dropdown-toggle profile-image" data-toggle="dropdown">
                                @if(Auth::guard('trainer')->user()->avatar)
                                <img title="{{Auth::guard('trainer')->user()->full_name}}"  alt="{{Auth::guard('trainer')->user()->full_name}}"  data-src="{{asset(Auth::guard('trainer')->user()->avatar)}}" class="img-circle special-img lozad imp"> 
                                @else
                                <img title="{{Auth::guard('trainer')->user()->full_name}}"   alt="{{Auth::guard('trainer')->user()->full_name}}"  data-src="{{asset('asset_ar/img/17-06.jpg')}}" class="img-circle special-img lozad imp">  
                                @endif

                            </a>
                                <ul class="dropdown-menu dropdown-menu-right new4 ul1" >
                                    <li class="module li1">
                                        <a href="{{asset('profile-trainer/'.Auth::guard('trainer')->user()->remember_token)}}" class="profile_drop_memu" > عرض الملف الشخصي</a></li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt="" class="lozad liimg">
                                    </li>
                                    <li class="module">
                                        <a href="{{asset('profile-trainer-edit/'.Auth::guard('trainer')->user()->remember_token)}}" class="profile_drop_memu" >تعديل الملف الشخصي    </a>
                                    </li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt=""  class="lozad liimg">
                                    </li>
                                    <li class="module li3">   
                                        <a href="{{asset('logout/2/ ')}}" ><i class="fa fa-sign-out a3"></i> تسجيل الخروج</a></li>
                                </ul>
                            </a>
                        </li>
                    @elseif(Auth::guard('seller')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
                                @if(Auth::guard('seller')->user()->avatar)
                                <img title="{{Auth::guard('seller')->user()->full_name}}" alt="{{Auth::guard('seller')->user()->full_name}}"      data-src="{{asset(Auth::guard('seller')->user()->avatar)}}" class="img-circle special-img lozad imp"> 
                                @else
                                <img title="{{Auth::guard('seller')->user()->full_name}}" alt="{{Auth::guard('seller')->user()->full_name}}"    data-src="{{asset('asset_ar/img/17-06.jpg')}}" class="img-circle special-img lozad imp">  
                                @endif

                            </a>
                                <ul class="dropdown-menu dropdown-menu-right new4 ul1" >
                                    <li class="module li1">
                                        <a href="{{asset('profile-seller/'.Auth::guard('seller')->user()->remember_token)}}" class="profile_drop_memu" > عرض الملف الشخصي</a></li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt="" class="lozad liimg">
                                    </li>
                                    <li class="module">
                                        <a href="{{asset('profile-seller-edit/'.Auth::guard('seller')->user()->remember_token)}}" class="profile_drop_memu" >تعديل الملف الشخصي    </a>
                                    </li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt=""  class="lozad liimg">
                                    </li>
                                    <li class="module li3">   
                                        <a href="{{asset('logout/3/ ')}}" ><i class="fa fa-sign-out a3"></i> تسجيل الخروج</a></li>
                                </ul>
                            </a>
                        </li>
                    @elseif(Auth::guard('talented')->user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
                                @if(Auth::guard('talented')->user()->avatar)
                                <img title="{{Auth::guard('talented')->user()->full_name}}"   alt="{{Auth::guard('talented')->user()->full_name}}"  data-src="{{asset(Auth::guard('talented')->user()->avatar)}}" class="img-circle special-img lozad imp"> 
                                @else
                                <img title="{{Auth::guard('talented')->user()->full_name}}" alt="{{Auth::guard('talented')->user()->full_name}}"   data-src="{{asset('asset_ar/img/17-06.jpg')}}" class="img-circle special-img lozad imp">  
                                @endif

                            </a>
                                <ul class="dropdown-menu dropdown-menu-right new4 ul1" >
                                    <li class="module li1" style="">
                                        <a href="{{asset('profile-talented/'.Auth::guard('talented')->user()->remember_token)}}" class="profile_drop_memu" > عرض الملف الشخصي</a></li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt="" class="lozad liimg">
                                    </li>
                                    <li class="module">
                                        <a href="{{asset('profile-talented-edit/'.Auth::guard('talented')->user()->remember_token)}}" class="profile_drop_memu" >تعديل الملف الشخصي    </a>
                                    </li>
                                    <li class="li2">
                                        <img data-src="{{asset('asset_ar/img/fo34oter-01.png')}}" alt=""  class="lozad liimg">
                                    </li>
                                    <li class="module li3">   
                                        <a href="{{asset('logout/4/ ')}}" class="a3" ><i class="fa fa-sign-out a3"></i> تسجيل الخروج</a></li>
                                </ul>
                            </a>
                        </li>
                    @else
                        <li><a href="{{asset('/login')}}">دخول</a></li>
                        <li>
                            <a href="{{asset('/register')}}" class="reg-btn">تسجيل جديد</a>
                        </li>
                    @endif

 
                 </ul>
               </div>
            </nav>
        </div>
    </div> 
</header>