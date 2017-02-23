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

	// KEAHLIAN
	Route::group(['prefix' => 'keahlian'], function() {
	
		Route::get('daftar', [
			'as'	=> 'daftarAhli',
			'uses'	=> 'AhliController@index'
		]);

		Route::post('daftar', [
			'as'	=> 'daftarAhliPost',
			'uses'	=> 'AhliController@store'
		]);

		Route::get('daftarUpdate/{id}', [
			'as'	=> 'updateKeahlian',
			'uses'	=> 'AhliController@edit'
		]);

		Route::post('daftarUpdate/{id}', [
			'as'	=> 'updateKeahlianPost',
			'uses'	=> 'AhliController@update'
		]);

	});
	
	// PERJAWATAN
	Route::group(['prefix' => 'perjawatan'], function() {
		
		Route::get('perjawatan/{noPekerja}', [
			'as'	=> 'updatePerjawatan',
			'uses'	=> 'PerjawatanController@edit'
		]);

		Route::post('perjawatanUpdate/{id}', [
			'as'	=> 'updatePerjawatanPost',
			'uses'	=> 'PerjawatanController@update'
		]);


	});

	// HELPERS
	Route::get('profile/{id}', [
		'as'	=> 'profileAhli',
		'uses'	=> 'ProfileController@profile'
	]);




});
