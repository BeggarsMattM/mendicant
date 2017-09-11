<?php

Route::resource('artists', 'ArtistsController');

Route::resource('news', 'NewsController');

Route::get('news_redirect', 'NewsController@news_redirect');
Route::get('artist_news', 'NewsController@artist_news');

Route::resource('releases', 'ReleasesController');
Route::get('releases/available', 'ReleasesController@available');

Route::get('search_results', 'SearchController@index');
