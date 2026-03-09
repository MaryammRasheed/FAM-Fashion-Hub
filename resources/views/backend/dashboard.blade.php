@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row">
    <!-- Total Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Users</h6>
                    <h3 class="fw-bold">{{ $totalUsers }}</h3>
                </div>
                <i class="fas fa-users fa-2x text-primary"></i>
            </div>
        </div>
    </div>

    <!-- Total Products -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Products</h6>
                    <h3 class="fw-bold">{{ $totalProducts }}</h3>
                </div>
                <i class="fas fa-box fa-2x text-success"></i>
            </div>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Orders</h6>
                    <h3 class="fw-bold">{{ $totalOrders }}</h3>
                </div>
                <i class="fas fa-shopping-cart fa-2x text-warning"></i>
            </div>
        </div>
    </div>

    <!-- Total Vendors -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Vendors</h6>
                    <h3 class="fw-bold">{{ $totalVendors }}</h3>
                </div>
                <i class="fas fa-store fa-2x text-danger"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Users Table -->
<div class="card shadow mt-3">
    <div class="card-header bg-white fw-bold">
        Recent Users
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge
                            @if($user->role == 'admin') bg-danger
                            @elseif($user->role == 'vendor') bg-warning
                            @else bg-success @endif">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
