@extends('layout.template')
@section('title', 'Tambah Muzakki')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Tambah Muzakki Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('muzakki.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama sesuai KTP" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK (Opsional)</label>
                            <input type="number" name="nik" class="form-control" placeholder="16 digit NIK">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor HP/WA</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="08..." required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('muzakki.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection