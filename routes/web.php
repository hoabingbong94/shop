<?php
use App\User;
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
    $user = new User();
    $user = $user->find(1);
    setlocale(LC_TIME, 'es_ES.utf8');
    $date = Carbon\Carbon::parse($user->reverse_date)->formatLocalized('%B %d, %Y 00:00:00');
    return view('welcome', ['date' => $date]);
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'LoginController@getLogin');
    Route::post('login', 'LoginController@postLogin');


    //list custormer 
    Route::get('custormer', 'CustormerController@index');
    Route::get('custormer/form/{id}', 'CustormerController@form');
    Route::post('custormer/update/{id}', 'CustormerController@update');

//    list news
    Route::get('news', 'NewsController@index');

    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/update/{id}', 'NewsController@update');

    //settings
    Route::get('setting/{id}', 'AdminController@setting');
    Route::post('update/{id}', 'AdminController@update');
});

 Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');
Route::post('news/create', 'NewsController@create');
Route::post('news/form', 'NewsController@form');

 Route::post('custormer/create', 'CustormerController@create');

