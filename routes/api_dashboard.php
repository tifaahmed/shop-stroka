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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' =>'dashboard'], fn ( ) : array => [

    Route::name('language.')->prefix('/language')->group( fn ( ) : array => [
        Route::get('/'                          ,   'LanguageController@all'                 )->name('all'),
    ]),


    // no middleware
    Route::name( 'auth.') -> prefix( 'auth' ) -> group( fn ( ) => [
        Route::post( '/login' ,   'AuthController@login'  ) -> name( 'login' ) ,
        // Route::post( '/login-social' ,   'AuthController@loginSocial'  ) -> name( 'loginSocial' ) ,
        Route::post( '/register' ,  'AuthController@register' )  -> name( 'register' ) ,    
    ]),


    // slider
    // Route::name('slider.')->prefix('/slider')->group( fn ( ) : array => [
    //     Route::get('/'                          ,   'SliderController@all'                 )->name('all'),
    //     Route::post(''                          ,   'SliderController@store'               )->name('store'),
    //     Route::get('/{id}/show'                 ,   'SliderController@show'                )->name('show'),
    //     Route::get('/collection'                ,   'SliderController@collection'          )->name('collection'),
    //     Route::DELETE('/{id}'                   ,   'SliderController@destroy'             )->name('destroy'),
    //     Route::post('/{id}/update'              ,   'SliderController@update'              )->name('update')
    // ]),
    
    Route::name('country.')->prefix('/country')->group( fn ( ) : array => [
        Route::get('/'                          ,   'CountryController@all'                 )->name('all'),
        Route::post(''                          ,   'CountryController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'CountryController@show'                )->name('show'),
        Route::get('/collection'                ,   'CountryController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'CountryController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'CountryController@update'              )->name('update'),
        
        Route::get('/{id}/restore'              ,   'CountryController@restore'             )->name('restore'),
        Route::DELETE('premanently-delete/{id}' ,   'CountryController@premanently_delete'  )->name('premanently_delete'),
        Route::get('/collection-trash'          ,   'CountryController@collection_trash'    )->name('collection_trash'),
        Route::get('/{id}/show-trash'           ,   'CountryController@show_trash'          )->name('show_trash'),
    ]),

    // Site-Setting
    Route::name('site-setting.')->prefix('/site-setting')->group( fn ( ) : array => [
        Route::get('/'                          ,   'SiteSettingController@all'                 )->name('all'),
        Route::get('/{id}/show'                 ,   'SiteSettingController@show'                )->name('show'),
        Route::get('/collection'                ,   'SiteSettingController@collection'          )->name('collection'),
        Route::post('/{id}/update'              ,   'SiteSettingController@update'              )->name('update'),
    ]),
    // product-category
    Route::name('product-category.')->prefix('/product-category')->group( fn ( ) : array => [
        Route::get('/'                          ,   'ProductCategoryController@all'                 )->name('all'),
        Route::post(''                          ,   'ProductCategoryController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'ProductCategoryController@show'                )->name('show'),
        Route::get('/collection'                ,   'ProductCategoryController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'ProductCategoryController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'ProductCategoryController@update'              )->name('update'),
        
        Route::get('/{id}/restore'              ,   'ProductCategoryController@restore'             )->name('restore'),
        Route::DELETE('premanently-delete/{id}' ,   'ProductCategoryController@premanently_delete'  )->name('premanently_delete'),
        Route::get('/collection-trash'          ,   'ProductCategoryController@collection_trash'    )->name('collection_trash'),
        Route::get('/{id}/show-trash'           ,   'ProductCategoryController@show_trash'          )->name('show_trash'),
    ]),

    // product-category
    Route::name('product-item.')->prefix('/product-item')->group( fn ( ) : array => [
        Route::get('/'                          ,   'ProductItemsController@all'                 )->name('all'),
        Route::post(''                          ,   'ProductItemsController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'ProductItemsController@show'                )->name('show'),
        Route::get('/collection'                ,   'ProductItemsController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'ProductItemsController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'ProductItemsController@update'              )->name('update'),
        
        Route::get('/{id}/restore'              ,   'ProductItemsController@restore'             )->name('restore'),
        Route::DELETE('premanently-delete/{id}' ,   'ProductItemsController@premanently_delete'  )->name('premanently_delete'),
        Route::get('/collection-trash'          ,   'ProductItemsController@collection_trash'    )->name('collection_trash'),
        Route::get('/{id}/show-trash'           ,   'ProductItemsController@show_trash'          )->name('show_trash'),
    ]),

    // product-category
    Route::name('store.')->prefix('/store')->group( fn ( ) : array => [
        Route::get('/'                          ,   'StoreController@all'                 )->name('all'),
        Route::post(''                          ,   'StoreController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'StoreController@show'                )->name('show'),
        Route::get('/collection'                ,   'StoreController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'StoreController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'StoreController@update'              )->name('update'),
        
        Route::get('/{id}/restore'              ,   'StoreController@restore'             )->name('restore'),
        Route::DELETE('premanently-delete/{id}' ,   'StoreController@premanently_delete'  )->name('premanently_delete'),
        Route::get('/collection-trash'          ,   'StoreController@collection_trash'    )->name('collection_trash'),
        Route::get('/{id}/show-trash'           ,   'StoreController@show_trash'          )->name('show_trash'),
    ]),
    // product-category
    Route::name('user.')->prefix('/user')->group( fn ( ) : array => [
        Route::get('/'                          ,   'UserController@all'                 )->name('all'),
        Route::post(''                          ,   'UserController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'UserController@show'                )->name('show'),
        Route::get('/collection'                ,   'UserController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'UserController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'UserController@update'              )->name('update'),
        
        Route::get('/{id}/restore'              ,   'UserController@restore'             )->name('restore'),
        Route::DELETE('premanently-delete/{id}' ,   'UserController@premanently_delete'  )->name('premanently_delete'),
        Route::get('/collection-trash'          ,   'UserController@collection_trash'    )->name('collection_trash'),
        Route::get('/{id}/show-trash'           ,   'UserController@show_trash'          )->name('show_trash'),
    ]),
]);
    