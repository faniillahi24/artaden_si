<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artaden - Pemandian Air Panas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Artaden</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/fasilitas">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="/harga">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="/reservasi">Reservasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/cek-status">Cek Status</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>