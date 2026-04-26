@extends('layouts.vendor')
@section('title', 'Vendor Profile')
@section('page-title', 'My Profile')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-7">
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Business Profile</h6></div>
      <div class="card-body">
        <form action="{{ route('vendor.profile.update') }}" method="POST">
          @csrf @method('PUT')
          <div class="mb-3">
            <label class="form-label fw-bold">Business Name</label>
            <input type="text" name="business_name" class="form-control" value="{{ $vendor->business_name }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $vendor->phone }}">
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $vendor->address }}">
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $vendor->business_name }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Status</label>
            <span class="badge bg-{{ $vendor->status=='approved'?'success':'warning text-dark' }} ms-2 fs-6">
              {{ ucfirst($vendor->status ?? 'pending') }}
            </span>
          </div>
          <button type="submit" class="btn btn-dark">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
