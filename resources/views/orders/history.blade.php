@extends('layouts.app')
@section('title', 'My Orders - FAM Fashion Hub')

@section('content')

<div class="page-content">
  <div class="dz-bnr-inr dz-bnr-inr-sm" style="background:#2c3e50; padding:40px 0;">
    <div class="container"><h2 class="text-white text-center">My Orders</h2></div>
  </div>

  <div class="content-inner-2 pt-4">
    <div class="container">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if($orders->isEmpty())
        <div class="text-center py-5">
          <h4>No orders yet!</h4>
          <a href="{{ route('products.index') }}" class="btn btn-dark mt-2">Start Shopping</a>
        </div>
      @else
        <div class="row">
          <div class="col-12">
            @foreach($orders as $order)
              <div class="card shadow-sm mb-3">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                  <div>
                    <strong>{{ $order->order_number }}</strong>
                    <small class="text-muted ms-3">{{ $order->created_at->format('d M Y') }}</small>
                  </div>
                  <div class="d-flex gap-2 align-items-center">
                    @php
                      $statusColors = [
                        'pending'    => 'warning',
                        'processing' => 'info',
                        'shipped'    => 'primary',
                        'delivered'  => 'success',
                        'cancelled'  => 'danger',
                      ];
                      $color = $statusColors[$order->status] ?? 'secondary';
                    @endphp
                    <span class="badge bg-{{ $color }}">{{ ucfirst($order->status) }}</span>
                    <span class="badge bg-{{ $order->payment_status === 'paid' ? 'success' : 'warning text-dark' }}">
                      {{ ucfirst($order->payment_status ?? 'pending') }}
                    </span>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <p class="mb-1 small text-muted">Shipping to: {{ $order->shipping_address }}</p>
                      <p class="mb-0 small text-muted">Payment: {{ strtoupper($order->payment_method ?? 'COD') }}</p>
                    </div>
                    <div class="col-md-3 text-md-center">
                      <strong class="fs-5">PKR {{ number_format($order->total_amount) }}</strong>
                    </div>
                    <div class="col-md-3 text-md-end mt-2 mt-md-0">
                      <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-dark me-1">View Details</a>
                      @if(in_array($order->status, ['pending','processing']))
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Cancel this order?')">Cancel</button>
                        </form>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            <div>{{ $orders->links() }}</div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

@endsection
