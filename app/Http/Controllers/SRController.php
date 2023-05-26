<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\senior_resident;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        //create new senior resident to table user 
        User::create([
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
        ]);

        //create new senior resident to table senior resident
        senior_resident::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'id_gedung' => $request->id_gedung,
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
        $senior_resident = senior_resident::find($id);
        return view('app.senior_resident.edit', compact('senior_resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //update data mahasiswa and user by nim
        $mahasiswa = senior_resident::findOrFail($id);
        $mahasiswa->name = $request->name;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_telp = $request->no_telp;
        $mahasiswa->save();

        $user = User::where('nim', $id)->first();
        $user->nim = $request->nim;
        $user->save();
        return redirect()->route('sr.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = senior_resident::findOrFail($id);
        $user->user()->delete();
        $user->delete();
        return redirect()->route('sr.index');
    }
}
