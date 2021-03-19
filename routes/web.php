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
Route::middleware('auth:Administrator')->group(function () {
    Route::resource('mahasiswa', 'MahasiswaController');
    Route::resource('dosen', 'DosenController');
    Route::resource('matkul', 'MatkulController');
    Route::resource('fakultas', 'FakultasController');
    Route::resource('gedung', 'GedungController');
    Route::resource('ruangan', 'RuanganController');
    Route::resource('prodi', 'ProdiController');
    
    Route::resource('schedule', 'ScheduleController');
    Route::get('/schedule/{id}/create', 'ScheduleController@create');
    
    Route::resource('ta', 'TahunAkademikController');
    Route::post('/activeTa/{id}', 'TahunAkademikController@activeTa');
    
    Route::resource('kelas', 'KelasController');
    Route::get('kelas/{id}/add', 'KelasController@addMahasiswa');
    Route::post('/storeMahasiswa', 'KelasController@storeMahasiswa');
    Route::post('/deleteMahasiswa/{id}', 'KelasController@deleteMahasiswa');

    Route::get('/', 'HomeController@dashboard')->name('dashboard');
});

Route::middleware('auth:mahasiswa')->group(function () {
    Route::resource('krs', 'KrsController');
    Route::get('/mahasiswas','HomeController@mahasiswa');
    Route::get('/absens','HomeController@absen');
    Route::get('/nilais','HomeController@nilai');
    Route::get('nilai/{id}/print', 'NilaiController@print')->name('nilai.print');
});

Route::middleware('auth:dosen')->group(function () {
    Route::get('/dosens','HomeController@dosen');

    Route::resource('nilai', 'NilaiController');
    Route::get('/list-nilai','NilaiController@list')->name('nilai.list');
    Route::get('nilai/{id}/cetak', 'NilaiController@cetakDosen')->name('nilai.cetakDosen');

    Route::resource('absen', 'AbsenController');
    Route::get('/list-absen','AbsenController@list')->name('absen.list');
    Route::get('absen/{id}/cetak', 'AbsenController@cetak')->name('absen.cetak');
});


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login2', 'AuthController@postlogin')->name('login2');
Route::post('/logout', 'AuthController@logout')->name('logout');


