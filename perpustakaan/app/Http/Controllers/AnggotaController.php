<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function view()
    {
        $anggotas = Anggota::all();
        return view('anggota.view', ['anggotas' => $anggotas]);
    }
    public function tambah()
    {
        return view('anggota.tambah');
    }

    public function tambahanggota(Request $request)
    {
        $anggotas = new Anggota();
        $anggotas->nama_anggota = $request->nama_anggota;
        $anggotas->alamat = $request->alamat;
        $anggotas->jurusan = $request->jurusan;
        $anggotas->tgl_dftar = $request->tgl_dftar;
        $anggotas->save();
        return redirect()->route('anggota.view')->with('message', 'Data Anggota Berhasil Ditambah');
    }
    public function delete($idanggota)
    {
        DB::delete("Delete from anggotas where anggotas.idanggota = '$idanggota'");

        return redirect()->route('anggota.view')->with('message', 'Data Anggota Berhasil Dihapus!');
    }
    public function edit($idanggota)
    {
        $anggotas = anggota::where('idanggota', $idanggota)->first();
        return view('anggota.edit', compact('anggotas'));
    }

    public function update(Request $request, $idanggota)
    {
        DB::update(
            "UPDATE anggotas 
                SET nama_anggota = ?, alamat = ?, jurusan = ?, tgl_dftar = ? 
                WHERE idanggota = ?",
            [
                $request->nama_anggota,
                $request->alamat,
                $request->jurusan,
                $request->tgl_dftar,
                $idanggota
            ]
        );

        return redirect()->route('anggota.view')->with('message', 'Berhasil di Edit');
    }
}
