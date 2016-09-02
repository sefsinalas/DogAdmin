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

    Route::get('/home', 'DogAdmin\HomeController@index');
    Route::get('/home/create', 'DogAdmin\HomeController@create');
    Route::post('/home', 'DogAdmin\HomeController@store');
    Route::get('/home/destroy/{id}', 'DogAdmin\HomeController@destroy');
    Route::get('/home/{id}', 'DogAdmin\HomeController@show');
    Route::get('/home/edit/{id}', 'DogAdmin\HomeController@edit');
    Route::post('/home/update', 'DogAdmin\HomeController@update');

    Route::get('/servicios', 'DogAdmin\ServiciosController@index');
    Route::get('/servicios/create', 'DogAdmin\ServiciosController@create');
    Route::post('/servicios', 'DogAdmin\ServiciosController@store');
    Route::get('/servicios/destroy/{id}', 'DogAdmin\ServiciosController@destroy');
    Route::get('/servicios/{id}', 'DogAdmin\ServiciosController@show');
    Route::get('/servicios/update/{id}', 'DogAdmin\ServiciosController@edit');
    Route::post('/servicios/update', 'DogAdmin\ServiciosController@update');

    Route::get('/portfolio', 'DogAdmin\PortfolioController@index');
    Route::get('/portfolio/create', 'DogAdmin\PortfolioController@create');
    Route::post('/portfolio', 'DogAdmin\PortfolioController@store');
    Route::get('/portfolio/destroy/{id}', 'DogAdmin\PortfolioController@destroy');
    Route::get('/portfolio/{id}', 'DogAdmin\PortfolioController@show');
    Route::get('/portfolio/edit/{id}', 'DogAdmin\PortfolioController@edit');
    Route::post('/portfolio/update', 'DogAdmin\PortfolioController@update');

    Route::get('/contacto', 'DogAdmin\ContactoController@index');
    Route::get('/contacto/create', 'DogAdmin\ContactoController@create');
    Route::post('/contacto', 'DogAdmin\ContactoController@store');
    Route::get('/contacto/destroy/{id}', 'DogAdmin\ContactoController@destroy');
    Route::get('/contacto/{id}', 'DogAdmin\ContactoController@show');
    Route::get('/contacto/edit/{id}', 'DogAdmin\ContactoController@edit/{id}');
    Route::post('/contacto/update', 'DogAdmin\ContactoController@update');
});

