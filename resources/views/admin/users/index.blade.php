@extends('layouts.admin')
@section('page-title', 'Manage Users')
@section('content')
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <strong>All Users ({{ $users->total() }})</strong>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="table-dark"><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Joined</th><th>Actions</th></tr></thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><span class="badge bg-{{ $user->role=='admin'?'danger':($user->role=='vendor'?'warning text-dark':'primary') }}">{{ ucfirst($user->role) }}</span></td>
            <td>{{ $user->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-dark me-1">Edit</a>
              @if($user->id !== auth()->id())
              <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete user?')">Delete</button>
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="p-3">{{ $users->links() }}</div>
  </div>
</div>
@endsection
