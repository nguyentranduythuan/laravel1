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
	
Route::namespace('Backend')->group(function(){
	Route::prefix('admin')->name('admin.')->group(function(){

		Route::prefix('category')->name('category.')->group(function(){

				//Route::namespace('Backend')->group(function(){

			Route::get('index','CategoryController@index')->name('index');

			Route::get('create','CategoryController@create')->name('create');
			Route::post('create','CategoryController@store')->name('store');

			Route::get('edit/{id}','CategoryController@edit')->name('edit');
			Route::post('edit/{id}','CategoryController@update')->name('update');

			Route::post('delete/{id}','CategoryController@delete')->name('delete');

				//});
		});

		Route::prefix('news')->name('news.')->group(function(){

				//Route::namespace('Backend')->group(function(){

			Route::get('index','NewsController@index')->name('index');

			Route::get('create','NewsController@create')->name('create');
			Route::post('create','NewsController@store')->name('store');

			Route::get('edit/{id}','NewsController@edit')->name('edit');
			Route::post('edit/{id}','NewsController@update')->name('update');

			Route::post('delete/{id}','NewsController@delete')->name('delete');

				//});

				
		});
	});

});
});
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('index','PageController@index');
Route::get('news/{slug}','PageController@news');
Route::get('detail/{slug}','PageController@detail');





Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
