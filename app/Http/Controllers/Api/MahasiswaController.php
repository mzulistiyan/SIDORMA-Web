<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    // public function getMahasiswa(Request $request)
    // {
    //     try {
    //         $authUser = Auth::user();
    //         $user = User::where('email', $authUser->email)->first();
    //         if ($user == null) {
    //             return ResponseFormatter::error([
    //                 'message' => 'User not found',
    //             ], 'User not found', 404);
    //         }
    //         $mahasiswa = Mahasiswa::where('nim', $user->nim)->first();
    //         if ($mahasiswa == null) {
    //             return ResponseFormatter::error([
    //                 'message' => 'Mahasiswa not found',
    //             ], 'Mahasiswa not found', 404);
    //         }
    //         return ResponseFormatter::success($mahasiswa, 'Data Mahasiswa berhasil diambil');
    //     } catch (Exception $error) {
    //         return ResponseFormatter::error([
    //             'message' => 'Something went wrong',
    //             'error' => $error
    //         ], 'Internal Server Error', 500);
    //     }
    // }

    public function updateMahasiswa(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if ($user == null) {
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            $mahasiswa = Mahasiswa::where('nim', $user->nim)->first();
            if ($mahasiswa == null) {
                return ResponseFormatter::error([
                    'message' => 'Mahasiswa not found',
                ], 'Mahasiswa not found', 404);
            }
            // update field if not null
            $mahasiswa->name = $request->name ?? $mahasiswa->name;
            $mahasiswa->prodi = $request->prodi ?? $mahasiswa->prodi;
            $mahasiswa->fakultas = $request->fakultas ?? $mahasiswa->fakultas;
            $mahasiswa->save();

            return ResponseFormatter::success($mahasiswa, 'Mahasiswa updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

}