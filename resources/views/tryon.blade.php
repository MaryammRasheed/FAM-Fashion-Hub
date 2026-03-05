<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>

	<!-- Title -->
	<title>FAM Fahion Hub - Shopping Website</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
	<meta name="format-detection" content="telephone=no">

	<meta name="keywords"
		content="template, ui kit, clothing, delivery, ecommerce, fashion, order, shopping, store, fashion design, fashion store, responsive design, fashion showcase, modern design, fashion technology, e-shop, ecommerce web, eCommerce Website, minimal shop, online shop, online shopping, pixio, user experience, Design Elements, Trendy, Stylish, User-Friendly, Navigation, Product Display, Branding, Development, Visual Design, UI/UX, Website, Web Design">
	<meta name="description"
		content="Elevate your online retail presence with Pixio Shop & eCommerce HTML Template. Crafted with precision, this responsive and feature-rich template provides a seamless and visually stunning shopping experience. Explore a world of possibilities with modern design elements, intuitive navigation, and customizable features. Transform your website into a dynamic online storefront with Pixio, where style meets functionality for a captivating and user-friendly eCommerce journey.">

	<meta property="og:title" content="Pixio: Shop & eCommerce Bootstrap HTML Template | DexignZone">
	<meta property="og:description"
		content="Elevate your online retail presence with Pixio Shop & eCommerce HTML Template. Crafted with precision, this responsive and feature-rich template provides a seamless and visually stunning shopping experience. Explore a world of possibilities with modern design elements, intuitive navigation, and customizable features. Transform your website into a dynamic online storefront with Pixio, where style meets functionality for a captivating and user-friendly eCommerce journey.">
	<meta property="og:image" content="../pixio.dexignzone.com/xhtml/social-image.html">

	<!-- TWITTER META -->
	<meta name="twitter:title" content="Pixio: Shop & eCommerce Bootstrap HTML Template | DexignZone">
	<meta name="twitter:description"
		content="Elevate your online retail presence with Pixio Shop & eCommerce HTML Template. Crafted with precision, this responsive and feature-rich template provides a seamless and visually stunning shopping experience. Explore a world of possibilities with modern design elements, intuitive navigation, and customizable features. Transform your website into a dynamic online storefront with Pixio, where style meets functionality for a captivating and user-friendly eCommerce journey.">
	<meta name="twitter:image" content="../pixio.dexignzone.com/xhtml/social-image.html">
	<meta name="twitter:card" content="summary_large_image">

	<!-- CANONICAL URL -->
	<link rel="canonical" href="https://pixio.dexignzone.com/xhtml/index-2.html">

	<!-- FAVICONS ICON -->
	<link rel="icon" type="image/x-icon" href="images/favicon.png">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="vendor/magnific-popup/magnific-popup.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/swiper/swiper-bundle.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/lightgallery/dist/css/lightgallery.css">
	<link rel="stylesheet" type="text/css" href="vendor/lightgallery/dist/css/lg-thumbnail.css">
	<link rel="stylesheet" type="text/css" href="vendor/lightgallery/dist/css/lg-zoom.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link class="skin" type="text/css" rel="stylesheet" href="css/skin/skin-1.css">

	<!-- GOOGLE FONTS-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
		rel="stylesheet">
           <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5; /* Indigo-600 */
            --primary-hover: #4338ca; /* Indigo-700 */
        }
        body { font-family: 'Inter', sans-serif; }

        /* Media and Try-On Area */
        #media-container {
            position: relative;
            background-color: #e5e7eb; /* Light gray background for contrast */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-radius: 1rem;
            min-height: 400px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        #video-feed, #captured-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        #try-on-area {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Product Overlays - Improved Look */
        .product-overlay {
            position: absolute;
            cursor: grab;
            height: auto;
            object-fit: contain;
            user-select: none;
            touch-action: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* Deeper shadow for "floating" effect */
            border-radius: 0.5rem;
            transition: transform 0.1s ease-out;
        }
        .product-overlay:active {
            cursor: grabbing;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        /* Hidden canvas for capturing video frame */
        #hidden-canvas {
            display: none;
        }

        /* Product Card Styling */
        .product-card {
            transition: all 0.2s ease-in-out;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .product-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px -5px rgba(79, 70, 229, 0.3); /* Shadow with primary color tint */
            border-color: var(--primary-color);
        }
        
        /* Custom scrollbar for product list */
        #product-list-container {
            max-height: calc(100vh - 200px); /* Adjusted for layout */
            overflow-y: auto;
            padding-right: 5px;
        }
        #product-list-container::-webkit-scrollbar {
            width: 6px;
        }
        #product-list-container::-webkit-scrollbar-thumb {
            background-color: var(--primary-color);
            border-radius: 3px;
        }
        #product-list-container::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }
    </style>

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
						<a href="index-2.html"><img src="images/logo.jpg" alt="logo"></a>
					</div>

					<!-- EXTRA NAV -->
					<div class="extra-nav d-md-flex d-none m-l15">
						<div class="extra-cell">
							<ul class="navbar-nav header-right m-0">
								<li class="nav-item info-box ">
									<div class="nav-link">
										<div class="dz-icon">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
												style="enable-background:new 0 0 512 512" xml:space="preserve">
												<path style="fill:#3cc"
													d="M489.343 210.251c-4.827-105.317-92.01-189.513-198.498-189.513h-69.689c-106.488 0-193.67 84.197-198.498 189.513C9.495 214.747 0 227.228 0 241.894v78.61c0 18.436 15 33.436 33.437 33.436h60.996c6.075 0 11-4.925 11-11V219.458c0-6.075-4.925-11-11-11H44.789c5.699-92.338 82.618-165.72 176.366-165.72h69.689c93.749 0 170.667 73.381 176.366 165.72h-49.644c-6.075 0-11 4.925-11 11V342.94c0 6.075 4.925 11 11 11h60.996c18.436 0 33.436-15 33.436-33.436v-78.61c.002-14.666-9.493-27.147-22.655-31.643zM83.433 331.94H33.437c-6.306 0-11.437-5.13-11.437-11.436v-78.61c0-6.306 5.131-11.436 11.437-11.436h49.996V331.94zM490 320.504c0 6.306-5.131 11.436-11.436 11.436h-49.996V230.458h49.996c6.306 0 11.436 5.13 11.436 11.436v78.61z" />
												<path
													d="M256 491.262a11.001 11.001 0 0 1-8.402-3.9l-52.108-61.671h-74.566c-20.673 0-37.491-16.818-37.491-37.49V188.049c0-20.673 16.818-37.491 37.491-37.491h270.154c20.672 0 37.49 16.818 37.49 37.491V388.2c0 20.672-16.818 37.49-37.49 37.49h-74.566l-52.108 61.671a11.006 11.006 0 0 1-8.404 3.901zM120.923 172.558c-8.542 0-15.491 6.949-15.491 15.491V388.2c0 8.541 6.949 15.49 15.491 15.49h79.673c3.238 0 6.312 1.427 8.402 3.9L256 463.218l47.002-55.627a10.998 10.998 0 0 1 8.402-3.9h79.673c8.541 0 15.49-6.949 15.49-15.49V188.049c0-8.542-6.949-15.491-15.49-15.491H120.923z" />
												<path
													d="M193.81 259.09c-8.663.084-14.039-9.956-9.139-17.11 4.134-6.475 14.16-6.434 18.29 0 4.892 7.164-.483 17.196-9.151 17.11zM311.729 259.09c-7.629.166-13.258-8.219-10.16-15.21 3.614-8.972 16.705-8.978 20.31 0 3.113 6.979-2.526 15.376-10.15 15.21zM256 352.204c-25.31 0-50.619-10.009-73.192-30.028-4.545-4.03-4.962-10.982-.931-15.528 4.029-4.545 10.982-4.962 15.528-.931 36.689 32.536 80.501 32.538 117.19 0 4.547-4.031 11.497-3.614 15.528.931 4.031 4.546 3.614 11.498-.931 15.528-22.572 20.019-47.882 30.028-73.192 30.028z" />
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
						<form class="header-item-search">
							<div class="input-group search-input">
								<input type="text" class="form-control" aria-label="Text input with dropdown button"
									placeholder="Search for products">
								<button class="btn" type="button">
									<i class="iconly-Light-Search text-secondary"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Main Header End -->

			<!-- Main Header -->
			<div class="sticky-header main-bar-wraper navbar-expand-lg">
				<div class="main-bar clearfix">
					<div class="container clearfix d-lg-flex d-block">
						<!-- Website Logo -->
						<div class="logo-header logo-dark">
							<a href="index.html"><img src="images/logo.jpg" alt="logo"></a>
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
						<div class="header-nav w3menu navbar-collapse collapse justify-content-start"
							id="navbarNavDropdown">
							<div class="logo-header">
								<a href="index.html"><img src="images/logo.svg" alt=""></a>
							</div>
							<div class="browse-category-menu">
								<a href="javascript:void(0);" class="category-btn">
									<div class="category-menu me-3">
										<span></span>
										<span></span>
										<span></span>
									</div>
									<span class="category-btn-title">
										Browse Categories
									</span>
									<span class="toggle-arrow ms-auto">
										<i class="icon feather icon-chevron-down"></i>
									</span>
								</a>
								<div class="category-menu-items" style="display: none;">
									<ul class="nav navbar-nav">
										<li class="has-mega-menu cate-drop">
											<a href="javascript:void(0);">
												<i class="icon feather icon-arrow-right"></i>
												<span>Clothes</span>
												<span class="menu-icon">
													<i class="icon feather icon-chevron-right"></i>
												</span>
											</a>
											<div class="mega-menu" style="width: 100%;">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-6 p-2"><a
															href="javascript:void(0);"
															class="menu-title p-0 m-0">Men</a>
														<ul>
															<li><a href="shop-standard-men.html">T.Shirts</a></li>
															<li><a href="shop-standard-men.html">Polo Shirts</a></li>
															<li><a href="shop-standard-men.html">Dress Shirts</a></li>
															<li><a href="shop-standard-men.html">Jeans</a></li>
															<li><a href="shop-standard-men.html">Pants</a></li>
															<li><a href="shop-standard-men.html">Dress Pants</a></li>
															<li><a href="shop-standard-men.html">Kurta</a></li>

														</ul>
													</div>
													<div class="col-md-6 col-sm-6 col-6 p-2"><a
															href="shop-standard.html"
															class="menu-title p-0 m-0">Women</a>
														<ul>
															<li><a href="shop-standard-clothes.html">Eastern Clothes</a></li>
															<li><a href="shop-standard-clothes.html">Fusion</a></li>
															<li><a href="shop-standard-clothes.html">Western Clothes</a></li>
															<li><a href="shop-standard-clothes.html">Ready to Wear</a></li>
															<li><a href="shop-standard-clothes.html">Unstitched</a></li>
															<li><a href="shop-standard-clothes.html">Sleepovers</a></li>
															<li><a href="shop-standard-clothes.html">Modest Wear</a></li>

														</ul>
													</div>
												</div>
											</div>
										</li>

										<li class="cate-drop">
											<a href="javascript:void(0);">
												<i class="icon feather icon-arrow-right"></i>
												<span>Shoes</span>
												<span class="menu-icon">
													<i class="icon feather icon-chevron-right"></i>
												</span>
											</a>

											<ul class="sub-menu p-0 m-0">
												<li class="p-0 m-0">
													<div class="row g-0">

														<!-- Men Column -->
														<div class="col-md-6 col-sm-6 col-6 p-2">
															<h6 class="fw-bold mb-2">Men</h6>
															<ul class="list-unstyled">
																<li><a href="shop-standard-.html">Loafer</a></li>
																<li><a href="shop-standard.html">Sneakers</a></li>
																<li><a href="shop-standard.html">Brouges</a></li>
																<li><a href="shop-standard.html">Boots</a></li>

															</ul>
														</div>

														<!-- Women Column -->
														<div class="col-md-6 col-sm-6 col-6 p-2">
															<h6 class="fw-bold mb-2">Women</h6>
															<ul class="list-unstyled ">
																<li><a href="shop-standard.html">Loafer</a></li>
																<li><a href="shop-standard.html">Heels</a></li>
																<li><a href="shop-standard.html">Flat</a></li>
																<li><a href="shop-standard.html">Boots</a></li>
															</ul>
														</div>

													</div>
												</li>
											</ul>
										</li>
										<li class="cate-drop">
											<a href="javascript:void(0);">
												<i class="icon feather icon-arrow-right"></i>
												<span>Cosmetics</span>
												<span class="menu-icon">
													<i class="icon feather icon-chevron-right"></i>
												</span>
											</a>

											<ul class="sub-menu p-0 m-0">
												<li class="p-0 m-0">
													<div class="row g-0">
														<!-- Men Column -->
														<div class="col-md-6 col-sm-6 col-6 p-4">

															<ul class="list-unstyled ">
																<li><a href="shop-standard.html">SkinCare</a></li>
																<li><a href="shop-standard.html">Makeup</a></li>
																<li><a href="shop-standard.html">HairCare</a></li>

															</ul>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<li>
											<a href="jewellery.html">
												<i class="icon feather icon-arrow-right"></i>
												<span>Jewellery</span>
											</a>
										</li>
										<li>
											<a href="bags.html">
												<i class="icon feather icon-arrow-right"></i>
												<span>Bags</span>
											</a>
										</li>

									</ul>
								</div>
							</div>
							<ul class="nav navbar-nav">
								<!-- <li class="has-mega-menu sub-menu-down auto-width menu-left">
								<a href="javascript:void(0);"><span>Home</span><i class="fas fa-chevron-down tabindex" ></i></a> -->
								<!-- <div class="mega-menu "> -->
								<!-- <ul class="demo-menu mb-0">
										<li> -->
								<!-- <a href="index.html">
												<img src="images/demo/demo-1.png" alt="/">
												<span class="menu-title">01 Home Page</span>
											</a>
										</li> -->
								<li>
									<a href="index-2.html">

										<span class="menu-title">Home</span>
									</a>
								</li>
								<!-- <li>
											<a href="index-3.html">
												<img src="images/demo/demo-3.png" alt="/">
												<span class="menu-title">03 Home Page</span>
											</a>
										</li> -->
								<!-- </ul> -->
								<!-- </div> -->
								<!-- </li> -->
								<li class="has-mega-menu sub-menu-down" style="position:relative;">
									<a href="javascript:void(0)"><span>Collections</span><i
											class="fas fa-chevron-down tabindex"></i></a>
									<div class="mega-menu shop-menu p-2 m-2 "style="max-width:100%">
										<ul class="list-unstyled m-0 p-2">
											<li><a href="tryon.html" class="d-block py-1">Try On </a></li>
											<!-- <li><a href="shop-list.html" class="d-block py-1">Trendings</a></li> -->
											<li><a href="shop-standard.html" class="d-block py-1">Brands</a></li>
											<!-- <li><a href="shop-filters-top-bar.html" class="d-block py-1">Local
													Market</a></li> -->
										</ul>
									</div>
								</li>

