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
    return view('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users'], function () {
	
	Route::get('/','UserController@index');

	Route::get('/{id}','UserController@show')->name('user');

	Route::post('/nadaj-uprawnienia','UserController@displayPermission')->name('uprawnienia');
	
	Route::post('/pass','Auth\ChangePasswordController@changePassword')->name('changePassword');

});

Route::group(['prefix' => 'games'], function () {
	
	Route::get('/','GameController@index');

	Route::get('/add','GameController@add');

	Route::post('/verifyGame','GameController@verifyGame')->name('verifyGame');

	Route::get('/{id}','GameController@show');

	Route::get('/genre/{id}','GameController@getByGenre');

	Route::get('/edit/{id}','GameController@editGame');

	Route::post('/modifyGame','GameController@modifyGame')->name('modifyGame');
});

Route::group(['prefix' => 'comments'], function () {
	
	Route::post('/add','CommentController@add')->name('addComment');
	
	Route::post('/del','CommentController@del')->name('delComment');
});

Route::group(['prefix' => 'search'], function () {
	Route::get('/','SearchController@index');
	
	Route::post('/show','SearchController@show');
});

