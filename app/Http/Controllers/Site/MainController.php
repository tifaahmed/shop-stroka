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
use App\Models\Store_details;
// // use App\Models\Service_item;
// // use App\Models\Service_category;
// // use App\Models\Blog;
use App\Models\Product_items;
use App\Models\ProductDetail;
use App\Models\product_category;
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
    
    $store_details = Store_details::first();

    // $categories = product_category::where('lang_id',$languages->id)->where('choice',0);
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
      'video',
      // 'about_home',

      // /*************************
      // 'services','services_details','services_category',
      // 'blog','blog_details',
      'store_details',
      // 'categories_count','categories_latest','all_product_categories',
      // 'products_count','products_order','products_wanted'
    )
  );
  }
  public function contact_us()
  {
    return view('pages.site.contact-us.contact-us-index') ;
  }
  public function about_us()
  {
    return view('pages.site.about-us.about-us-index') ;
  }
  public function cart()
  {
    return view('pages.site.cart.cart-index') ;
  }

// // +++++++++++++++++++++++++++++++++++++  products  +++++++++++++++++++++++++++++++++++ 
//   public function product_modal($url)
//   {
//     $lang_session = Session::get('locale') ;
//     $languages    = Languages::where('lang_name',$lang_session)->first();
//     // product infi
//     $product         =  Product_items::where('url',$url)->first();
//     $product_details =  ProductDetail::where('product_id',$product->id)->first();
//     // categories
//     $product_category_relation  =  Product_category_relation::
//                                   where('product_items_id',$product->id)
//                                   ->pluck('product_categories_id')->toArray();
//     $categories                 = product_category::
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
//       // $single_category = product_category::where('id',$single_product->product_category_id)->first();

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



public function order_function($products,$order_type)
{
  // if ($order_type == 'most commented products') {
  //   $products = $products->orderBy('comment','desc');//comment;
  // }
  // else if ($order_type == 'most rated products') {
  //   $products =  $products->orderBy('order','desc');//sell
  // }
  // else if ($order_type == 'most Famous products') {
  //   $products =  $products->orderBy('count','desc');//visit //populer
  // }
  // else if ($order_type == 'most ordered products') {
  //   $products = $products->orderBy('order','desc');
  // }
  // else if ($order_type == 'most favoret products') {
  //   $products = $products->orderBy('wanted','desc');//wishlisted
  // }


  // else if ($order_type == 'lowest price') {
  //   $products = $products->orderBy('new_price');//wishlisted
  // }
  // else if ($order_type == 'highest price') {
  //   $products = $products->orderBy('new_price','desc');//wishlisted
  // }


  // else if ($order_type == 'latest products') {
  //   $products = $products->latest();
  // }
  // else if ($order_type == 'oldest products') {
  // }
  // else if ($order_type == 'random') {
    $products = $products->inRandomOrder();
  // }
  // else if ($order_type == 'admin order') {
  //   $products = $products->orderBy('lft');
  // }

  return $products ;
}

// *******************************************moving_one_row_with_tabs
public function here_moving_one_row_with_tabs(Request $request)
{

  $all_product_categories = product_category::limit(5)->get();



  $products =  Product_items::where('chosen',0);

      // orderby
      $products = $this->order_function($products,$request->order_type);
      // orderby

      // limit
      if ($request->limit) {
        $products = $products->limit($request->limit);
      }
      // limit

      $product_one_row_with_tabs = $products->get();

      
  $product_in_row = $request->product_in_row ;
  $title = $request->title ;
  $cat_id = $request->cat_id;
  $order_type = $request->order_type;
  $limit          = $request->limit;

  $store_details = Store_details::first();

      //        ->orderBy('lft')->get();

  return view('pages.component.products.moving_one_row_with_tabs.items',compact(
    'product_one_row_with_tabs',
    'product_in_row',
    'title',
    'all_product_categories',
    'cat_id',
    'order_type',
    'limit',
    'store_details'));
}

// *******************************************moving_one_row_with_tabs
// *******************************************fixed_seven
// public function here_fixed_seven(Request $request)
// {



//   $products = Product_items::where('lang_id',$languages->id)->where('chosen',0);

//   $products = $this->order_function($products,$request->order_type);
//   // limit
//   if ($request->limit) {
//     $products = $products->limit($request->limit);
//   }
//   // limit
//   $products = $products->get();


