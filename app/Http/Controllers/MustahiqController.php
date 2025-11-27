<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // WAJIB ADA

class MustahiqController extends Controller
{
    public function index()
    {
        $mustahiqs = Mustahiq::latest()->paginate(10);
        return view('mustahiq.index', compact('mustahiqs'));
    }

    public function create()
    {
        return view('mustahiq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'kategori' => 'required',
        ]);

        Mustahiq::create($request->all());

        return redirect()->route('mustahiq.index')->with('success', 'Data Mustahiq berhasil ditambahkan!');
    }

    public function edit(Mustahiq $mustahiq)
    {
        return view('mustahiq.edit', compact('mustahiq'));
    }

    public function update(Request $request, Mustahiq $mustahiq)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'kategori' => 'required',
        ]);

        $mustahiq->update($request->all());

        return redirect()->route('mustahiq.index')->with('success', 'Data Mustahiq berhasil diupdate!');
    }

    // --- BAGIAN PENTING: KEAMANAN DELETE ---
    public function destroy(Mustahiq $mustahiq)
    {
        // CEK GATE: Kalau bukan admin, tendang!
        if (!Gate::allows('admin')) {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh menghapus data Mustahiq.');
        }

        $mustahiq->delete();
        return redirect()->route('mustahiq.index')->with('success', 'Data Mustahiq berhasil dihapus!');
    }
}