<?php
//===============================================frontend
Route::get('/daftarbuku','List_buku\ListController@index');
Route::get('/daftar-ebook','List_buku\ListController@ebook');
Route::get('/detailbuku/{link}/detail','List_buku\ListController@detail');
Route::get('/detail-ebook/{detail}','List_buku\ListController@showebook');
Route::get('/kategori-buku/{id}','List_buku\ListController@kategori');
Route::get('/kategori-ebook/{id}','List_buku\ListController@kategori_ebook');
Route::get('/baca-ebook/{detail}','List_buku\ListController@readebook');
Route::get('/pencarian/cari','List_buku\ListController@cari');


//==============================================auth anggota
Route::get('login-anggota', 'Auth\anggotaLoginController@showLoginForm');
Route::post('login-anggota', ['as'=>'login-anggota','uses'=>'Auth\anggotaLoginController@login']);
Route::post('logout-anggota', 'Auth\anggotaLoginController@logout');

//===============================================landing
Route::get('/','Landing\LandingController@index');

//===============================================auth
Route::get('/login', ['as'=>'/login','uses'=>'Auth\LoginController@showLoginForm']);
Auth::routes();

//================================================home
Route::get('/home','Home\HomeController@index');

//================================================Setting
Route::get('/setting','setting\Settingcontroller@index');
Route::post('/setting','setting\Settingcontroller@update');

//================================================Kategori
Route::get('kategori/get/json','Kategori\kategori@json');
Route::resource('/kategori','Kategori\kategori');

//================================================user
Route::get('user/get/json','User\UserController@json');
Route::resource('/user','User\UserController');

//================================================ebuku
Route::get('ebook/get/json','ebook\ebookcontroller@json');
Route::get('ebook/detail/{kode}','ebook\ebookcontroller@detailebook');
Route::resource('/ebook','ebook\ebookcontroller');

//================================================buku
Route::get('cetakkodebuku','Buku\BukuController@cetakkodebuku');
Route::get('cetakkodebukubanyak/{kode}','Buku\BukuController@cetakbanyakkodebuku');
Route::get('cetakkodebuku/{kode}/cetak','Buku\BukuController@cetaksatukodebuku');
Route::get('cetakkodebuku/all','Buku\BukuController@cetaksemuakodebuku');
Route::get('buku/get/json','Buku\BukuController@json');
Route::get('bukukode/{kode}','Buku\BukuController@carikode');
Route::get('buku/detail/{kode}','Buku\BukuController@detailbuku');
Route::resource('/buku','Buku\BukuController');


//================================================Anggota
Route::get('anggota/get/json','Anggota\AnggotaController@json');
Route::resource('/anggota','Anggota\AnggotaController');

//=================================================peminjaman
Route::get('/pinjam','Pinjam\PinjamController@pinjam');
Route::get('/laporan-peminjaman','Pinjam\PinjamController@laporan');
Route::get('/laporan-peminjaman/{tglsatu}/{tgldua}','Pinjam\PinjamController@exportlaporan');
Route::post('/laporan-peminjaman','Pinjam\PinjamController@carilaporan');
Route::post('/pinjam','Pinjam\PinjamController@store');
Route::get('/caripeminjaman/{id}','Pinjam\PinjamController@caripeminjaman');
Route::get('/carianggota','Pinjam\PinjamController@carianggota');
Route::get('/carihasilanggota/{id}','Pinjam\PinjamController@carihasilanggota');
Route::get('/caribuku','Pinjam\PinjamController@caribuku');
Route::get('/carihasilbuku/{id}','Pinjam\PinjamController@carihasilbuku');

//======================================================daftar pinjam
Route::get('/daftarpinjam','Pinjam\PinjamController@daftarpinjam');
Route::get('/daftarpinjam/get/json','Pinjam\PinjamController@json');
Route::get('/updatestatus/{id}','Pinjam\PinjamController@updatestatus');
Route::get('/daftarfavorit','Pinjam\PinjamController@daftarfavorit');
Route::get('/daftarebookfavorit','Pinjam\PinjamController@daftarebookfavorit');
Route::post('/simpandenda','Pinjam\PinjamController@simpandenda');
Route::get('/peminjamaktif','Pinjam\PinjamController@peminjamaktif');
Route::get('/logbuku/{id}','Pinjam\PinjamController@logbuku');
Route::get('/logebook/{id}','Pinjam\PinjamController@logebook');
Route::get('/statistik/cari','Pinjam\PinjamController@statistikbulan');
Route::post('/statistik/bulan','Pinjam\PinjamController@tampilstatistikbulan');

//=======================================================denda
Route::get('/denda','Denda\dendacontroller@index');
Route::post('/caridenda','Denda\dendacontroller@cari');
Route::get('/denda/{tglsatu}/{tgldua}','Denda\dendacontroller@exportdenda');
