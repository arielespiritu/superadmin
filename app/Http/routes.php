<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* ------redirect routes------ */

Route::get('/product/store', function () {
    return Redirect::to('/product');
});
Route::get('/product/variants', function () {
    return Redirect::to('/product');
});
/* ------redirect routes------ */

Route::get('/auth/login', array('as' => 'view-login','uses' => 'Auth\AuthController@getLogin'));
Route::post('/auth/login', array('as' => 'login','uses' => 'Auth\AuthController@postLogin'));
Route::get('/auth/logout', array('as' => 'logout','uses' => 'Auth\AuthController@getLogout'));

Route::get('/', array('as' => 'dashboard','uses' => 'DashboardController@getDashboard'));

Route::get('/store', array('as' => 'store','uses' => 'StoreController@getStores'));
Route::get('/store/{id}', array('as' => 'store-info','uses' => 'StoreController@getStoresInfo'));
Route::get('/location/get-city-area', 'GenericRequestController@getArea');

Route::get('/product','ProductController@showProduct');
Route::get('/product/{id}','ProductController@showProductInfo');
Route::get('/product/variants/{id}','ProductController@showProductInfoVariants');

Route::get('/product/variants/{id}/{id1}','ProductController@showProductInfoEditVariants');

Route::get('/product/store/{id}','ProductController@showStoreProduct');

