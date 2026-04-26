@extends('layouts.vendor')
@section('title', 'Vendor Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div style="font-size:2rem; color:#6366f1;">📦</div>
            <h3 class="mt-2">{{ $productsCount }}</h3>
            <p class="text-muted mb-0">My Products</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div style="font-size:2rem; color:#10b981;">🛒</div>
            <h3 class="mt-2">{{ $ordersCount }}</h3>
            <p class="text-muted mb-0">Total Orders</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div style="font-size:2rem; color:#f59e0b;">💰</div>
            <h3 class="mt-2">PKR {{ number_format($revenue) }}</h3>
            <p class="text-muted mb-0">Total Revenue</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card text-center">
            <div style="font-size:2rem; color:#ef4444;">⚠️</div>
            <h3 class="mt-2">{{ $lowStockProducts }}</h3>
            <p class="text-muted mb-0">Low Stock Items</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">Recent Orders</h6>
                <a href="{{ route('vendor.orders') }}" class="btn btn-sm btn-outline-dark">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentOrders->isEmpty())
                    <p class="p-4 text-muted">No orders yet.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr><th>Order</th><th>Product</th><th>Qty</th><th>Amount</th><th>Status</th></tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $item)
                                <tr>
                                    <td><small>#{{ $item->order->order_number ?? '-' }}</small></td>
                                    <td>{{ $item->product->name ?? '-' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>PKR {{ number_format($item->price * $item->quantity) }}</td>
                                    <td><span class="badge bg-warning text-dark">{{ ucfirst($item->order->status ?? 'pending') }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Quick Actions</h6></div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('vendor.products.create') }}" class="btn btn-dark"><i class="fas fa-plus me-2"></i>Add New Product</a>
                <a href="{{ route('vendor.products') }}" class="btn btn-outline-dark"><i class="fas fa-boxes me-2"></i>Manage Products</a>
                <a href="{{ route('vendor.inventory') }}" class="btn btn-outline-dark"><i class="fas fa-warehouse me-2"></i>Update Inventory</a>
                <a href="{{ route('vendor.earnings') }}" class="btn btn-outline-success"><i class="fas fa-chart-line me-2"></i>View Earnings</a>
            </div>
        </div>
    </div>
</div>
@endsection
