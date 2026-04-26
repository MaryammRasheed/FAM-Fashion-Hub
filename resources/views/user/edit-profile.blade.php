@extends('layouts.app')
@section('title', 'Edit Profile - FAM Fashion Hub')

@section('content')

<div class="page-content content-inner-2 pt-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>✏️ Edit Profile</span>
            <a href="{{ route('profile.index') }}" class="btn btn-sm btn-light">← Back</a>
          </div>
          <div class="card-body">
            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
              <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-3">
                <label class="form-label fw-bold">Full Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
              </div>
              <button type="submit" class="btn btn-dark w-100">Save Changes</button>
            </form>

            <hr class="my-4">

            <h6 class="fw-bold">🔒 Change Password</h6>
            <form action="{{ route('profile.update-password') }}" method="POST">
              @csrf @method('PUT')
              <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" minlength="6" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-outline-dark w-100">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
