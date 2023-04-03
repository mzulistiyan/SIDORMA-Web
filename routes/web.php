<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WaliSiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::get('/mahasiswa/index', function () {
    return view('app.mahasiswa.index');
});

Route::get('/mahasiswa/create', function () {
    return view('app.mahasiswa.create');
});

//Mahasiswa
Route::get('/mahasiswa/index', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

//Wali Siswa
Route::get('/wali/index', [WaliSiswaController::Class, 'index'])->name('wali.index');
Route::get('/wali/create', [WaliSiswaController::Class, 'create'])->name('wali.create');
Route::post('/wali/store', [WaliSiswaController::Class, 'store'])->name('wali.store');
Route::get('/wali/edit/{id}', [WaliSiswaController::class, 'edit'])->name('wali.edit');
