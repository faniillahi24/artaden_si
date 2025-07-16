<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Aia Angek Pabel - Pemandian Air Panas')</title>
  
  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary: #1e40af;
      --primary-light: #3b82f6;
      --secondary: #06b6d4;
      --accent: #8b5cf6;
      --gradient-primary: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
      --gradient-secondary: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
      --gradient-accent: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
      --light: #f8fafc;
      --dark: #1e293b;
      --gray: #64748b;
      --glass: rgba(255, 255, 255, 0.1);
      --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      color: var(--dark);
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
      line-height: 1.6;
    }
    
    /* Navbar Modern */
    .navbar {
      backdrop-filter: blur(20px);
      background: rgba(255, 255, 255, 0.85);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      padding: 1rem 0;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .navbar.scrolled {
      padding: 0.5rem 0;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
      font-family: 'Poppins', sans-serif;
      font-size: 1.8rem;
      font-weight: 800;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .navbar-brand:hover {
      transform: scale(1.05);
    }
    
    .navbar-brand span {
      background: var(--gradient-accent);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    
    .nav-link {
      font-weight: 500;
      color: var(--dark);
      margin: 0 0.5rem;
      padding: 0.75rem 1rem;
      border-radius: 50px;
      position: relative;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      overflow: hidden;
    }
    
    .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: var(--gradient-primary);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: -1;
    }
    
    .nav-link:hover,
    .nav-link.active {
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(30, 64, 175, 0.3);
    }
    
    .nav-link:hover::before,
    .nav-link.active::before {
      left: 0;
    }
    
    .navbar-toggler {
      border: none;
      padding: 0.5rem;
      border-radius: 8px;
      background: var(--gradient-primary);
    }
    
    .navbar-toggler:focus {
      box-shadow: none;
    }
    
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    
    /* Main Content */
    main {
      min-height: calc(100vh - 180px);
    }
    
    /* Footer Modern */
    .footer-section {
      background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }
    
    .footer-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      opacity: 0.5;
    }
    
    .footer-content {
      position: relative;
      z-index: 1;
    }
    
    .footer-content h5 {
      background: var(--gradient-secondary);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }
    
    .footer-content p {
      color: #cbd5e0;
      font-size: 0.95rem;
      line-height: 1.6;
    }
    
    .footer-links {
      position: relative;
      z-index: 1;
    }
    
    .footer-links h5 {
      background: var(--gradient-secondary);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
      padding-bottom: 0.75rem;
      position: relative;
    }
    
    .footer-links h5::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 3px;
      background: var(--gradient-accent);
      border-radius: 2px;
    }
    
    .footer-links a {
      display: flex;
      align-items: center;
      color: #cbd5e0;
      margin-bottom: 0.75rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      text-decoration: none;
      padding: 0.5rem 0;
      border-radius: 8px;
      position: relative;
      overflow: hidden;
    }
    
    .footer-links a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: var(--glass);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: -1;
    }
    
    .footer-links a:hover {
      color: white;
      transform: translateX(5px);
    }
    
    .footer-links a:hover::before {
      left: 0;
    }
    
    .footer-links i {
      width: 1.5rem;
      text-align: center;
      margin-right: 0.75rem;
      color: var(--secondary);
      font-size: 1.1rem;
    }
    
    .copyright {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: 1.5rem;
      margin-top: 2rem;
      text-align: center;
      color: #94a3b8;
      font-size: 0.9rem;
      position: relative;
      z-index: 1;
    }
    
    /* Back to Top Modern */
    .back-to-top {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      width: 3.5rem;
      height: 3.5rem;
      border-radius: 50%;
      display: none;
      z-index: 99;
      background: var(--gradient-primary);
      border: none;
      color: white;
      font-size: 1.25rem;
      box-shadow: var(--shadow);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
    }
    
    .back-to-top:hover {
      transform: translateY(-5px) scale(1.1);
      box-shadow: var(--shadow-hover);
      background: var(--gradient-accent);
    }
    
    .back-to-top:active {
      transform: translateY(-2px) scale(1.05);
    }
    
    /* Utility Classes */
    .text-primary {
      color: var(--primary) !important;
    }
    
    .bg-primary {
      background: var(--gradient-primary) !important;
    }
    
    .glass-effect {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .card-hover {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border-radius: 16px;
      box-shadow: var(--shadow);
      border: none;
    }
    
    .card-hover:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-hover);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar-brand {
        font-size: 1.5rem;
      }
      
      .nav-link {
        margin: 0.25rem 0;
        padding: 0.5rem 1rem;
      }
      
      .back-to-top {
        width: 3rem;
        height: 3rem;
        bottom: 1.5rem;
        right: 1.5rem;
      }
      
      .footer-links h5 {
        font-size: 1.1rem;
      }
    }
    
    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    
    .animate-fade-in-up {
      animation: fadeInUp 0.8s ease-out;
    }
    
    .animate-float {
      animation: float 3s ease-in-out infinite;
    }
    
    /* Smooth scrolling */
    html {
      scroll-behavior: smooth;
    }
    
    /* Selection styling */
    ::selection {
      background: var(--primary);
      color: white;
    }
    
    ::-moz-selection {
      background: var(--primary);
      color: white;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">AiaAngek<span>Pabel</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @foreach (['/' => 'Beranda', 'fasilitas' => 'Fasilitas', 'reservasi' => 'Reservasi', 'cek-status' => 'Cek Status', 'kontak' => 'Testimoni', 'login' => 'Login'] as $url => $label)
            <li class="nav-item">
              <a class="nav-link {{ request()->is($url) ? 'active' : '' }}" href="/{{ $url === '/' ? '' : $url }}">{{ $label }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main style="padding-top: 90px;">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer-section py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="footer-content">
            <h5 class="fw-bold mb-3">Tentang Aia angek Pabel</h5>
            <p>Pemandian air panas alami dengan fasilitas lengkap untuk relaksasi dan kesehatan keluarga.</p>
          </div>
        </div>
        <div class="col-lg-2 col-md-6">
          <div class="footer-links">
            <h5>Menu</h5>
            @foreach (['/' => 'Beranda', 'fasilitas' => 'Fasilitas', 'harga' => 'Harga', 'reservasi' => 'Reservasi', 'cek-status' => 'Cek Status', 'kontak' => 'Testimoni', 'login' => 'Login'] as $url => $label)
              <a href="/{{ $url === '/' ? '' : $url }}">
                <i class="fas fa-chevron-right"></i>
                {{ $label }}
              </a>
            @endforeach
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="footer-links">
            <h5>Kontak Kami</h5>
            <a href="#"><i class="fas fa-map-marker-alt"></i> Aia Angek, Jorong, Nagari Koto Sani, Kec. X Koto Singkarak, Kabupaten Solok, Sumatera Barat 27312</a>
            <a href="tel:081378248088"><i class="fas fa-phone"></i> 081378248088</a>
            <a href="mailto:pokdarwis@gmail.com"><i class="fas fa-envelope"></i> pokdarwis@gmail.com</a>
            <a href="#"><i class="fas fa-clock"></i> 05.00 - 23.00 WIB</a>
          </div>
        </div>
      </div>
      <div class="copyright">
        &copy; {{ date('Y') }} AiaAngekpabel. by fani illahi.
      </div>
    </div>
  </footer>

  <!-- Back to Top -->
  <button class="btn back-to-top" id="backToTop">
    <i class="fas fa-arrow-up"></i>
  </button>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    const topBtn = document.querySelector('.back-to-top');
    
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
      
      if (window.scrollY > 300) {
        topBtn.style.display = 'block';
      } else {
        topBtn.style.display = 'none';
      }
    });
    
    // Back to top functionality
    topBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
    
    // Add loading animation
    window.addEventListener('load', () => {
      document.body.classList.add('loaded');
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
    
    // Add animation on scroll
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in-up');
        }
      });
    }, observerOptions);
    
    // Observe elements when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
      const animatedElements = document.querySelectorAll('.card, .footer-content, .footer-links');
      animatedElements.forEach(el => observer.observe(el));
    });
  </script>
  @stack('scripts')
</body>
</html>