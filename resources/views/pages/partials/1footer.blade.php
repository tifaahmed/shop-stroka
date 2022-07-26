<!-- *********************************** -->
<!--  <span>&copy; <?php echo date("Y"); ?>      {{ __("static. All") }} {{ __("static.Copyrights") }}   {{ __("static.Reserved For") }}        {{$meta->title}}     {{ __("static.Designed") }}      {{ __("static.developed by") }} <a href="https://itqanbs.com/index.html" class="itqan-footer">اتقان</a> .</span> -->
<!--  <p>&copy; {{ __("static.Copyright") }}
<?php echo date("Y"); ?> GVME . <span style="color:white !important">{{ __("static.Designed") }} &amp; {{ __("static.developed by") }}- <a href="https://itqanbs.com/index.html" target="_blank">ITQAN</a></span></p> -->
<!-- *********************************** -->
<?php 
// $social   = App\Models\Social::find(1);
// $info     = App\Models\Info::where('lang_id',$languages->id)->first();

// $about              = App\Models\About::where('lang_id',$languages->id)->first();
// $contact_details    = App\Models\Contact_details::where('lang_id',$languages->id)->first();
// $service_detail     = App\Models\Service_detail::where('lang_id',$languages->id)->first();
// $blog_details       = App\Models\Blog_details::where('lang_id',$languages->id)->first();
// $articale_details   = App\Models\Articale_details::where('lang_id',$languages->id)->first();
// $galary_details     = App\Models\Galary_details::where('lang_id',$languages->id)->first();
// $payment_method     = App\Models\Payment_method::where('lang_id',$languages->id)->first();

// $services =  App\Models\Service_item::where('lang_id',$languages->id)->orderBy('lft', 'asc')->take(6)->get();
// $blog =  App\Models\Blog::where('lang_id',$languages->id)->latest()->take(3)->get();
// $product_items =  App\Models\Product_items::latest()->take(2)->get();
// $lows =  App\Models\Lows::latest()->get();

?>

<?php 

$basics              = App\Models\Basics::find(1);
$lang_session =      Session::get('locale') ;
$languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
$meta  = App\Models\Meta::where('lang_id',$languages->id)->first();

$social   = App\Models\Social::find(1);
$info     = App\Models\Info::where('lang_id',$languages->id)->first();
$about              = App\Models\About::where('lang_id',$languages->id)->first();

$contact_details  = App\Models\Page_details::find(7);
$register_details  = App\Models\Page_details::find(6);
$blog_details  = App\Models\Page_details::find(5);
$store_details  = App\Models\Page_details::find(4);
$service_details  = App\Models\Page_details::find(3);
$about_details  = App\Models\Page_details::find(2);
?>

