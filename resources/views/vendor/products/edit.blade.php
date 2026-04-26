@extends('layouts.vendor')
@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Edit: {{ $product->name }}</h6>
        <a href="{{ route('vendor.products') }}" class="btn btn-sm btn-outline-dark">← Back</a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
        @endif

        <form action="{{ route('vendor.products.update', $product->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border mb-3">
                        <div class="card-header"><strong>Basic Information</strong></div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Product Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Description *</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Category *</label>
                                    <select name="category_id" class="form-select" required>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">SKU</label>
                                    <input type="text" class="form-control" value="{{ $product->sku }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-header"><strong>Pricing & Stock</strong></div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Regular Price (PKR) *</label>
                                    <input type="number" name="price" class="form-control" step="0.01" min="0"
                                           value="{{ old('price', $product->price) }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Sale Price (PKR)</label>
                                    <input type="number" name="sale_price" class="form-control" step="0.01" min="0"
                                           value="{{ old('sale_price', $product->sale_price) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Stock *</label>
                                    <input type="number" name="stock" class="form-control" min="0"
                                           value="{{ old('stock', $product->stock) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border mb-3">
                        <div class="card-header"><strong>Status</strong></div>
                        <div class="card-body">
                            <select name="status" class="form-select">
                                @foreach(['active','pending','draft'] as $st)
                                    <option value="{{ $st }}" {{ $product->status == $st ? 'selected' : '' }}>{{ ucfirst($st) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-header"><strong>Current Image</strong></div>
                        <div class="card-body">
                            @php $img = is_array($product->images) && count($product->images) ? $product->images[0] : 'images/shop/product/1.png'; @endphp
                            <img src="{{ asset($img) }}" class="img-fluid rounded"
                                 onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-dark btn-lg"><i class="fas fa-save me-2"></i>Update Product</button>
                <a href="{{ route('vendor.products') }}" class="btn btn-outline-secondary btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
