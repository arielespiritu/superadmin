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


Route::get('/auth/login', array('as' => 'view-login','uses' => 'Auth\AuthController@getLogin'));
Route::post('/auth/login', array('as' => 'login','uses' => 'Auth\AuthController@postLogin'));
Route::get('/auth/logout', array('as' => 'logout','uses' => 'Auth\AuthController@getLogout'));

Route::get('/product','ProductController@showProduct');

Route::get('/store', array('as' => 'logout','uses' => 'StoreController@getStores'));
Route::get('/', array('as' => 'logout','uses' => 'DashboardController@getDashboard'));