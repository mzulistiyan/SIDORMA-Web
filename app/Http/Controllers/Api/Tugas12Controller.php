<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\Mahasiswa;
use App\Models\wali_siswa;
use App\Models\Gedung;
use App\Models\senior_resident;

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

    public function indexSR()
    {
        //Mengambil Semua Data Mahasiswa
        $sr = senior_resident::all();

        // Menampilkan Data Mahasiswa
        return ResponseFormatter::success([
            'message' => 'Success Get Data Senior Resident',
            'data' => $sr
        ], 'Data berhasil diambil');
    }

    public function storeSR(Request $request)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'name' => 'required',
                'fakultas' => 'required',
                'prodi' => 'required',
                "no_telp" => "required",
                "alamat" => "required",
                'id_gedung' => 'required',
            ]);

            $sr = senior_resident::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
                "no_telp" => $request->no_telp,
                "alamat" => $request->alamat,
                'id_gedung' => $request->id_gedung,
            ]);

            return ResponseFormatter::success([
                'message' => 'Success Create Data Senior Resident',
                'data' => $sr
            ], 'Data berhasil dibuat');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $th
            ], 'Internal Server Error', 500);
        }
    }
}
