@extends('layouts.app')

@section('title', 'Register')

@section('content')

@include('layouts.header')

<div class="page-content bg-light">
    <section class="px-3">
        <div class="row align-center-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6 start-side-content">
                <div class="dz-bnr-inr-entry">
                    <h1>Registration</h1>
                    <nav aria-label="breadcrumb text-align-start" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item">Shop Registration</li>
                        </ul>
                    </nav>
                </div>
                <div class="registration-media">
                    <img src="{{ asset('images/registration/pic3.png') }}" alt="/">
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 end-side-content">
                <div class="login-area">
                    <h2 class="text-secondary text-center">Registration Now</h2>
                    <p class="text-center m-b30">Welcome! Please register your account</p>

                    {{-- Error Messages --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ url('/register') }}" method="POST">
                        @csrf

                        <div class="m-b25">
                            <label class="label-title">Username</label>
                            <input name="name"
                                required
                                class="form-control"
                                placeholder="Username"
                                type="text"
                                value="{{ old('name') }}">
                        </div>

                        <div class="m-b25">
                            <label class="label-title">Email Address</label>
                            <input name="email"
                                required
                                class="form-control"
                                placeholder="Email Address"
                                type="email"
                                value="{{ old('email') }}">
                        </div>

                        <div class="m-b25">
                            <label class="label-title">Password</label>
                            <div class="secure-input">
                                <input type="password"
                                    name="password"
                                    class="form-control dz-password"
                                    placeholder="Password">
                                <div class="show-pass">
                                    <i class="eye-open fa-regular fa-eye"></i>
                                </div>
                            </div>
                        </div>

                        <div class="m-b40">
                            <label class="label-title">Confirm Password</label>
                            <div class="secure-input">
                                <input type="password"
                                    name="password_confirmation"
                                    class="form-control dz-password"
                                    placeholder="Confirm Password">
                                <div class="show-pass">
                                    <i class="eye-open fa-regular fa-eye"></i>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="btn btn-secondary btnhover text-uppercase me-2">
                                Register
                            </button>
                            <a href="{{ url('/login') }}"
                                class="btn btn-outline-secondary btnhover text-uppercase">
                                Sign In
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layouts.footer')

@endsection

