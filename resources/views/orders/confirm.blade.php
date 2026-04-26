@extends('layouts.app')
@section('title', 'Order Confirmed - FAM Fashion Hub')

@section('content')

<div class="page-content content-inner-2 pt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7 text-center">
        <div class="card shadow-lg border-0">
          <div class="card-body py-5">
            <div style="font-size:5rem;">✅</div>
            <h2 class="mt-3 text-success">Order Placed Successfully!</h2>
            <p class="text-muted">Thank you for shopping with FAM Fashion Hub!</p>

            <div class="alert alert-light border mt-3 text-start">
              <p class="mb-1"><strong>Order Number:</strong> <span class="text-dark">{{ $order->order_number }}</span></p>
              <p class="mb-1"><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
              <p class="mb-1"><strong>Payment:</strong> {{ strtoupper($order->payment_method) }}</p>
              <p class="mb-1"><strong>Status:</strong>
                <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
              </p>
              <p class="mb-0"><strong>Total:</strong> <strong class="text-dark">PKR {{ number_format($order->total_amount) }}</strong></p>
            </div>

            <!-- Order Items -->
            <div class="text-start mt-3">
              <h6 class="fw-bold border-bottom pb-2">Items Ordered:</h6>
              @foreach($order->items as $item)
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                  <div>
                    <p class="mb-0">{{ $item->product->name ?? 'Product' }}</p>
                    <small class="text-muted">Qty: {{ $item->quantity }}</small>
                  </div>
                  <span class="fw-bold">PKR {{ number_format($item->price * $item->quantity) }}</span>
                </div>
              @endforeach
              <div class="d-flex justify-content-between pt-2">
                <strong>Total</strong>
                <strong>PKR {{ number_format($order->total_amount) }}</strong>
              </div>
            </div>

            <div class="d-flex gap-3 justify-content-center mt-4">
              <a href="{{ route('orders.history') }}" class="btn btn-dark">View My Orders</a>
              <a href="{{ route('products.index') }}" class="btn btn-outline-dark">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
