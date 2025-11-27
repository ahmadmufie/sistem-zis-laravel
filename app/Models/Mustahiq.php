<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahiq extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 'nik', 'no_hp', 'alamat', 'kategori', 'status_aktif'
    ];

    // Relasi: Satu Mustahiq bisa menerima BANYAK Penyaluran
    public function penyalurans()
    {
        return $this->hasMany(Penyaluran::class);
    }
}