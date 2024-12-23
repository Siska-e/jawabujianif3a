@extends('app')
@section('konten')
<h4>Edit Buku</h4>
    <form action="{{route('buku.update', $bukus->idbuku)}}" method="POST">
    @csrf
        <label>Judul Buku :</label>
        <input type="text" name="judul_buku" value="{{$bukus->judul_buku}}" id="judul_buku" class="form-control mb-2">
        <label>Penerbit :</label>
        <input type="text" name="penerbit" value="{{$bukus->penerbit}}" id="penerbit" class="form-control mb-2">
        <label>Pengarang :</label>
        <input type="text" name="pengarang" value="{{$bukus->pengarang}}" id="pengarang" class="form-control mb-2">
        <label>Jumlah :</label>
        <input type="number" name="jumlah" value="{{$bukus->jumlah}}" id="jumlah" class="form-control mb-2">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection