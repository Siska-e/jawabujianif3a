@extends('app')
@section('konten')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex">
        <h4>List Data Buku</h4>
        <div class="ms-auto">
            <a class="btn btn-outline-secondary" href="{{ route('buku.tambah') }}">Tambah Buku</a>
            <a class="btn btn-outline-info" href="{{ route('buku.info') }}">Info Buku</a>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Pengarang</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        @forelse ($bukus as $no => $data)
            <tr>
                <td>{{ $data->idbuku }}</td>
                <td>{{ $data->judul_buku }}</td>
                <td>{{ $data->penerbit }}</td>
                <td>{{ $data->pengarang }}</td>
                <td>{{ $data->jumlah }}</td>
                <td><a href="{{ route('buku.edit', $data->idbuku) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="{{ route('buku.delete', $data->idbuku) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')">
                        @csrf
                        <button id="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data buku</td>
                </tr>
        @endforelse
    </table>
@endsection
