<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\WaliSiswaController;
use App\Http\Controllers\Api\Tugas12Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('testArray', [WaliSiswaController::class, 'testInputList']);
Route::post('registerAlumni', [AuthController::class, 'registerAlumni']);
Route::get('getAllAlumni', [AuthController::class, 'getAllAlumni']);
Route::post('createBerita', [AuthController::class, 'createBerita']);
Route::get('getAllBerita', [AuthController::class, 'getAllBerita']);
Route::put('updateAlumni/{id_gedung}', [AuthController::class, 'updateAlumni']);

Route::middleware('auth:sanctum')->group(
    function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'getUser']);
        Route::get('getAlumni', [AuthController::class, 'getAlumni']);

        Route::put('user', [AuthController::class, 'updateUser']);
        Route::post('change-password', [AuthController::class, 'changePassword']);

        Route::put('mahasiswa', [MahasiswaController::class, 'updateMahasiswa']);
        Route::put('walisiswa', [WaliSiswaController::class, 'updateWaliSiswa']);

        Route::post('absensi', [AbsensiController::class, 'absensi']);
        Route::get('report', [AbsensiController::class, 'report']);
        Route::get('status', [AbsensiController::class, 'status']);
    }
);

//get data from controller Tugas12Controller
Route::get('mahasiswa', [Tugas12Controller::class, 'indexMahasiswa']);
Route::get('waliSiswa', [Tugas12Controller::class, 'indexWaliSiswa']);
Route::get('gedung', [Tugas12Controller::class, 'indexGedung']);
