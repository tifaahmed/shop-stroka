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

    // no middleware
    Route::name( 'auth.') -> prefix( 'auth' ) -> group( fn ( ) => [
        Route::post( '/login' ,   'AuthController@login'  ) -> name( 'login' ) ,
        // Route::post( '/login-social' ,   'AuthController@loginSocial'  ) -> name( 'loginSocial' ) ,
        Route::post( '/register' ,  'AuthController@register' )  -> name( 'register' ) ,    
    ]),


    // slider
    Route::name('slider.')->prefix('/slider')->group( fn ( ) : array => [
        Route::get('/'                          ,   'SliderController@all'                 )->name('all'),
        Route::post(''                          ,   'SliderController@store'               )->name('store'),
        Route::get('/{id}/show'                 ,   'SliderController@show'                )->name('show'),
        Route::get('/collection'                ,   'SliderController@collection'          )->name('collection'),
        Route::DELETE('/{id}'                   ,   'SliderController@destroy'             )->name('destroy'),
        Route::post('/{id}/update'              ,   'SliderController@update'              )->name('update')
        
        //Route::get('/{id}/restore'             ,   'IntroductionController@restore'             )->name('restore'),
        //Route::DELETE('premanently-delete/{id}' ,   'IntroductionController@premanently_delete'  )->name('premanently_delete'),
        //Route::get('/collection-trash'          ,   'IntroductionController@collection_trash'    )->name('collection_trash'),
        //Route::get('/{id}/show-trash'           ,   'IntroductionController@show_trash'          )->name('show_trash'),
    ]),

    
]);
    