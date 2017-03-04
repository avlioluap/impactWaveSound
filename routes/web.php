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

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'search'], function () {
    //Route::get('list', 'Albums\Albumscontroller@index');
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'browse'], function () {
	Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'playlist'], function () {
	Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'music'], function () {
	Route::get('/', 'MusicController@index');
    //pagina que lista os albums de um artista
    Route::get('artistalbums/{artist}/{mbid}', 'MusicController@artistAlbums')->name('music.rcontent.artist');

    //info de album
    Route::get('albuminfo/{artist}/{album}', 'MusicController@albumInfo');
});

Route::group(['prefix' => 'account'], function () {
	Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'settings'], function () {
	Route::get('/', 'HomeController@index');
});
