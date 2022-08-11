<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackgroundController;

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

// when using separate web front use this
Route::prefix('/api')->group(function(){
  Route::group(['middleware' => 'CheckLogin'], function() {
    Route::get('/artikel', 'LandingController@artikel');
    Route::get('/galeri', 'LandingController@galeri');
	});
});

Route::prefix('/')->group(function(){
	Route::group(['middleware' => 'checkRole'], function() {
    Route::get('/', 'HomeController@index')->name('index');

    Route::view('/tentang-kami', 'landing.tentangKami');
    Route::view('/identitas', 'landing.identitas');
    Route::view('/visi-misi', 'landing.visiMisi');
    Route::view('/program-belajar', 'landing.programBelajar');
    Route::view('/pengajar-dan-staff', 'landing.pengajarDanStaff');
    Route::view('/galeri', 'landing.galeri');
    Route::view('/artikel', 'landing.artikel');
    Route::view('/bahan-ajar', 'landing.bahanAjar');
    Route::view('/contact', 'landing.contact');
	});

	Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
		Route::group(['prefix' => 'user', 'middleware' => 'XssSanitizer'], function () {
			Route::get('/login', 'UserController@login');
			Route::post('/login', 'UserController@storeLogin');
      Route::get('/change-password', 'UserController@edit');
      Route::put('/change-password', 'UserController@update');
			Route::get('/logout', 'UserController@logout');
		});
	});

	Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'CheckUserAdminRole'], function() {
		Route::group(['prefix' => 'admin'], function () {
      Route::get('/', 'AdminController@cms');
      Route::get('/change-password', 'AdminController@edit');
			Route::put('/change-password', 'AdminController@update');

			Route::get('/artikel/add', 'ArtikelController@create');
			Route::post('/artikel/add', 'ArtikelController@store');
			Route::put('/artikel/{artikel}/edit', 'ArtikelController@update');
			Route::delete('/artikel/{artikel}/delete', 'ArtikelController@destroy');
			Route::get('/artikel/{artikel}/edit', 'ArtikelController@edit');
			Route::get('/artikel', 'ArtikelController@index');

      Route::get('/kategori-artikel/add', 'KategoriArtikelController@create');
			Route::post('/kategori-artikel/add', 'KategoriArtikelController@store');
			Route::put('/kategori-artikel/{kategoriArtikel}/edit', 'KategoriArtikelController@update');
			Route::delete('/kategori-artikel/{kategoriArtikel}/delete', 'KategoriArtikelController@destroy');
			Route::get('/kategori-artikel/{kategoriArtikel}/edit', 'KategoriArtikelController@edit');
			Route::get('/kategori-artikel', 'KategoriArtikelController@index');

			Route::get('/kategori-galeri/add', 'KategoriGaleriController@create');
			Route::post('/kategori-galeri/add', 'KategoriGaleriController@store');
			Route::put('/kategori-galeri/{kategoriGaleri}/edit', 'KategoriGaleriController@update');
			Route::delete('/kategori-galeri/{kategoriGaleri}/delete', 'KategoriGaleriController@destroy');
			Route::get('/kategori-galeri/{kategoriGaleri}/edit', 'KategoriGaleriController@edit');
			Route::get('/kategori-galeri', 'KategoriGaleriController@index');

			Route::get('/galeri', 'GaleriController@index');
			Route::get('/galeri/add', 'GaleriController@create');
			Route::post('/galeri/add', 'GaleriController@store');
			Route::put('/galeri/{galeri}/edit', 'GaleriController@update');
			Route::delete('/galeri/{galeri}/delete', 'GaleriController@destroy');
			Route::get('/galeri/{galeri}/edit', 'GaleriController@edit');

      Route::get('/user-admin', 'UserAdminController@index');
			Route::get('/user-admin/add', 'UserAdminController@create');
			Route::post('/user-admin/add', 'UserAdminController@store');
			Route::put('/user-admin/{userAdmin}/edit', 'UserAdminController@update');
			Route::delete('/user-admin/{userAdmin}/delete', 'UserAdminController@destroy');
			Route::get('/user-admin/{userAdmin}/edit', 'UserAdminController@edit');
		});
	});
});
