<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();


//home
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/absensi/jadwalmatkul/{id}/update', 'HomeController@update');



//user
Route::get('/absensi/jadwalmatkul', 'UserController@index');

Route::post('/absensi/jadwalmatkul/{id}/update', 'UserController@update');

Route::post('/absensi/setting/{id}/update', 'UserController@update');

Route::get('/user/datadiri/{id}', 'UserController@edit');

Route::get('/absensi/setting/{id}', 'UserController@edit2');

Route::get('/absensi/jadwalmatkul', 'UserController@index');


//absensi
Route::get('/absensi/kehadiran', 'AbsensiController@index2')->name('kehadiran');

Route::get('/absensi/jadwalmatkul', 'AbsensiController@index')->name('jadwalmatkul');

Route::get('/detail_obat/{id}', 'AbsensiController@index');

Route::get('/detail_obat/{id}', 'AbsensiController@show');

Route::get('/obat/hapus/{id}', 'AbsensiController@hapus');

Route::get('/absensi/absensi/{id}', 'AbsensiController@create');

Route::post('/absensi/jadwalmatkul/{id}/insert', 'AbsensiController@store');

Route::get('/absensi/absensi', 'AbsensiController@create')->name('absensi.create');

Route::post('absensi.store', 'AbsensiController@store')->name('absensi.store');

Route::get('/absensi/absensi', 'AbsensiController@create')->name('absensi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');