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

Route::get('/', "DiscountsController@index");

Route::get('/index', "DiscountsController@index");

Route::get('/domestic', "DiscountsController@dome");

Route::get('/foreign', "DiscountsController@frgn");

Route::get('/article', "DiscountsController@article");

Route::get('/list', "DiscountsController@discount_list");

Route::get('/rec', "DiscountsController@recommend");

Route::get('/discover', "DiscoverController@index");

Route::get('/deals', "CheapsController@index");

Route::get('worth', 'DiscountsController@worth');
Route::post('search', 'DiscountsController@search');