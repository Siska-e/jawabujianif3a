<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    // Jika nama tabel tidak sesuai dengan konvensi Laravel (DetailPinjam menjadi detail_pinjams)
    protected $table = 'detail_pinjams';

    // Menambahkan properti untuk menghindari masalah dengan mass assignment
    protected $fillable = [
        'idanggota', 'idbuku', 'tgl_pinjam', 'tgl_kembali', 'denda'
    ];

    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'id'); // 'idanggota' is the foreign key in detail_pinjams table
    }

    // Define the relationship with Buku (if needed)
    public function bukus()
    {
        return $this->belongsTo(Buku::class, 'id'); // 'idbuku' is the foreign key in detail_pinjams table
    }
}
