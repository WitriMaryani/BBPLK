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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('kejuruan','KejuruanController');
Route::resource('sub_kejuruan','Sub_kejuruanController');
Route::resource('program','ProgramController');

Route::get('cari','KejuruanController@search');
Route::get('caril','Sub_kejuruanController@search');
Route::get('carim','programController@search');