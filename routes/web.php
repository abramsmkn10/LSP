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
Route::get('/', 'PagesController@login')->name('login');
Route::post('/proses_login', 'PagesController@proses_login')->name('proses_login');
Route::get('/logout', 'PagesController@logout')->name('logout');

Route::prefix('superadmin')->group(function(){
	Route::get('/', 'SuperAdminController@dashboard')->name('superadmin');

	Route::prefix('brand')->group(function(){
		Route::get("/add", "BrandController@add");
		Route::post("/save", "BrandController@save");
		Route::post("/update", "BrandController@update");
		Route::get("/delete/{id}", "BrandController@delete");
	});

	Route::prefix('pengguna')->group(function(){
		Route::get('/', 'PenggunaController@pengguna')->name('pengguna');

		Route::get('/tambah', 'PenggunaController@tambah')->name('pengguna_tambah');
		Route::post('/proses-tambah', 'PenggunaController@proses_tambah')->name('pengguna_proses_tambah');

		Route::get('/detail/{id}', 'PenggunaController@detail')->name('pengguna_detail');
		Route::post('/proses_detail', 'PenggunaController@proses_detail')->name('pengguna_proses_detail');

		Route::get('/hapus/{id}', 'PenggunaController@hapus')->name('pengguna_hapus');
	});
	
	Route::prefix('masuk')->group(function(){
		Route::get("/add", "ProdukinController@add");
		Route::post("/save", "ProdukinController@save");
		Route::post("/update", "ProdukinController@update");
		Route::get("/delete/{id}", "ProdukinController@delete");
	});
	Route::prefix('keluar')->group(function(){
		
		Route::get("/all", "ProdukOutController@all");
		Route::post("/save", "ProdukOutController@save");
		Route::post("/update", "ProdukOutController@update");
		Route::get("/delete/{id}", "ProdukOutController@delete");
	});
});

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@dashboard')->name('admin');
	Route::prefix('masuk')->group(function(){
		Route::get("/all", "ProdukinController@all");
	});
	Route::prefix('keluar')->group(function(){
		
		Route::get("/all", "ProdukOutController@add");
	});
	Route::prefix('profil')->group(function(){
		Route::get("/add", "ProfilController@add");
		Route::post("/save", "ProfilController@save");
		Route::post("/update", "ProfilController@update");
		Route::get("/delete/{id}", "ProfilController@delete");
	});

	Route::prefix('admin')->group(function(){
		Route::get("/add", "AdminController@add");
		Route::post("/save", "AdminController@save");
		Route::post("/update", "AdminController@update");
		Route::get("/delete/{id}", "AdminController@delete");
	});

	Route::prefix('produk')->group(function(){
		Route::get('/', 'ProdukController@produk')->name('produk');

		Route::get('/tambah', 'ProdukController@tambah')->name('produk_tambah');
		Route::post('/proses-tambah', 'ProdukController@proses_tambah')->name('produk_proses_tambah');

		Route::get('/hapus/{id}', 'ProdukController@hapus')->name('produk_hapus');

		Route::get('/detail/{barcode}', 'ProdukController@detail')->name('produk_detail');
		Route::post('/proses-detail/', 'ProdukController@proses_detail')->name('produk_proses_detail');
	});

	Route::prefix('kategori')->group(function(){
		Route::get("/add", "MasterKatController@add");
		Route::post("/save", "MasterKatController@save");
		Route::post("/update", "MasterKatController@update");
		Route::get("/delete/{id}", "MasterKatController@delete");
	});

	Route::prefix('curr')->group(function(){
		Route::get("/add", "MasterCurrController@add");
		Route::post("/save", "MasterCurrController@save");
		Route::post("/update", "MasterCurrController@update");
		Route::get("/delete/{id}", "MasterCurrController@delete");
	});

	Route::prefix('unit')->group(function(){
		Route::get("/add", "MasterUnitController@add");
		Route::post("/save", "MasterUnitController@save");
		Route::post("/update", "MasterUnitController@update");
		Route::get("/delete/{id}", "MasterUnitController@delete");
	});

	
	Route::prefix('laba')->group(function(){
		Route::get('/', 'MasterPersenjualController@laba')->name('laba');

		Route::get('/tambah', 'MasterPersenjualController@tambah')->name('laba_tambah');
		Route::post('/proses-tambah', 'MasterPersenjualController@proses_tambah')->name('laba_proses_tambah');

		Route::get('/hapus/{id}', 'MasterPersenjualController@hapus')->name('laba_hapus');
	});

		Route::prefix('stok-ppn')->group(function(){
		Route::get('/', 'MasterppnController@stokppn')->name('stokppn');

		Route::get('/tambah', 'MasterppnController@tambah')->name('stokppn_tambah');
		Route::post('/proses-tambah', 'MasterppnController@proses_tambah')->name('stokppn_proses_tambah');

		Route::get('/hapus/{id}', 'MasterppnController@hapus')->name('stokppn_hapus');
	});
});

Route::prefix('kasir')->group(function(){
	Route::get('/', 'KasirController@dashboard')->name('kasir');

	Route::prefix('transaksi')->group(function(){
		Route::get('/', 'KasirController@transaksi')->name('transaksi');
		Route::post('/proses-transaksi', 'KasirController@proses_transaksi')->name('transaksi_proses_transaksi');

		Route::get('/proses_hapus/{id}', 'KasirController@proses_hapus')->name('transaksi_hapus');
		Route::get('/proses_hapusall', 'KasirController@proses_hapus_all')->name('transaksi_hapus_all');

		Route::get('/checkout', 'KasirController@checkout')->name('transaksi_checkout');
		Route::post('/proses_checkout', 'KasirController@proses_checkout')->name('transaksi_proses_checkout');

		Route::get('/kode_unik', 'KasirController@kode_unik')->name('kode_unik');
		Route::get('/invoice', 'KasirController@invoice')->name('invoice');
	});

	Route::prefix('laporan')->group(function(){
		Route::get('/', 'KasirController@laporan')->name('laporan');
	});
});
