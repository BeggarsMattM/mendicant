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
    return view('welcome');
});

Route::resource('artists', 'ArtistsController');

Route::resource('releases', 'ReleasesController');
Route::get('releases/available', 'ReleasesController@available');

Route::get('search_results', 'SearchController@index');