<footer id="footer">
    <div class="footer clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5">
                    <div class="our-address">
                        <h5>contact us</h5>
                        <div class="address">
                            <h6> SENA MARINE ENGINEERING AND CONSULTANCY LLC.</h6>
                            <address>
                                <span> {!! $info->addres1 !!}</span> 
                            </address>
                            <div class="phone">
                                <span style="color:#333">
                                    <a href="tel:{{$info->phone_one}}">
                                        <i class="fa fa-phone" style="font-family: 'FontAwesome';"></i> {{$info->phone_one}}
                                    </a>
                                </span>
                                <span style="color:#333">
                                    <a href="tel:{{$info->phone_two}}">
                                        <i class="fa fa-phone" style="font-family: 'FontAwesome';"></i> {{$info->phone_two}}
                                    </a>
                                </span>

                                <span>                      
                                    <a href="mailto:{{$info->email_one}}">
                                        <i class="fa fa-envelope-o" style="font-family: 'FontAwesome';"></i> {{$info->email_one}}
                                    </a>
                                </span>
                               <span>                      
                                   <a href="mailto:{{$info->email_two}}">
                                       <i class="fa fa-envelope-o" style="font-family: 'FontAwesome';"></i> {{$info->email_two}}
                                   </a>
                               </span>
                               <span>                      
                                   <a href="mailto:{{$info->email_three}}">
                                       <i class="fa fa-envelope-o" style="font-family: 'FontAwesome';"></i> {{$info->email_three}}
                                   </a>
                               </span>

                            </div>
                             <div class="hours" style="margin-top:10px;color: #333;">
                            
                            <span>Working Hours : {!! $info->start_end_note !!}
                        </div>
                        <ul class="social-footer">
                                
                            @if($social->whatsapp) 
                            <li>
                                <a href="https://api.whatsapp.com/send?phone={{$social->whatsapp}}&text=مرحبا اطلب التواصل  معك" target="_blank" class="yt-icon ln-tr">
                                    <i class="fa fa-whatsapp" style="font-family: 'FontAwesome';"></i></a>
                            </li>
                            @endif
                            @if($social->facebook)
                            <li><a href="{{$social->facebook}}" class="fb-icon ln-tr"><i class="fa fa-facebook" style="font-family: 'FontAwesome';"></i></a></li>
                            @endif
                            @if($social->twitter) 
                            <li><a href="{{$social->twitter}}" class="tw-icon ln-tr"><i class="fa fa-twitter" style="font-family: 'FontAwesome';"></i></a></li>
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
                <div class="col-xs-12 col-sm-3" style="    padding: 0;">
                    <div class="quick-links">
                        <h5>QUICK LINKS</h5>
                    </div>
                    <div class="quick-list">
                        <ul>
                            <li>
                                <a href="{{asset('/'.$languages->lang_name)}}">home</a>
                            </li>
                            <li>
                                <a href="{{asset($languages->lang_name.'/about-us/'.$about_details->url)}}"> {{$about_details->page_title}} </a>
                            </li>
                            <li>
                                <a href="{{asset($languages->lang_name.'/services/'.$service_details->url)}}"> {{$service_details->page_title}} </a>
                            </li>
                            
                            <li>
                                <a href="{{asset($languages->lang_name.'/products/'.$store_details->url)}}">{{$store_details->page_title}}</a>
                            </li>
                            <li>
                                <a href="{{asset($languages->lang_name.'/blogs/'.$blog_details->url )}}">{{$blog_details->page_title}} </a>
                            </li>  
                            <li>
                                <a href="{{asset($languages->lang_name.'/register-page/'.$register_details->url )}}">{{$register_details->page_title}}</a> 
                            </li>                        
                            <li>
                                <a href="{{asset($languages->lang_name.'/contact-us/'.$contact_details->url)}}">  {{$contact_details->page_title}} </a>
                            </li>                        
                        </ul>
                    </div>

                </div>


                
                
                <div class="col-xs-12 col-sm-4">
                    <div class="our-follow">
                        <h5>{{$about_details->page_title}}</h5>
                        <div class="address">
                            <p>
                              {{ $about->footer_subject1 }}
                            </p>

                            
                            
<!--                             <div class="row">
                                <div class="col-md-4">
                                    <div class="gouda">
                                        <a href="{{asset($about->footer_image_one)}}" target="blanck">
                                        <img class="lozad" data-src="{{asset($about->footer_image_one)}}" alt="{{$about->footer_image_one_alt}}" title="{{$about->footer_image_one_alt}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gouda">
                                        <a href="{{asset($about->footer_image_two)}}" target="blanck">
                                        <img class="lozad" data-src="{{asset($about->footer_image_two)}}" alt="{{$about->footer_image_two_alt}}" title="{{$about->footer_image_two_alt}}">
                                        </a>                                    
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="gouda">
                                        <a href="{{asset($about->footer_image_three)}}" target="blanck">
                                        <img class="lozad" data-src="{{asset($about->footer_image_three)}}" alt="{{$about->footer_image_three_alt}}" title="{{$about->footer_image_three_alt}}">
                                        </a>                                    
                                    </div>
                                </div>
                            </div> -->
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row custom-row">
                <div class="col-xs-12">
                    <div class="copyright">
                        <span>&copy;2020 All Rights Reserved For  SENA MARINE ENGINEERING AND CONSULTANCY LLC.- Design & Develop by ITQAN</span>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</footer>
