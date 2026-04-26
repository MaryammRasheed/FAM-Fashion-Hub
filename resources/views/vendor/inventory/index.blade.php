@extends('layouts.vendor')
@section('title', 'Inventory')
@section('page-title', 'Inventory Management')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Stock Levels</h6></div>
    <div class="card-body p-0">
        @if($products->isEmpty())
            <div class="text-center py-5">
                <h5>No products to manage.</h5>
                <a href="{{ route('vendor.products.create') }}" class="btn btn-dark mt-2">Add Products</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>Product</th><th>SKU</th><th>Current Stock</th><th>Status</th><th>Update Stock</th></tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="{{ $product->stock < 5 ? 'table-danger' : ($product->stock < 10 ? 'table-warning' : '') }}">
                            <td class="fw-bold">{{ $product->name }}</td>
                            <td><small>{{ $product->sku }}</small></td>
                            <td>
                                <span class="badge bg-{{ $product->stock > 10 ? 'success' : ($product->stock > 0 ? 'warning text-dark' : 'danger') }} fs-6">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td>
                                @if($product->stock == 0)
                                    <span class="text-danger fw-bold">Out of Stock</span>
                                @elseif($product->stock < 5)
                                    <span class="text-danger">Critical Low</span>
                                @elseif($product->stock < 10)
                                    <span class="text-warning">Low Stock</span>
                                @else
                                    <span class="text-success">In Stock</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('vendor.inventory.update', $product->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf @method('PUT')
                                    <input type="number" name="stock" value="{{ $product->stock }}" min="0"
                                           class="form-control form-control-sm" style="width:90px;">
                                    <button type="submit" class="btn btn-sm btn-dark">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
