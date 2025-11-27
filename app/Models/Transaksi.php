<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi', 'muzakki_id', 'user_id', 
        'jenis_transaksi', 'nominal', 'keterangan', 'tanggal_transaksi'
    ];

    // Relasi: Transaksi ini MILIK satu Muzakki
    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class);
    }

    // Relasi: Transaksi ini DICATAT oleh satu User (Amil)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
