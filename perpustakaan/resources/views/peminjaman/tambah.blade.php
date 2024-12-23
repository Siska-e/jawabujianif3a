@extends('app')
@section('konten')
<h4>Peminjaman</h4>
<!-- Alert jika ada pesan -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card mb-4">
    <div class="card-header bg-info-subtle">
        <h4 class="card-title">Form Peminjaman Buku</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idanggota" class="form-label">Anggota</label>
                <select name="anggota" id="anggota" class="form-control" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggotas as $a)
                        <option value="{{ $a->idanggota }}">{{ $a->nama_anggota }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="idbuku" class="form-label">Buku</label>
                <select name="buku" id="buku" class="form-control" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($bukus as $b)
                        <option value="{{ $b->idbuku }}">{{ $b->judul_buku }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
        </form>
    </div>
</div>
@endsection