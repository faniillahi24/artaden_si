<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Artaden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/admin/dashboard">Admin Panel</a>
            <ul class="navbar-nav flex-row">
                <li class="nav-item me-3"><a class="nav-link text-white" href="/admin/dashboard">Dashboard</a></li>
                <li class="nav-item me-3"><a class="nav-link text-white" href="/admin/fasilitas">Fasilitas</a></li>
                <li class="nav-item me-3"><a class="nav-link text-white" href="/admin/reservasi">Reservasi</a></li>
                <li class="nav-item me-3"><a class="nav-link text-white" href="/admin/users">Pengguna</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/admin/laporan">Laporan</a></li>
            </ul>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>
