<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\senior_resident;

class SRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sr = senior_resident::all();
        return view('app.senior_resident.index', compact('sr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.senior_resident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        senior_resident::create([
            'nim' => $request -> nim,
            'nama' => $request -> nama,
            'fakultas' => $request -> fakultas,
            'prodi' => $request -> prodi,
            'no_telp' => $request -> no_telp,
            'alamat' => $request -> alamat,
            'id_gedung' => $request -> id_gedung,
        ]);
        return redirect()->route('sr.index');
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
        //
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
