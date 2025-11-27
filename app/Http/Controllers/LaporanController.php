<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Penyaluran;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Default tanggal: hari ini
        $tgl_mulai = $request->input('tgl_mulai', date('Y-m-01'));
        $tgl_selesai = $request->input('tgl_selesai', date('Y-m-d'));

        // Ambil data Pemasukan sesuai tanggal
        $pemasukan = Transaksi::with('muzakki')
            ->whereBetween('tanggal_transaksi', [$tgl_mulai, $tgl_selesai])
            ->get();

        // Ambil data Pengeluaran sesuai tanggal
        $pengeluaran = Penyaluran::with('mustahiq')
            ->whereBetween('tanggal_penyaluran', [$tgl_mulai, $tgl_selesai])
            ->get();

        // Hitung total
        $total_masuk = $pemasukan->sum('nominal');
        $total_keluar = $pengeluaran->sum('nominal');

        return view('laporan.index', compact(
            'pemasukan', 'pengeluaran', 
            'total_masuk', 'total_keluar',
            'tgl_mulai', 'tgl_selesai'
        ));
    }
}
