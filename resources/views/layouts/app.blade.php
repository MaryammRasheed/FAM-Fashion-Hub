{{--
    FAM Fashion Hub - Main App Layout
    Your header.blade.php contains: <!DOCTYPE html>, <head>, all CSS, <body>, navbar
    Your footer.blade.php contains: footer HTML + all JS scripts + </body></html>
    So this layout just @includes both and puts @yield('content') in between.
--}}
@include('layouts.header')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="container mt-2">
            <div class="alert alert-success alert-dismissible fade show py-2">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="container mt-2">
            <div class="alert alert-danger alert-dismissible fade show py-2">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    {{-- Page Content --}}
    @yield('content')

@include('layouts.footer')
