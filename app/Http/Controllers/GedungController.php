<?php

namespace App\Http\Controllers;

use App\Models\senior_resident;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.gedung.index',);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create new mahasiswa
        senior_resident::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_gedung' => $request->id_gedung,
        ]);
        return redirect()->route('gedung.index');
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
