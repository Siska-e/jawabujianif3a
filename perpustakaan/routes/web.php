<?php

use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DetailPinjamController;


Route::get('/', [DetailPinjamController::class, 'index'])->name('index');
Route::get('/peminjaman', [DetailPinjamController::class, 'view'])->name('peminjaman.view');
Route::get('/peminjaman/tambah', [DetailPinjamController::class, 'tambah'])->name('peminjaman.tambah');
Route::post('/peminjaman/tambahPeminjaman', [DetailPinjamController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/edit/{nopinjam}', [DetailPinjamController::class, 'edit'])->name('peminjaman.edit');
Route::post('/peminjaman/update/{nopinjam}', [DetailPinjamController::class, 'update'])->name('peminjaman.update');
Route::post('/peminjaman/delete/{nopinjam}', [DetailPinjamController::class, 'delete'])->name('peminjaman.delete');

Route::get('/buku', [BukuController::class, 'view'])->name('buku.view');
Route::get('/buku/tambah', [BukuController::class, 'tambah'])->name('buku.tambah');
Route::get('/buku/info', [BukuController::class, 'info'])->name('buku.info');
Route::get('/buku/edit/{idbuku}', [BukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/update/{idbuku}', [BukuController::class, 'update'])->name('buku.update');
Route::post('/buku/tambahBuku', [BukuController::class, 'tambahBuku'])->name('buku.tambahBuku');
Route::post('/buku/delete/{idbuku}', [BukuController::class, 'delete'])->name('buku.delete');

Route::get('/anggota', [AnggotaController::class, 'view'])->name('anggota.view');
Route::get('/anggota/tambah', [AnggotaController::class, 'tambah'])->name('anggota.tambah');
Route::get('/anggota/edit/{idanggota}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::post('/anggota/update/{idanggota}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::post('/anggota/tambahAnggota', [AnggotaController::class, 'tambahAnggota'])->name('anggota.tambahAnggota');
Route::post('/anggota/delete/{idanggota}', [AnggotaController::class, 'delete'])->name('anggota.delete');
