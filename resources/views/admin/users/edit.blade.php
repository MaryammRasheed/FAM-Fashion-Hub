@extends('layouts.admin')
@section('page-title', 'Edit User')
@section('content')
<div class="card shadow-sm" style="max-width:500px;">
  <div class="card-header d-flex justify-content-between align-items-center">
    <strong>Edit User</strong>
    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-secondary">← Back</a>
  </div>
  <div class="card-body">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select">
          @foreach(['customer','vendor','admin'] as $r)
            <option value="{{ $r }}" {{ $user->role==$r?'selected':'' }}>{{ ucfirst($r) }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-dark">Save Changes</button>
    </form>
  </div>
</div>
@endsection
