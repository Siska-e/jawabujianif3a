<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPinjamController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function view()
    {
        $pinjam = DB::table('detail_pinjams')
        ->join('anggotas', 'detail_pinjams.idanggota', '=', 'anggotas.idanggota')
        ->join('bukus', 'detail_pinjams.idbuku', '=', 'bukus.idbuku')
        ->select('detail_pinjams.*', 'anggotas.nama_anggota as nama', 'bukus.judul_buku as judul')
        ->get();


        return view('peminjaman.view', ["detail_pinjams" => $pinjam]);
    }


    public function tambah()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::where('jumlah', '>', 0)->get(); // Hanya buku yang tersedia

        return view('peminjaman.tambah', compact('anggotas', 'bukus'));
    }

    public function store(Request $request)
    {
        DB::table('detail_pinjams')->insert([
            'idanggota' => $request->input('anggota'),
            'idbuku' => $request->input('buku'),

            'tgl_pinjam' => date(now()),
            'tgl_kembali' => $request->input('tgl_kembali'),
            'denda' => 0
        ]);

        DB::table('bukus')
            ->where('idbuku', $request->input('buku'))
            ->update(['jumlah' => DB::raw('jumlah - 1')]);
        return redirect("/peminjaman");
    }

    public function edit($nopinjam)
    {
        $bukus = DB::select("select * from bukus");
        $anggotas = DB::select(("select * from anggotas"));
        $details = $data = DB::table('detail_pinjams')
            ->join('anggotas', 'detail_pinjams.idanggota', '=', 'anggotas.idanggota')
            ->join('bukus', 'detail_pinjams.idbuku', '=', 'bukus.idbuku')
            ->select('detail_pinjams.*', 'anggotas.nama_anggota as nama', 'bukus.judul_buku as judul')
            ->where('nopinjam', $nopinjam)
            ->first();
        return view('peminjaman.edit', compact('detail_penjams', "bukus", "anggotas"),);
    }

    public function update(Request $request, $nopinjam)
    {

        DB::table('detail_pinjams')
            ->where('nopinjam', $nopinjam)
            ->update([
                'idanggota' => $request->input('anggota'),
                'idbuku' => $request->input('buku'),
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'tgl_kembali' => $request->input('tgl_kembali'),
                'denda' => $request->input('denda'),
            ]);


        return redirect()->route('peminjaman.view')->with('message', 'Berhasil di Edit');
    }


    public function delete($nopinjam)
    {
        DB::delete("Delete from detail_pinjams where detail_pinjams.nopinjam = '$nopinjam'");

        return redirect()->route('peminjaman.view')->with('message', 'Data Pinjam Berhasil Dihapus!');
    }
}
