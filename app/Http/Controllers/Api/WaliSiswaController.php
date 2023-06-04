<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Auth;
use App\Models\wali_siswa;
use App\Models\User;

class WaliSiswaController extends Controller
{
    public function updateWaliSiswa(Request $request)
    {
        try {
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if ($user == null) {
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            $walisiswa = wali_siswa::where('nim', $user->nim)->first();
            if ($walisiswa == null) {
                return ResponseFormatter::error([
                    'message' => 'WaliSiswa not found',
                ], 'WaliSiswa not found', 404);
            }
            // update field if not null
            $walisiswa->nama = $request->name ?? $walisiswa->nama;
            $walisiswa->no_telp = $request->no_telp ?? $walisiswa->no_telp;
            $walisiswa->alamat = $request->alamat ?? $walisiswa->alamat;
            $walisiswa->save();

            return ResponseFormatter::success($walisiswa, 'WaliSiswa updated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

}