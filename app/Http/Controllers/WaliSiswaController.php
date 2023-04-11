<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wali_siswa;

class WaliSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wali = wali_siswa::all();
        return view('app.wali_siswa.index', compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.wali_siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create new data
        wali_siswa::create([
            'id_wali' => $request->id_wali,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'hubungan' => $request->hubungan,
        ]);

        return redirect()->route('wali.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'HI!';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
