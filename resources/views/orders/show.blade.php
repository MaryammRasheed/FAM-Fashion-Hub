@extends('layouts.app')
@section('title', 'Order Details - FAM Fashion Hub')

@section('content')

<div class="page-content content-inner-2 pt-4">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Order Details</h3>
      <a href="{{ route('orders.history') }}" class="btn btn-outline-dark btn-sm">← My Orders</a>
    </div>

    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card shadow-sm mb-3">
          <div class="card-header bg-dark text-white">Order Items</div>
          <div class="card-body p-0">
            @foreach($order->items as $item)
              @php
                $img = is_array($item->product->images ?? null) && count($item->product->images)
                       ? $item->product->images[0] : 'images/shop/product/1.png';
              @endphp
              <div class="d-flex align-items-center p-3 border-bottom">
                <img src="{{ asset($img) }}" style="width:70px;height:70px;object-fit:cover;border-radius:6px;"
                     onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                <div class="flex-grow-1 ms-3">
                  <p class="mb-0 fw-bold">{{ $item->product->name ?? 'Product' }}</p>
                  <small class="text-muted">PKR {{ number_format($item->price) }} × {{ $item->quantity }}</small>
                </div>
                <span class="fw-bold">PKR {{ number_format($item->price * $item->quantity) }}</span>
              </div>
            @endforeach
          </div>
          <div class="card-footer text-end">
            <strong>Total: PKR {{ number_format($order->total_amount) }}</strong>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card shadow-sm mb-3">
          <div class="card-header bg-dark text-white">Order Info</div>
          <div class="card-body">
            <p><strong>Order #:</strong> {{ $order->order_number }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            <p><strong>Status:</strong>
              <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
            </p>
            <p><strong>Payment:</strong> {{ strtoupper($order->payment_method ?? 'COD') }}</p>
            <p class="mb-0"><strong>Address:</strong> {{ $order->shipping_address }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
