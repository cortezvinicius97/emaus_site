<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Jovens Emaús')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #2563eb;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 50;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }
        .sidebar-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-header a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sidebar-header .cross {
            color: #f59e0b;
            font-size: 1.3rem;
        }
        .sidebar-nav { padding: 0.75rem 0; }
        .sidebar-nav .nav-label {
            padding: 0.75rem 1.5rem 0.25rem;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.3);
            font-weight: 600;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 1.5rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.15s ease;
            border-left: 3px solid transparent;
        }
        .sidebar-nav a:hover {
            background: var(--sidebar-hover);
            color: rgba(255,255,255,0.9);
        }
        .sidebar-nav a.active {
            background: rgba(37,99,235,0.15);
            color: #60a5fa;
            border-left-color: var(--sidebar-active);
        }
        .sidebar-nav a .icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            min-height: 100vh;
        }
        .topbar {
            background: #fff;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 40;
        }
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .topbar-left h2 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0f172a;
        }
        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #475569;
            padding: 0.25rem;
        }
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .user-dropdown {
            position: relative;
        }
        .user-dropdown-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            transition: background 0.15s;
            color: #334155;
        }
        .user-dropdown-btn:hover { background: #f1f5f9; }
        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #2563eb);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .user-name { font-size: 0.875rem; font-weight: 500; }
        .dropdown-menu {
            position: absolute;
            top: calc(100% + 4px);
            right: 0;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            min-width: 200px;
            display: none;
            overflow: hidden;
            z-index: 100;
        }
        .dropdown-menu.open { display: block; }
        .dropdown-menu a, .dropdown-menu button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1rem;
            color: #334155;
            text-decoration: none;
            font-size: 0.85rem;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            transition: background 0.1s;
        }
        .dropdown-menu a:hover, .dropdown-menu button:hover { background: #f1f5f9; }
        .dropdown-divider { border-top: 1px solid #e2e8f0; }
        .page-content { padding: 1.5rem 2rem 2rem; }
        .sidebar-overlay { display: none; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 45;
            }
            .sidebar-overlay.open { display: block; }
            .main-content { margin-left: 0; }
            .hamburger-btn { display: block; }
            .page-content { padding: 1rem; }
            .topbar { padding: 0 1rem; }
            .user-name { display: none; }
        }

        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }
        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-body { padding: 1.5rem; }
        .stat-card {
            padding: 1.5rem;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }
        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .stat-card .stat-value { font-size: 2rem; font-weight: 700; }
        .stat-card .stat-label { font-size: 0.85rem; opacity: 0.8; margin-top: 0.15rem; }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s;
        }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-success { background: #16a34a; color: #fff; }
        .btn-success:hover { background: #15803d; }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-danger:hover { background: #b91c1c; }
        .btn-warning { background: #f59e0b; color: #fff; }
        .btn-warning:hover { background: #d97706; }
        .btn-outline { background: transparent; color: #475569; border: 1px solid #e2e8f0; }
        .btn-outline:hover { background: #f1f5f9; }
        .btn-sm { padding: 0.35rem 0.75rem; font-size: 0.8rem; }
        .btn-lg { padding: 0.65rem 1.5rem; font-size: 0.95rem; }

        table { width: 100%; border-collapse: collapse; }
        thead th {
            padding: 0.75rem 1rem;
            text-align: left;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            font-weight: 600;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        tbody td {
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }
        tbody tr:hover { background: #f8fafc; }
        .badge {
            display: inline-flex;
            padding: 0.15rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-success { background: #dcfce7; color: #166534; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .badge-info { background: #dbeafe; color: #1e40af; }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }

        .form-group { margin-bottom: 1.25rem; }
        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.35rem;
        }
        .form-control {
            width: 100%;
            padding: 0.6rem 0.85rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: border-color 0.15s;
            outline: none;
            font-family: inherit;
        }
        .form-control:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        textarea.form-control { resize: vertical; min-height: 100px; }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1rem;
        }
        .photo-card {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            aspect-ratio: 1;
            background: #f1f5f9;
        }
        .photo-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .photo-card .photo-actions {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.2s;
        }
        .photo-card:hover .photo-actions { opacity: 1; }
        .photo-card .photo-actions a, .photo-card .photo-actions button {
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div class="admin-wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="cross">✝</span>
                    Jovens Emaús
                </a>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-label">Menu</div>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="icon">📊</span> Dashboard
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                    <span class="icon">🖼️</span> Galerias
                </a>
                <a href="{{ route('admin.meetings.index') }}" class="{{ request()->routeIs('admin.meetings.*') ? 'active' : '' }}">
                    <span class="icon">📅</span> Reuniões
                </a>
                <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                    <span class="icon">🎉</span> Eventos
                </a>
                <a href="{{ route('admin.daily-reading.edit') }}" class="{{ request()->routeIs('admin.daily-reading.*') ? 'active' : '' }}">
                    <span class="icon">📖</span> Leitura do Dia
                </a>
                <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                    <span class="icon">📢</span> Recados
                </a>
                <div class="nav-label">Site</div>
                <a href="{{ route('home') }}" target="_blank">
                    <span class="icon">🌐</span> Ver Site
                </a>
            </nav>
        </aside>

        <div class="main-content">
            <header class="topbar">
                <div class="topbar-left">
                    <button class="hamburger-btn" onclick="openSidebar()">☰</button>
                    <h2>@yield('title', 'Dashboard')</h2>
                </div>
                <div class="topbar-right">
                    <div class="user-dropdown">
                        <button class="user-dropdown-btn" onclick="toggleDropdown()">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span class="user-name">{{ Auth::user()->name }}</span>
                        </button>
                        <div class="dropdown-menu" id="userDropdown">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">🚪 Sair</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="page-content">
                @if(session('success'))
                    <div class="alert alert-success">✓ {{ session('success') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('open');
            document.getElementById('sidebarOverlay').classList.add('open');
        }
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').classList.remove('open');
        }
        function toggleDropdown() {
            document.getElementById('userDropdown').classList.toggle('open');
        }
        document.addEventListener('click', function(e) {
            const dd = document.getElementById('userDropdown');
            const btn = document.querySelector('.user-dropdown-btn');
            if (dd && btn && !btn.contains(e.target) && !dd.contains(e.target)) {
                dd.classList.remove('open');
            }
        });
    </script>
</body>
</html>
