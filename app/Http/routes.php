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
	Route::get('/admin/articles', 'AdminController@indexArticles')->name('index');
	Route::post('/admin/storeArticle', ['uses' => 'AdminController@storeArticle', 'as' => 'store.article']);
	Route::post('/admin/editArticle/{id}', ['uses' => 'AdminController@editArticle', 'as' => 'edit.article']);
	Route::post('/admin/deleteArticle/{id}', ['uses' => 'AdminController@deleteArticle', 'as' => 'delete.article']);

	Route::post('/admin/storeTag', ['uses' => 'AdminController@storeTag', 'as' => 'store.tag']);

	Route::get('/admin/posts', 'AdminController@indexPosts');
	Route::post('/admin/verifyPost/{id}', ['uses' => 'AdminController@verifyPost', 'as' => 'verify.post']);
	Route::delete('admin/deletePost/{id}', ['uses' => 'AdminController@deletePost', 'as' => 'delete.post']);
});

/*Showing Article and everything with it*/

Route::get('/article/{title}', 'HomeController@showArticle');
Route::post('/article/createPost/{id}', ['uses' => 'HomeController@storePost', 'as' => 'store.post']);



