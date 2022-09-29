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
Route::group(['prefix' =>'mobile','middleware' => ['LocalizationMiddleware']], fn ( ) : array => [

    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // }),

    Route::group(['middleware' => []], fn ( ) : array => [

        // auth
        Route::name( 'auth.') -> prefix( 'auth') -> group( fn ( ) => [
            Route::post( '/login' ,   'AuthController@login'  ) -> name( 'login' ) ,
            Route::post( '/login-social' ,   'AuthController@loginSocial'  ) -> name( 'loginSocial' ) ,
            Route::post( '/register' ,  'AuthController@register' )  -> name( 'register' ) ,    
            Route::post( '/forget-password' ,  'AuthController@forget_password' )  -> name( 'forget_password' ) ,  
            Route::post( '/check-pin-code' ,  'AuthController@check_pin_code' )  -> name( 'check_pin_code' ) ,  
        ]),
        // country
        Route::name('country.')->prefix('/country')->group( fn ( ) : array => [
            Route::get('/'                          ,   'CountryController@all'                 )->name('all'),
            Route::get('/{id}/show'                 ,   'CountryController@show'                )->name('show'),
            Route::get('/collection'                ,   'CountryController@collection'          )->name('collection'),
        ]),

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
        // store
        Route::name('store.')->prefix('store')->group( fn ( ) : array => [
            Route::get('/'                          ,   'StoreController@all'                 )->name('all'),
            Route::get('/{id}/show'                 ,   'StoreController@show'                )->name('show'),
            Route::get('/collection'                ,   'StoreController@collection'          )->name('collection'),
        ]),

    ]),
    // auth:sanctum // auth:sanctum
    // auth:api // passport
    Route::group(['middleware' => ['auth:sanctum']], fn ( ) : array => [
        // auth
        Route::name( 'auth.') -> prefix( 'auth' ,'guest','guest:api') -> group( fn ( ) => [
            Route::post( 'update-password' ,  'authController@update_password' )  -> name( 'update_password' ),
            Route::post( 'logout' ,  'authController@logout' )  -> name( 'logout' ) ,
        ]),

        // user
        Route::name('user.')->prefix('/user')->group( fn ( ) : array => [
            Route::get('/show'                 ,   'UserController@show'                )->name('show'),
            Route::post('/update'              ,   'UserController@update'              )->name('update'),
            Route::post('/apdate-password'     ,   'UserController@apdatePassword'      )->name('apdate_password'),
        ]), 
    ])

]);
