<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\StaffProdiController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('/judul', [MahasiswaController::class, 'judul'])->middleware('checkUserType')->name('judul');
Route::get('/judul-tambah', [MahasiswaController::class, 'judultambah'])->middleware('checkUserType')->name('judul-tambah');
Route::post('/judul-post', [MahasiswaController::class, 'judulStore'])->middleware('checkUserType')->name('judulstore');
Route::get('/judul-edit/{id}', [MahasiswaController::class, 'judulEdit'])->middleware('checkUserType')->name('juduledit');
Route::put('/judul-update/{id}', [MahasiswaController::class, 'judulUpdate'])->middleware('checkUserType')->name('judulupdate');
Route::delete('/judul-delete/{id}', [MahasiswaController::class, 'judulDelete'])->middleware('checkUserType')->name('juduldelete');
Route::get('/judul-bukti/{id}', [MahasiswaController::class, 'judulbukti'])->middleware('checkUserType')->name('judulbukti');
Route::put('/judul-bukti-post/{id}', [MahasiswaController::class, 'judulbuktipost'])->middleware('checkUserType')->name('judulbuktipost');
Route::get('/judul-suratpengantar/{id}', [MahasiswaController::class, 'judulsurpeng'])->middleware('checkUserType')->name('judulsuratpengantar');


Route::get('/prodi', [ProdiController::class, 'index'])->middleware('checkUserType')->name('prodi');
Route::get('/prodi/judul-edit/{id}', [ProdiController::class, 'edit'])->middleware('checkUserType')->name('prodi.juduledit');
Route::put('/prodi/judul-update/{id}', [ProdiController::class, 'update'])->middleware('checkUserType')->name('prodi.judulupdate');

Route::get('/staffprodi', [StaffProdiController::class, 'index'])->middleware('checkUserType')->name('staffprodi');
Route::get('/staffprodi/upload/{id}', [StaffProdiController::class, 'edit'])->middleware('checkUserType')->name('staffprodi.suratadd');
Route::put('/staffprodi/upload-post/{id}', [StaffProdiController::class, 'update'])->middleware('checkUserType')->name('staffprodi.suratupdate');
Route::get('/staffprodi/rekapitulasi', [StaffProdiController::class, 'rekapitulasi'])->middleware('checkUserType')->name('staffprodi.rekapitulasi');



