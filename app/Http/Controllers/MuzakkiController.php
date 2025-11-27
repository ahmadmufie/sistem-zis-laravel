<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // WAJIB: Panggil library Gate

class MuzakkiController extends Controller
{
    public function index()
    {
        $muzakkis = Muzakki::latest()->paginate(10);
        return view('muzakki.index', compact('muzakkis'));
    }

    public function create()
    {
        return view('muzakki.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Muzakki::create($request->all());

        return redirect()->route('muzakki.index')
            ->with('success', 'Data Muzakki berhasil ditambahkan!');
    }

    public function edit(Muzakki $muzakki)
    {
        return view('muzakki.edit', compact('muzakki'));
    }

    public function update(Request $request, Muzakki $muzakki)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required|numeric',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $muzakki->update($request->all());

        return redirect()->route('muzakki.index')
            ->with('success', 'Data Muzakki berhasil diupdate!');
    }

    // --- BAGIAN PENTING: KEAMANAN DELETE ---
    public function destroy(Muzakki $muzakki)
    {
        // CEK GATE: Jika bukan admin, tolak dengan error 403
        if (!Gate::allows('admin')) {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh menghapus data Muzakki.');
        }

        $muzakki->delete();

        return redirect()->route('muzakki.index')
            ->with('success', 'Data Muzakki berhasil dihapus!');
    }
}