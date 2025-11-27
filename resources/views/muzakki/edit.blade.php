@extends('layout.template')
@section('title', 'Edit Muzakki')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-bold">Edit Data Muzakki</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('muzakki.update', $muzakki->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Penting untuk update -->
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ $muzakki->nama_lengkap }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK (Opsional)</label>
                            <input type="number" name="nik" class="form-control" value="{{ $muzakki->nik }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor HP/WA</label>
                            <input type="number" name="no_hp" class="form-control" value="{{ $muzakki->no_hp }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="L" {{ $muzakki->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $muzakki->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ $muzakki->alamat }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('muzakki.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