//     $single_first_product = $products->first();

//   $title = $request->title ;
//   $order_type = $request->order_type;
//   $limit          = $request->limit;

//   $store_details = Store_details::where('lang_id',$languages->id)->first();

//   return view('pages.component.products.fixed_seven.items',compact('products','single_first_product','title','order_type','limit','store_details'));


// }
// *******************************************fixed_seven
// *******************************************fixed_blocks
// public function here_fixed_blocks(Request $request)
// {
//   $lang_session = Session::get('locale') ;
//   $languages    = Languages::where('lang_name',$lang_session)->first();


//   $category_ids =  Product_category_relation::pluck('product_categories_id')->toArray();
//   $categories = product_category::where('lang_id',$languages->id)->whereIn('id',$category_ids)->orderBy('lft');

//   // $categories = $this->order_function($all_categories,$request->order_type);

  
//   if ($request->limit) {
//     $categories = $categories->limit($request->items);
//   }

//   $categories = $categories->get();

//   $title = $request->title ;
//   $order_type = $request->order_type;
//   $limit          = $request->limit;

//   $store_details = Store_details::where('lang_id',$languages->id)->first();

//   return view('pages.component.products.fixed_blocks.items',compact('categories','title','order_type','limit','store_details','languages'));
// }
// *******************************************fixed_blocks
// *******************************************_moving_two_row_with_tabs
// public function here_moving_two_row_with_tabs(Request $request)
// {
//   $lang_session = Session::get('locale') ;
//   $languages    = Languages::where('lang_name',$lang_session)->first();

//   $category_ids =  Product_category_relation::pluck('product_categories_id')->toArray();
//   $all_product_categories = product_category::where('lang_id',$languages->id)->whereIn('id',$category_ids)->orderBy('lft')->limit(5)->get();

//   $products =  Product_items::
//       where('lang_id',$languages->id)
//       ->where('chosen',0);

//   $products = $this->order_function($products,$request->order_type);

//   if ($request->cat_id != 'all') {
//     $product_category_relation =  Product_category_relation::where('product_categories_id',$request->cat_id)
//       ->pluck('product_items_id')->toArray();
//     $products = $products->whereIn('id',$product_category_relation);
//   }

//   // limit
//   if ($request->limit) {
//     $products = $products->limit($request->limit);
//   }
//   // limit

//   $products = $products->get();

//   $product_in_row = $request->product_in_row ;
//   $title = $request->title ;
//   $cat_id = $request->cat_id;
//   $order_type = $request->order_type;
//   $limit          = $request->limit;

//   $store_details = Store_details::where('lang_id',$languages->id)->first();

//   return view('pages.component.products.moving_two_row_with_tabs.items',compact('products','product_in_row','title','all_product_categories','cat_id','order_type','limit','store_details'));
// }
// *******************************************_moving_two_row_with_tabs
// *******************************************fixed_three_columns
// public function here_fixed_three_columns(Request $request)
// {
//   $lang_session = Session::get('locale') ;
//   $languages    = Languages::where('lang_name',$lang_session)->first();

//   $products =  Product_items::
//       where('lang_id',$languages->id)
//       ->where('chosen',0);

//   $products_one = $this->order_function($products,$request->column_one_order);
//   if ($request->column_one_limit) {
//     $products_one = $products_one->limit($request->column_one_limit);
//   }
//   $products_one = $products_one->get();

//   $products_two = $this->order_function($products,$request->column_two_order);
//   if ($request->column_two_limit) {
//     $products_two = $products_two->limit($request->column_two_limit);
//   }
//   $products_two = $products_two->get();
  
//   $products_three = $this->order_function($products,$request->column_three_order);
//   if ($request->column_three_limit) {
//     $products_three = $products_three->limit($request->column_three_limit);
//   }
//   $products_three = $products_three->get();


//   $column_one_title = $request->column_one_title ;
//   $column_two_title = $request->column_two_title ;
//   $column_three_title = $request->column_three_title ;


//   $store_details = Store_details::where('lang_id',$languages->id)->first();


//   return view('pages.component.products.fixed_three_columns.items',compact(
//     'products_one','products_two','products_three',
//     'column_one_title','column_two_title','column_three_title',
//     'store_details','languages'));
// }
// *******************************************fixed_three_columns

}