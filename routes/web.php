<?php

//===============================================auth
Route::get('/', ['as'=>'/','uses'=>'Auth\LoginController@showLoginForm']);
Auth::routes();

//================================================home
Route::get('/home','Home\HomeController@index');

//================================================Kategori

Route::get('kategori/get/json','Kategori\Kategori@json');
Route::resource('/kategori','Kategori\Kategori');

//================================================user

Route::get('user/get/json','User\UserController@json');
Route::resource('/user','User\UserController');

//================================================buku
Route::get('buku/get/json','Buku\BukuController@json');
Route::resource('/buku','Buku\BukuController');

//================================================buku
Route::get('anggota/json','Anggota\AnggotaController@json');
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
Route::get('/updatestatus/{id}','Pinjam\PinjamController@updatestatus');
Route::get('/daftarfavorit','Pinjam\PinjamController@daftarfavorit');
Route::post('/simpandenda','Pinjam\PinjamController@simpandenda');
Route::get('/peminjamaktif','Pinjam\PinjamController@peminjamaktif');
