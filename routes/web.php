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

Route::prefix('admin')->group(function(){
	Route::prefix('category')->group(function(){
		Route::namespace('Backend')->group(function(){

			Route::get('index','CategoryController@index')->name('category.index');

			Route::get('create','CategoryController@create')->name('category.create');
			Route::post('create','CategoryController@store')->name('category.store');

			Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
			Route::post('edit/{id}','CategoryController@update')->name('category.update');

			Route::get('delete/{id}','CategoryController@delete')->name('category.delete');
		});
	});
});

