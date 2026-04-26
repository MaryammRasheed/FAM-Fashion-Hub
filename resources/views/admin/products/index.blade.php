@extends('layouts.admin')
@section('page-title', 'Manage Products')

@section('content')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

{{-- ADD PRODUCT FORM --}}
<div class="card border-0 shadow-sm mb-4">
  <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
    <div>
      <h5 class="mb-0 fw-bold">🛍️ Product Management</h5>
      <small class="text-muted">Add and manage your store products</small>
    </div>
    
  </div>

  <div class="collapse" id="addProductForm">
    <div class="card-body" style="background:#f8f9fa;">
      <h6 class="fw-bold text-primary mb-3">➕ New Product Details</h6>
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

          {{-- Name --}}
          <div class="col-md-6">
            <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="e.g. Nike Air Max" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          {{-- Category --}}
          <div class="col-md-6">
            <label class="form-label fw-semibold">Category</label>
            <select name="category_id" class="form-select">
              <option value="">-- Select Category --</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Price --}}
          <div class="col-md-4">
            <label class="form-label fw-semibold">Price (PKR) <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text bg-white">PKR</span>
              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                     value="{{ old('price') }}" placeholder="2500" min="0" step="0.01" required>
            </div>
            @error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
          </div>

          {{-- Sale Price --}}
          <div class="col-md-4">
            <label class="form-label fw-semibold">Sale Price <span class="text-muted small">(optional)</span></label>
            <div class="input-group">
              <span class="input-group-text bg-white">PKR</span>
              <input type="number" name="sale_price" class="form-control"
                     value="{{ old('sale_price') }}" placeholder="1999" min="0" step="0.01">
            </div>
          </div>

          {{-- Stock --}}
          <div class="col-md-4">
            <label class="form-label fw-semibold">Stock <span class="text-danger">*</span></label>
            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                   value="{{ old('stock') }}" placeholder="100" min="0" required>
            @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>

          {{-- Image --}}
          <div class="col-md-5">
            <label class="form-label fw-semibold">Product Image</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                   accept="image/*" onchange="previewImage(this)">
            <small class="text-muted">JPG, PNG, WEBP — max 2MB</small>
            @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            <img id="imagePreview" src="#" alt="Preview"
                 class="mt-2 rounded d-none border" style="max-height:110px; object-fit:cover;">
          </div>

          {{-- Description --}}
          <div class="col-md-7">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4"
                      placeholder="Write about the product...">{{ old('description') }}</textarea>
          </div>

          {{-- Buttons --}}
          <div class="col-12 pt-1 d-flex gap-2">
            <button type="submit" class="btn btn-success px-4">✅ Save Product</button>
            <button type="reset" class="btn btn-outline-secondary px-4">🔄 Reset</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

{{-- PRODUCTS TABLE --}}
<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3">
    <h6 class="mb-0 fw-bold">
      📦 All Products
      <span class="badge bg-primary ms-1">{{ $products->total() }}</span>
    </h6>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
          <tr>
             <td class="text-muted small">{{ $loop->iteration }}</td>

            {{-- Image --}}
            <td>
              @if($product->first_image !== 'images/shop/product/1.png')
                <img src="{{ asset($product->first_image) }}"
                     style="width:50px;height:50px;object-fit:cover;border-radius:8px;border:1px solid #eee;">
              @else
                <div style="width:50px;height:50px;background:#f5f5f5;border-radius:8px;
                            display:flex;align-items:center;justify-content:center;font-size:22px;border:1px solid #eee;">
                  📦
                </div>
              @endif
            </td>

            {{-- Product Info --}}
            <td>
              <div class="fw-semibold">{{ $product->name }}</div>
              @if($product->description)
                <small class="text-muted">{{ Str::limit($product->description, 45) }}</small>
              @endif
            </td>

            <td>{{ $product->category->name ?? '-' }}</td>

            {{-- Price --}}
            <td>
              @if($product->sale_price)
                <span class="text-danger fw-bold d-block">PKR {{ number_format($product->sale_price) }}</span>
                <small class="text-muted text-decoration-line-through">PKR {{ number_format($product->price) }}</small>
              @else
                <span class="fw-bold">PKR {{ number_format($product->price) }}</span>
              @endif
            </td>

            {{-- Stock --}}
            <td>
              <span class="badge bg-{{ $product->stock > 10 ? 'success' : ($product->stock > 0 ? 'warning text-dark' : 'danger') }}">
                {{ $product->stock }}
              </span>
            </td>

            {{-- Status --}}
            <td>
              <span class="badge bg-{{ $product->status=='active' ? 'success' : ($product->status=='pending' ? 'warning text-dark' : 'secondary') }}">
                {{ ucfirst($product->status) }}
              </span>
            </td>

            {{-- Actions --}}
            <td>
              <div class="d-flex gap-1 flex-wrap">
                <a href="{{ route('admin.products.edit', $product->id) }}"
                   class="btn btn-sm btn-outline-primary">✏️ Edit</a>

                @if($product->status !== 'active')
                <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-success">✅ Approve</button>
                </form>
                @endif

                <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger"
                          onclick="return confirm('Are you sure you want to delete this product?')">🗑️ Delete</button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center py-5 text-muted">
              <div style="font-size:40px;">📭</div>
              <div class="mt-2">No products found. Add your first product above!</div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="p-3">{{ $products->links() }}</div>
  </div>
</div>

@endsection

@push('scripts')
<script>
function previewImage(input) {
  const preview = document.getElementById('imagePreview');
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = e => {
      preview.src = e.target.result;
      preview.classList.remove('d-none');
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush