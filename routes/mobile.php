<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' =>'mobile'], fn ( ) : array => [

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}),

Route::group(['middleware' => ['LocalizationMiddleware']], fn ( ) : array => [

    // Route::name('language.')->prefix('/language')->group( fn ( ) : array => [
    //     Route::get('/'                          ,   'LanguageController@all'                 )->name('all'),
    // ]),


    // no middleware
    // Route::name( 'auth.') -> prefix( 'auth' ) -> group( fn ( ) => [
        // Route::post( '/login' ,   'AuthController@login'  ) -> name( 'login' ) ,
        // Route::post( '/login-social' ,   'AuthController@loginSocial'  ) -> name( 'loginSocial' ) ,
        // Route::post( '/register' ,  'AuthController@register' )  -> name( 'register' ) ,    
    // ]),


    // product-category
    Route::name('product-category.')->prefix('/product-category')->group( fn ( ) : array => [
        Route::get('/'                          ,   'ProductCategoryController@all'                 )->name('all'),
        Route::get('/{id}/show'                 ,   'ProductCategoryController@show'                )->name('show'),
        Route::get('/collection'                ,   'ProductCategoryController@collection'          )->name('collection'),
    ]),
    // product-category
    Route::name('product-item.')->prefix('/product-item')->group( fn ( ) : array => [
        Route::get('/'                          ,   'ProductItemsController@all'                 )->name('all'),
        Route::get('/{id}/show'                 ,   'ProductItemsController@show'                )->name('show'),
        Route::get('/collection'                ,   'ProductItemsController@collection'          )->name('collection'),
    ]),
])
]);
