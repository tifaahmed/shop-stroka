<?php

use Illuminate\Support\Facades\Route;


Route::group([
	'prefix' => '{locale}/profile', 
	'where' => ['locale' => '[a-zA-Z]{2}'], 
	// 'middleware' => 'App\Http\Middleware\status'
], function () {
    Route::get('/', 'ProfileController@index');


    Route::name('address.')->prefix('/address')->group( fn ( ) : array => [
        Route::get('/'                          ,   'AddressController@all'                 )->name('all'),
        Route::get('/add'                       ,   'AddressController@add'                 )->name('add'),
        Route::post(''                          ,   'AddressController@store'               )->name('store'),
        Route::DELETE('/{id}'                   ,   'AddressController@destroy'             )->name('destroy'),
        Route::get('/edit'                      ,   'AddressController@edit'                )->name('edit'),
        Route::post('/{id}/update'              ,   'AddressController@update'              )->name('update')
    ]);
    Route::name('received-order.')->prefix('/received-order')->group( fn ( ) : array => [
        Route::get('/'                          ,   'ReceivedOrderController@all'           )->name('all'),
        Route::get('/{code}/show'               ,   'ReceivedOrderController@show'          )->name('show'),

    ]);
    Route::get('/edit', 'ProfileController@edit');
    Route::get('/edit-password', 'ProfileController@edit_password');
});
