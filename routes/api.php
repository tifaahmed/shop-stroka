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


    // slider
    Route::name('slider.')->prefix('/slider')->group( fn ( ) : array => [
        Route::get('/'                          ,   'SliderController@all'                 )->name('all'),
        Route::post(''                          ,   'SliderController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'SliderController@show'                )->name('show'),
        Route::get('/collection'                ,   'SliderController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'SliderController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'SliderController@update'              )->name('update')
    ]),

    // slider
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
]);
    