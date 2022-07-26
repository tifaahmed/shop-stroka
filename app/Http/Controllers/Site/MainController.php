<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

// Use Redirect;
use Session;
// use Input;
// use App;
// use Auth;
// use Flashy;
// use Illuminate\Support\Str;
// use App\Mail\Mails;
// use Illuminate\Support\Facades\Mail;

// standard
// use App\Models\Basics;
// use App\Models\Languages;
// use App\Models\Meta;
// use App\Models\Meta_facebook;
// use App\Models\Meta_twitter;
// use App\Models\Meta_close;
// use App\Models\Meta_geo;

use App\Models\Slider;
use App\Models\Video;
// use App\Models\About;
// use App\Models\About_home;
// use App\Models\Social;
// use App\Models\Contact;
// use App\Models\Contact_details;
// use App\Models\Info;
// use App\Models\Register_form;

// use App\Models\Mails_receiving;
// standard

// use App\Models\Page_details;
// use App\Models\Store_details;
// // use App\Models\Service_item;
// // use App\Models\Service_category;
// // use App\Models\Blog;
// use App\Models\Product_items;
// use App\Models\Product_item_details;
// use App\Models\Product_categories;
// use App\Models\Product_category_relation;
// use App\Models\Product_color_sold;
// use App\Models\Product_color_existing;
// use App\Models\Colors;
// use App\Models\Product_tags;
// use App\Models\Tags;
// use App\Models\Product_brand;
// use App\Models\Brand;
// use App\Models\Product_material;
// use App\Models\Material;

 
// use App\Models\Galary_details;
// use App\Models\Galary;

class MainController extends Controller
{

  public function lang($lang)
  {
     App()->setLocale($lang) ;
      return redirect()->back();
  }
  // public function close()
  // {
      // $basics  = Basics::find(1);
      // if ($basics->application_working_status == 0) {
      // $lang =      \app()->getLocale('locale') ;
      // $languages  = Languages::where('lang_name',$lang)->first();

      // $meta  = Meta::where('lang_id',$languages->id)->first();
      // $meta_facebook  = Meta_facebook::where('lang_id',$languages->id)->first();
      // $meta_twitter  = Meta_twitter::where('lang_id',$languages->id)->first();
      // $meta_geo  = Meta_geo::where('lang_id',$languages->id)->first();
      // $meta_close  = Meta_close::where('lang_id',$languages->id)->first();

      // $social  = Social::find(1);
      // $basics  = Basics::find(1);
      // $info     = App\Models\Info::where('lang_id',$languages->id)->first();
      // return view('close.index', compact(
        // 'languages','social','info',
        // 'basics',
        // 'meta','meta_close','meta_geo','meta_facebook','meta_twitter',
      // ));
    // }else{
    //   return redirect('/');
    // }
  // } 

