@extends('app')
@section('konten')
    <h4>Edit Peminjaman</h4>
    <form action="{{ route('detailupdate', $details->nopinjam) }}" method="POST">
        @csrf

        <div class="formbold-input-group mb-3">
            <label class="formbold-form-label" for="buku">Buku yang dipinjam:</label>
            <select class="formbold-form-select" name="buku" id="buku">
                @forelse ($bukus as $buku)
                    <option value="{{ $buku->idbuku }}">{{ $buku->judul_buku }}</option>
                @empty
                    <option value="">Tidak ada buku tersedia</option>
                @endforelse
            </select>
        </div>
        <div class="formbold-input-group mb-3">
            <label class="formbold-form-label" for="anggota">Anggota yang meminjam:</label>
            <select class="formbold-form-select" name="anggota" id="anggota">
                @forelse ($anggotas as $anggota)
                    <option value="{{ $anggota->idanggota }}">{{ $anggota->nama_anggota }}</option>
                @empty
                    <option value="">Tidak ada buku tersedia</option>
                @endforelse
            </select>
        </div>
        <label>Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" value="{{ $details->tgl_pinjam }}" id="tgl_pinjam"
            class="form-control mb-2">
        <label>Tanggal Kembali: :</label>
        <input type="date" name="tgl_kembali" value="{{ $details->tgl_kembali }}" id="tgl_kembali"
            class="form-control mb-2">
        <label>Denda: :</label>
        <input type="num" name="denda" value="{{ $details->denda }}" id="denda" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
