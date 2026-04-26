@extends('layouts.app')
@section('title', 'Shop - FAM Fashion Hub')

@section('content')

<div class="page-content">
  <!-- Page Banner -->
  <div class="dz-bnr-inr dz-bnr-inr-sm" style="background:#2c3e50; padding:40px 0;">
    <div class="container">
      <h2 class="text-white text-center">Our Products</h2>
    </div>
  </div>

  <div class="content-inner-2 pt-4">
    <div class="container">
      <div class="row">

        <!-- SIDEBAR FILTERS -->
        <div class="col-xl-3 col-lg-4 mb-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <form method="GET" action="{{ route('products.index') }}">
                <h5 class="mb-3">🔍 Filter Products</h5>

                <!-- Search -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Search</label>
                  <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
                </div>

                <!-- Category -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Category</label>
                  <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                      <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                        {{ $cat->name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <!-- Price -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Price Range (PKR)</label>
                  <div class="row g-2">
                    <div class="col-6">
                      <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                    </div>
                    <div class="col-6">
                      <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                    </div>
                  </div>
                </div>

                <!-- Size -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Size</label>
                  <select name="size" class="form-select">
                    <option value="">All Sizes</option>
                    @foreach(['XS','S','M','L','XL','XXL','36','37','38','39','40','41','42'] as $sz)
                      <option value="{{ $sz }}" {{ request('size') == $sz ? 'selected' : '' }}>{{ $sz }}</option>
                    @endforeach
                  </select>
                </div>

                <!-- Sort -->
                <div class="mb-3">
                  <label class="form-label fw-bold">Sort By</label>
                  <select name="sort" class="form-select">
                    <option value="">Default</option>
                    <option value="newest"     {{ request('sort')=='newest'     ? 'selected':'' }}>Newest</option>
                    <option value="price_asc"  {{ request('sort')=='price_asc'  ? 'selected':'' }}>Price: Low → High</option>
                    <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected':'' }}>Price: High → Low</option>
                  </select>
                </div>

                <button type="submit" class="btn btn-dark w-100">Apply Filters</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 mt-2">Clear</a>
              </form>
            </div>
          </div>
        </div>

        <!-- PRODUCTS GRID -->
        <div class="col-xl-9 col-lg-8">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ session('success') }} <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
          @endif

          <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="text-muted mb-0">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products</p>
          </div>

          @if($products->isEmpty())
            <div class="text-center py-5">
              <h4>No products found</h4>
              <p>Try adjusting your filters.</p>
              <a href="{{ route('products.index') }}" class="btn btn-dark">View All Products</a>
            </div>
          @else
            <div class="row g-3">
              @foreach($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="card h-100 product-card shadow-sm border-0">
                    <div style="position:relative; overflow:hidden;">
                      <a href="{{ route('products.show', $product->slug) }}">
                        <img src="{{ asset($product->first_image) }}" alt="{{ $product->name }}"
                             class="card-img-top" style="height:240px; object-fit:cover;"
                             onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                      </a>
                      @if($product->sale_price)
                        <span class="badge bg-danger" style="position:absolute;top:10px;left:10px;">SALE</span>
                      @endif
                      @if($product->featured)
                        <span class="badge bg-warning text-dark" style="position:absolute;top:10px;right:10px;">⭐ Featured</span>
                      @endif

                      <!-- Quick actions overlay -->
                      <div class="product-actions" style="position:absolute;bottom:-50px;left:0;right:0;background:rgba(0,0,0,0.7);padding:8px;text-align:center;transition:bottom .3s;">
                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                          <input type="hidden" name="quantity" value="1">
                          <button type="submit" class="btn btn-sm btn-warning me-1">🛒 Add to Cart</button>
                        </form>
                        @auth
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-outline-light">♡</button>
                        </form>
                        @endauth
                      </div>
                    </div>
                    <div class="card-body">
                      <small class="text-muted">{{ $product->category->name ?? 'Uncategorized' }}</small>
                      <h6 class="card-title mt-1">
                        <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">
                          {{ $product->name }}
                        </a>
                      </h6>
                      <div>
                        @if($product->sale_price)
                          <span class="fw-bold text-danger">PKR {{ number_format($product->sale_price) }}</span>
                          <span class="text-muted text-decoration-line-through ms-2">PKR {{ number_format($product->price) }}</span>
                        @else
                          <span class="fw-bold">PKR {{ number_format($product->price) }}</span>
                        @endif
                      </div>
                      <small class="text-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                        {{ $product->stock > 0 ? "In Stock ({$product->stock})" : 'Out of Stock' }}
                      </small>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
              {{ $products->links('pagination::bootstrap-5') }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.product-card:hover .product-actions { bottom: 0 !important; }
.product-card { transition: box-shadow .2s; }
.product-card:hover { box-shadow: 0 8px 25px rgba(0,0,0,.15) !important; }

.pagination {
  justify-content: center;
}
.pagination .page-link {
  font-size: 14px;
  padding: 6px 12px;
  color: #2c3e50;
  border-radius: 4px !important;
}
.pagination .page-item.active .page-link {
  background-color: #2c3e50;
  border-color: #2c3e50;
}
.pagination .page-link svg {
  display: none;
}
.pagination .prev .page-link::before { content: '«'; }
.pagination .next .page-link::before { content: '»'; }
</style>
@endsection