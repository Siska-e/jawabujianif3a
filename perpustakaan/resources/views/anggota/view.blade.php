@extends('app')
@section('konten')
    @if (session()->has('message'))
        <div class="alert alert-success">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex">
        <h4>List Data Anggota</h4>
        <div class="ms-auto">
            <a class="btn btn-outline-secondary" href="{{ route('anggota.tambah') }}">Tambah Anggota</a>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
        </tr>
        @forelse ($anggotas as $no => $data)
            <tr>
                <td>{{ $data->idanggota }}</td>
                <td>{{ $data->nama_anggota }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->jurusan }}</td>
                <td>{{ $data->tgl_dftar }}</td>
                <td><a href="{{ route('anggota.edit', $data->idanggota) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                    <form action="{{ route('anggota.delete', $data->idanggota) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda Yakin Menghapus ini?')">
                        @csrf
                        <button id="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data anggota</td>
                </tr>
            @endforelse
        </table>
    @endsection
