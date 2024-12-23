@extends('app') <!-- Mengacu pada file layout dashboard Anda -->

@section('konten')
<div class="container">
    <h2 class="text-center">Halaman Peminjaman Buku</h2>
    <hr>
    <div class="ms-auto">
        <a class="btn btn-outline-secondary" href="{{ route('peminjaman.tambah') }}">Tambah Peminjaman</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead class="bg-info-subtle">
            <tr>
                <th>No Pinjam</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detail_pinjams as $key => $pinjam)
                <tr>
                    <td>{{ $pinjam->nopinjam }}</td>
                    <td>{{ $pinjam->nama }}</td>
                    <td>{{ $pinjam->judul }}</td>
                    <td>{{ $pinjam->tgl_pinjam }}</td>
                    <td>{{ $pinjam->tgl_kembali }}</td>
                    <td>{{ $pinjam->denda ?? '0' }}</td>
                    <td><a href="{{ route('peminjaman.edit', $pinjam->nopinjam) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                        <form action="{{ route('peminjaman.delete', $pinjam->nopinjam) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')">
                            @csrf
                            <button id="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data peminjaman</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
