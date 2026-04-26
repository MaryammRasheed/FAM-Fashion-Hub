@extends('layouts.app')
@section('title', 'My Profile - FAM Fashion Hub')

@section('content')

<div class="page-content content-inner-2 pt-4">
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
      <!-- Sidebar -->
      <div class="col-lg-3">
        <div class="card shadow-sm text-center p-3">
          <div class="mb-3">
            <div style="width:80px;height:80px;background:#2c3e50;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;color:white;font-size:2rem;">
              {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
          </div>
          <h5>{{ auth()->user()->name }}</h5>
          <p class="text-muted small">{{ auth()->user()->email }}</p>
          <span class="badge bg-dark">{{ ucfirst(auth()->user()->role) }}</span>
        </div>
        <div class="list-group shadow-sm mt-3">
          <a href="{{ route('profile.index') }}" class="list-group-item list-group-item-action active">👤 My Profile</a>
          <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action">✏️ Edit Profile</a>
          <a href="{{ route('orders.history') }}" class="list-group-item list-group-item-action">📦 My Orders</a>
          <a href="{{ route('wishlist.index') }}" class="list-group-item list-group-item-action">♡ Wishlist</a>
          <a href="{{ route('profile.change-password') }}" class="list-group-item list-group-item-action">🔒 Change Password</a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action text-danger w-100 text-start border-0">🚪 Logout</button>
          </form>
        </div>
      </div>

      <!-- Profile Info -->
      <div class="col-lg-9">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>👤 Profile Information</span>
            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-light">Edit</a>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="text-muted small">Full Name</label>
                <p class="fw-bold">{{ auth()->user()->name }}</p>
              </div>
              <div class="col-md-6">
                <label class="text-muted small">Email</label>
                <p class="fw-bold">{{ auth()->user()->email }}</p>
              </div>
              <div class="col-md-6">
                <label class="text-muted small">Role</label>
                <p class="fw-bold">{{ ucfirst(auth()->user()->role) }}</p>
              </div>
              <div class="col-md-6">
                <label class="text-muted small">Member Since</label>
                <p class="fw-bold">{{ auth()->user()->created_at->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Orders -->
        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>📦 Recent Orders</span>
            <a href="{{ route('orders.history') }}" class="btn btn-sm btn-light">View All</a>
          </div>
          <div class="card-body p-0">
            @php $recentOrders = \App\Models\Order::where('user_id', auth()->id())->latest()->take(5)->get(); @endphp
            @if($recentOrders->isEmpty())
              <p class="p-3 text-muted mb-0">No orders yet. <a href="{{ route('products.index') }}">Start shopping!</a></p>
            @else
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead class="table-light"><tr><th>Order #</th><th>Date</th><th>Total</th><th>Status</th></tr></thead>
                  <tbody>
                    @foreach($recentOrders as $order)
                      <tr>
                        <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->order_number }}</a></td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>PKR {{ number_format($order->total_amount) }}</td>
                        <td><span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
