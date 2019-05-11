<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','IndexController@about');

////////////////////////////////////////////////
//                LOGIN AND AUTH             //
///////////////////////////////////////////////

Route::match(['get','post'] , '/page-login' , 'LoginController@index');
Route::match(['get','post'] , '/lupa-password' , 'LoginController@lupaPassUser');
Route::match(['get','post'] , '/lupa-password-admin' , 'LoginController@lupaPassAdmin');
Route::post('/post-login', 'LoginController@postLogin');
Route::get('/admin-login','AdminController@login');
Route::post('/auth', 'AdminController@login');
Route::match(['get','post'] , '/logout' , 'LoginController@logout');

Route::get('/admin', function() {
  return view('admin');
})->middleware('auth:admin');

Route::get('/user', function() {
  return view('user');
})->middleware('auth:user');


////////////////////////////////////////////////
//                USER FRONT END              //
///////////////////////////////////////////////

Route::get('/fields','FieldsController@fields')->middleware('auth:user');
Route::get('/field/{id}','FieldsController@field')->middleware('auth:user');
Route::match(['get','post'] , '/pesan_sementara' , 'FieldsController@pesan_sementara')->middleware('auth:user');
Route::match(['get','post'] , '/checkout' , 'OrdersController@checkout')->middleware('auth:user');
Route::match(['get','post'] , '/proses_checkout' , 'OrdersController@proses_checkout')->middleware('auth:user');
Route::match(['get','post'] , '/pembayaran/{id}' , 'OrdersController@pembayaran')->middleware('auth:user');
Route::get('/listBayar','OrdersController@listBayar')->middleware('auth:user');
Route::match(['get','post'] , '/dataUser' , 'LoginController@editUser')->middleware('auth:user');
Route::match(['get','post'] , '/updatePassword' , 'LoginController@updatePassword')->middleware('auth:user');
Route::match(['get','post'] , '/delItem/{id}' , 'OrdersController@delItem')->middleware('auth:user');
Route::get('/blogs', 'BlogsController@index')->middleware('auth:user');

///////////////////////////////////////////////
//                ADMIN BACKEND              //
///////////////////////////////////////////////

Route::get('/dashboard','AdminController@dashboard')->middleware('auth:admin');

Route::get('/listLapangan','FieldsController@listLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/addLapangan' , 'FieldsController@addLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/editLapangan/{id}' , 'FieldsController@editLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteLapangan/{id}' , 'FieldsController@deleteLapangan')->middleware('auth:admin');

Route::get('/listBlog','BlogsController@listBlog')->middleware('auth:admin');
Route::match(['get','post'] , '/addBlog' , 'BlogsController@addBlog')->middleware('auth:admin');
Route::match(['get','post'] , '/editBlog/{id}' , 'BlogsController@editBlog')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteBlog/{id}' , 'BlogsController@deleteBlog')->middleware('auth:admin');

Route::match(['get','post'] , '/rekening' ,'RekeningsController@index')->middleware('auth:admin');
Route::match(['get','post'] , '/editRekening/{id}' , 'RekeningsController@editRekening')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteRekening/{id}' , 'RekeningsController@deleteRekening')->middleware('auth:admin');

Route::get('/listJadwal','SchedulesController@listJadwal')->middleware('auth:admin');
Route::match(['get','post'] , '/addJadwal' , 'SchedulesController@addJadwal')->middleware('auth:admin');
Route::match(['get','post'] , '/editJadwal/{id}' , 'SchedulesController@editJadwal')->middleware('auth:admin');
Route::match(['get','post'] , '/detailJadwal/{id}' , 'SchedulesController@detailJadwal')->middleware('auth:admin');
Route::match(['get','post'] , '/detailJadwalLapangan/{id}' , 'SchedulesController@detailJadwalLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteJadwalLapangan/{id}' , 'SchedulesController@deleteJadwalLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/editJadwalLapangan' , 'SchedulesController@editJadwalLapangan')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteTgl/{id}' , 'SchedulesController@deleteTgl')->middleware('auth:admin');
// Route::match(['get','post'] , '/proses_checkout' , 'OrdersController@proses_checkout')->middleware('auth:admin');
Route::match(['get','post'] , '/prosesPemesanan/{id}' , 'OrdersController@proses_checkout')->middleware('auth:admin');
Route::get('/listPemesanan','AdminController@listPemesanan')->middleware('auth:admin');
Route::get('/listPemesananWait','AdminController@listPemesananWait')->middleware('auth:admin');
Route::get('/listPemesananDone','AdminController@listPemesananDone')->middleware('auth:admin');
Route::get('/listPemesananCancel','AdminController@listPemesananCancel')->middleware('auth:admin');
Route::match(['get','post'] , '/accBayar/{id}' , 'AdminController@accBayar')->middleware('auth:admin');

Route::get('/listUser','AdminController@listUser')->middleware('auth:admin');

Route::get('/listMember','AdminController@member')->middleware('auth:admin');
Route::get('/detailMember/{id}','AdminController@detailMember')->middleware('auth:admin');
Route::match(['get','post'] , '/suspendMember/{id}' , 'AdminController@suspendMember')->middleware('auth:admin');
Route::match(['get','post'] , '/unsuspendMember/{id}' , 'AdminController@unsuspendMember')->middleware('auth:admin');

Route::get('/listAdmin','AdminController@listAdmin')->middleware('auth:admin');
Route::match(['get','post'] , '/addAdmin' , 'AdminController@addAdmin')->middleware('auth:admin');
Route::match(['get','post'] , '/editAdmin/{id}' , 'AdminController@editAdmin')->middleware('auth:admin');
Route::match(['get','post'] , '/deleteAdmin/{id}' , 'AdminController@deleteAdmin')->middleware('auth:admin');
Route::match(['get','post'] , '/adminProfile' , 'AdminController@adminProfile')->middleware('auth:admin');

Route::get('/dashboard','AdminController@dashboard')->middleware('auth:admin');
