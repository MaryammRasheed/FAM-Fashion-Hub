<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'FAM Admin Panel')</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { background: #f4f6f9; }
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            color: white;
            width: 250px;
            position: fixed;
        }
        .sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            border-bottom: 1px solid #34495e;
        }
        .sidebar a:hover { background: #34495e; color: white; }
        .sidebar .logo {
            padding: 20px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border-bottom: 1px solid #34495e;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }
        .top-bar {
            background: white;
            padding: 15px 25px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>

    @yield('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            🛍️ FAM Admin
        </div>
        <a href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-dashboard me-2"></i> Dashboard
        </a>
        <a href="{{ url('/admin/products') }}">
            <i class="fas fa-box me-2"></i> Products
        </a>
        <a href="{{ url('/admin/users') }}">
            <i class="fas fa-users me-2"></i> Users
        </a>
        <a href="{{ url('/admin/vendors') }}">
            <i class="fas fa-store me-2"></i> Vendors
        </a>
        <a href="{{ url('/admin/orders') }}">
            <i class="fas fa-shopping-cart me-2"></i> Orders
        </a>
        <a href="{{ url('/') }}">
            <i class="fas fa-globe me-2"></i> View Site
        </a>
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:none; border:none; width:100%;">
                <a href="#" onclick="this.closest('form').submit()">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
            <span>Welcome, {{ Auth::user()->name }}</span>
        </div>

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
