<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Artaden - Pemandian Air Panas')</title>

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />

  <style>
    :root {
      --primary: #2a9d8f; --dark: #343a40; --secondary: #264653; --accent: #e9c46a;
    }
    body { font-family: 'Poppins', sans-serif; color: var(--dark); }
    h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; }
    .navbar { background: #fff; box-shadow: 0 2px 15px rgba(0,0,0,0.1); }
    .navbar-brand { color: var(--primary); font-weight: 700; }
    .navbar-brand span { color: var(--secondary); }
    .nav-link { color: var(--dark); font-weight: 500; }
    .nav-link.active, .nav-link:hover { color: var(--primary) !important; }
    footer { background: var(--secondary); color: white; padding: 3rem 0 0; }
    .footer-links h5 { color: var(--accent); margin-bottom: 1rem; }
    .footer-links a { color: #ccc; text-decoration: none; display: block; margin-bottom: .5rem; }
    .footer-links a:hover { color: white; }
    .social-icons a {
      display: inline-block; width: 36px; height: 36px; line-height: 36px;
      text-align: center; border-radius: 50%; background: rgba(255,255,255,0.1);
      color: white; margin-right: 10px; transition: .3s;
    }
    .social-icons a:hover { background: var(--accent); color: var(--secondary); }
    .copyright { background: rgba(0, 0, 0, 0.1); text-align: center; padding: 1rem 0; margin-top: 2rem; font-size: 0.9rem; }
    .back-to-top { position: fixed; bottom: 30px; right: 30px; display: none; }
  </style>

  @stack('styles')
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">Art<span>adena</span></a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto">
          @foreach (['/' => 'Beranda', 'fasilitas' => 'Fasilitas', 'harga' => 'Harga', 'reservasi' => 'Reservasi', 'cek-status' => 'Cek Status', 'kontak' => 'Kontak', 'login' => 'Login'] as $url => $label)
            <li class="nav-item">
              <a class="nav-link {{ request()->is($url) ? 'active' : '' }}" href="/{{ $url === '/' ? '' : $url }}">{{ $label }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="py-5 mt-5">@yield('content')</main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="footer-links">
            <h5>Tentang Artaden</h5>
            <p>Artaden adalah pemandian air panas alami dengan fasilitas lengkap untuk relaksasi dan kesehatan keluarga.</p>
            <div class="social-icons mt-3">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
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
            <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Artaden No. 123, Bandung</p>
            <p><i class="fas fa-phone me-2"></i> (022) 1234 5678</p>
            <p><i class="fas fa-envelope me-2"></i> info@artaden.com</p>
            <p><i class="fas fa-clock me-2"></i> 08.00 - 22.00 WIB</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-links">
            <h5>Newsletter</h5>
            <form class="mt-3">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="Email Anda" />
                <button class="btn btn-warning" type="button">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="copyright mt-4">
        &copy; {{ date('Y') }} Artaden. All Rights Reserved.
      </div>
    </div>
  </footer>

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-lg back-to-top"><i class="fas fa-arrow-up"></i></a>

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