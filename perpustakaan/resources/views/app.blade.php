<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title', 'Dashboard')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <script src="{{ url('main.js') }}"></script>
</head>
<body class="bg-info-subtle">
    <h1 class="text-center">Dashboard</h1>
    <nav class="navbar navbar-expand-lg bg-info-subtle" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/peminjaman">Peminjaman</a>
                    <a class="nav-link" href="/buku">Buku</a>
                    <a class="nav-link" href="/anggota">Anggota</a>
                    
                </div>
            </div>
        </div>
    </nav>
    <div class="mt-3 container">
        @yield('konten')
    </div>
</body>
</html>
