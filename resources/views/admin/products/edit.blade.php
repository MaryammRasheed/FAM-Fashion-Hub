@extends('layouts.admin')
@section('page-title', 'Edit Product')

@section('content')

<div class="card shadow-sm border-0">
  <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
    <div>
      <h5 class="mb-0 fw-bold">✏️ Edit Product</h5>
      <small class="text-muted">Update product details</small>
    </div>
    <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary btn-sm">← Back to Products</a>
  </div>

  <div class="card-body">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row g-3">

        {{-- Name --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                 value="{{ old('name', $product->name) }}" required>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Category --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Category</label>
          <select name="category_id" class="form-select">
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}"
                {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Price --}}
        <div class="col-md-4">
          <label class="form-label fw-semibold">Price (PKR) <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text">PKR</span>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                   value="{{ old('price', $product->price) }}" min="0" step="0.01" required>
          </div>
          @error('price')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
        </div>

        {{-- Sale Price --}}
        <div class="col-md-4">
          <label class="form-label fw-semibold">Sale Price (PKR) <span class="text-muted">(optional)</span></label>
          <div class="input-group">
            <span class="input-group-text">PKR</span>
            <input type="number" name="sale_price" class="form-control"
                   value="{{ old('sale_price', $product->sale_price) }}" min="0" step="0.01">
          </div>
        </div>

        {{-- Stock --}}
        <div class="col-md-4">
          <label class="form-label fw-semibold">Stock <span class="text-danger">*</span></label>
          <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                 value="{{ old('stock', $product->stock) }}" min="0" required>
          @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Current Image + Upload --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Product Image</label>

          {{-- Current image preview --}}
          @if($product->first_image !== 'images/shop/product/1.png')
            <div class="mb-2">
              <small class="text-muted d-block mb-1">Current Image:</small>
              <img src="{{ asset($product->first_image) }}" alt="{{ $product->name }}"
                   style="height:100px; object-fit:cover; border-radius:8px; border:1px solid #ddd;">
            </div>
          @endif

          <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                 accept="image/*" onchange="previewImage(this, 'editImagePreview')">
          <small class="text-muted">Upload new image to replace current one</small>
          @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
          <img id="editImagePreview" src="#" alt="New Preview"
               class="mt-2 rounded d-none border" style="max-height:120px; object-fit:cover;">
        </div>

        {{-- Description --}}
        <div class="col-md-6">
          <label class="form-label fw-semibold">Description</label>
          <textarea name="description" class="form-control" rows="5"
                    placeholder="Write about the product...">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="col-12 d-flex gap-2">
          <button type="submit" class="btn btn-primary px-4">💾 Update Product</button>
          <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary px-4">Cancel</a>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection

@push('scripts')
<script>
function previewImage(input, previewId) {
  const preview = document.getElementById(previewId);
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