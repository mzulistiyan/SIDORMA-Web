<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gedung;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedung = Gedung::all();
        return view('app.gedung.index', compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.gedung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gedung::create([
            'nama_gedung' => $request->nama_gedung,
            'nomor_gedung' => $request->nomor_gedung,
            'longitude' => $request->longitude,
            'lattitude' => $request->lattitude,
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
    public function edit(string $id_gedung)
    {
        $gedung = Gedung::find($id_gedung);
        return view('app.gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_gedung)
    {
        $gedung = Gedung::find($id_gedung);
        $gedung->update([
            'nama_gedung' => $request->nama_gedung,
            'id_gedung' => $request->id_gedung,
            'nomor_gedung' => $request->nomor_gedung,
            'longitude' => $request->longitude,
            'lattitude' => $request->lattitude,
        ]);
        return redirect()->route('gedung.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_gedung)
    {
        $gedung = Gedung::findOrFail($id_gedung);
        $gedung->delete();
        return redirect()->route('gedung.index');

    }
}
