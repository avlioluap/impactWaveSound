<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'lastfm'], function () {
    //Route::get('list', 'Albums\Albumscontroller@index');
    //Route::get('artist', 'Api\AjaxRequestController@music');
    //Route::get('album', 'Api\AjaxRequestController@music');
    Route::any('search', 'Api\AjaxRequestController@music')->name('music.search');
});

