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

Route::post('login','Auth\LoginController@login')->name('login');

Route::group(['middleware' => ['auth']],function(){
	Route::prefix('admin')->group(function(){

		Route::prefix('category')->group(function(){
			Route::namespace('Backend')->group(function(){

				Route::get('index','CategoryController@index')->name('category.index');

				Route::get('create','CategoryController@create')->name('category.create');
				Route::post('create','CategoryController@store')->name('category.store');

				Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
				Route::post('edit/{id}','CategoryController@update')->name('category.update');

				Route::post('delete/{id}','CategoryController@delete')->name('category.delete');
			});
		});

		Route::prefix('news')->group(function(){
			Route::namespace('Backend')->group(function(){

				Route::get('index','NewsController@index')->name('news.index');

				Route::get('create','NewsController@create')->name('news.create');
				Route::post('create','CategoryController@store')->name('news.store');

				Route::get('edit/{id}','NewsController@edit')->name('news.edit');
				Route::post('edit/{id}','NewsController@update')->name('news.update');

				Route::post('delete/{id}','NewsController@delete')->name('news.delete');
			});
		});
	});
});


Route::get('logout','Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
