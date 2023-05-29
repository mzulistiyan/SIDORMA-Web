<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AbsensiController;
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
Route::middleware('auth:sanctum')->group(
    function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'getUser']);
        Route::put('user', [AuthController::class, 'updateUser']);

        Route::post('absensi', [AbsensiController::class, 'absensi']);
        Route::get('report', [AbsensiController::class, 'report']);
        Route::get('status', [AbsensiController::class, 'status']);
    }
);

//get data from controller Tugas12Controller
Route::get('mahasiswa', [Tugas12Controller::class, 'indexMahasiswa']);
Route::get('waliSiswa', [Tugas12Controller::class, 'indexWaliSiswa']);
Route::get('gedung', [Tugas12Controller::class, 'indexGedung']);
