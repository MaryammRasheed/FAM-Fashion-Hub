@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="dz-bnr-inr dz-bnr-inr-sm overlay-black-middle" style="background:#1a1a1a; padding: 60px 0;">
        <div class="container">
            <div class="dz-bnr-inr-entry text-center">
                <h1 class="text-white">Login</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <section class="content-inner-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="login-area">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login">
                                {{-- REMOVE dz-ajax-overlay and dz-form classes --}}
                                <div>
                                    <div>
                                        <h3 class="form-title m-t0">Login</h3>
                                        <p class="text-muted">Enter your credentials to access your account.</p>

                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <p class="mb-0">{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        {{-- SIMPLE FORM - No AJAX classes --}}
                                        <form action="{{ url('/login') }}" method="POST" id="loginForm">
                                            @csrf

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
                                                        placeholder="Enter password"
                                                        type="password"
                                                        id="password">
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="remember" id="remember">
                                                        <label class="form-check-label" for="remember">
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                    <a href="{{ route('password.request') }}" class="text-secondary">Forgot Password?</a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" id="loginBtn"
                                                    class="btn btn-secondary btn-block w-100">
                                                    LOGIN
                                                </button>
                                            </div>
                                        </form>

                                        <div class="text-center mt-3">
                                            <p>Don't have an account?
                                                <a href="{{ route('register') }}" class="text-secondary font-weight-700">
                                                    Register Now
                                                </a>
                                            </p>
                                        </div>

                                        {{-- <div class="mt-4 p-3 border rounded" style="background:#f8f9fa; font-size:13px;">
                                            <strong>Test Credentials (click to fill):</strong>
                                            <div style="cursor:pointer; color:#e63a11;"
                                                 onclick="fillCreds('admin@famfashion.com','password')">
                                                Admin: admin@famfashion.com / password
                                            </div>
                                            <div style="cursor:pointer; color:#007bff;"
                                                 onclick="fillCreds('vendor@famfashion.com','password')">
                                                Vendor: vendor@famfashion.com / password
                                            </div>
                                            <div style="cursor:pointer; color:#28a745;"
                                                 onclick="fillCreds('customer@famfashion.com','password')">
                                                Customer: customer@famfashion.com / password
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function fillCreds(email, pass) {
    document.querySelector('input[name="email"]').value = email;
    document.querySelector('input[name="password"]').value = pass;
}

// COMPLETELY DISABLE ALL AJAX FORM HANDLING
if (typeof $ !== 'undefined') {
    $(document).ready(function() {
        // Remove any existing event handlers
        $('#loginForm').off();

        // Override any dzForm initialization
        if (typeof dzForm !== 'undefined') {
            // Remove dzForm class to prevent AJAX
            $('.dzForm').removeClass('dzForm');
        }

        // Handle form submission normally
        $('#loginForm').on('submit', function(e) {
            // Remove any loading overlays
            $('.dz-ajax-overlay, .loading-area, .loader, .spinner').remove();

            // Show loading on button
            var btn = $('#loginBtn');
            var originalText = btn.html();
            btn.html('<span class="spinner-border spinner-border-sm mr-2"></span> LOGGING IN...');
            btn.prop('disabled', true);

            // Let form submit normally
            return true;
        });
    });
}
</script>

{{-- Emergency fix: Remove dz.ajax.js functionality completely --}}
<script>
// This runs after everything and kills any AJAX form handling
window.addEventListener('load', function() {
    // Stop propagation of any click events on submit button
    var submitBtn = document.getElementById('loginBtn');
    if(submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // Ensure form submits normally
    var form = document.getElementById('loginForm');
    if(form) {
        form.setAttribute('data-ajax', 'false');
        form.setAttribute('data-parsley-validate', 'false');
        // Remove any other data attributes that might trigger AJAX
        var attrs = form.attributes;
        for(var i = 0; i < attrs.length; i++) {
            if(attrs[i].name.startsWith('data-')) {
                form.removeAttribute(attrs[i].name);
            }
        }
    }
});
</script>
@endsection
