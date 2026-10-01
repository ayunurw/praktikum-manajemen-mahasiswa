<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|email',
            'angkatan' => 'required|digits:4',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'email' => 'required|email',
            'angkatan' => 'required|digits:4',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}