<?php

use Illuminate\Support\Facades\Route;


// Route::get('generate', function (){
//     \Illuminate\Support\Facades\Artisan::call('storage:link');
//     echo 'ok';
// });


Route::get( '/dashboard' , function () {
    return redirect('/dashboard/auth/login');
});

Route::get( '/dashboard/{any}' , fn( ) => view( 'admin-panel' ) )-> where( 'any' , '.*' )   -> name( 'admin' ) ;
Route::get( '/dashboard' , fn( ) => view( 'admin-panel' ) ) ;

 





// Route::get('/product_modal/{url}', 'App\Http\Controllers\MainController@product_modal');


// Route::get('/here_moving_one_row_with_tabs', 'MainController@here_moving_one_row_with_tabs');
// // Route::get('/here_fixed_seven', 'MainController@here_fixed_seven');
// // Route::get('/here_fixed_blocks', 'MainController@here_fixed_blocks');
// // Route::get('/here_moving_two_row_with_tabs', 'MainController@here_moving_two_row_with_tabs');
// // Route::get('/here_fixed_three_columns', 'MainController@here_fixed_three_columns');





// Route::get('/', function () {
//     return redirect(app()->getLocale().'/home');
// });


// // Route::get('/close_page', 'MainController@close')->name('close_page');

// Route::group([
// 	'prefix' => '{locale}/home', 
// 	'where' => ['locale' => '[a-zA-Z]{2}'], 
// 	// 'middleware' => 'App\Http\Middleware\status'
// ], function () {
// 	// Route::get('/close_page', 'MainController@close')->name('close_page');

// 	Route::get('/', 'MainController@index');
// 	Route::get('/home', 'MainController@index')->name('home');
// 	Route::get('/home/{url}', 'MainController@index');

// 	// Route::get('/shop', 'MainController@products')->name('products');
// 	// Route::get('/shop/{url}', 'MainController@products') ;

// 	Route::get('/contact-us', 'MainController@contact_us')->name('contact_us');
// 	Route::get('/contact-us/{url}', 'MainController@contact_us') ;

// 	Route::get('/about-us', 'MainController@about_us')->name('about_us');
// 	Route::get('/about-us/{url}', 'MainController@about_us') ;

// 	Route::get('/cart', 'MainController@cart')->name('cart');
// 	Route::get('/cart/{url}', 'MainController@cart') ;

	
// 	// // search
// 		Route::get('products_search', [ShopController::class, 'index'])->name('products_search');
// 	// 	Route::get('suggestions', 'MainController@suggestions');
// 	// // search

// 	// Route::get('/blog', 'App\Http\Controllers\BlogController@blogs')->name('blogs');
// 	// Route::get('/blogs/{url}', 'App\Http\Controllers\BlogController@blogs');


// });
 
// // admin
// 	// Route::get('dell_vedio/{id}', 'App\Http\Controllers\AdminController@dell_vedio');
// // admin


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
