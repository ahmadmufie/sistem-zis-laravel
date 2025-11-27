<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Muzakki;
use App\Models\Mustahiq;
use App\Models\Transaksi;
use App\Models\Penyaluran;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung Total Data
        $total_muzakki = Muzakki::count();
        $total_mustahiq = Mustahiq::where('status_aktif', 1)->count();
        
        // Menghitung Total Uang Masuk & Keluar
        $total_pemasukan = Transaksi::sum('nominal');
        $total_penyaluran = Penyaluran::sum('nominal');
        
        // Menghitung Saldo Saat Ini
        $saldo_akhir = $total_pemasukan - $total_penyaluran;

        // Kirim semua variabel ke View
        return view('dashboard', compact(
            'total_muzakki', 
            'total_mustahiq', 
            'total_pemasukan', 
            'total_penyaluran',
            'saldo_akhir'
        ));
    }
}
