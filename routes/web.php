<?php
//===============================================frontend
Route::resource('/list','List_buku\ListController');
Route::get('/daftar-ebook','List_buku\ListController@ebook');

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

//================================================Kategori
Route::get('kategori/get/json','Kategori\Kategori@json');
Route::resource('/kategori','Kategori\Kategori');

//================================================user
Route::get('user/get/json','User\UserController@json');
Route::resource('/user','User\UserController');

//================================================ebuku
Route::get('ebook/get/json','ebook\ebookcontroller@json');
Route::resource('/ebook','ebook\ebookcontroller');

//================================================buku
Route::get('buku/get/json','Buku\BukuController@json');
Route::resource('/buku','Buku\BukuController');
Route::get('/daftarbuku','List_buku\ListController@index');

//================================================Anggota
Route::get('anggota/get/json','Anggota\AnggotaController@json');
Route::resource('/anggota','Anggota\AnggotaController');

//=================================================peminjaman
Route::get('/pinjam','Pinjam\PinjamController@pinjam');
Route::post('/pinjam','Pinjam\PinjamController@store');
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

//=======================================================denda
Route::get('/denda','Denda\dendacontroller@index');
Route::post('/caridenda','Denda\dendacontroller@cari');
