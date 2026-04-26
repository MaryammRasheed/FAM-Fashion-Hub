<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FAM Vendor Panel')</title>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; margin: 0; }

        .sidebar {
            position: fixed;
            top: 0; left: 0; bottom: 0;
            width: 260px;
            background: linear-gradient(180deg, #134e4a 0%, #0d3b37 50%, #042f2e 100%);
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
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }

        .sidebar-logo .logo-text { color: white; font-size: 18px; font-weight: 700; }
        .sidebar-logo .logo-sub  { color: rgba(255,255,255,0.5); font-size: 11px; }

        .sidebar-nav { padding: 16px 0; flex: 1; }

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

        .sidebar-nav a:hover { background: rgba(255,255,255,0.1); color: white; transform: translateX(3px); }

        .sidebar-nav a.active {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            box-shadow: 0 4px 12px rgba(16,185,129,0.4);
        }

        .sidebar-nav a i { width: 18px; text-align: center; font-size: 15px; }

        .sidebar-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.1); }

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
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 14px; flex-shrink: 0;
        }

        .sidebar-footer .uname { color: white; font-size: 13px; font-weight: 600; }
        .sidebar-footer .urole { color: rgba(255,255,255,0.45); font-size: 11px; }

        .logout-btn {
            width: 100%;
            background: rgba(16,185,129,0.15);
            border: 1px solid rgba(16,185,129,0.3);
            color: #10b981;
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

        .logout-btn:hover { background: #10b981; color: white; }

        .main-content { margin-left: 260px; min-height: 100vh; display: flex; flex-direction: column; }

        .topbar {
            background: white;
            padding: 0 30px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            position: sticky; top: 0; z-index: 100;
        }

        .topbar .page-heading { font-size: 18px; font-weight: 700; color: #134e4a; margin: 0; }
        .topbar .breadcrumb-text { font-size: 12px; color: #999; margin: 0; }

        .topbar-right { display: flex; align-items: center; gap: 16px; }

        .topbar-icon-btn {
            width: 38px; height: 38px;
            border-radius: 8px; border: 1px solid #eee;
            background: white;
            display: flex; align-items: center; justify-content: center;
            color: #555; cursor: pointer; transition: all 0.2s; position: relative;
        }

        .topbar-icon-btn:hover { background: #f5f5f5; }

        .topbar-avatar {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 14px;
        }

        .page-content { padding: 28px 30px; flex: 1; }

        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); }

        .card-header {
            background: white;
            border-bottom: 1px solid #f0f0f0;
            border-radius: 12px 12px 0 0 !important;
            padding: 16px 20px;
            font-weight: 600;
            color: #134e4a;
        }

        .stat-card {
            border-radius: 14px; padding: 22px;
            color: white; position: relative; overflow: hidden;
            border: none; box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }

        .stat-card .stat-number { font-size: 2rem; font-weight: 700; margin: 0; line-height: 1; }
        .stat-card .stat-label  { font-size: 13px; opacity: 0.85; margin: 4px 0 8px; }
        .stat-card .stat-icon   { font-size: 2.2rem; margin-bottom: 12px; display: block; }

        .bg-grad-teal   { background: linear-gradient(135deg, #0d9488, #134e4a); }
        .bg-grad-green  { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .bg-grad-blue   { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .bg-grad-orange { background: linear-gradient(135deg, #fa709a, #fee140); }

        .table { font-size: 14px; }
        .table thead th {
            background: #f8f9fa; color: #666;
            font-weight: 600; font-size: 12px;
            text-transform: uppercase; letter-spacing: 0.5px;
            border: none; padding: 12px 16px;
        }
        .table tbody td { padding: 12px 16px; vertical-align: middle; border-color: #f5f5f5; color: #444; }
        .table tbody tr:hover { background: #fafafa; }

        .badge { font-weight: 500; font-size: 11px; padding: 5px 10px; border-radius: 6px; }
        .btn { border-radius: 8px; font-size: 13px; font-weight: 500; }
        .btn-primary { background: #10b981; border-color: #10b981; }
        .btn-primary:hover { background: #059669; border-color: #059669; }

        .alert { border-radius: 10px; border: none; font-size: 14px; }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 10px; }

        @yield('styles')
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-logo">
        <div class="logo-icon">🏪</div>
        <div>
            <div class="logo-text">FAM Vendor</div>
            <div class="logo-sub">Seller Dashboard</div>
        </div>
    </div>

    <div class="sidebar-nav">
        <div class="nav-label">Overview</div>
        <a href="{{ url('/vendor/dashboard') }}" class="{{ request()->is('vendor/dashboard') ? 'active' : '' }}">
            <i class="fas fa-th-large"></i> Dashboard
        </a>

        <div class="nav-label">Catalog</div>
        <a href="{{ url('/vendor/products') }}" class="{{ request()->is('vendor/products*') ? 'active' : '' }}">
            <i class="fas fa-box-open"></i> My Products
        </a>
        <a href="{{ url('/vendor/products/create') }}" class="{{ request()->is('vendor/products/create') ? 'active' : '' }}">
            <i class="fas fa-plus-circle"></i> Add Product
        </a>
        <a href="{{ url('/vendor/inventory') }}" class="{{ request()->is('vendor/inventory*') ? 'active' : '' }}">
            <i class="fas fa-warehouse"></i> Inventory
        </a>

        <div class="nav-label">Sales</div>
        <a href="{{ url('/vendor/orders') }}" class="{{ request()->is('vendor/orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-bag"></i> Orders
        </a>
        <a href="{{ url('/vendor/earnings') }}" class="{{ request()->is('vendor/earnings*') ? 'active' : '' }}">
            <i class="fas fa-wallet"></i> Earnings
        </a>

        <div class="nav-label">Account</div>
        <a href="{{ url('/vendor/profile') }}" class="{{ request()->is('vendor/profile*') ? 'active' : '' }}">
            <i class="fas fa-user-circle"></i> Profile
        </a>
        <a href="{{ url('/') }}" target="_blank">
            <i class="fas fa-external-link-alt"></i> View Store
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div>
                <div class="uname">{{ Auth::user()->name }}</div>
                <div class="urole">Vendor</div>
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

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="topbar">
        <div>
            <h1 class="page-heading">@yield('page-title', 'Dashboard')</h1>
            <p class="breadcrumb-text">FAM Fashion Hub &rsaquo; @yield('page-title', 'Dashboard')</p>
        </div>
        <div class="topbar-right">
            <a href="{{ url('/') }}" target="_blank" class="topbar-icon-btn" style="text-decoration:none;">
                <i class="fas fa-globe" style="font-size:15px;"></i>
            </a>
            <div class="topbar-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>
    </div>

    <div class="page-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
@yield('scripts')
</body>
</html>
