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

    public function storeMahasiswa(Request $request)
    {
        try {
            $request->validate([
                'nim' => 'required',
                'name' => 'required',
                'fakultas' => 'required',
                'prodi' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'id_gedung' => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'fakultas' => $request->fakultas,
                'prodi' => $request->prodi,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'id_gedung' => $request->id_gedung,
            ]);

            return ResponseFormatter::success([
                'message' => 'Success Create Data Senior Resident',
                'data' => $mahasiswa
            ], 'Data berhasil dibuat');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $th
            ], 'Internal Server Error', 500);
        }
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

    public function storeWaliSiswa(Request $request)
    {
        try {

            $request->validate([
                'nim' => 'required',
                'name' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'hubungan' => 'required',

            ]);

            $waliSiswa = wali_siswa::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'hubungan' => $request->hubungan,
            ]);


            return ResponseFormatter::success([
                'message' => 'Success Create Data Wali Siswa',
                'data' => $waliSiswa
            ], 'Data berhasil dibuat');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $th
            ], 'Internal Server Error', 500);
        }
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

    public function storeGedung(Request $request)
    {
        try {

            $request->validate([
                'nama_gedung' => 'required',
                'nomor_gedung' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',

            ]);

            $gedung = wali_siswa::create([
                'nama_gedung' => $request->nama_gedung,
                'nomor_gedung' => $request->nomor_gedung,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);


            return ResponseFormatter::success([
                'message' => 'Success Create Data Gedung',
                'data' => $gedung
            ], 'Data berhasil dibuat');
        } catch (\Throwable $th) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $th
            ], 'Internal Server Error', 500);
        }
    }
}
