<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_lengkap', 'nik', 'no_hp', 'alamat', 'jenis_kelamin'
    ];

    // Relasi: Satu Muzakki bisa punya BANYAK Transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
