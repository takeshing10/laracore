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

Route::get('/mypage/{vue_capture?}', 'AppController@index')
    ->middleware(['speed'])
    ->where('vue_capture', '[\/\w\.\,\-]*');

Route::get('/', function () {
	return \File::get(public_path() . '/index.html');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