<footer id="Footer" class="clearfix">
    <div class="widgets_wrapper">
        <div class="container">
            <div class="column one-third">
                <aside class="widget_text widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
                        <hr class="no_line" style="margin: 0 auto 20px;">
                        <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                            <div class="image_wrapper"><img class="scale-with-grid lozad" data-src="{{asset($meta->site_logo_one)}}"alt="{{$meta->site_logo_one_alt}}" title="{{$meta->site_logo_one_alt}}">
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="column one-third">
                <aside class="widget_text widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
                        <div style="text-align: center;">
                            <p>
                                {{trans('static.Need help? Call us')}}
                                
                            </p>
                            <h4 style="color:#86a071">{{$info->phone_one}}</h4>
                            <p>
                               {!! $info->addres1 !!}
                            </p>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="column one-third">
                <aside class="widget_text widget widget_custom_html">
                    <div class="textwidget custom-html-widget">
                        <hr class="no_line" style="margin: 0 auto 40px;">
                        <p style="font-size: 30px; text-align: center;">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            @if($social->facebook)
                                 <a href="{{$social->facebook}}"><i class="icon-facebook-circled" aria-hidden="true"></i></a>
                             @endif
                             @if($social->instagram)
                                 <a href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                             @endif
                              @if($social->twitter)
                                 <a href="{{$social->twitter}}">
                                    <i class="icon-twitter-circled" aria-hidden="true"></i>
                                </a>
                             @endif
                             @if($social->linkedin)
                                 <a href="{{$social->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                             @endif
                             @if($social->google)
                                 <a href="{{$social->google}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                             @endif
                             @if($social->youtube)
                                 <a href="{{$social->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                             @endif
                             @if($social->pinterest)
                                 <a href="{{$social->pinterest}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                             @endif
                             @if($info->phone_one)
                                      <a href="https://api.whatsapp.com/send?phone={{$info->phone_one}}&text=مرحبا اطلب التواصل  معك" >
                                          <i class=" fa fa-whatsapp"></i>
                                      </a>
                              @endif
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer_copy">
        <div class="container">
            <div class="column one">
                <div class="copyright">

                     &copy; <?php echo date("Y"); ?>      {{ __("static. All") }} {{ __("static.Copyrights") }}   {{ __("static.Reserved For") }}        {{$meta->title}}     {{ __("static.Designed") }}      {{ __("static.developed by") }} اتقان   .
                </div>
            </div>
        </div>
    </div>
</footer>


<div id="Side_slide" class="right dark" data-width="250">
    <div class="close-wrapper">
        <a href="#" class="close"><i class="icon-cancel-fine"></i></a>
    </div>
    <div class="extras">
        <!-- <a href="http://bit.ly/1M6lijQ" class="action_button" target="_blank">Buy now <i class="icon-right-open"></i></a> -->
        <div class="extras-wrapper"></div>
    </div>
    <div class="menu_wrapper"></div>
</div>
<div id="body_overlay"></div>
<!-- Start scroll to top feature -->
<a href="#" id="back-to-top" title="Back to Top">
    <i class="fa fa-long-arrow-up"></i>
</a>
<!-- End scroll to top feature -->

