@extends('layouts.app')
@section('title', $product->name . ' - FAM Fashion Hub')

@section('content')

<div class="page-content">
  <div class="content-inner-2 pt-4">
    <div class="container">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
          @if($product->category)
            <li class="breadcrumb-item"><a href="{{ route('category.filter', $product->category->slug) }}">{{ $product->category->name }}</a></li>
          @endif
          <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
      </nav>

      <div class="row g-4">
        <!-- Product Images -->
        <div class="col-lg-6">
          @php $mainImg = count($images) ? $images[0] : 'images/shop/product/1.png'; @endphp
          <img id="mainImage" src="{{ asset($mainImg) }}" alt="{{ $product->name }}"
               class="img-fluid rounded shadow" style="width:100%;height:480px;object-fit:cover;"
               onerror="this.src='{{ asset('images/shop/product/1.png') }}'">

          @if(count($images) > 1)
          <div class="d-flex gap-2 mt-3 flex-wrap">
            @foreach($images as $img)
              <img src="{{ asset($img) }}" alt="thumb"
                   class="rounded cursor-pointer border"
                   style="width:80px;height:80px;object-fit:cover;cursor:pointer;"
                   onclick="document.getElementById('mainImage').src=this.src"
                   onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
            @endforeach
          </div>
          @endif
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
          <small class="text-muted">{{ $product->category->name ?? '' }}</small>
          <h2 class="mt-1 mb-2">{{ $product->name }}</h2>

          <!-- Rating -->
          @php $avgRating = $product->average_rating; @endphp
          <div class="mb-3">
            @for($i=1;$i<=5;$i++)
              <span style="color:{{ $i <= $avgRating ? '#f59e0b' : '#d1d5db' }};font-size:18px;">★</span>
            @endfor
            <small class="text-muted ms-1">({{ $product->reviews->count() }} reviews)</small>
          </div>

          <!-- Price -->
          <div class="mb-3">
            @if($product->sale_price)
              <h3 class="text-danger mb-0">PKR {{ number_format($product->sale_price) }}</h3>
              <p class="text-muted text-decoration-line-through">PKR {{ number_format($product->price) }}</p>
              <span class="badge bg-danger">{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% OFF</span>
            @else
              <h3 class="mb-0">PKR {{ number_format($product->price) }}</h3>
            @endif
          </div>

          <!-- Stock -->
          <p class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }} fw-bold">
            {{ $product->stock > 0 ? "✅ In Stock ({$product->stock} available)" : '❌ Out of Stock' }}
          </p>

          <!-- SKU -->
          <p class="text-muted small">SKU: {{ $product->sku }}</p>

          <!-- Description -->
          <p class="mb-3">{{ $product->description }}</p>

          <!-- Add to Cart Form -->
          @if($product->stock > 0)
          <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <!-- Size Selection -->
            @if(count($sizes) > 0)
            <div class="mb-3">
              <label class="fw-bold">Size:</label>
              <div class="d-flex gap-2 flex-wrap mt-1">
                @foreach($sizes as $size)
                  <div>
                    <input type="radio" name="size" id="size_{{ $size }}" value="{{ $size }}" class="d-none">
                    <label for="size_{{ $size }}" class="border rounded px-3 py-1 cursor-pointer size-btn">{{ $size }}</label>
                  </div>
                @endforeach
              </div>
            </div>
            @endif

            <!-- Color Selection -->
            @if(count($colors) > 0)
            <div class="mb-3">
              <label class="fw-bold">Color:</label>
              <div class="d-flex gap-2 flex-wrap mt-1">
                @foreach($colors as $color)
                  <div>
                    <input type="radio" name="color" id="color_{{ $color }}" value="{{ $color }}" class="d-none">
                    <label for="color_{{ $color }}" class="border rounded px-3 py-1 cursor-pointer">{{ $color }}</label>
                  </div>
                @endforeach
              </div>
            </div>
            @endif

            <!-- Quantity -->
            <div class="mb-3">
              <label class="fw-bold">Quantity:</label>
              <div class="d-flex align-items-center gap-2 mt-1">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeQty(-1)">−</button>
                <input type="number" name="quantity" id="qty" value="1" min="1" max="{{ $product->stock }}"
                       class="form-control text-center" style="width:70px;">
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeQty(1)">+</button>
              </div>
            </div>

            <div class="d-flex gap-2 flex-wrap">
              <button type="submit" class="btn btn-dark btn-lg">🛒 Add to Cart</button>
              @auth
              <a href="{{ route('wishlist.add', $product->id) }}" class="btn btn-outline-dark btn-lg">♡ Wishlist</a>
              @endauth
            </div>
          </form>
          @else
            <button class="btn btn-secondary btn-lg" disabled>Out of Stock</button>
          @endif
        </div>
      </div>

      <!-- Reviews Section -->
      <div class="row mt-5">
        <div class="col-12">
          <h4 class="border-bottom pb-2">Customer Reviews ({{ $product->reviews->count() }})</h4>

          @auth
          <form action="{{ route('reviews.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="mb-2">
              <label class="fw-bold">Your Rating:</label>
              <select name="rating" class="form-select w-auto d-inline-block ms-2">
                @for($i=5;$i>=1;$i--)
                  <option value="{{ $i }}">{{ $i }} ★</option>
                @endfor
              </select>
            </div>
            <textarea name="comment" class="form-control mb-2" rows="3" placeholder="Write your review..."></textarea>
            <button type="submit" class="btn btn-dark btn-sm">Submit Review</button>
          </form>
          @else
            <p><a href="{{ route('login') }}">Login</a> to leave a review.</p>
          @endauth

          @foreach($product->reviews as $review)
          <div class="border-bottom mb-3 pb-3">
            <div class="d-flex justify-content-between">
              <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
              <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
            </div>
            <div>
              @for($i=1;$i<=5;$i++)
                <span style="color:{{ $i <= $review->rating ? '#f59e0b' : '#d1d5db' }};">★</span>
              @endfor
            </div>
            <p class="mt-1 mb-0">{{ $review->comment }}</p>
          </div>
          @endforeach
          @if($product->reviews->isEmpty()) <p class="text-muted">No reviews yet. Be the first!</p> @endif
        </div>
      </div>

      <!-- Related Products -->
      @if($related->count())
      <div class="mt-5">
        <h4 class="border-bottom pb-2">Related Products</h4>
        <div class="row g-3">
          @foreach($related as $rp)
            @php $rImg = is_array($rp->images) && count($rp->images) ? $rp->images[0] : 'images/shop/product/1.png'; @endphp
            <div class="col-lg-3 col-md-4 col-6">
              <div class="card border-0 shadow-sm h-100">
                <a href="{{ route('products.show', $rp->slug) }}">
                  <img src="{{ asset($rImg) }}" class="card-img-top" alt="{{ $rp->name }}"
                       style="height:200px;object-fit:cover;"
                       onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                </a>
                <div class="card-body">
                  <h6><a href="{{ route('products.show', $rp->slug) }}" class="text-dark text-decoration-none">{{ $rp->name }}</a></h6>
                  <p class="mb-0 fw-bold">PKR {{ number_format($rp->sale_price ?? $rp->price) }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>
</div>


<script>
function changeQty(delta) {
    const el = document.getElementById('qty');
    el.value = Math.max(1, Math.min(parseInt(el.max), parseInt(el.value) + delta));
}
document.querySelectorAll('.size-btn, label[for^="color_"]').forEach(lbl => {
    lbl.style.cursor = 'pointer';
    lbl.addEventListener('click', function() {
        const name = document.getElementById(this.getAttribute('for')).name;
        document.querySelectorAll(`input[name="${name}"] + label`).forEach(l => l.classList.remove('bg-dark','text-white'));
        this.classList.add('bg-dark','text-white');
    });
});
</script>
@endsection
