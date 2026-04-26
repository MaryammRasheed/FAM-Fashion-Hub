<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Product • FAM FASHION HUB</title>

    <!-- Fonts & CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css">

    <!-- Custom CSS - Public se aayegi -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
</head>
<body>

<div class="app">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">F</div>
            <div class="brand-name">FAM FASHION HUB<small>Admin Panel</small></div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a class="nav-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high"></i><span>Dashboard</span></a>
            <a class="nav-item" href="{{ route('admin.customers') }}"><i class="fa-solid fa-users"></i><span>Customers</span></a>
            <a class="nav-item" href="{{ route('admin.products') }}"><i class="fa-solid fa-shirt"></i><span>All Products</span></a>
            <a class="nav-item" href="{{ route('admin.products.add') }}"><i class="fa-solid fa-plus"></i><span>Add Product</span></a>
            <a class="nav-item" href="{{ route('admin.categories') }}"><i class="fa-solid fa-tags"></i><span>Categories</span></a>
            <a class="nav-item" href="{{ route('admin.orders') }}"><i class="fa-solid fa-bag-shopping"></i><span>Orders</span></a>
            <a class="nav-item" href="{{ route('admin.invoices') }}"><i class="fa-solid fa-file-invoice"></i><span>Invoices</span></a>
            <a class="nav-item" href="{{ route('admin.inventory') }}"><i class="fa-solid fa-boxes-stacked"></i><span>Inventory</span></a>
            <a class="nav-item" href="{{ route('admin.calendar') }}"><i class="fa-solid fa-calendar-days"></i><span>Calendar</span></a>

            <div class="nav-label">Account</div>
            <a class="nav-item" href="{{ route('admin.profile') }}"><i class="fa-solid fa-user"></i><span>Profile</span></a>
            <a class="nav-item" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-user-pen"></i><span>Edit Profile</span></a>

            <div class="nav-label">Auth</div>
            <a class="nav-item" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i><span>Login</span></a>
            <a class="nav-item" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i><span>Register</span></a>
            @if(Route::has('password.request'))
                <a class="nav-item" href="{{ route('password.request') }}"><i class="fa-solid fa-key"></i><span>Forgot Password</span></a>
            @endif
        </nav>
    </aside>
    <div class="sidebar-overlay" onclick="document.body.classList.remove('sidebar-open')"></div>

    <div class="main">

        <!-- Topbar -->
        <header class="topbar">
            <button class="icon-btn" onclick="toggleSidebar()" aria-label="Toggle sidebar"><i class="fa-solid fa-bars"></i></button>
            <div class="search"><i class="fa-solid fa-magnifying-glass"></i><input type="text" placeholder="Search products, orders, customers..."></div>
            <button class="icon-btn" onclick="toggleTheme()" aria-label="Toggle theme"><i data-theme-icon class="fa-solid fa-moon"></i></button>
            <button class="icon-btn" aria-label="Notifications"><i class="fa-solid fa-bell"></i><span class="badge-dot"></span></button>
            <div class="avatar" title="{{ Auth::user()->name ?? 'Admin' }}">{{ substr(Auth::user()->name ?? 'Admin', 0, 1) }}</div>
        </header>

        <main class="content">

            <h1 class="page-title">Add Product</h1>
            <p class="page-sub">Create a new item in your catalog.</p>

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" onsubmit="return handleProductSubmit(event)">
                @csrf
                <div class="row g-3">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-3">General</h5>

                                <div class="mb-3">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Category <span class="text-danger">*</span></label>
                                        <select name="category_id" class="form-select" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories ?? [] as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">SKU</label>
                                        <input type="text" name="sku" class="form-control" placeholder="SKU-1001">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Price (PKR) <span class="text-danger">*</span></label>
                                        <input type="number" name="price" class="form-control" step="0.01" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Sale Price</label>
                                        <input type="number" name="sale_price" class="form-control" step="0.01">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Stock Quantity <span class="text-danger">*</span></label>
                                        <input type="number" name="stock" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Variants</h5>
                                <label class="form-label">Sizes</label>
                                <div class="d-flex gap-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" value="S" id="sS">
                                        <label class="form-check-label" for="sS">S</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" value="M" id="sM" checked>
                                        <label class="form-check-label" for="sM">M</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" value="L" id="sL" checked>
                                        <label class="form-check-label" for="sL">L</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sizes[]" value="XL" id="sXL">
                                        <label class="form-check-label" for="sXL">XL</label>
                                    </div>
                                </div>

                                <label class="form-label">Colors</label>
                                <div class="d-flex gap-2">
                                    <input type="color" name="colors[]" class="form-control form-control-color" value="#e91e63">
                                    <input type="color" name="colors[]" class="form-control form-control-color" value="#000000">
                                    <input type="color" name="colors[]" class="form-control form-control-color" value="#ffffff">
                                    <input type="color" name="colors[]" class="form-control form-control-color" value="#a18cd1">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Images</h5>
                                <input type="file" name="images[]" class="form-control" multiple accept="image/*" onchange="previewImgs(event)">
                                <div id="imgPreview" class="d-flex flex-wrap gap-2 mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Status</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="active" id="st1" checked>
                                    <label class="form-check-label" for="st1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="draft" id="st2">
                                    <label class="form-check-label" for="st2">Draft</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="fa fa-save me-1"></i> Save Product
                                </button>
                                <button type="button" class="btn btn-outline-secondary w-100" onclick="window.history.back()">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    // Image Preview Function
    function previewImgs(e) {
        const wrap = document.getElementById('imgPreview');
        wrap.innerHTML = '';
        const files = e.target.files;

        for(let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            reader.onload = function(ev) {
                wrap.insertAdjacentHTML('beforeend', `
                    <div style="position: relative;">
                        <img src="${ev.target.result}" style="width: 90px; height: 90px; border-radius: 10px; object-fit: cover; border: 1px solid #ddd;">
                        <button type="button" class="btn btn-sm btn-danger" style="position: absolute; top: -5px; right: -5px; border-radius: 50%; width: 20px; height: 20px; padding: 0; font-size: 12px;" onclick="this.parentElement.remove()">×</button>
                    </div>
                `);
            };
            reader.readAsDataURL(file);
        }
    }

    // Form Submit Handler
    function handleProductSubmit(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Product Saved!',
            text: 'Your product has been added successfully.',
            icon: 'success',
            confirmButtonColor: '#e91e63'
        }).then(() => {
            event.target.submit();
        });

        return false;
    }

    // Toggle Sidebar
    function toggleSidebar() {
        document.body.classList.toggle('sidebar-open');
    }

    // Toggle Theme
    function toggleTheme() {
        document.body.classList.toggle('dark-theme');
        const icon = document.querySelector('[data-theme-icon]');
        if (document.body.classList.contains('dark-theme')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'dark');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'light');
        }
    }

    // Load Theme
    function loadTheme() {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            document.body.classList.add('dark-theme');
            const icon = document.querySelector('[data-theme-icon]');
            if (icon) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        loadTheme();
    });
</script>

</body>
</html>
