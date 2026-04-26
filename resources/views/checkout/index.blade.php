@extends('layouts.app')
@section('title', 'Checkout - FAM Fashion Hub')

@section('content')

<div class="page-content">
  <div class="dz-bnr-inr dz-bnr-inr-sm" style="background:#2c3e50; padding:40px 0;">
    <div class="container"><h2 class="text-white text-center">Checkout</h2></div>
  </div>

  <div class="content-inner-2 pt-4">
    <div class="container">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <form action="{{ route('orders.place') }}" method="POST">
        @csrf
        <div class="row g-4">

          <!-- Left: Shipping Info -->
          <div class="col-lg-7">
            <div class="card shadow-sm mb-4">
              <div class="card-header bg-dark text-white"><h6 class="mb-0">📦 Shipping Information</h6></div>
              <div class="card-body">
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label fw-bold">Full Name *</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Phone Number *</label>
                    <input type="text" name="phone" class="form-control" placeholder="03XX-XXXXXXX"
                           value="{{ old('phone') }}" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">City *</label>
                    <input type="text" name="city" class="form-control" placeholder="e.g. Lahore"
                           value="{{ old('city') }}" required>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold">Shipping Address *</label>
                    <textarea name="shipping_address" class="form-control" rows="3"
                              placeholder="House No, Street, Area, City" required>{{ old('shipping_address') }}</textarea>
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-bold">Order Notes (Optional)</label>
                    <textarea name="notes" class="form-control" rows="2"
                              placeholder="Any special instructions...">{{ old('notes') }}</textarea>
                  </div>
                </div>
              </div>
            </div>

            <!-- Payment Method -->
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-white"><h6 class="mb-0">💳 Payment Method</h6></div>
              <div class="card-body">
                <div class="form-check mb-3 p-3 border rounded">
                  <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                  <label class="form-check-label" for="cod">
                    <strong>💵 Cash on Delivery (COD)</strong>
                    <br><small class="text-muted">Pay when you receive your order</small>
                  </label>
                </div>
                <div class="form-check p-3 border rounded">
                  <input class="form-check-input" type="radio" name="payment_method" id="bank" value="card">
                  <label class="form-check-label" for="bank">
                    <strong>🏦 Bank Transfer</strong>
                    <br><small class="text-muted">Transfer to our bank account (details via email)</small>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Right: Order Summary -->
          <div class="col-lg-5">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-white"><h6 class="mb-0">🧾 Order Summary</h6></div>
              <div class="card-body p-0">
                @foreach($cart->items as $item)
                  @php
                    $img = is_array($item->product->images) && count($item->product->images)
                           ? $item->product->images[0] : 'images/shop/product/1.png';
                  @endphp
                  <div class="d-flex align-items-center p-3 border-bottom">
                    <img src="{{ asset($img) }}" alt="{{ $item->product->name }}"
                         style="width:60px;height:60px;object-fit:cover;border-radius:6px;"
                         onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                    <div class="flex-grow-1 ms-3">
                      <p class="mb-0 fw-bold small">{{ $item->product->name }}</p>
                      <small class="text-muted">Qty: {{ $item->quantity }}</small>
                    </div>
                    <span class="fw-bold">PKR {{ number_format($item->price * $item->quantity) }}</span>
                  </div>
                @endforeach
              </div>
              <div class="card-footer">
                <table class="table table-borderless mb-3">
                  <tr><td>Subtotal</td><td class="text-end">PKR {{ number_format($cart->total) }}</td></tr>
                  <tr><td>Shipping</td><td class="text-end text-success">FREE</td></tr>
                  <tr class="border-top">
                    <td><strong>Total</strong></td>
                    <td class="text-end"><strong class="fs-5">PKR {{ number_format($cart->total) }}</strong></td>
                  </tr>
                </table>
                <button type="submit" class="btn btn-dark w-100 btn-lg">
                  ✅ Place Order — PKR {{ number_format($cart->total) }}
                </button>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">← Back to Cart</a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
