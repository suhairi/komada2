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
    if(Auth::user())
    	return view('home');
    else
    	return view('auth.login');
})->name('utama');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'members'], function() {

	Route::get('daftar', [
		'as'	=> 'daftarAhli',
		'uses'	=> 'AhliController@index'
	]);
});
