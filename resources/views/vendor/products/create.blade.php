@extends('layouts.vendor')
@section('title', 'Add Product')
@section('page-title', 'Add New Product')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Product Information</h6>
        <a href="{{ route('vendor.products') }}" class="btn btn-sm btn-outline-dark">← Back</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-lg-8">
                    <!-- Basic Info -->
                    <div class="card border mb-3">
                        <div class="card-header"><strong>Basic Information</strong></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Product Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description *</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Category *</label>
                                    <select name="category_id" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">SKU</label>
                                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}"
                                           placeholder="Leave blank to auto-generate">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="card border mb-3">
                        <div class="card-header"><strong>Pricing & Stock</strong></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Regular Price (PKR) *</label>
                                    <input type="number" name="price" class="form-control" step="0.01" min="0"
                                           value="{{ old('price') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sale Price (PKR)</label>
                                    <input type="number" name="sale_price" class="form-control" step="0.01" min="0"
                                           value="{{ old('sale_price') }}" placeholder="Optional">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Stock Quantity *</label>
                                    <input type="number" name="stock" class="form-control" min="0"
                                           value="{{ old('stock', 0) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Variants -->
                    <div class="card border">
                        <div class="card-header"><strong>Sizes & Colors (comma-separated)</strong></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Available Sizes</label>
                                    <input type="text" name="sizes" class="form-control"
                                           placeholder="e.g. S,M,L,XL,XXL" value="{{ old('sizes') }}">
                                    <small class="text-muted">Separate with commas</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Available Colors</label>
                                    <input type="text" name="colors" class="form-control"
                                           placeholder="e.g. Red,Blue,Black" value="{{ old('colors') }}">
                                    <small class="text-muted">Separate with commas</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Status -->
                    <div class="card border mb-3">
                        <div class="card-header"><strong>Product Status</strong></div>
                        <div class="card-body">
                            <select name="status" class="form-select">
                                <option value="pending">Pending Review</option>
                                <option value="draft">Save as Draft</option>
                            </select>
                            <small class="text-muted mt-1 d-block">Your product needs admin approval before going live.</small>
                        </div>
                    </div>

                    <!-- Image URLs -->
                    <div class="card border">
                        <div class="card-header"><strong>Product Images</strong></div>
                        <div class="card-body">
                            <label class="form-label fw-bold">Image Paths</label>
                            <textarea name="images_text" class="form-control" rows="4"
                                      placeholder="Enter image paths, one per line&#10;e.g. images/shop/product/1.png">{{ old('images_text') }}</textarea>
                            <small class="text-muted">Enter relative paths from public/ folder</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-dark btn-lg">
                    <i class="fas fa-save me-2"></i>Save Product
                </button>
                <a href="{{ route('vendor.products') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
