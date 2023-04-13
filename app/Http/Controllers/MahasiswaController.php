<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import model mahasiswa
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['user'])->get();
        //return dd
        // return dd($mahasiswas);
        return view('app.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //create new mahasiswa
        User::create([
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->nim),
        ]);
        Mahasiswa::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_gedung' => $request->id_gedung,
        ]);
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get data mahasiswa by id
        $mahasiswa = Mahasiswa::find($id);
        return view('app.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update data mahasiswa and user by nim
        $mahasiswa = Mahasiswa::findOrFail($id);
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
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Mahasiswa::findOrFail($id);

        $user->user()->delete();
        $user->delete();


        return redirect()->route('mahasiswa.index');
    }
}
