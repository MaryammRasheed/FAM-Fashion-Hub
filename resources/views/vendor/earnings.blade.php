@extends('layouts.vendor')
@section('title', 'Earnings')
@section('page-title', 'My Earnings')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card text-center">
            <div style="font-size:2rem;">💰</div>
            <h3 class="mt-2">PKR {{ number_format($monthlyEarnings->sum('total')) }}</h3>
            <p class="text-muted mb-0">Total Earnings</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card text-center">
            <div style="font-size:2rem;">📅</div>
            <h3 class="mt-2">PKR {{ number_format($monthlyEarnings->where('month', now()->month)->first()->total ?? 0) }}</h3>
            <p class="text-muted mb-0">This Month</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card text-center">
            <div style="font-size:2rem;">📊</div>
            <h3 class="mt-2">{{ $monthlyEarnings->count() }}</h3>
            <p class="text-muted mb-0">Active Months</p>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom"><h6 class="mb-0 fw-bold">Monthly Breakdown</h6></div>
    <div class="card-body p-0">
        @if($monthlyEarnings->isEmpty())
            <div class="text-center py-5 text-muted">
                <p>No earnings data yet. Start selling!</p>
                <a href="{{ route('vendor.products.create') }}" class="btn btn-dark">Add Products</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr><th>Month</th><th>Earnings (PKR)</th><th>Bar</th></tr>
                    </thead>
                    <tbody>
                        @php $maxEarning = $monthlyEarnings->max('total') ?: 1; @endphp
                        @foreach($monthlyEarnings as $earning)
                        <tr>
                            <td>{{ \Carbon\Carbon::create()->month($earning->month)->format('F') }}</td>
                            <td><strong>PKR {{ number_format($earning->total) }}</strong></td>
                            <td style="width:40%">
                                <div class="progress" style="height:20px;">
                                    <div class="progress-bar bg-dark" style="width:{{ ($earning->total / $maxEarning) * 100 }}%">
                                        {{ round(($earning->total / $maxEarning) * 100) }}%
                                    </div>
                                </div>
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
