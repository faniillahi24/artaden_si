<!DOCTYPE html>
<html lang="id">
<head>
  <!-- TAMBAHKAN INI -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Artaden - Pemandian Air Panas')</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">


  <!-- Bootstrap & Font Awesome -->
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">Art<span>adena</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @foreach (['/' => 'Beranda', 'fasilitas' => 'Fasilitas', 'reservasi' => 'Reservasi', 'cek-status' => 'Cek Status', 'kontak' => 'Kontak', 'login' => 'Login'] as $url => $label)
            <li class="nav-item">
              <a class="nav-link {{ request()->is($url) ? 'active' : '' }}" href="/{{ $url === '/' ? '' : $url }}">{{ $label }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main style="padding-top: 80px;">@yield('content')</main>

  <!-- Footer -->
  <footer class="footer-section bg-dark text-white py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="footer-content">
            <h5 class="fw-bold mb-3 text-primary">Tentang Artaden</h5>
            <p>Artadena adalah pemandian air panas alami dengan fasilitas lengkap untuk relaksasi dan kesehatan keluarga.</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-links">
            <h5>Menu</h5>
            @foreach (['/' => 'Beranda', 'fasilitas' => 'Fasilitas', 'harga' => 'Harga', 'reservasi' => 'Reservasi', 'cek-status' => 'Cek Status', 'kontak' => 'Kontak', 'login' => 'Login'] as $url => $label)
              <a href="/{{ $url === '/' ? '' : $url }}">{{ $label }}</a>
            @endforeach
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-links">
            <h5>Kontak Kami</h5>
            <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Jambu Aia Angek, Jorong, Nagari Koto Sani, Kec. X Koto Singkarak, Kabupaten Solok, Sumatera Barat 27312</p>
            <p><i class="fas fa-phone me-2"></i> 081378248088</p>
            <p><i class="fas fa-envelope me-2"></i> info@artaden.com</p>
            <p><i class="fas fa-clock me-2"></i> 08.00 - 22.00 WIB</p>
          </div>
        </div>
      
      </div>
      <div class="copyright mt-4">
        &copy; {{ date('Y') }} Artadena. by fani illahi.
      </div>
    </div>
  </footer>

  <!-- Back to Top -->
 <button class="btn btn-primary btn-lg back-to-top" id="backToTop"><i class="fas fa-arrow-up"></i></a>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const navbar = document.querySelector('.navbar');
    const topBtn = document.querySelector('.back-to-top');
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 50);
      topBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
    });
    topBtn.addEventListener('click', e => {
      e.preventDefault(); window.scrollTo({top:0, behavior:'smooth'});
    });
  </script>
  @stack('scripts')
</body>
</html>