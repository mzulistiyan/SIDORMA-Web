<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\GedungController;
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


Route::get('/gedung/index', [GedungController::class, 'index'])->name('gedung.index');
Route::get('/gedung/create', [GedungController::class, 'create'])->name('gedung.create');
Route::post('/gedung/store', [GedungController::class, 'store'])->name('gedung.store');
Route::get('/gedung/edit/{id_gedung}', [GedungController::class, 'edit'])->name('gedung.edit');
Route::post('/gedung/update/{id_gedung}', [GedungController::class, 'update'])->name('gedung.update');
Route::delete('/gedung/delete/{id_gedung}', [GedungController::class, 'destroy'])->name('gedung.destroy');
