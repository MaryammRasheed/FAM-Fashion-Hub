@extends('layouts.app')

@section('content')

<div class="page-content">
    <!-- Page Banner -->
    <div class="dz-bnr-inr dz-bnr-inr-sm overlay-black-middle" style="background:#1a1a1a; padding: 60px 0;">
        <div class="container">
            <div class="dz-bnr-inr-entry text-center">
                <h1 class="text-white">Register</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <section class="content-inner-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="login-area">
                        <div class="dz-ajax-overlay">
                            <div class="dz-form dzForm">
                                <h3 class="form-title m-t0">Create Account</h3>
                                <p class="text-muted">Join FAM Fashion Hub - Pakistan's #1 Fashion Marketplace</p>

                                {{-- Error Messages --}}
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <form action="{{ route('register.submit') }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label class="font-weight-700 font-sm">Full Name</label>
                                        <div class="input-group">
                                            <input name="name" required=""
                                                class="form-control"
                                                placeholder="Enter your full name"
                                                type="text"
                                                value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-700 font-sm">Email Address</label>
                                        <div class="input-group">
                                            <input name="email" required=""
                                                class="form-control"
                                                placeholder="Enter your email"
                                                type="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-700 font-sm">Password</label>
                                        <div class="input-group">
                                            <input name="password" required=""
                                                class="form-control"
                                                placeholder="Minimum 6 characters"
                                                type="password"
                                                minlength="6">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="font-weight-700 font-sm">Confirm Password</label>
                                        <div class="input-group">
                                            <input name="password_confirmation" required=""
                                                class="form-control"
                                                placeholder="Repeat your password"
                                                type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-secondary btn-block">
                                            CREATE ACCOUNT
                                        </button>
                                    </div>

                                </form>

                                <div class="text-center mt-3">
                                    <p>Already have an account?
                                        <a href="{{ route('login') }}" class="text-secondary font-weight-700">
                                            Login Here
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
