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

		Route::post('perjawatan/{noPekerja}', [
			'as'	=> 'updatePerjawatanPost',
			'uses'	=> 'PerjawatanController@update'
		]);


	});

	// PINJAMAN

	Route::group(['prefix' => 'pinjaman'], function() {

		Route::get('pwt', [
			'as'	=> 'pwt',
			'uses'	=> 'PinjamanController@pwt'
		]);

		Route::post('pwt', [
			'as'	=> 'pwt',
			'uses'	=> 'PinjamanController@pwtPost'
		]);

		Route::post('pinjaman/proses', [
			'as'	=> 'pinjaman.proses',
			'uses'	=> 'PinjamanController@pinjamanProses'
		]);

	});

	// YURAN

	Route::group(['prefix' => 'yuran'], function() {

		Route::get('yuran/{id}', [
			'as'	=> 'updateYuran',
			'uses'	=> 'YuranController@update'
		]);

		Route::post('yuran/{id}', [
			'as'	=> 'updateYuranPost',
			'uses'	=> 'YuranController@updatePost'
		]);

	});


	// BAYARAN

	Route::group(['prefix' => 'bayaran'], function() {\

		// Yuran
		Route::get('yuran', [
			'as'	=> 'bayaran.yuran',
			'uses'	=> 'BayaranController@yuran'
		]);

		Route::post('yuran', [
			'as'	=> 'bayaran.yuran',
			'uses'	=> 'BayaranController@yuranPost'
		]);

		Route::get('tunai', [
			'as'	=> 'bayaran.tunai',
			'uses'	=> 'BayaranController@tunai'
		]);

		Route::post('tunai', [
			'as'	=> 'bayaran.tunai',
			'uses'	=> 'BayaranController@tunaiPost'
		]);

		Route::post('tunai/proses', [
			'as'	=> 'bayaran.tunai.proses',
			'uses'	=> 'BayaranController@prosesBayaran'
		]);




	});

	// SENARAI

	Route::group(['prefix' => 'senarai'], function() {

		Route::get('zongaji', [
			'as'	=> 'senarai.zongaji',
			'uses'	=> 'SenaraiController@zongaji'
		]);

		Route::post('zongaji', [
			'as'	=> 'senarai.zongaji',
			'uses'	=> 'SenaraiController@zonGajiPost'
		]);

	});



	// SETTINGS

	Route::group(['prefix' => 'settings'], function() {

		Route::get('tka', [
			'as'	=> 'settings.tka',
			'uses'	=> 'SettingsController@tka'
		]);

		Route::post('tka', [
			'as'	=> 'settings.tka',
			'uses'	=> 'SettingsController@tkaPost'
		]);

		Route::get('sumbangan', [
			'as'	=> 'settings.sumbangan',
			'uses'	=> 'SettingsController@sumbangan'
		]);

		Route::post('sumbangan', [
			'as'	=> 'settings.sumbangan',
			'uses'	=> 'SettingsController@sumbanganPost'
		]);


	});

	// SETTINGS 2

	Route::group(['prefix' => 'settings'], function() {

		Route::get('profile', [
			'as'	=> 'settings2.profile',
			'uses'	=> 'Settings2Controller@profile'
		]);

		Route::get('perjawatan', [
			'as'	=> 'settings2.perjawatan',
			'uses' 	=> 'Settings2Controller@perjawatan'
		]);

		Route::get('yuran', [
			'as'	=> 'settings2.yuran',
			'uses' 	=> 'Settings2Controller@yuran'
		]);

		Route::get('yuranTerkumpul', [
			'as'	=> 'settings2.yuran.terkumpul',
			'uses'	=> 'Settings2Controller@yuranTerkumpul'
		]);
		
		Route::get('loans', [
			'as'	=> 'settings2.loan',
			'uses'	=> 'Settings2Controller@loan'
		]);

		Route::get('removeNoPekerja', [
			'as'	=> 'settings2.removeNoPekerjaNull',
			'uses'	=> 'Settings2Controller@removePinjamanNoPekerjaNull'
		]);




	});


	// HELPERS
	Route::get('profile/{id}', [
		'as'	=> 'profileAhli',
		'uses'	=> 'ProfileController@profile'
	]);

	Route::get('carian', [
		'as'	=> 'carianAhli',
		'uses'	=> 'CarianController@index'
	]);

	Route::post('carian', [
		'as'	=> 'carianAhli',
		'uses'	=> 'CarianController@indexPost'
	]);

	Route::get('kemaskini/baki/{pinjaman_id}', [
		'as'	=> 'kemaskini.baki',
		'uses'	=> 'Settings2Controller@kemaskiniBaki'
	]);

	Route::post('kemaskini/baki/{pinjaman_id}', [
		'as'	=> 'kemaskini.baki',
		'uses'	=> 'Settings2Controller@kemaskiniBakiPost'
	]);

	Route::get('pinjaman/padam/{id}', [
		'as'	=> 'pinjaman.padam',
		'uses'	=> 'Settings2Controller@pinjamanPadam'
	]);

	// MENU PERHATIAN 
	// TUJUAN DATA CLEANING SAHAJA
	// BUKAN SEBAHAGIAN DRPD SISTEM

	Route::get('perhatian', [
		'as'	=> 'perhatian',
		'uses'	=> 'Settings2Controller@perhatian'
	]);




});
