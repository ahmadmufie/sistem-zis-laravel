<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Muzakki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; // WAJIB ADA

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('muzakki')->latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $muzakkis = Muzakki::all(); 
        $nomorOtomatis = 'TRX-' . time();
        return view('transaksi.create', compact('muzakkis', 'nomorOtomatis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'muzakki_id' => 'required',
            'jenis_transaksi' => 'required',
            'nominal' => 'required|numeric|min:1000',
            'tanggal_transaksi' => 'required|date',
        ]);

        Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'muzakki_id' => $request->muzakki_id,
            'user_id' => Auth::id(),
            'jenis_transaksi' => $request->jenis_transaksi,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Alhamdulillah, Transaksi ZIS berhasil dicatat!');
    }

    // --- BAGIAN PENTING: KEAMANAN DELETE ---
    public function destroy(Transaksi $transaksi)
    {
        // CEK GATE: Kalau bukan admin, blokir!
        if (!Gate::allows('admin')) {
            abort(403, 'Akses Ditolak: Transaksi keuangan sensitif hanya boleh dihapus Admin.');
        }

        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi dihapus.');
    }
}