<li class="has-mega-menu sub-menu-down" style="position:relative;">
    <a href="javascript:void(0)">
        <span>Pages</span>
        <i class="fas fa-chevron-down tabindex"></i>
    </a>
    <div class="mega-menu shop-menu p-2 m-2" style="width:max-content; white-space:nowrap; display:flex; flex-direction:column;">
        <ul class="list-unstyled m-0 p-0" style="display:flex; flex-direction:column;">
            <li><a href="about-us.html" class="d-block py-1">About Us</a></li>
            <li><a href="faqs-2.html" class="d-block py-1">Faqs</a></li>
            <li><a href="our-team.html" class="d-block py-1">Our Team</a></li>
            <li><a href="error-1.html" class="d-block py-1">Error 404</a></li>
        </ul>
    </div>
</li>
	<li>
									<a href="contact-us-1.html">Contact Us</a>
								</li>
							</ul>
						</div>
						</li>
						</ul>
						<!-- <div class="dz-social-icon">
							<ul>
								<li><a class="fab fa-facebook-f" target="_blank"
										href="https://www.facebook.com/dexignzone"></a></li>
								<li><a class="fab fa-twitter" target="_blank"
										href="https://twitter.com/dexignzones"></a></li>
								<li><a class="fab fa-linkedin-in" target="_blank"
										href="https://www.linkedin.com/showcase/3686700/admin/"></a></li>
								<li><a class="fab fa-instagram" target="_blank"
										href="https://www.instagram.com/dexignzone/"></a></li>
							</ul>
						</div> -->


						<!-- EXTRA NAV -->
						<div class="extra-nav">
							<div class="extra-cell">
								<ul class="header-right">
									<li class="nav-item login-link">
										<a class="nav-link" href="login.html">
											Login / Register
										</a>
									</li>
									<li class="nav-item search-link">
										<a class="nav-link" href="javascript:void(0);" data-bs-toggle="offcanvas"
											data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
											<i class="iconly-Light-Search"></i>
										</a>
									</li>
									<li class="nav-item wishlist-link">
										<a class="nav-link" href="javascript:void(0);" data-bs-toggle="offcanvas"
											data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
											<i class="iconly-Light-Heart2"></i>
										</a>
									</li>
									<li class="nav-item cart-link">
										<a href="javascript:void(0);" class="nav-link cart-btn"
											data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
											aria-controls="offcanvasRight">
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
	<!-- Main Header End -->

    <div class="max-w-7xl mx-auto">
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Virtual Try-On Studio</h1>
            <p class="text-lg text-gray-500 mt-1">Capture your look or upload a photo, then try on accessories from the catalog.</p>
        </header>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- LEFT SIDE: Camera/Image Area & Controls -->
            <div class="lg:w-3/4 w-full">
                <div class="bg-white p-6 shadow-2xl rounded-2xl">
                    <div id="media-container" class="w-full h-auto mb-6">
                        <!-- Video/Captured Image will be placed here -->
                        <video id="video-feed" class="rounded-xl hidden" autoplay playsinline></video>
                        <div id="try-on-area" class="w-full h-full flex justify-center items-center">
                            <img id="captured-image" class="hidden max-h-[70vh] rounded-xl" alt="Captured or Uploaded Image">
                            <p id="placeholder-text" class="text-gray-400 text-xl font-medium">Use the buttons below to load an image.</p>
                        </div>
                    </div>

                    <canvas id="hidden-canvas" width="640" height="480"></canvas>

                    <!-- Camera/Upload Controls - Grouped and Enhanced -->
                    <div id="controls" class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <button id="camera-btn" class="col-span-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg shadow-indigo-300/50 disabled:opacity-50 flex items-center justify-center text-sm sm:text-base">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.865-1.73A2 2 0 0113.813 5h5.374a2 2 0 011.838 1.11l.866 1.73A2 2 0 0022.07 9H23a1 1 0 011 1v9a2 2 0 01-2 2H2a2 2 0 01-2-2v-9a1 1 0 011-1h2zM9 14a3 3 0 100-6 3 3 0 000 6z"></path></svg>
                            Start Live
                        </button>
                        <input type="file" id="upload-input" accept="image/*" class="hidden">
                        <button id="upload-btn" class="col-span-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-xl transition duration-300 flex items-center justify-center text-sm sm:text-base">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Upload Photo
                        </button>
                        <button id="capture-btn" class="col-span-1 bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg shadow-green-300/50 disabled:opacity-50 text-sm sm:text-base" disabled>
                            Snap Photo
                        </button>
                        <button id="clear-btn" class="col-span-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-xl transition duration-300 text-sm sm:text-base" onclick="clearOverlays()">
                            Clear Items
                        </button>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDE: Product Catalog -->
            <div class="lg:w-1/4 w-full">
                <div class="bg-white p-6 shadow-2xl rounded-2xl h-full">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900">Product Catalog</h2>
                    <p class="text-sm text-gray-500 mb-4">Click an item to place it on the image. Drag to adjust position.</p>
                    
                    <div id="product-list-container">
                        <div id="product-list" class="grid grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-4">
                            <!-- Products will be generated here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Footer -->
	<footer class="site-footer bg-light">
    <!-- Footer Top -->
    <div class="footer-top py-5">
        <div class="container">
            <div class="row">

                <!-- About / Logo -->
                <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                    <div class="widget widget_about">
                        <div class="footer-logo logo-dark mb-3">
                            <a href="index.html"><img src="images/logo.jpg" alt="FAM Fashion Hub"></a>
                        </div>
                        <p>FAM Fashion Hub is your ultimate destination for clothes, shoes, cosmetics, jewellery, and bags. Shop the latest trends and local brands with ease!</p>
                        <ul class="widget-address list-unstyled mt-3">
                            <li><span>Address:</span> 451 Fashion Street, Karachi, Pakistan</li>
                            <li><span>E-mail:</span> info@famfashionhub.com</li>
                            <li><span>Phone:</span> +92 300 1234567</li>
                        </ul>
                    </div>
                </div>

                <!-- Browse Categories -->
                <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Browse Categories</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="collections.html">Collections</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="pages.html">Pages</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="login.html">Login / Register</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Product Categories -->
                <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Categories</h5>
                        <ul class="list-unstyled">
                            <li><a href="clothes.html">Clothes</a></li>
                            <li><a href="shoes.html">Shoes</a></li>
                            <li><a href="cosmetics.html">Cosmetics</a></li>
                            <li><a href="jewellery.html">Jewellery</a></li>
                            <li><a href="bags.html">Bags</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact / Socials -->
                <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Connect With Us</h5>
                        <p>Follow FAM Fashion Hub on social media and stay updated with the latest collections and offers.</p>
                        <div class="d-flex gap-3 mt-3">
                            <a href="javascript:void(0);" class="btn btn-outline-primary btn-sm">Facebook</a>
                            <a href="javascript:void(0);" class="btn btn-outline-danger btn-sm">Instagram</a>
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm">Twitter</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Top End -->

    <!-- Footer Bottom -->
    <div class="footer-bottom py-3 bg-secondary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <span class="current-year">2024</span> FAM Fashion Hub. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="me-2">We Accept:</span>
                    <img src="images/footer-img.png" alt="Payment Methods" class="img-fluid" style="max-height:30px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>

	<!-- Footer End -->

    <script>
        // --- DOM Elements ---
        const videoFeed = document.getElementById('video-feed');
        const capturedImage = document.getElementById('captured-image');
        const hiddenCanvas = document.getElementById('hidden-canvas');
        const mediaContainer = document.getElementById('media-container');
        const tryOnArea = document.getElementById('try-on-area');
        const cameraBtn = document.getElementById('camera-btn');
        const uploadBtn = document.getElementById('upload-btn');
        const uploadInput = document.getElementById('upload-input');
        const captureBtn = document.getElementById('capture-btn');
        const placeholderText = document.getElementById('placeholder-text');
        const productList = document.getElementById('product-list');

        let stream = null;
        let isImageLoaded = false;
        let currentBaseImage = null; // Stores the image element or video element being displayed
        
        // --- PRODUCT CATALOG DATA ---
        // IMPORTANT: Replace the 'src' value below with the direct URL of your transparent PNG product images.
        const products = [
            // Sunglasses - Use a transparent PNG URL for a clean overlay
            { id: 1, name: "Pendant", src: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTslZO6GbLQAhU7dpdi4InVhKeXX9Nl9dsewQ&s" }, 
            
            // Hat/Cap - Use a transparent PNG URL for headwear
            { id: 2, name: "Stud", src: "https://images-cdn.ubuy.co.in/666a407a194d8f33273ce83c-14k-gold-round-single-diamond-stud.jpg" },
            
            // Necklace/Chain - Use a transparent PNG URL for jewelry
            { id: 3, name: "Earing", src: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzKiwYryusDrYbLcQ0R2SjBBP5LMB6P4IUYw&s" }, 
            
            // Small Accessory (e.g., earring, badge)
            { id: 4, name: "Bag", src: "https://e7.pngegg.com/pngimages/194/154/png-clipart-handbag-messenger-bags-women-bag-luggage-bags-orange.png" }, 
            
            // Watch/Bracelet - Use a transparent PNG URL for wrist wear
            { id: 5, name: "T-Shirt", src: "https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDI1LTAyL3Jhd3BpeGVsb2ZmaWNlM18zZF9yZWFsaXN0aWNfbWVuc19ncmVlbl90LXNoaXJ0X21vY2t1cF9mcm9udF92aV9lODQ4MTNkOS03NDMxLTQyZmMtYjBmMi02ODhhOTU3YWViYjctbTdidDNsd2cucG5n.png" }, 
            
            // Scarf/Collar - Use a transparent PNG URL for neckwear
            { id: 6, name: "Dress", src: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXYnH-oDq5hJ1wN5Z-Ev-q3uzzDLACc1aJ3g&s" }, 
        ];


        // --- Utility Functions ---

        /**
         * Starts the user's camera stream.
         */
        async function startCamera() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: { facingMode: 'user' },
                });

                videoFeed.srcObject = stream;
                videoFeed.classList.remove('hidden');
                capturedImage.classList.add('hidden');
                placeholderText.classList.add('hidden');
                captureBtn.disabled = false;
                cameraBtn.textContent = 'Stop Live';
                cameraBtn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700', 'shadow-indigo-300/50');
                cameraBtn.classList.add('bg-red-600', 'hover:bg-red-700', 'shadow-red-300/50');
                isImageLoaded = false;
                currentBaseImage = videoFeed;
                clearOverlays();

                videoFeed.onloadedmetadata = () => {
                    hiddenCanvas.width = videoFeed.videoWidth;
                    hiddenCanvas.height = videoFeed.videoHeight;
                    const aspectRatio = videoFeed.videoHeight / videoFeed.videoWidth;
                    mediaContainer.style.height = `${mediaContainer.offsetWidth * aspectRatio}px`;
                    tryOnArea.style.height = '100%';
                };

            } catch (err) {
                console.error("Error accessing camera:", err);
                alertBox('Error', `Could not access the camera. Please ensure permissions are granted.`);
            }
        }

        /**
         * Stops the current camera stream and resets the buttons.
         */
        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            videoFeed.classList.add('hidden');
            captureBtn.disabled = true;
            cameraBtn.textContent = 'Start Live';
            cameraBtn.classList.remove('bg-red-600', 'hover:bg-red-700', 'shadow-red-300/50');
            cameraBtn.classList.add('bg-indigo-600', 'hover:bg-indigo-700', 'shadow-indigo-300/50');
        }

        /**
         * Captures the current frame from the video feed.
         */
        function capturePhoto() {
            if (!stream) return;

            const context = hiddenCanvas.getContext('2d');
            context.drawImage(videoFeed, 0, 0, hiddenCanvas.width, hiddenCanvas.height);
            const dataUrl = hiddenCanvas.toDataURL('image/png');

            capturedImage.src = dataUrl;
            capturedImage.classList.remove('hidden');
            videoFeed.classList.add('hidden');
            placeholderText.classList.add('hidden');
            isImageLoaded = true;
            currentBaseImage = capturedImage;

            // Adjust the try-on area size based on the captured image
            mediaContainer.style.height = 'auto';
            tryOnArea.style.height = `${capturedImage.offsetHeight}px`;
            
            // Stop the camera after capturing
            stopCamera();
        }

        /**
         * Handles the base image file upload (the person's photo).
         */
        function handleBaseImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                if (stream) {
                    stopCamera();
                    isImageLoaded = false;
                    currentBaseImage = null;
                }
                clearOverlays();

                const reader = new FileReader();
                reader.onload = function(e) {
                    capturedImage.src = e.target.result;
                    capturedImage.onload = () => {
                        capturedImage.classList.remove('hidden');
                        videoFeed.classList.add('hidden');
                        placeholderText.classList.add('hidden');
                        isImageLoaded = true;
                        currentBaseImage = capturedImage;

                        // Adjust the try-on area size
                        mediaContainer.style.height = 'auto';
                        tryOnArea.style.height = `${capturedImage.offsetHeight}px`;
                    };
                };
                reader.readAsDataURL(file);
            }
        }
        
        // --- Try-On Logic ---

        /**
         * Generates an image overlay for a product and adds it to the try-on area.
         */
        function tryOnProduct(product) {
            if (!isImageLoaded) {
                alertBox('Action Required', 'Please capture or upload an image first before trying on products.');
                return;
            }

            const overlay = document.createElement('img');
            overlay.src = product.src;
            overlay.alt = product.name;
            overlay.id = `overlay-${Date.now()}`;
            overlay.classList.add('product-overlay');
            
            // Set initial dimensions and position to center
            overlay.style.width = '100px'; 
            
            const containerWidth = tryOnArea.offsetWidth;
            const containerHeight = tryOnArea.offsetHeight;

            // Start position: center of the container, minus half the new default overlay size (100px / 2 = 50px)
            overlay.style.transform = `translate3d(${containerWidth / 2 - 50}px, ${containerHeight / 2 - 50}px, 0)`; 
            
            addDragInteraction(overlay);
            tryOnArea.appendChild(overlay);
        }

        /**
         * Clears all product overlays from the try-on area.
         */
        function clearOverlays() {
            document.querySelectorAll('.product-overlay').forEach(el => el.remove());
        }


        // --- Drag and Drop/Touch Interaction Logic ---
        function addDragInteraction(element) {
            let active = false;
            let currentX = 0; // Final translation X
            let currentY = 0; // Final translation Y
            let initialX; // Cursor position when drag started
            let initialY;
            let xOffset = 0; // Initial element translation X
            let yOffset = 0; // Initial element translation Y

            function dragStart(e) {
                // Get current translation offset from the element's transform style
                const style = window.getComputedStyle(element);
                const matrix = new DOMMatrixReadOnly(style.transform);
                xOffset = matrix.m41;
                yOffset = matrix.m42;

                // Get cursor/touch start position
                let clientX = e.type === "touchstart" ? e.touches[0].clientX : e.clientX;
                let clientY = e.type === "touchstart" ? e.touches[0].clientY : e.clientY;

                // Calculate the difference between cursor position and element's current translation origin
                initialX = clientX - xOffset;
                initialY = clientY - yOffset;

                if (e.target === element) {
                    active = true;
                    element.style.cursor = 'grabbing';
                }
            }

            function dragEnd() {
                active = false;
                element.style.cursor = 'grab';
            }

            function drag(e) {
                if (active) {
                    e.preventDefault();

                    let clientX = e.type === "touchmove" ? e.touches[0].clientX : e.clientX;
                    let clientY = e.type === "touchmove" ? e.touches[0].clientY : e.clientY;

                    // Calculate the new translation: Current cursor position - Initial offset
                    currentX = clientX - initialX;
                    currentY = clientY - initialY;

                    element.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
                }
            }

            // Mouse events
            element.addEventListener("mousedown", dragStart, false);
            document.addEventListener("mouseup", dragEnd, false);
            document.addEventListener("mousemove", drag, false);

            // Touch events
            element.addEventListener("touchstart", dragStart, false);
            document.addEventListener("touchend", dragEnd, false);
            element.addEventListener("touchmove", drag, false);
        }

        // --- UI Setup and Event Listeners ---

        /**
         * Generates the product list HTML.
         */
        function renderProductList() {
            productList.innerHTML = products.map(product => `
                <div class="product-card p-3 bg-gray-50 rounded-xl shadow-md flex flex-col items-center border border-gray-200"
                     onclick="tryOnProduct({id: ${product.id}, name: '${product.name}', src: '${product.src}'})">
                    <!-- Ensure the product image looks good. Replace this URL with your transparent PNG -->
                    <img src="${product.src}" alt="${product.name}" class="w-24 h-24 object-contain rounded-md mb-2 border border-gray-300 p-1 bg-white" onerror="this.onerror=null; this.src='https://placehold.co/100x100/CCCCCC/000000?text=Error'">
                    <span class="text-xs font-semibold text-gray-700 text-center uppercase">${product.name}</span>
                </div>
            `).join('');
        }

        
        /**
         * Custom alert box function to replace window.alert
         */
        function alertBox(title, message) {
            const existingAlert = document.getElementById('custom-alert');
            if (existingAlert) existingAlert.remove();

            const alertDiv = document.createElement('div');
            alertDiv.id = 'custom-alert';
            alertDiv.className = 'fixed top-4 right-4 z-50 p-4 bg-red-600 text-white rounded-xl shadow-2xl transition-opacity duration-300 opacity-0 transform translate-y-4 max-w-xs';
            alertDiv.innerHTML = `
                <h4 class="font-bold">${title}</h4>
                <p class="text-sm mt-1">${message}</p>
            `;
            document.body.appendChild(alertDiv);

            // Show and then hide
            setTimeout(() => {
                alertDiv.classList.remove('opacity-0', 'translate-y-4');
            }, 50);

            setTimeout(() => {
                alertDiv.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => alertDiv.remove(), 300);
            }, 5000);
        }

        // Main event setup
        document.addEventListener('DOMContentLoaded', () => {
            
            // Render the product list on load
            renderProductList();

            // Camera toggle (Start/Stop Live)
            cameraBtn.addEventListener('click', () => {
                if (stream) {
                    // Manual Stop Live (Full Reset)
                    stopCamera();
                    isImageLoaded = false;
                    currentBaseImage = null;
                    capturedImage.classList.add('hidden');
                    placeholderText.classList.remove('hidden');
                    clearOverlays();
                    mediaContainer.style.height = '400px'; // Reset height
                    
                } else {
                    // Start Live
                    startCamera();
                }
            });

            // Capture photo
            captureBtn.addEventListener('click', capturePhoto);

            // Base Image Upload trigger
            uploadBtn.addEventListener('click', () => {
                uploadInput.click();
            });

            // Base Image Upload handling
            uploadInput.addEventListener('change', handleBaseImageUpload);
            
            // Removed product upload logic, replaced by static catalog clicks
        });

    </script>
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="js/jquery.min.js"></script><!-- JQUERY MIN JS -->
	<script src="vendor/wow/wow.min.js"></script><!-- WOW JS -->
	<script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP MIN JS -->
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT MIN JS -->
	<script src="vendor/bootstrap-touchspin/bootstrap-touchspin.js"></script><!-- BOOTSTRAP TOUCHSPIN JS -->
	<script src="vendor/swiper/swiper-bundle.min.js"></script><!-- SWIPER JS -->
	<script src="vendor/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
	<script src="vendor/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED-->
	<script src="vendor/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
	<script src="vendor/masonry/isotope.pkgd.min.js"></script><!-- ISOTOPE -->
	<script src="vendor/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
	<script src="vendor/wnumb/wNumb.js"></script><!-- WNUMB -->
	<script src="vendor/nouislider/nouislider.min.js"></script><!-- NOUSLIDER MIN JS-->
	<script src="js/dz.carousel.js"></script><!-- DZ CAROUSEL JS -->
	<script src="vendor/lightgallery/dist/lightgallery.min.js"></script>
	<script src="vendor/group-slide/group-loop.js"></script><!-- group JS -->
	<script src="vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js"></script>
	<script src="vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js"></script>
	<script src="js/dz.ajax.js"></script><!-- AJAX -->
	<script src="js/custom.min.js"></script><!-- CUSTOM JS -->
 
</body>
</html>


  