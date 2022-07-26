   <?php 
   $lang_session =      Session::get('locale') ;
   $languages  = App\Models\Languages::where('lang_name',$lang_session)->first();
   if ($languages) {
     $meta  = App\Models\Meta::where('lang_id',$languages->id)->first();
   }else{
     $meta  = App\Models\Meta::find(1);
   }
   $basics  = App\Models\Basics::find(1);

   $string =$meta->site_logo_one;
   $prefix = "logo";
    $index = strpos($string, $prefix) + strlen($prefix);
   $result = substr($string, $index);
   ?>
   <!--  -->

 

   <meta name="application-name" content="{{$basics->application_title}}">

   <meta name="msapplication-TileImage" content="{{$result}}">

   <meta name="author" content="{{$meta->author}}">
   <meta itemprop="author" content="{{$meta->author}}">


   @if( Session::get('locale') == 'ar')
   	<meta property="og:locale" content="ar"/>
     <meta property="og:locale:alternate" content="ar"/>
   @else
   	<meta property="og:locale" content="en"/>
     <meta property="og:locale:alternate" content="en"/>
   @endif

   <meta property="og:url"       content="{{$meta->og_url}}"/>
   <meta property="fb:app_id" content="{{$meta->app_id}}" />
   <meta property="og:site_name" content="{{$meta->og_site_name}}"/>
   <meta property="og:image:width" content="{{$meta->og_image_width}}"/>
   <meta property="og:image:height" content="{{$meta->og_image_height}}"/>

   @if($meta->twitter_card == 0)
   	<meta name="twitter:card" content="summary" />
   @elseif($meta->twitter_card == 1)
   	<meta name="twitter:card" content="summary_large_image" />
   @elseif($meta->twitter_card == 2)
   	<meta name="twitter:card" content="app" />
   @elseif($meta->twitter_card == 3)
   	<meta name="twitter:card" content="player" />
   @endif

   <meta name="twitter:site" content="{{$meta->twitter_site}}" />
   <meta name="twitter:creator" content="{{$meta->twitter_creator}}" />

   <meta name="geo.placename" content="{{$meta->geo_placename}}">
   <meta name="geo.position" content="{{$meta->geo_position}}">
   <meta name="geo.region" content="{{$meta->geo_region}}">
   <meta name="geo.country" content="{{$meta->geo_region}}" />
   <meta name="ICBM" content="{{$meta->ICBM}}">


 <?php
   $Basics_backup  =  App\Models\Basics::where('id',1)->first();

    if (!$og_title) {
   		$og_title = $Basics_backup->application_title;
    }
    if (!$og_image_alt) {
   		$og_image_alt = $Basics_backup->application_title;
    }
    if (!$twitter_title) {
   		$twitter_title = $Basics_backup->application_title;
    }
    if (!$title) {
   		$title = $Basics_backup->application_title;
    }
    if (!$name) {
   		$name = $Basics_backup->application_title;
    }
 
	if (!$og_type) {
 		$og_type = 'website';
 	}
 	if (!$keywords) {
  		$keywords = $Basics_backup->application_title;;
  	}

	if (!$twitter_description) {
 		$twitter_description = $Basics_backup->application_title;;
 	}
	if (!$og_description) {
 		$og_description = $Basics_backup->application_title;;
 	}
	if (!$description) {
 		$description = $Basics_backup->application_title;;
 	}


	if(!$og_image ){
		$og_image= asset($meta->site_logo_one ) ;
	}
	if(!$twitter_image ){
		$twitter_image= asset($meta->site_logo_one ) ;
	}
	if(!$image ){
		$image= asset($meta->site_logo_one ) ;
	}
?>
 
 <meta property="og:title"  content="{{$og_title }}"/>
 <meta property="og:description" content="{{$og_description }}"/>
 <meta property="og:image"     content="{{$og_image}}"/>
 <meta property="og:image:alt"     content="{{$og_image_alt }}"/>
 <meta itemprop="og:url" content="{{url()->full()}}"/>
 <meta itemprop="og:type" content="{{$og_type}}"/>

@if($og_type == 'article')
	<meta itemprop="article:published_time" content="{{$article_created_at}}"/>
	<meta itemprop="article:modified_time"  content="{{$article_updated_at}}"/>
	<meta itemprop="article:author" content="{{$article_author}}"/> <!--https://www.facebook.com/YOUR-NAME-->
	<meta itemprop="article:publisher" content="{{$article_publisher}}"/> <!--'https://www.facebook.com/YOUR-PAGE-->
	<!-- <title>10 Most Important Meta Tags You Need to Know for SEO</title>50-60 characters -->
@endif
@if($og_type == 'profile')
	<meta itemprop="profile:first_name" content="{{$first_name}}"/>
	<meta itemprop="profile:last_name" content="{{$last_name}}"/>
	<meta itemprop="profile:username" content="{{$last_name}}"/>
	<meta itemprop="profile:gender" content="{{$last_name}}"/>
@endif
  
 <meta name="keywords" content="{{$keywords }}">


 <meta property="title"  content="{{$title }}"/>
 <meta name="twitter:title" content="{{$twitter_title }}" />

 <meta name="description" content="{{$description }}">
 <meta name="twitter:description" content="{{$twitter_description }}" />


 <meta name="twitter:image" content="{{$twitter_image}}" />


 <meta itemprop="name" content="{{$name }}"/>
 <meta itemprop="url" content="{{url()->full()}}"/>

 <meta itemprop="image" content="{{$image}}"/>

<link rel="alternate" hreflang="{{ Request::segment(1) }}" href="{{url()->full()}}" />

