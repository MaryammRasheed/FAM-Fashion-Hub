@extends('layouts.vendor')
@section('title', 'Orders')
@section('page-title', 'My Orders')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Orders for My Products</h6></div>
    <div class="card-body p-0">
        @if($orders->isEmpty())
            <div class="text-center py-5"><h5>No orders yet.</h5></div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>Order #</th><th>Product</th><th>Customer</th><th>Qty</th><th>Amount</th><th>Order Status</th><th>Update</th></tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td><small class="fw-bold">#{{ $item->order->order_number ?? '-' }}</small><br>
                                <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small></td>
                            <td>{{ $item->product->name ?? '-' }}</td>
                            <td>{{ $item->order->user->name ?? '-' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>PKR {{ number_format($item->price * $item->quantity) }}</td>
                            <td>
                                @php $sc=['pending'=>'warning','processing'=>'info','shipped'=>'primary','delivered'=>'success','cancelled'=>'danger']; @endphp
                                <span class="badge bg-{{ $sc[$item->order->status ?? 'pending'] ?? 'secondary' }}">
                                    {{ ucfirst($item->order->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('vendor.orders.update-status', $item->id) }}" method="POST" class="d-flex gap-1">
                                    @csrf @method('PUT')
                                    <select name="status" class="form-select form-select-sm">
                                        @foreach(['pending','processing','shipped','delivered'] as $st)
                                            <option value="{{ $st }}" {{ ($item->order->status ?? '') == $st ? 'selected' : '' }}>
                                                {{ ucfirst($st) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-dark">✓</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3">{{ $orders->links() }}</div>
        @endif
    </div>
</div>
@endsection
