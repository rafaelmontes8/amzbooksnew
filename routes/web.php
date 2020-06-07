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

Auth::routes();
/* Principal Links */
Route::get('/', function () {
    return redirect('portal');
});
Route::get('/portal', 'PublicityController@index');

/* Admin Management */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search');
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('users', 'UserEmailController');

/* Book Management */
Route::resource('ajaxbooks','BookController');
Route::post('/newbooks', 'ApiController@addbook')->name('newbooks');
Route::post('/rating', 'BookController@rating');
Route::get('/removefromlist/{id}', 'BookController@removefromlist');
Route::get('/addtolist/{id}', 'BookController@addtolist');
Route::post('/deletebook', 'BookController@destroybook');
Route::get('/searchbook', 'BookController@search');

/* API */
Route::get('/api/searchbook', 'ApiController@filtersearchbook');
Route::get('/api/searchauthor', 'ApiController@filtersearchauthor');
Route::get('/api/books/{key}', 'ApiController@getbooks');

/* User Access */
Route::get('/lista', 'HomeController@lista')->name('lista');
Route::get('/verify', 'UserEmailController@verification');
Route::get('/show/{id}', 'BookController@showbook');
Route::post('/postcomment', 'BookController@writecomment');
