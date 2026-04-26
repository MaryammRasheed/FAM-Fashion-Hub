@extends('layouts.admin')
@section('page-title', 'Reports & Analytics')
@section('content')
<div class="row g-4 mb-4">
  <div class="col-md-3">
    <div class="card shadow-sm text-center p-3">
      <div style="font-size:2rem;">💰</div>
      <h3 class="mt-2">PKR {{ number_format($totalRevenue) }}</h3>
      <p class="text-muted mb-0">Total Revenue</p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center p-3">
      <div style="font-size:2rem;">🛒</div>
      <h3 class="mt-2">{{ $totalOrders }}</h3>
      <p class="text-muted mb-0">Total Orders</p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center p-3">
      <div style="font-size:2rem;">⏳</div>
      <h3 class="mt-2">{{ $pendingOrders }}</h3>
      <p class="text-muted mb-0">Pending Orders</p>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center p-3">
      <div style="font-size:2rem;">👥</div>
      <h3 class="mt-2">{{ $totalCustomers }}</h3>
      <p class="text-muted mb-0">Total Customers</p>
    </div>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-header"><strong>🏆 Top Products by Orders</strong></div>
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-dark"><tr><th>#</th><th>Product</th><th>Orders</th><th>Price</th></tr></thead>
      <tbody>
        @forelse($topProducts as $i => $product)
        <tr>
          <td>{{ $i + 1 }}</td>
          <td>{{ $product->name }}</td>
          <td><span class="badge bg-dark">{{ $product->order_items_count }}</span></td>
          <td>PKR {{ number_format($product->price) }}</td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center text-muted py-3">No data yet</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
