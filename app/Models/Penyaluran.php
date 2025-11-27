<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_penyaluran', 'mustahiq_id', 'user_id',
        'jenis_bantuan', 'nominal', 'keterangan', 'tanggal_penyaluran'
    ];

    // Relasi ke Mustahiq
    public function mustahiq()
    {
        return $this->belongsTo(Mustahiq::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
