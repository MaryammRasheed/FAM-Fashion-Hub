@extends('layouts.app')
@section('title', 'My Wishlist - FAM Fashion Hub')

@section('content')

<div class="page-content content-inner-2 pt-4">
  <div class="container">
    <h3 class="mb-4">♡ My Wishlist</h3>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($wishlists) && $wishlists->isEmpty())
      <div class="text-center py-5">
        <h4>Your wishlist is empty!</h4>
        <a href="{{ route('products.index') }}" class="btn btn-dark mt-2">Browse Products</a>
      </div>
    @else
      <div class="row g-3">
        @foreach($wishlists ?? [] as $wish)
          @php
            $img = is_array($wish->product->images ?? null) && count($wish->product->images)
                   ? $wish->product->images[0] : 'images/shop/product/1.png';
          @endphp
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm">
              <a href="{{ route('products.show', $wish->product->slug) }}">
                <img src="{{ asset($img) }}" class="card-img-top" style="height:220px;object-fit:cover;"
                     onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
              </a>
              <div class="card-body">
                <h6><a href="{{ route('products.show', $wish->product->slug) }}" class="text-dark text-decoration-none">{{ $wish->product->name }}</a></h6>
                <p class="fw-bold mb-2">PKR {{ number_format($wish->product->sale_price ?? $wish->product->price) }}</p>
                <div class="d-flex gap-2">
                  <form action="{{ route('cart.add') }}" method="POST" class="flex-grow-1">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $wish->product_id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-dark btn-sm w-100">Add to Cart</button>
                  </form>
                  <form action="{{ route('wishlist.remove', $wish->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">✕</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</div>

@endsection
