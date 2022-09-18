<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RepositoryServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                // $page_details =DB::table('page_details')->get();

        // $product_categories =DB::table('product_categories')->get();
        
        // $store_details  = DB::table('page_details')->find(1);
        // $about_details  = DB::table('page_details')->find(2);
        // $contact_details  = DB::table('page_details')->find(3);
        // $cart_details  = DB::table('page_details')->find(4);
        
        // View::share('store_details',$store_details);  
        // View::share('about_details',$about_details);  
        // View::share('contact_details',$contact_details);  
        // View::share('product_categories',$product_categories);  
        // View::share('cart_details',$cart_details);  
    }
}
