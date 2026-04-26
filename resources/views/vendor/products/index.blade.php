@extends('layouts.vendor')
@section('title', 'My Products')
@section('page-title', 'My Products')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="mb-0 fw-bold">Product List</h6>
        <a href="{{ route('vendor.products.create') }}" class="btn btn-dark btn-sm"><i class="fas fa-plus me-1"></i>Add Product</a>
    </div>
    <div class="card-body p-0">
        @if($products->isEmpty())
            <div class="text-center py-5">
                <h5>No products yet!</h5>
                <a href="{{ route('vendor.products.create') }}" class="btn btn-dark mt-2">Add Your First Product</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            @php
                                $img = is_array($product->images) && count($product->images)
                                       ? $product->images[0] : 'images/shop/product/1.png';
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset($img) }}" style="width:45px;height:45px;object-fit:cover;border-radius:6px;"
                                             onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                                        <div>
                                            <p class="mb-0 fw-bold">{{ $product->name }}</p>
                                            <small class="text-muted">{{ $product->sku }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->category->name ?? '—' }}</td>
                                <td>
                                    @if($product->sale_price)
                                        <span class="text-danger fw-bold">PKR {{ number_format($product->sale_price) }}</span><br>
                                        <small class="text-muted text-decoration-line-through">PKR {{ number_format($product->price) }}</small>
                                    @else
                                        PKR {{ number_format($product->price) }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $product->stock > 10 ? 'success' : ($product->stock > 0 ? 'warning text-dark' : 'danger') }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $sc = ['active'=>'success','pending'=>'warning','draft'=>'secondary'];
                                    @endphp
                                    <span class="badge bg-{{ $sc[$product->status] ?? 'secondary' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('vendor.products.edit', $product->id) }}" class="btn btn-sm btn-outline-dark me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('vendor.products.delete', $product->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $products->links() }}</div>
        @endif
    </div>
</div>
@endsection
