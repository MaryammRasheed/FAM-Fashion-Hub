@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<!-- Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm" style="border-left:4px solid #6366f1!important; border-left-width:4px;">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size:2.5rem;">👥</div>
                <div>
                    <h3 class="mb-0">{{ $totalUsers }}</h3>
                    <p class="text-muted mb-0 small">Total Users</p>
                    <small class="text-success">+{{ $userGrowth }}% this month</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size:2.5rem;">📦</div>
                <div>
                    <h3 class="mb-0">{{ $totalProducts }}</h3>
                    <p class="text-muted mb-0 small">Total Products</p>
                    <small class="text-success">{{ $newProducts }} new this week</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size:2.5rem;">🛒</div>
                <div>
                    <h3 class="mb-0">{{ $totalOrders }}</h3>
                    <p class="text-muted mb-0 small">Total Orders</p>
                    <small class="text-success">+{{ $orderGrowth }}% this month</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="font-size:2.5rem;">💰</div>
                <div>
                    <h4 class="mb-0">PKR {{ number_format($totalRevenue) }}</h4>
                    <p class="text-muted mb-0 small">Revenue</p>
                    <small class="text-success">+{{ $revenueGrowth }}% growth</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendors stat -->
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-3">
            <div style="font-size:2rem;">🏪</div>
            <h3 class="mt-1">{{ $totalVendors }}</h3>
            <p class="text-muted mb-0">Active Vendors</p>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom fw-bold">Quick Actions</div>
            <div class="card-body d-flex gap-2 flex-wrap">
                <a href="{{ route('admin.products') }}" class="btn btn-outline-dark btn-sm">Manage Products</a>
                <a href="{{ route('admin.vendors') }}" class="btn btn-outline-dark btn-sm">Approve Vendors</a>
                <a href="{{ route('admin.orders') }}" class="btn btn-outline-dark btn-sm">View Orders</a>
                <a href="{{ route('admin.categories') }}" class="btn btn-outline-dark btn-sm">Categories</a>
                <a href="{{ route('admin.reports') }}" class="btn btn-outline-dark btn-sm">Reports</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Orders -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-bold">Recent Orders</span>
                <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-outline-dark">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr><th>Order #</th><th>Customer</th><th>Amount</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @forelse($recentOrders as $order)
                            <tr>
                                <td><small class="fw-bold">{{ $order->order_number }}</small></td>
                                <td>{{ $order->user->name ?? 'Guest' }}</td>
                                <td>PKR {{ number_format($order->total_amount) }}</td>
                                <td><span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-3">No orders yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Users -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-bold">New Users</span>
                <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-dark">View All</a>
            </div>
            <div class="card-body p-0">
                @forelse($recentUsers as $user)
                <div class="d-flex align-items-center p-3 border-bottom">
                    <div style="width:38px;height:38px;background:#2c3e50;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:bold;flex-shrink:0;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div class="ms-3">
                        <p class="mb-0 fw-bold small">{{ $user->name }}</p>
                        <small class="text-muted">{{ $user->email }}</small>
                    </div>
                    <span class="ms-auto badge bg-{{ $user->role=='admin'?'danger':($user->role=='vendor'?'warning text-dark':'primary') }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
                @empty
                <p class="p-3 text-muted">No users yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
