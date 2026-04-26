@php
    $navCategories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

	<!-- Title -->
	<title>FAM Fashion Hub</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FAVICONS ICON -->
	<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightgallery/dist/css/lightgallery.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightgallery/dist/css/lg-thumbnail.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightgallery/dist/css/lg-zoom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link class="skin" type="text/css" rel="stylesheet" href="{{ asset('css/skin/skin-1.css') }}">

	<style>
		.shop-card img { width: 100%; height: 250px; object-fit: cover; }
	</style>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

</head>

<body>
	<div class="page-wraper">
		<div id="loading-area" class="preloader-wrapper-2">
			<div class="loader"></div>
		</div>

		<!-- Header -->
		<header class="site-header mo-left header style-2">
			<!-- Main Header -->
			<div class="header-info-bar">
				<div class="container clearfix">
					<!-- Website Logo -->
					<div class="logo-header logo-dark" style="width:140px; height:auto;">
						<a href="{{ url('/') }}"><img src="images/logo1.png" alt="logo"></a>
					</div>

					<!-- EXTRA NAV -->
					<div class="extra-nav d-md-flex d-none m-l15">
						<div class="extra-cell">
							<ul class="navbar-nav header-right m-0">
								<li class="nav-item info-box">
									<div class="nav-link">
										<div class="dz-icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
												<path style="fill:#3cc" d="M489.343 210.251c-4.827-105.317-92.01-189.513-198.498-189.513h-69.689c-106.488 0-193.67 84.197-198.498 189.513C9.495 214.747 0 227.228 0 241.894v78.61c0 18.436 15 33.436 33.437 33.436h60.996c6.075 0 11-4.925 11-11V219.458c0-6.075-4.925-11-11-11H44.789c5.699-92.338 82.618-165.72 176.366-165.72h69.689c93.749 0 170.667 73.381 176.366 165.72h-49.644c-6.075 0-11 4.925-11 11V342.94c0 6.075 4.925 11 11 11h60.996c18.436 0 33.436-15 33.436-33.436v-78.61c.002-14.666-9.493-27.147-22.655-31.643z"/>
											</svg>
										</div>
										<div class="info-content">
											<span>24/7 SUPPORT</span>
											<h6 class="title mb-0">+92 12345 6789</h6>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<!-- header search nav -->
					<div class="header-search-nav">
						<form class="header-item-search" action="{{ route('products.search') }}" method="GET">
							<div class="input-group search-input">
								<input type="text" name="q" class="form-control"
									placeholder="Search for products" value="{{ request('q') }}">
								<button class="btn" type="submit">
									<i class="iconly-Light-Search text-secondary"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Main Header End -->

			<!-- Main Navbar -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix">
					<div class="container clearfix d-lg-flex d-block">
						<!-- Website Logo -->
						<div class="logo-header logo-dark">
							<a href="{{ url('/') }}"><img src="images/logo1.png" alt="logo"></a>
						</div>

						<!-- Nav Toggle Button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button"
							data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
							aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>

						<!-- Main Nav -->
						<div class="header-nav w3menu navbar-collapse collapse justify-content-start" id="navbarNavDropdown">

							<!-- Logo -->
							<div class="logo-header">
								<a href="{{ url('/') }}">
									<img src="{{ asset('images/logo.svg') }}" alt="">
								</a>
							</div>

							<!-- Browse Categories — DYNAMIC FROM BACKEND -->
							<div class="browse-category-menu">
								<a href="javascript:void(0);" class="category-btn">
									<div class="category-menu me-3">
										<span></span>
										<span></span>
										<span></span>
									</div>
									<span class="category-btn-title">Browse Categories</span>
									<span class="toggle-arrow ms-auto">
										<i class="icon feather icon-chevron-down"></i>
									</span>
								</a>
								<div class="category-menu-items" style="display: none;">
									<ul class="nav navbar-nav">
										@forelse($navCategories as $cat)
										<li class="cate-drop">
											<a href="{{ route('category.filter', $cat->slug) }}">
												<i class="icon feather icon-arrow-right"></i>
												<span>{{ $cat->name }}</span>
											</a>
										</li>
										@empty
										<li>
											<a href="{{ route('products.index') }}">
												<i class="icon feather icon-arrow-right"></i>
												<span>All Products</span>
											</a>
										</li>
										@endforelse
									</ul>
								</div>
							</div>

							<!-- Main Menu -->
							<ul class="nav navbar-nav">

								<!-- Home -->
								<li>
									<a href="{{ url('/') }}">
										<span class="menu-title">Home</span>
									</a>
								</li>

								<!-- Collections -->
								<li class="has-mega-menu sub-menu-down" style="position:relative;">
									<a href="javascript:void(0)">
										<span>Collections</span>
										<i class="fas fa-chevron-down tabindex"></i>
									</a>
									<div class="mega-menu shop-menu p-2 m-2" style="max-width:100%">
										<ul class="list-unstyled m-0 p-2">
											<li><a href="{{ url('/tryon') }}" class="d-block py-1">Try On</a></li>
											<li><a href="{{ url('/shop-standard') }}" class="d-block py-1">Brands</a></li>
										</ul>
									</div>
								</li>

								<!-- Pages -->
								<li class="has-mega-menu sub-menu-down" style="position:relative;">
									<a href="javascript:void(0)">
										<span>Pages</span>
										<i class="fas fa-chevron-down tabindex"></i>
									</a>
									<div class="mega-menu shop-menu p-2 m-2" style="width:max-content; white-space:nowrap; display:flex; flex-direction:column;">
										<ul class="list-unstyled m-0 p-0" style="display:flex; flex-direction:column;">
											<li><a href="{{ url('/about-us') }}" class="d-block py-1">About Us</a></li>
											<li><a href="{{ url('/faqs') }}" class="d-block py-1">Faqs</a></li>
											<li><a href="{{ url('/our-team') }}" class="d-block py-1">Our Team</a></li>
											<li><a href="{{ url('/error-404') }}" class="d-block py-1">Error 404</a></li>
										</ul>
									</div>
								</li>

								<!-- Contact -->
								<li>
									<a href="{{ url('/contact') }}">Contact Us</a>
								</li>

							</ul>

							<!-- EXTRA NAV -->
							<div class="extra-nav">
								<div class="extra-cell">
									<ul class="header-right">
										<li class="nav-item login-link">
											@auth
											<div class="dropdown d-inline-block">
												<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="iconly-Light-Profile me-1"></i>
													{{ auth()->user()->name }}
												</a>
												<ul class="dropdown-menu dropdown-menu-end" style="min-width:200px; border-radius:10px; box-shadow:0 5px 25px rgba(0,0,0,.12);">
													@if(auth()->user()->role === 'admin')
													<li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}"><i class="fas fa-shield-alt me-2 text-danger"></i>Admin Panel</a></li>
													<li><hr class="dropdown-divider"></li>
													@elseif(auth()->user()->role === 'vendor')
													<li><a class="dropdown-item" href="{{ url('/vendor/dashboard') }}"><i class="fas fa-store me-2 text-primary"></i>Vendor Panel</a></li>
													<li><hr class="dropdown-divider"></li>
													@endif
													<li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fas fa-user me-2"></i>My Profile</a></li>
													<li><a class="dropdown-item" href="{{ url('/orders/history') }}"><i class="fas fa-box me-2"></i>My Orders</a></li>
													<li><hr class="dropdown-divider"></li>
													<li>
														<form action="{{ url('/logout') }}" method="POST" class="m-0">
															@csrf
															<button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
														</form>
													</li>
												</ul>
											</div>
											@else
											<a class="nav-link" href="{{ url('/login') }}">Login / Register</a>
											@endauth
										</li>
										<li class="nav-item search-link">
											<a class="nav-link" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop">
												<i class="iconly-Light-Search"></i>
											</a>
										</li>
										<li class="nav-item wishlist-link">
											<a class="nav-link" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
												<i class="iconly-Light-Heart2"></i>
											</a>
										</li>
										<li class="nav-item cart-link">
											<a href="javascript:void(0);" class="nav-link cart-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
												<i class="iconly-Broken-Buy"></i>
												<span class="badge badge-circle">5</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->

		<!-- SearchBar -->
		<div class="dz-search-area dz-offcanvas offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas">&times;</button>
			<div class="container">
				<form class="header-item-search" action="{{ route('products.search') }}" method="GET">
					<div class="input-group search-input">
						<select name="category" class="default-select">
							<option value="">All Categories</option>
							@foreach($navCategories as $cat)
							<option value="{{ $cat->slug }}">{{ $cat->name }}</option>
							@endforeach
						</select>
						<input type="search" name="q" class="form-control" placeholder="Search Product">
						<button class="btn" type="submit">
							<i class="iconly-Light-Search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- SearchBar -->

		<!-- Sidebar cart -->
		<div class="offcanvas dz-offcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas">&times;</button>
			<div class="offcanvas-body">
				<div class="product-description">
					<div class="dz-tabs">
						<ul class="nav nav-tabs center" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="shopping-cart" data-bs-toggle="tab"
									data-bs-target="#shopping-cart-pane" type="button" role="tab" aria-selected="true">
									Shopping Cart
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="wishlist" data-bs-toggle="tab"
									data-bs-target="#wishlist-pane" type="button" role="tab" aria-selected="false">
									Wishlist
								</button>
							</li>
						</ul>
						<div class="tab-content pt-4" id="dz-shopcart-sidebar">
							<div class="tab-pane fade show active" id="shopping-cart-pane" role="tabpanel">
								<div class="shop-sidebar-cart">
									<p class="text-center text-muted py-4">
										<a href="{{ route('cart.index') }}" class="btn btn-secondary btn-block">View Cart</a>
									</p>
								</div>
							</div>
							<div class="tab-pane fade" id="wishlist-pane" role="tabpanel">
								<div class="shop-sidebar-cart">
									<p class="text-center text-muted py-4">
										<a href="{{ route('wishlist.index') }}" class="btn btn-secondary btn-block">View Wishlist</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Sidebar cart -->

		<!-- Sidebar filter -->
		<div class="offcanvas dz-offcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeft">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas">&times;</button>
			<div class="offcanvas-body">
				<div class="product-description">
					<div class="widget">
						<h6 class="widget-title">Categories</h6>
						<ul class="list-unstyled">
							@foreach($navCategories as $cat)
							<li class="cat-item">
								<a href="{{ route('category.filter', $cat->slug) }}">{{ $cat->name }}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- filter sidebar -->
		</header>
		<!-- Header End -->