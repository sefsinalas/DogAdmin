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

    Route::get('/portfolio', 'PortfolioController@index');
    Route::get('/portfolio/create', 'PortfolioController@create');
    Route::post('/portfolio', 'PortfolioController@store');
    Route::get('/portfolio/destroy/{id}', 'PortfolioController@destroy');
    Route::get('/portfolio/{id}', 'PortfolioController@show');

    Route::get('/contacto', 'ContactoController@index');
    Route::get('/contacto/create', 'ContactoController@create');
    Route::post('/contacto', 'ContactoController@store');
    Route::get('/contacto/destroy/{id}', 'ContactoController@destroy');
    Route::get('/contacto/{id}', 'ContactoController@show');
});

