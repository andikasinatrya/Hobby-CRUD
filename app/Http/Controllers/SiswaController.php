<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Hobi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with('hobby')->paginate(5);
        $hobi = Hobi::all();
        return view('siswas.index', compact('siswa', 'hobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobi = Hobi::all();
        return view('siswas.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'hobby' => 'required|array|min:1',
        ], [
            'name.required' => 'Nama siswa wajib diisi',
            'name.min' => 'Nama siswa minimal 3 karakter',
            'name.max' => 'Nama siswa maksimal 100 karakter',
            'hobby.required' => 'Hobi wajib dipilih',
            'hobby.min' => 'Hobi minimal 1',
        ]);

        $siswa = Siswa::create(['nama' => $request->input('name')]);
        $siswa->hobby()->sync($request->input('hobby'));

        return redirect()->route('siswas.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $siswa = Siswa::with('hobby')->findOrFail($id);
        // return view('siswas.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::with('hobby')->findOrFail($id);
        $hobi = Hobi::all();
        return view('siswas.edit', compact('siswa', 'hobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'hobby' => 'required|array|min:1',
        ], [
            'name.required' => 'Nama siswa wajib diisi',
            'name.min' => 'Nama siswa minimal 3 karakter',
            'name.max' => 'Nama siswa maksimal 100 karakter',
            'hobby.required' => 'Hobi wajib dipilih',
            'hobby.min' => 'Hobi minimal 1',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update(['nama' => $request->input('name')]);
        $siswa->hobby()->sync($request->input('hobby'));

        return redirect()->route('siswas.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->hobby()->detach();
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
