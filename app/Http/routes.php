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

Route::auth();

// demo del admin
Route::get('/demo', 'DemoController@index');


Route::group(['middleware' => ['web']], function() {
    Route::get('/profile', 'ProfileController@view');
    Route::post('/profile', 'ProfileController@update');
    Route::get('/users', 'UsersController@index');

    Route::get('/home', 'HomeController@index');
    Route::get('/home/create', 'HomeController@create');
    Route::post('/home', 'HomeController@store');
    Route::get('/home/destroy/{id}', 'HomeController@destroy');
    Route::get('/home/{id}', 'HomeController@show');

    Route::get('/servicios', 'ServiciosController@index');
    Route::get('/servicios/create', 'ServiciosController@create');
    Route::post('/servicios', 'ServiciosController@store');
    Route::get('/servicios/destroy/{id}', 'ServiciosController@destroy');
    Route::get('/servicios/{id}', 'ServiciosController@show');
});

