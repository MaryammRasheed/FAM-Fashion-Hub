@extends('layouts.admin')
@section('page-title', 'Manage Vendors')
@section('content')
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card shadow-sm">
  <div class="card-header"><strong>All Vendors ({{ $vendors->total() }})</strong></div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-dark"><tr><th>ID</th><th>Business</th><th>Owner</th><th>Email</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
          @foreach($vendors as $vendor)
          <tr>
            <td>{{ $vendor->id }}</td>
            <td>{{ $vendor->business_name }}</td>
            <td>{{ $vendor->user->name ?? '-' }}</td>
            <td>{{ $vendor->user->email ?? '-' }}</td>
            <td>
              <span class="badge bg-{{ $vendor->status=='approved'?'success':($vendor->status=='rejected'?'danger':'warning text-dark') }}">
                {{ ucfirst($vendor->status ?? 'pending') }}
              </span>
            </td>
            <td>
              @if(($vendor->status ?? 'pending') !== 'approved')
              <form action="{{ route('admin.vendors.approve', $vendor->id) }}" method="POST" class="d-inline">
                @csrf <button type="submit" class="btn btn-sm btn-success me-1">✓ Approve</button>
              </form>
              @endif
              @if(($vendor->status ?? '') !== 'rejected')
              <form action="{{ route('admin.vendors.reject', $vendor->id) }}" method="POST" class="d-inline">
                @csrf <button type="submit" class="btn btn-sm btn-danger">✕ Reject</button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="p-3">{{ $vendors->links() }}</div>
  </div>
</div>
@endsection
