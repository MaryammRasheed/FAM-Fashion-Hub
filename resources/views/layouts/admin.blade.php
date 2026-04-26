<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FAM Admin Panel')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        body {
            background: #f0f2f5;
            margin: 0;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: 260px;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 15px rgba(0,0,0,0.2);
            overflow-y: auto;
        }

        .sidebar-logo {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo .logo-icon {
            width: 42px; height: 42px;
            background: linear-gradient(135deg, #e94560, #c62a47);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }

        .sidebar-logo .logo-text {
            color: white;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .sidebar-logo .logo-sub {
            color: rgba(255,255,255,0.5);
            font-size: 11px;
            font-weight: 400;
        }

        .sidebar-nav {
            padding: 16px 0;
            flex: 1;
        }

        .nav-label {
            color: rgba(255,255,255,0.35);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 12px 20px 6px;
        }

        .sidebar-nav a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 20px;
            margin: 2px 10px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-nav a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(3px);
        }

        .sidebar-nav a.active {
            background: linear-gradient(135deg, #e94560, #c62a47);
            color: white;
            box-shadow: 0 4px 12px rgba(233,69,96,0.4);
        }

        .sidebar-nav a i {
            width: 18px;
            text-align: center;
            font-size: 15px;
        }

        .sidebar-badge {
            margin-left: auto;
            background: #e94560;
            color: white;
            font-size: 10px;
            padding: 2px 7px;
            border-radius: 20px;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-footer .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 8px;
            background: rgba(255,255,255,0.07);
            margin-bottom: 10px;
        }

        .sidebar-footer .avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #e94560, #c62a47);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .sidebar-footer .uname {
            color: white;
            font-size: 13px;
            font-weight: 600;
        }

        .sidebar-footer .urole {
            color: rgba(255,255,255,0.45);
            font-size: 11px;
        }

        .logout-btn {
            width: 100%;
            background: rgba(233,69,96,0.15);
            border: 1px solid rgba(233,69,96,0.3);
            color: #e94560;
            padding: 9px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #e94560;
            color: white;
        }

        /* ── MAIN CONTENT ── */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOP BAR ── */
        .topbar {
            background: white;
            padding: 0 30px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar .page-heading {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
        }

        .topbar .breadcrumb-text {
            font-size: 12px;
            color: #999;
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-icon-btn {
            width: 38px; height: 38px;
            border-radius: 8px;
            border: 1px solid #eee;
            background: white;
            display: flex; align-items: center; justify-content: center;
            color: #555;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .topbar-icon-btn:hover { background: #f5f5f5; }

        .notif-dot {
            position: absolute;
            top: 6px; right: 6px;
            width: 7px; height: 7px;
            background: #e94560;
            border-radius: 50%;
            border: 1px solid white;
        }

        .topbar-avatar {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, #e94560, #c62a47);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        /* ── PAGE CONTENT ── */
        .page-content {
            padding: 28px 30px;
            flex: 1;
        }

        /* ── CARDS ── */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #f0f0f0;
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            font-weight: 600;
            color: #1a1a2e;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            border-radius: 14px;
            padding: 22px;
            color: white;
            position: relative;
            overflow: hidden;
            border: none;
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -20px; right: -20px;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }

        .stat-card .stat-icon {
            font-size: 2.2rem;
            margin-bottom: 12px;
            display: block;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }

        .stat-card .stat-label {
            font-size: 13px;
            opacity: 0.85;
            margin: 4px 0 8px;
        }

        .stat-card .stat-change {
            font-size: 12px;
            opacity: 0.75;
        }

        .bg-grad-purple  { background: linear-gradient(135deg, #667eea, #764ba2); }
        .bg-grad-pink    { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .bg-grad-blue    { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .bg-grad-green   { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .bg-grad-orange  { background: linear-gradient(135deg, #fa709a, #fee140); }

        /* ── TABLES ── */
        .table { font-size: 14px; }
        .table thead th {
            background: #f8f9fa;
            color: #666;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 12px 16px;
        }
        .table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            border-color: #f5f5f5;
            color: #444;
        }
        .table tbody tr:hover { background: #fafafa; }

        /* ── BADGES ── */
        .badge { font-weight: 500; font-size: 11px; padding: 5px 10px; border-radius: 6px; }

        /* ── BUTTONS ── */
        .btn { border-radius: 8px; font-size: 13px; font-weight: 500; }
        .btn-primary { background: #e94560; border-color: #e94560; }
        .btn-primary:hover { background: #c62a47; border-color: #c62a47; }

        /* ── ALERTS ── */
        .alert { border-radius: 10px; border: none; font-size: 14px; }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 10px; }

        @yield('styles')
    </style>
</head>
<body>

<!-- ══ SIDEBAR ══════════════════════════════════════════════════════════════ -->
<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🛍️</div>
        <div>
            <div class="logo-text">FAM Admin</div>
            <div class="logo-sub">Fashion Hub Panel</div>
        </div>
    </div>

    <div class="sidebar-nav">
        <div class="nav-label">Main Menu</div>

        <a href="{{ url('/admin/dashboard') }}"
           class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-th-large"></i> Dashboard
        </a>

        <div class="nav-label">Catalog</div>

        <a href="{{ url('/admin/products') }}"
           class="{{ request()->is('admin/products*') ? 'active' : '' }}">
            <i class="fas fa-box-open"></i> Products
        </a>

        <a href="{{ url('/admin/categories') }}"
           class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> Categories
        </a>

        <div class="nav-label">People</div>

        <a href="{{ url('/admin/users') }}"
           class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Users
        </a>

        <a href="{{ url('/admin/vendors') }}"
           class="{{ request()->is('admin/vendors*') ? 'active' : '' }}">
            <i class="fas fa-store"></i> Vendors
        </a>

        <div class="nav-label">Commerce</div>

        <a href="{{ url('/admin/orders') }}"
           class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-bag"></i> Orders
        </a>

        <a href="{{ url('/admin/reports') }}"
           class="{{ request()->is('admin/reports*') ? 'active' : '' }}">
            <i class="fas fa-chart-bar"></i> Reports
        </a>

        <div class="nav-label">Site</div>

        <a href="{{ url('/') }}" target="_blank">
            <i class="fas fa-external-link-alt"></i> View Site
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div>
                <div class="uname">{{ Auth::user()->name }}</div>
                <div class="urole">Administrator</div>
            </div>
        </div>
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- ══ MAIN CONTENT ═════════════════════════════════════════════════════════ -->
<div class="main-content">

    <!-- Top Bar -->
    <div class="topbar">
        <div>
            <h1 class="page-heading">@yield('page-title', 'Dashboard')</h1>
            <p class="breadcrumb-text">FAM Fashion Hub &rsaquo; @yield('page-title', 'Dashboard')</p>
        </div>
        <div class="topbar-right">
            <div class="topbar-icon-btn">
                <i class="fas fa-bell" style="font-size:15px;"></i>
                <span class="notif-dot"></span>
            </div>
            <a href="{{ url('/') }}" target="_blank" class="topbar-icon-btn" style="text-decoration:none;">
                <i class="fas fa-globe" style="font-size:15px;"></i>
            </a>
            <div class="topbar-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content">

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
@yield('scripts')
</body>
</html>
