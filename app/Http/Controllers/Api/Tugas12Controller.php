<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Mahasiswa;
use App\Models\wali_siswa;
use App\Models\Gedung;

class Tugas12Controller extends Controller
{
    public function indexMahasiswa()
    {
        //Mengambil Semua Data Mahasiswa
        $mahasiswa = Mahasiswa::all();

        // Menampilkan Data Mahasiswa
        return ResponseFormatter::success([
            'message' => 'Success Get Data Mahasiswa',
            'data' => $mahasiswa
        ], 'Data berhasil diambil');
    }

    public function indexWaliSiswa()
    {
        //Mengambil Semua Data Wali Siswa
        $mahasiswa = wali_siswa::all();

        // Menampilkan Data Wali Siswa
        return ResponseFormatter::success([
            'message' => 'Success Get Data Wali Siswa',
            'data' => $mahasiswa
        ], 'Data berhasil diambil');
    }
    public function indexGedung()
    {
        //Mengambil Semua Data Mahasiswa
        $mahasiswa = Gedung::all();

        // Menampilkan Data Mahasiswa
        return ResponseFormatter::success([
            'message' => 'Success Get Data Gedung',
            'data' => $mahasiswa
        ], 'Data berhasil diambil');
    }
}
