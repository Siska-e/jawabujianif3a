@extends('app')

@section('title', 'Selamat Datang di Website Peminjaman Buku')

@section('konten')
<div class="text-center">
    <h2 class="mb-3">Selamat Datang di Website Peminjaman Buku</h2>
    <p class="lead">
        Akses koleksi buku terbaik kami kapan saja dan di mana saja. Platform ini dirancang untuk mempermudah Anda 
        meminjam buku favorit dengan cepat dan efisien.
    </p>
</div>

<div class="row mt-4">
    <!-- Section: Keuntungan -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Koleksi Lengkap</h5>
                <p class="card-text">Temukan berbagai jenis buku mulai dari fiksi, non-fiksi, akademik, hingga buku referensi.</p>
            </div>
        </div>
    </div>

    <!-- Section: Kemudahan -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Kemudahan Akses</h5>
                <p class="card-text">Platform kami memudahkan Anda untuk mencari, meminjam, dan mengelola pinjaman buku Anda.</p>
            </div>
        </div>
    </div>

    <!-- Section: Dukungan -->
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <h5 class="card-title">Dukungan 24/7</h5>
                <p class="card-text">Tim kami siap membantu Anda kapan saja untuk memastikan pengalaman terbaik.</p>
            </div>
        </div>
    </div>
</div>

<!-- Section: Call to Action -->
<div class="mt-5 text-center">
    <h3 class="mb-3">Mulai Sekarang</h3>
    <p>
        Jadilah bagian dari komunitas pembaca kami. Temukan buku yang Anda butuhkan dan perluas wawasan Anda hari ini.
    </p>
    <a href="/peminjaman/tambah" class="btn btn-primary btn-lg">Pinjam Buku Sekarang</a>
</div>
@endsection
