<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
	Route::get('login','LoginController@getLogin');
    Route::post('login','LoginController@postLogin');


    //list custormer 
    Route::get('custormer','CustormerController@index');
    Route::post('custosmer/search','CustormerController@index');

	Route::get('/dashboard ', function () {
		return view('welcome');
	});
});

// Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin','AdminController@index');
