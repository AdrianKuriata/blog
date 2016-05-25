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

/*Routes for authentication user*/
Route::auth();

/*Main Page*/
Route::get('/', 'HomeController@index');

/*Route Group for Blogger Middleware*/

Route::group(['middleware' => ['auth', 'blogger']], function() {
	
	Route::get('/admin', 'AdminController@index');
	Route::get('/admin/articles', 'AdminController@indexArticles');
	Route::post('admin/storeArticle', ['uses' => 'AdminController@storeArticle', 'as' => 'store.article']);
});



