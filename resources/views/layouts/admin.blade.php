<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Artadena')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #f8fafc;
            --accent-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #3b82f6;
            --sidebar-width: 280px;
            --topbar-height: 70px;
            --border-radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            line-height: 1.6;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            position: fixed;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.03)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.02)"/></svg>') repeat;
            pointer-events: none;
        }

        .sidebar-brand {
            height: var(--topbar-height);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
        }

        .sidebar-brand-icon {
            margin-right: 0.75rem;
            font-size: 1.75rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem;
            border-radius: 50%;
            backdrop-filter: blur(10px);
        }

        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 1.5rem 0;
            position: relative;
            z-index: 2;
        }

        .sidebar-heading {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            padding: 0 1.5rem;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .nav-item {
            position: relative;
            z-index: 2;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 1rem 1.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
            border-radius: 0 25px 25px 0;
            margin: 0.25rem 0;
            margin-right: 1rem;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .nav-link:hover::before {
            transform: translateX(0);
        }

        .nav-link:hover {
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 60%;
            background: white;
            border-radius: 2px 0 0 2px;
        }

        .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .nav-link span {
            position: relative;
            z-index: 2;
        }

        /* ===== Topbar ===== */
        .topbar {
            height: var(--topbar-height);
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: #64748b;
            font-size: 1.25rem;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .notification-btn:hover {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
        }

        .user-dropdown .dropdown-toggle {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .user-dropdown .dropdown-toggle:hover {
            background: rgba(37, 99, 235, 0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* ===== Main Content ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: calc(var(--topbar-height) + 2rem) 2rem 2rem;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 1rem;
        }

        .breadcrumb {
            background: none;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #64748b;
        }

        /* ===== Cards ===== */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .card-header {
            background: rgba(248, 250, 252, 0.8);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            font-weight: 600;
            color: #1e293b;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .card-body {
            padding: 1.5rem;
        }


     

        /* ===== Table Styles ===== */
        .table {
            margin-bottom: 0;
        }

        .table th {
            border-top: none;
            border-bottom: 2px solid #e2e8f0;
            font-weight: 600;
            color: #1e293b;
            padding: 1rem;
        }

        .table td {
            padding: 1rem;
            border-top: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(37, 99, 235, 0.05);
        }

        /* ===== Buttons ===== */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: var(--transition);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(37, 99, 235, 0.4);
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
    .sidebar {
        left: -280px;
        transition: var(--transition);
    }

    .sidebar-toggled .sidebar {
        left: 0;
    }

    .main-content {
        margin-left: 0 !important;
    }

    .topbar {
        left: 0 !important;
    }

    .sidebar-toggled .main-content {
        margin-left: 0 !important;
    }

    .sidebar-toggled .topbar {
        left: var(--sidebar-width) !important;
    }

    .topbar-search {
        display: none;
    }

            .topbar-search {
                display: none;
            }

            .stats-card {
                margin-bottom: 1rem;
            }

            .page-title {
                font-size: 1.5rem;
            }
        }

        /* ===== Animations ===== */
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .stats-card:nth-child(1) { animation-delay: 0.1s; }
        .stats-card:nth-child(2) { animation-delay: 0.2s; }
        .stats-card:nth-child(3) { animation-delay: 0.3s; }
        .stats-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-water sidebar-brand-icon"></i>
            <span>Artadena</span>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-heading">Main</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-divider"></div>

        <div class="sidebar-heading">Management</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/fasilitas*') ? 'active' : '' }}" href="/admin/fasilitas">
                    <i class="bi bi-building-gear"></i>
                    <span>Fasilitas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/reservasi*') ? 'active' : '' }}" href="/admin/reservasi">
                    <i class="bi bi-calendar-check"></i>
                    <span>Reservasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/galeri*') ? 'active' : '' }}" href="/admin/galeri">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
            </li>
            @php
            $role = auth()->user()->role ?? null;
            @endphp
            
            @if($role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="/users">
                    <i class="bi bi-people"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            @endif

        </ul>

        <div class="sidebar-divider"></div>

        <div class="sidebar-heading">Reports</div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/laporan*') ? 'active' : '' }}" href="/admin/laporan">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Topbar -->
    <nav class="topbar">
        <div class="topbar-search">
        </div>

        <div class="topbar-user">

            <div class="dropdown user-dropdown">
                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="user-info d-none d-md-block">
                      <div class="user-name">{{ auth()->user()->name ?? 'Guest' }}</div>
                      <div class="user-role text-capitalize">{{ auth()->user()->role ?? 'User' }}</div>
                    </div>
                    <i class="bi bi-chevron-down ms-2"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow">
                 <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" style="background: none; border: none; width: 100%; text-align: left;">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Mobile Sidebar Toggle -->
    <button class="btn btn-primary d-lg-none" id="sidebarToggle" style="position: fixed; top: 1rem; left: 1rem; z-index: 1001; border-radius: 50%; width: 50px; height: 50px;">
        <i class="bi bi-list"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-toggled');
                });
            }

            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.stats-card, .card');
            cards.forEach((card, index) => {
                card.classList.add('fade-in-up');
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                const sidebar = document.querySelector('.sidebar');
                const sidebarToggle = document.getElementById('sidebarToggle');
                
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    document.body.classList.remove('sidebar-toggled');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>