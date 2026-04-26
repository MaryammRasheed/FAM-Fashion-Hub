@extends('layouts.app')
@section('title', 'Shopping Cart - FAM Fashion Hub')

@section('content')

<div class="page-content">
  <div class="dz-bnr-inr dz-bnr-inr-sm" style="background:#2c3e50; padding:40px 0;">
    <div class="container"><h2 class="text-white text-center">Shopping Cart</h2></div>
  </div>

  <div class="content-inner-2 pt-4">
    <div class="container">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">{{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
      @endif

      @if(!$cart->items || $cart->items->isEmpty())
        <div class="text-center py-5">
          <img src="{{ asset('images/confirmation.png') }}" alt="Empty Cart" style="max-width:200px;" onerror="this.style.display='none'">
          <h3 class="mt-3">Your cart is empty!</h3>
          <p class="text-muted">Looks like you haven't added anything yet.</p>
          <a href="{{ route('products.index') }}" class="btn btn-dark btn-lg mt-2">🛍️ Start Shopping</a>
        </div>
      @else
        <div class="row g-4">
          <!-- Cart Items -->
          <div class="col-lg-8">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <span>🛒 Cart Items ({{ $cart->items->count() }})</span>
                <form action="{{ route('cart.clear') }}" method="POST" class="mb-0">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-outline-light"
                    onclick="return confirm('Clear entire cart?')">🗑️ Clear All</button>
                </form>
              </div>
              <div class="card-body p-0">
                @foreach($cart->items as $item)
                  @php
                    $img = is_array($item->product->images) && count($item->product->images)
                           ? $item->product->images[0] : 'images/shop/product/1.png';
                  @endphp
                  <div class="d-flex align-items-center p-3 border-bottom" id="cart-item-{{ $item->id }}">
                    <!-- Image -->
                    <img src="{{ asset($img) }}" alt="{{ $item->product->name }}"
                         style="width:90px;height:90px;object-fit:cover;border-radius:8px;"
                         onerror="this.src='{{ asset('images/shop/product/1.png') }}'">

                    <!-- Details -->
                    <div class="flex-grow-1 ms-3">
                      <h6 class="mb-1">
                        <a href="{{ route('products.show', $item->product->slug) }}" class="text-dark text-decoration-none">
                          {{ $item->product->name }}
                        </a>
                      </h6>
                      <p class="text-muted small mb-1">PKR {{ number_format($item->price) }} each</p>
                      <p class="fw-bold mb-0">Subtotal: <span class="item-subtotal-{{ $item->id }}">PKR {{ number_format($item->price * $item->quantity) }}</span></p>
                    </div>

                    <!-- Quantity -->
                    <div class="d-flex align-items-center gap-2 mx-3">
                      <button class="btn btn-outline-secondary btn-sm" onclick="updateQty({{ $item->id }}, -1)">−</button>
                      <input type="number" id="qty-{{ $item->id }}" value="{{ $item->quantity }}"
                             min="1" class="form-control text-center" style="width:65px;">
                      <button class="btn btn-outline-secondary btn-sm" onclick="updateQty({{ $item->id }}, 1)">+</button>
                    </div>

                    <!-- Remove -->
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger btn-sm">✕</button>
                    </form>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="mt-3">
              <a href="{{ route('products.index') }}" class="btn btn-outline-dark">← Continue Shopping</a>
            </div>
          </div>

          <!-- Order Summary -->
          <div class="col-lg-4">
            <div class="card shadow-sm">
              <div class="card-header bg-dark text-white"><h6 class="mb-0">Order Summary</h6></div>
              <div class="card-body">
                <table class="table table-borderless mb-0">
                  <tr>
                    <td>Subtotal</td>
                    <td class="text-end fw-bold" id="cart-total">PKR {{ number_format($cart->total) }}</td>
                  </tr>
                  <tr>
                    <td>Shipping</td>
                    <td class="text-end text-success">FREE</td>
                  </tr>
                  <tr class="border-top">
                    <td><strong>Total</strong></td>
                    <td class="text-end"><strong class="text-dark" id="grand-total">PKR {{ number_format($cart->total) }}</strong></td>
                  </tr>
                </table>
              </div>
              <div class="card-footer">
                @auth
                  <a href="{{ route('checkout') }}" class="btn btn-dark w-100 btn-lg">Proceed to Checkout →</a>
                @else
                  <a href="{{ route('login') }}" class="btn btn-dark w-100 btn-lg">Login to Checkout</a>
                  <p class="text-center text-muted small mt-2">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                @endauth
              </div>
            </div>

            <!-- Payment Icons -->
            <div class="card shadow-sm mt-3">
              <div class="card-body text-center">
                <p class="text-muted small mb-2">We accept:</p>
                <div class="d-flex justify-content-center gap-3">
                  <img src="{{ asset('images/shop/payment/cash.svg') }}" alt="Cash" style="height:30px;" onerror="this.style.display='none'">
                  <img src="{{ asset('images/shop/payment/bank.svg') }}" alt="Bank" style="height:30px;" onerror="this.style.display='none'">
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>


<script>
function updateQty(itemId, delta) {
    const input = document.getElementById('qty-' + itemId);
    const newQty = Math.max(1, parseInt(input.value) + delta);
    input.value = newQty;

    fetch('/cart/update/' + itemId, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: newQty })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.item-subtotal-' + itemId).textContent = 'PKR ' + data.subtotal.toLocaleString();
            document.getElementById('cart-total').textContent = 'PKR ' + data.total.toLocaleString();
            document.getElementById('grand-total').textContent = 'PKR ' + data.total.toLocaleString();
        }
    })
    .catch(() => location.reload());
}
</script>
@endsection
