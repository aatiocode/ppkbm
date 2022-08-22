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
    Route::get('/logo', 'LandingController@logo');
    Route::get('/galeri', 'LandingController@galeri');
    Route::get('/beranda', 'LandingController@beranda');
    Route::get('/tentang-kami', 'LandingController@tentangKami');
    Route::get('/identitas', 'LandingController@identitas');
    Route::get('/visi-misi', 'LandingController@visiMisi');
    Route::get('/program-belajar', 'LandingController@programBelajar');
    Route::get('/pengajar-dan-staff', 'LandingController@pengajarStaff');
    Route::get('/lokasi-sekolah', 'LandingController@lokasiSekolah');
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

      Route::get('/gambar', 'LogoController@index');
      Route::get('/gambar/add', 'LogoController@create');
			Route::post('/gambar/add', 'LogoController@store');
			Route::put('/gambar/{gambar}/edit', 'LogoController@update');
			Route::get('/gambar/{gambar}/edit', 'LogoController@edit');

      Route::get('/carousel', 'CarouselController@index');
      Route::get('/carousel/add', 'CarouselController@create');
			Route::post('/carousel/add', 'CarouselController@store');
      Route::put('/carousel/{carousel}/edit', 'CarouselController@update');
      Route::get('/carousel/{carousel}/edit', 'CarouselController@edit');

      Route::get('/identitas-sekolah', 'IdentitasSekolahController@index');
      Route::get('/identitas-sekolah/add', 'IdentitasSekolahController@create');
			Route::post('/identitas-sekolah/add', 'IdentitasSekolahController@store');
      Route::put('/identitas-sekolah/{identitasSekolah}/edit', 'IdentitasSekolahController@update');
      Route::get('/identitas-sekolah/{identitasSekolah}/edit', 'IdentitasSekolahController@edit');

      Route::get('/lokasi-sekolah', 'LokasiSekolahController@index');
      Route::get('/lokasi-sekolah/add', 'LokasiSekolahController@create');
			Route::post('/lokasi-sekolah/add', 'LokasiSekolahController@store');
      Route::put('/lokasi-sekolah/{lokasiSekolah}/edit', 'LokasiSekolahController@update');
      Route::get('/lokasi-sekolah/{lokasiSekolah}/edit', 'LokasiSekolahController@edit');

      Route::get('/pengajar-dan-staff', 'PengajarStaffController@index');
      Route::get('/pengajar-dan-staff/add', 'PengajarStaffController@create');
			Route::post('/pengajar-dan-staff/add', 'PengajarStaffController@store');
      Route::put('/pengajar-dan-staff/{pengajarStaff}/edit', 'PengajarStaffController@update');
      Route::get('/pengajar-dan-staff/{pengajarStaff}/edit', 'PengajarStaffController@edit');

      Route::get('/program-belajar', 'ProgramBelajarController@index');
      Route::get('/program-belajar/add', 'ProgramBelajarController@create');
			Route::post('/program-belajar/add', 'ProgramBelajarController@store');
      Route::put('/program-belajar/{programBelajar}/edit', 'ProgramBelajarController@update');
      Route::get('/program-belajar/{programBelajar}/edit', 'ProgramBelajarController@edit');

      Route::get('/tentang-kami', 'TentangKamiController@index');
      Route::get('/tentang-kami/add', 'TentangKamiController@create');
			Route::post('/tentang-kami/add', 'TentangKamiController@store');
      Route::put('/tentang-kami/{tentangKami}/edit', 'TentangKamiController@update');
      Route::get('/tentang-kami/{tentangKami}/edit', 'TentangKamiController@edit');

      Route::get('/visi-misi', 'VisiMisiController@index');
      Route::get('/visi-misi/add', 'VisiMisiController@create');
			Route::post('/visi-misi/add', 'VisiMisiController@store');
      Route::put('/visi-misi/{visiMisi}/edit', 'VisiMisiController@update');
      Route::get('/visi-misi/{visiMisi}/edit', 'VisiMisiController@edit');

      Route::get('/testimoni', 'TestimoniController@index');
      Route::get('/testimoni/add', 'TestimoniController@create');
			Route::post('/testimoni/add', 'TestimoniController@store');
      Route::put('/testimoni/{testimoni}/edit', 'TestimoniController@update');
      Route::get('/testimoni/{testimoni}/edit', 'TestimoniController@edit');

      Route::get('/paket-pendidikan', 'PaketPendidikanController@index');
      Route::get('/paket-pendidikan/add', 'PaketPendidikanController@create');
			Route::post('/paket-pendidikan/add', 'PaketPendidikanController@store');
      Route::put('/paket-pendidikan/{paketPendidikan}/edit', 'PaketPendidikanController@update');
      Route::get('/paket-pendidikan/{paketPendidikan}/edit', 'PaketPendidikanController@edit');
		});
	});
});