<!-- Footer Area -->
<footer class="site-footer">
    <!-- Footer Top Area -->
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-wid">
                         
                        <img class="lozad"  data-src="{{asset($about->footer_image_one)}}"alt="{{$about->footer_image_one_alt}}" title="{{$about->footer_image_one_alt}}">
                        
                        <p>{{$about->footer_title1}}</p>
                        <div class="address-info">
                            <span>Phone: 
                                <a href="tel:{{$info->phone_one}}">{{$info->phone_one}}</a>
                            </span>
                            <span>Email: 
                                <a href="mailto:{{$info->email_one}}">
                                     {{$info->email_one}}
                                </a>
                            </span>
                            <span>address: {!! $info->addres1 !!}</span>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-wid footer-menu pl-30">
                        <h3 class="footer-wid-title">{{ trans('static.Quick Links') }}  </h3>
                        <ul>
                            <li><a href="{{asset('/')}}">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.Home')}}</a>
                            </li>
                            <li><a href="{{asset('/about-us/'.$about->url)}}">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.About Us')}}</a>
                            </li>
                            <li><a href="{{asset('/blogs/'.$blog_details->url) }}">
                                <i class="fa fa-chevron-circle-right"></i>{{trans('static.Latest News')}}</a>
                            </li>
                            <li><a href="{{asset('/services/'.$service_detail->url) }}">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.Cases')}}</a>
                            </li>
                            <li><a href="{{asset('/articles/'.$articale_details->url) }}">
                                <i class="fa fa-chevron-circle-right"></i>{{trans('static.Articles')}}</a>
                            </li>
                            <li><a href="{{asset('/galleries/'.$galary_details->url)}}">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.Art & Culture')}}</a>
                            </li>
                            <li><a href="{{asset('/payment-methods/'.$payment_method->url)}}">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.Support Canabi')}}</a>
                            </li>
                            <li><a href="{{asset('/contact-us/'.$contact_details->url)}} ">
                                <i class="fa fa-chevron-circle-right"></i> {{trans('static.Contact Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-wid">
                        <h3 class="footer-wid-title">{{trans('static.Latest News')}}</h3>
                        @foreach($blog as $val)
                            <a class="single-footer-iem" href="single-post.php">
                                <img class="lozad"  data-src="{{asset($val->home_image_one)}}"alt="{{$val->home_image_one_alt}}" title="{{$val->home_image_one_alt}}">
                                <p>{{$val->home_title}}</p>
                                <span>
                                    @include('pages.arabic.date', ['date' => $val->created_at ])
                                </span>
                            </a>
                        @endforeach
                        
                    </div>
                </div>
                   
                <div class="col-lg-3 col-md-6">
                    <div class="footer-wid">
                        <h3 class="footer-wid-title">{{trans('static.Support Canabi')}}</h3>
                        <span>{{$about->footer_subject1}}</span>
                        <div class="social-icos">    
                            <ul>
                                @if($social->facebook)
                                 <li>
                                    <a href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($social->instagram)
                                <li>
                                    <a href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                 @if($social->twitter)
                                <li>
                                    <a href="{{$social->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($social->linkedin)
                                <li>
                                    <a href="{{$social->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($social->google)
                                <li>
                                    <a href="{{$social->google}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($social->youtube)
                                <li>
                                    <a href="{{$social->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($social->pinterest)
                                <li>
                                    <a href="{{$social->pinterest}}"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </li>
                                @endif
                                @if($info->phone_one)
                                    <li>
                                         <a href="https://api.whatsapp.com/send?phone={{$info->phone_one}}&text=مرحبا اطلب التواصل  معك" >
                                             <i class="fa fa-whatsapp "></i>
                                         </a>
                                     </li>
                                 @endif
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Footer Top -->
    
    <!-- Footer Bottom Area -->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    ©&copy; <?php echo date("Y"); ?>  {{ trans("static. All") }}  {{ trans("static.Copyrights") }}   {{trans("static.Reserved For") }}      {{$meta->title}}       {{ trans("static.Designed") }}  {{ trans("static.developed by") }} <a href="https://itqanbs.com/index.html" class="itqan-footer">
                        {{ trans("static.Itqan") }} 
                    </a> .
                </div>
            </div>
        </div>
    </div> <!-- End Footer Bottom Area -->
</footer> <!-- End Footer Area -->

<?php 
$lang_session =      Session::get('locale') ;
$languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
$meta  = App\Models\Meta::where('lang_id',$languages->id)->first();

$about              = App\Models\About::where('lang_id',$languages->id)->first();
$council_details                 = App\Models\Council_details::where('lang_id',$languages->id)->first();
$team_details                = App\Models\Team_details::where('lang_id',$languages->id)->first();
$clint_details               = App\Models\Clint_details::where('lang_id',$languages->id)->first();
$social   = App\Models\Social::find(1);

$info     = App\Models\Info::where('lang_id',$languages->id)->first();
$blog_details                    = App\Models\Blog_details::where('lang_id',$languages->id)->first();
$competition_details             = App\Models\Competition_details::where('lang_id',$languages->id)->first();
$galary_details                  = App\Models\Galary_details::where('lang_id',$languages->id)->first();

    $blog  = App\Models\Blog::where('lang_id',$languages->id)->orderBy('lft', 'asc')->get();

$lows_one  = App\Models\Lows::find(1);
$lows_two  = App\Models\Lows::find(2);

?>

<footer>
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-about">
                    <h4> {{$about->footer_title1}}  </h4>
                    <p> {!! $about->footer_subject1 !!}</p>
                    <a href="{{asset('/about-us/'.$about->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> من نحن</a>
                    <a href="{{asset('/councils/'.$council_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> المجلس الاستشارى</a>
                    <a href="{{asset('/teams/'.$team_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> فريق Habby </a>
                    <a href="{{asset('/clints/'.$clint_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> شركاء النجاح</a>


                    <ul>
                        @if($social->facebook)
                        <li>
                            <a href="{{$social->facebook}}" class="tran3s round-border icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        @endif
                        @if($social->instagram)     
                        <li>
                            <a href="{{$social->instagram}}" class="tran3s round-border icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>                           
                        @endif

                        @if($social->twitter) 
                        <li>
                            <a href="{{$social->twitter}}" class="tran3s round-border icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>                               
                        @endif

                        @if($social->linkedin)   
                        <li>
                            <a href="{{$social->linkedin}}" class="tran3s round-border icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>                             
                        @endif

                        @if($social->google)   
                        <li>
                            <a href="{{$social->google}}" class="tran3s round-border icon"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>                             
                        @endif

                        @if($social->youtube)    
                        <li>
                            <a href="{{$social->youtube}}" class="tran3s round-border icon"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </li>                              
                        @endif

                        @if($social->pinterest)   
                        <li>
                            <a href="{{$social->pinterest}}" class="tran3s round-border icon"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </li>                             
                        @endif

                        

                        


                    </ul>
                </div> <!-- /.footer-about -->

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 footer-contact">
                    <h4>تواصل معنا</h4>
                    <ul>
                        <li>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <a href="mailto:{{$info->email_one}}" class="tran3s">{{$info->email_one}}</a>
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="tel:{{$info->phone_one}}" class="tran3s">{{$info->phone_one}}</a>
                        </li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>{!!$info->addres1!!}</li>
                    </ul>
                </div> <!-- /.footer-contact -->

                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 footer-quick-link">
                    <h4>روابط سريعة</h4>
                    <ul>
                        <li>
                            <a href="{{ asset( ($meta->url) ? 'home/'.$meta->url : '/'  )}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> الرئيسية</a>
                        </li>
                        <li>
                            <a href="{{asset('/competitions/'.$competition_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> المسابقات و الجوائز</a>
                        </li>
                        <li>
                            <a href="{{asset('/blogs/'.$blog_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> مدونة Habby</a>
                        </li>
                        <li><a href=" {{asset('/galaries/'.$galary_details->url)}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i> معرض الصور</a></li>
                        <li><a href="{{asset('learn')}}" class="tran3s"><i class="fa fa-caret-right" aria-hidden="true"></i>    كيف تبدأ معنا</a></li>
                        
                    </ul>
                </div> <!-- /.footer-quick-link -->

                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-event">
                    <h4>احدث الاخبار</h4>

                    <div id="footer-event-carousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#footer-event-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#footer-event-carousel" data-slide-to="1"></li>
                            <li data-target="#footer-event-carousel" data-slide-to="2"></li>
                      </ol>
                          <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                          
                            <div class="item active">
                                <ul>

                                    @foreach($blog as $key => $val)
                                        @if($key <= 2 )
                                            <li>
                                                <div class="date p-color-bg">@include('pages.arabic.date', ['date' => $val->created_at ])</div>
                                                <a href="{{asset('/blog/'.$val->url)}}"><h6>{{$val->home_title}}</h6></a>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>  

                            <div class="item ">
                                <ul>
                                    @foreach($blog as $key => $val)
                                        @if($key <= 5  && $key >= 3)
                                            <li>
                                                <div class="date p-color-bg">@include('pages.arabic.date', ['date' => $val->created_at ])</div>
                                                <a href="{{asset('/blog/'.$val->url)}}"><h6>{{$val->home_title}}</h6></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>  

                            <div class="item ">
                                <ul>
                                    @foreach($blog as $key => $val)
                                        @if($key <= 8  && $key >= 6)
                                            <li>
                                                <div class="date p-color-bg">@include('pages.arabic.date', ['date' => $val->created_at ])</div>
                                                <a href="{{asset('/blog/'.$val->url)}}"><h6>{{$val->home_title}}</h6></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div> 

                        </div>
                    </div> <!-- /#footer-event-carousel -->
                </div> <!-- /.footer-event -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.top-footer -->
    
    

    <div class="subscribe-banner p-color-bg wow fadeInUp">
        <div class="container">
            <div class="row">
        
                <div class="col-md-4">
                    <div class="footer-msg">
                        <div class="subscribe-box">
                            <h3>نحن سعداء لانك تريد التواصل معنا <i class="fa fa-heart"></i></h3>


                            @include('pages.submet.contact_us')

                            


                        </div>
                    <div class="send-msg">
                        <i class="fa fa-envelope-square" aria-hidden="true"></i>
                        </div>
                    <h2>أرسل لنا<h2>
                    </div>
                </div>
                        
                <div class="col-md-4">
                        <div class="footer-link">
                            <a href="{{asset('laws/'.$lows_one->url)}}">سياسة الخصوصية</a>
                            <a href="{{asset('laws/'.$lows_two->url)}}">شروط الاستخدام</a>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-img">
                        <img src="{{asset('asset_ar/img/app.png')}}" alt="footer-logo" />
                        <img src="{{asset('asset_ar/img/google-play.png')}}" alt="footer-logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <p> &copy; 2020 جميع الحقوق محفوظة لمنصة الموهوبين ذوي الهمم من تصميم وتطوير شركة    اتقان       </p>
    </div><!-- /.bottom-footer -->
</footer>   


















