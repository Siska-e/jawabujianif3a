<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function view()
    {
        $bukus = Buku::all();
        return view('buku.view', ['bukus' => $bukus]);
    }
    public function tambah()
    {
        return view('buku.tambah');
    }

    public function tambahBuku(Request $request)
    {
        DB::table('bukus')->insert([
            'judul_buku' => $request->input('judul_buku'),
            'penerbit' => $request->input('penerbit'),
            'pengarang' => $request->input('pengarang'),
            'jumlah' => $request->input('jumlah'),
        ]);
        return redirect()->route('buku.view')->with('message', 'Data Buku Berhasil Ditambah');
    }
    public function delete($idbuku)
    {
        DB::delete("Delete from bukus where bukus.idbuku = '$idbuku'");

        return redirect()->route('buku.view')->with('message', 'Data Buku Berhasil Dihapus!');
    }
    public function edit($idbuku)
    {
        $bukus = Buku::where('idbuku', $idbuku)->first();
        return view('buku.edit', compact('bukus'));
    }

    public function update(Request $request, $idbuku)
    {
        DB::table('bukus')->where('idbuku', $idbuku) ->update([
            'judul_buku' => $request->input('judul_buku'),
            'penerbit' => $request->input('penerbit'),
            'pengarang' => $request->input('pengarang'),
            'jumlah' => $request->input('jumlah'),
        ]);


    return redirect()->route('buku.view')->with('message', 'Berhasil di Edit');
    }
}
