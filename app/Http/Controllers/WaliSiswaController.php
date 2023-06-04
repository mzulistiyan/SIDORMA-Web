<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wali_siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        // create new user
        User::create([
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
            'role' => 'wali_siswa'
        ]);
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
        $data = wali_siswa::where('id_wali', $id)->first();
        return view('app.wali_siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        wali_siswa::where('id_wali', $id)->update([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'hubungan' => $request->hubungan,
        ]);

        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wali = wali_siswa::find($id);
        $wali->delete();
        return redirect()->route('wali.index');
    }
}
