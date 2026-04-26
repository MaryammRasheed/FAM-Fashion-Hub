@extends('layouts.admin')
@section('page-title', 'Manage Orders')
@section('content')
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card shadow-sm">
  <div class="card-header"><strong>All Orders ({{ $orders->total() }})</strong></div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-dark"><tr><th>Order #</th><th>Customer</th><th>Amount</th><th>Payment</th><th>Status</th><th>Date</th><th>Update</th></tr></thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td><strong>{{ $order->order_number }}</strong></td>
            <td>{{ $order->user->name ?? 'Guest' }}</td>
            <td>PKR {{ number_format($order->total_amount) }}</td>
            <td><span class="badge bg-{{ $order->payment_status=='paid'?'success':'warning text-dark' }}">{{ ucfirst($order->payment_status ?? 'pending') }}</span></td>
            <td>
              @php $sc=['pending'=>'warning','processing'=>'info','shipped'=>'primary','delivered'=>'success','cancelled'=>'danger']; @endphp
              <span class="badge bg-{{ $sc[$order->status] ?? 'secondary' }}">{{ ucfirst($order->status) }}</span>
            </td>
            <td><small>{{ $order->created_at->format('d M Y') }}</small></td>
            <td>
              <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="d-flex gap-1">
                @csrf @method('PUT')
                <select name="status" class="form-select form-select-sm">
                  @foreach(['pending','processing','shipped','delivered','cancelled'] as $st)
                    <option value="{{ $st }}" {{ $order->status==$st?'selected':'' }}>{{ ucfirst($st) }}</option>
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
  </div>
</div>
@endsection
