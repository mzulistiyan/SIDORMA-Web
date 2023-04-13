<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WaliSiswaController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GedungController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SRController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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
    Route::get('/wali/index', [WaliSiswaController::class, 'index'])->name('wali.index');
    Route::get('/wali/create', [WaliSiswaController::class, 'create'])->name('wali.create');
    Route::post('/wali/store', [WaliSiswaController::class, 'store'])->name('wali.store');
    Route::post('/wali/update/{id}', [WaliSiswaController::class, 'update'])->name('wali.update');
    Route::get('/wali/edit/{id}', [WaliSiswaController::class, 'edit'])->name('wali.edit');
    //Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');

    //senior resident
    Route::get('/senior_resident/index', [SRController::class, 'index'])->name('sr.index');
    Route::get('/senior_resident/create', [SRController::class, 'create'])->name('sr.create');
    Route::post('/senior_resident/store', [SRController::class, 'store'])->name('sr.store');
    Route::get('/senior_resident/edit/{id}', [SRController::class, 'edit'])->name('sr.edit');
    Route::post('/senior_resident/update/{id}', [SRController::class, 'update'])->name('sr.update');
    Route::delete('/senior_resident/delete/{id}', [SRController::class, 'destroy'])->name('sr.destroy');


    Route::get('/gedung/index', [GedungController::class, 'index'])->name('gedung.index');
    Route::get('/gedung/create', [GedungController::class, 'create'])->name('gedung.create');
    Route::post('/gedung/store', [GedungController::class, 'store'])->name('gedung.store');
    Route::get('/gedung/edit/{id_gedung}', [GedungController::class, 'edit'])->name('gedung.edit');
    Route::post('/gedung/update/{id_gedung}', [GedungController::class, 'update'])->name('gedung.update');
    Route::delete('/gedung/delete/{id_gedung}', [GedungController::class, 'destroy'])->name('gedung.destroy');
});
