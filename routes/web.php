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
    return view('index');
})->name('app::home');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin::home');

Route::get('/admin/{page}', function () {
    return view('admin.index');
});

Route::get('/admin/{page}/{page2}', function () {
    return view('admin.index');
});

Route::group(['namespace'  => 'Admin', 'middleware' => [], 'prefix' => '/api/v1'], function () {
	Route::resource('pages', 'PageController');
});

Route::get('/{page}', 'PageController@show')->name('app::page');

