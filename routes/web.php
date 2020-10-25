<?php

use Illuminate\Support\Facades\Route;

Route::get('ie', ['uses' => 'PageController@ieWarning', 'as' => 'ie']);

Route::get('/', ['uses' => 'PageController@landing', 'as' => 'landing']);
Route::get('about', ['uses' => 'PageController@about', 'as' => 'about']);

Route::group(['prefix' => 'gallery', 'as' => 'gallery'], function() {
	Route::get('/', ['uses' => 'GalleryController@index','as' => '.index']);
	Route::get('view/{name}', ['uses' => 'GalleryController@getImage','as' => '.image']);
});

Route::group(['prefix' => 'commission', 'as' => 'commission'], function() {
	Route::get('/', ['uses' => 'PageController@redirectToInfo']);
	Route::get('info', ['uses' => 'PageController@commissionInfo', 'as' => '.info']);
	Route::get('terms', ['uses' => 'PageController@commissionTerms', 'as' => '.terms']);
});

Route::get('errorpage/{code}', function($code) {
	return abort($code);
});