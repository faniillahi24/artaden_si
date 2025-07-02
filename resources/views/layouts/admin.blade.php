<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Artaden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #1cc88a;
            --danger-color: #e74a3b;
            --warning-color: #f6c23e;
            --sidebar-width: 250px;
            --topbar-height: 56px;
        }
        
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fc;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, #008080 100%);
            color: white;
            position: fixed;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            z-index: 1000;
        }
        
        .sidebar-brand {
            height: var(--topbar-height);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 800;
            padding: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-brand-icon {
            margin-right: 0.5rem;
        }
        
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 1rem 0;
        }
        
        .nav-item {
            position: relative;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .nav-link i {
            margin-right: 0.5rem;
            font-size: 1rem;
        }
        
        /* Topbar */
        .topbar {
            height: var(--topbar-height);
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            justify-content: flex-end;
        }
        
        .topbar-divider {
            width: 1px;
            height: 2.5rem;
            background-color: #eaecf4;
            margin: 0 1rem;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding-top: var(--topbar-height);
            padding: var(--topbar-height) 2rem 2rem;
            min-height: 100vh;
        }
        
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.35rem;
            font-weight: 600;
            color: #4e73df;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -var(--sidebar-width);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .topbar {
                left: 0;
            }
            
            .sidebar-toggled .sidebar {
                margin-left: 0;
            }
            
            .sidebar-toggled .main-content {
                margin-left: var(--sidebar-width);
            }
            
            .sidebar-toggled .topbar {
                left: var(--sidebar-width);
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-building sidebar-brand-icon"></i>
            <span>Artaden</span>
        </div>
        
        <div class="sidebar-divider"></div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
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
                    <i class="bi bi-calendar-check"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="/admin/users">
                    <i class="bi bi-people"></i>
                    <span>Pengguna</span>
                </a>
            </li>
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
        <div class="dropdown">
            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <i class="bi bi-person-circle fs-4"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.createElement('button');
            sidebarToggle.className = 'btn btn-link text-gray-600 d-lg-none';
            sidebarToggle.innerHTML = '<i class="bi bi-list"></i>';
            sidebarToggle.style.position = 'fixed';
            sidebarToggle.style.top = '0.5rem';
            sidebarToggle.style.left = '0.5rem';
            sidebarToggle.style.zIndex = '1001';
            sidebarToggle.onclick = function() {
                document.body.classList.toggle('sidebar-toggled');
            };
            document.body.appendChild(sidebarToggle);
        });
    </script>
</body>
</html>