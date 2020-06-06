<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('portal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Route::get('/correo', 'Email@enviarcorreo'); */
Route::get('/portal', 'PublicityController@index');

Route::post('/newbooks', 'ApiController@addbook')->name('newbooks');
Route::get('/searchbook', 'ApiController@search');

Route::get('/api/books/{key}', 'ApiController@getbooks');


Route::resource('ajaxbooks','BookController');

Route::get('create', 'DisplayDataController@create');
Route::get('index', 'DisplayDataController@index');