  public function index()
  {

    // $lang_session =      Session::get('locale') ;
 
    // $languages  = Languages::where('lang_name',$lang_session)->first();

    // $meta  = Meta::where('lang_id',$languages->id)->first();
    // $meta_facebook  = Meta_facebook::where('lang_id',$languages->id)->first();
    // $meta_twitter  = Meta_twitter::where('lang_id',$languages->id)->first();
    // $meta_geo  = Meta_geo::where('lang_id',$languages->id)->first();
    // $meta_close  = Meta_close::where('lang_id',$languages->id)->first();

    $sliders  = Slider::all();
    $video  = Video::find(1);
    // $slider =  Slider::where('lang_id',$languages->id)->orderBy('lft', 'asc')->get();
    // $video  = Video::where('lang_id',$languages->id)->first();

    // $about_home  = About_home::where('lang_id',$languages->id)->first();
    // $home  = Page_details::find(1);

    // /*************************
    // $services_category =  Service_category::where('lang_id',$languages->id)->orderBy('lft')->take(6)->get();
    // $services =  Service_item::where('lang_id',$languages->id)->where('related_id',null)->inRandomOrder()->limit(6)->get();
    
    // $services_details  = Page_details::find(3);

    // $blog =  Blog::where('lang_id',$languages->id)->inRandomOrder()->limit(3)->get();
    // $blog_details  = Page_details::find(5);
    
    // $store_details = Store_details::where('lang_id',$languages->id)->first();

    // $categories = Product_categories::where('lang_id',$languages->id)->where('choice',0);
    // $categories_count =  $categories->orderBy('count','desc')->limit(6)->get();//visit //populer
    // $categories_latest =  $categories->latest()->get();//last 
    // $all_product_categories = $categories->orderBy('lft','asc')->limit(6)->get();


    // $products = Product_items::where('lang_id',$languages->id)->where('chosen',0);
    // $products_count =  $products->orderBy('count','desc')->get();//visit //populer
    // $products_order =  $products->orderBy('order','desc')->get();//sell
    // $products_wanted = $products->orderBy('wanted','desc')->get();//wishlisted
 
    return view('pages.site.home.index'
    , compact(        
      // 'meta','meta_close','meta_geo','meta_facebook','meta_twitter',
      'sliders',
      'video'
      // 'about_home',

      // /*************************
      // 'services','services_details','services_category',
      // 'blog','blog_details',
      // 'store_details',
      // 'categories_count','categories_latest','all_product_categories',
      // 'products_count','products_order','products_wanted'
    )
  );
  }
  public function contact_us()
  {
    return view('pages.site.contact-us.index') ;
  }
  public function about_us()
  {
    return view('pages.site.about-us.index') ;
  }
  

// // +++++++++++++++++++++++++++++++++++++  products  +++++++++++++++++++++++++++++++++++ 
//   public function product_modal($url)
//   {
//     $lang_session = Session::get('locale') ;
//     $languages    = Languages::where('lang_name',$lang_session)->first();
//     // product infi
//     $product         =  Product_items::where('url',$url)->first();
//     $product_details =  Product_item_details::where('product_id',$product->id)->first();
//     // categories
//     $product_category_relation  =  Product_category_relation::
//                                   where('product_items_id',$product->id)
//                                   ->pluck('product_categories_id')->toArray();
//     $categories                 = Product_categories::
//                                   where('lang_id',$languages->id)
//                                   ->whereIn('id',$product_category_relation)
//                                   ->orderBy('lft', 'asc')->get();
//     // color existing 
//     $product_color_existing     =   Product_color_existing::
//                                     where('product_items_id',$product->id)
//                                     ->pluck('color_id')->toArray();
//     $colors_existing            = Colors::
//                                   // where('lang_id',$languages->id)
//                                   whereIn('id',$product_color_existing)
//                                   ->orderBy('lft', 'asc')->get();
//     // color sold 
//     $product_color_sold      =  Product_color_sold::
//                                 where('product_items_id',$product->id)
//                                 ->pluck('color_id')->toArray();
//     $colors_sold             =  Colors::
//                                 // where('lang_id',$languages->id)
//                                 whereIn('id',$product_color_sold)
//                                 ->orderBy('lft', 'asc')->get();
//     // tags  
//     $product_tags           = Product_tags::
//                               where('product_items_id',$product->id)
//                               ->pluck('tag_id')->toArray();
//     $tags                   = Tags::
//                               // where('lang_id',$languages->id)
//                               whereIn('id',$product_tags)
//                               ->orderBy('lft', 'asc')->get();
//     // brand  
//     $product_brand          = Product_brand::
//                               where('product_items_id',$product->id)
//                               ->pluck('brand_id')->toArray();
//     $brands                 = Brand::
//                               // where('lang_id',$languages->id)
//                               whereIn('id',$product_brand)
//                               ->orderBy('lft', 'asc')->get(); 
//     // material  
//     $product_material       = Product_material::
//                               where('product_items_id',$product->id)
//                               ->pluck('material_id')->toArray();
//     $material               = Material::
//                               // where('lang_id',$languages->id)
//                               whereIn('id',$product_material)
//                               ->orderBy('lft', 'asc')->get(); 


//     return view('pages.component.products.modal.modal',compact('product','product_details','categories','colors_existing','colors_sold','tags','brands','material'));
//   }



  








//   public function single_product($lang,$url)
//   {
//       $lang_session =      Session::get('locale') ;
//       $languages  = Languages::where('lang_name',$lang_session)->first();
//       $details  = App\Models\Page_details::find(4);

//       $single_item  = Product_items::where('url',$url)->first();
//        // if ($single_product->count == null) {
//       //   $single_product->count = 1 ; 
//       // }else{
//       //   $single_product->increment('count'); 
//       // }
//       // $single_product->save();


//       // $single_product_sub  = Product_sub_categories::where('id',$single_product->product_sub_category_id)->first();
//       // $single_category = Product_categories::where('id',$single_product->product_category_id)->first();

//       // $count = Product_items::all()->count();
//       // $related_search = Product_items::
//       //                   orWhere('title','LIKE','%'. $single_product->title .'%')
//       //                   ->orWhere('home_title','LIKE','%'.$single_product->home_title.'%')

//       //                   ->orWhere('description','LIKE','%'.$single_product->description.'%')
//       //                   ->orWhere('keywords','LIKE','%'.$single_product->keywords.'%')
//       //                   ->orWhere('tab_title','LIKE','%'.$single_product->tab_title.'%')
//       //                   ->orWhere('url','LIKE','%'.$single_product->url.'%')
//       //                   ->orWhere('page_title','LIKE','%'.$single_product->page_title.'%')

//       //                   ->orWhere('old_price',$single_product->old_price)
//       //                   ->orWhere('new_price',$single_product->new_price)
//       //                    // ->where('id','!=',$single_product->id)
//       //                   ->latest()->pluck('id') ;

//       // $related_search_except = Product_items::where('id','!=',$single_product->id)
//       //                         ->whereIn('id',$related_search)
//       //                         ->latest()->pluck('id') ;

//       // if (count($related_search_except) < 6 && $count >=6) {
//       //     $related    = Product_items::inRandomOrder()->limit(6)->get();
//       // }else if($count < 6){
//       //   $related = Product_items::where('id','!=',$single_product->id)->get(); 
//       // }                        

//       // $contact_details  =Contact_details::find(1);

//       return view('pages.product.product_item_single', compact('single_item','details') );
//   }
// // +++++++++++++++++++++++++++++++++++++  products  +++++++++++++++++++++++++++++++++++ 
// // +++++++++++++++++++++++++++++++++++++  blogs  +++++++++++++++++++++++++++++++++++ 

//   public function blogs($lang,$url) 
//   {
//      $lang_session = Session::get('locale') ;
//      $languages  = Languages::where('lang_name',$lang_session)->first();

//      $items =  Blog::where('lang_id',$languages->id)->orderBy('lft', 'asc')->get();
//      $details  = Page_details::find(5);
//      return view('pages.blog.blogs', compact('items','details') );
//   }
//   public function blog($lang,$url)
//   {
//     $lang_session =      Session::get('locale') ;
//     $languages  = Languages::where('lang_name',$lang_session)->first();
//     $details  = Page_details::find(5);
//     $single_item  = Blog::where('url',$url)->first();

//     return view('pages.blog.blog-single-item', compact('single_item','details') );
//   }  
//   // +++++++++++++++++++++++++++++++++++++  blogs  +++++++++++++++++++++++++++++++++++ 



}