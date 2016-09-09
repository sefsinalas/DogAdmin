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
});









