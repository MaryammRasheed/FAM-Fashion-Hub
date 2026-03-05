@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
	<div class="page-content bg-light">

		<!--Swiper Banner Start -->
		<div class="main-slider style-2">
			<div class="main-swiper2">
				<div class="container ">
					<div class="banner-content align-items-center">
						<div class="row">
							<div class="col-xl-7 col-lg-7 col-md-12 pt-4 align-items-center d-flex flex-column justify-content-center text-center">
    <div class="swiper-content">
        <div class="content-info" style="text-align: center;">
            <h1 class="offer-title mb-0" data-swiper-parallax="-20"
                style="font-size: 4.5rem; font-weight: 600; line-height: 1.2;">
                <span class="text-primary">Shop What You Love</span>
                <br>
                <span style="color: #000; font-weight: 500;">Love What You Get</span>
            </h1>
        </div>

        <div class="content-btn" data-swiper-parallax="-60" style="text-align: center;">
            <a class="btn btn-secondary me-3" href="shop-cart.html">ADD TO CART</a>
            <a class="btn btn-outline-secondary" href="shop-standard.html">VIEW DETAILS</a>
        </div>
    </div>
</div>


							<div class="col-xl-5 col-lg-5 col-md-12">
								<div class="banner-media">
									<div class="shap"></div>
									<div class="border-shap"></div>
									<div class="border-shap2"></div>

									<div class="img-preview" data-swiper-parallax="-100">
										<img src="images/main-slider/slider2/slider-2.jpg" alt="banner-media">
									</div>
									<div class="bnr-content-bx slideskew">
										<div class="dz-media">
											<img src="images/shop/product/small/1.png" alt="">
										</div>
										<div class="dz-info">
											<h5 class="dz-title">Cozy Knit Cardigan</h5>
											<h6 class="price text-primary">PKR 8000</h6>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="bnr-customer-bx slideskew">
										<i class="icon feather icon-heart-on dz-heart"></i>
										<ul>
											<li class="customer-image">
												<img src="images/testimonial/testimonial1.jpg" alt="">
											</li>
											<li class="customer-image">
												<img src="images/testimonial/testimonial2.jpg" alt="">
											</li>
											<li class="customer-image">
												<img src="images/testimonial/testimonial3.jpg" alt="">
											</li>
										</ul>
									</div>
									<ul class="star-list">
										<li class="star-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
												viewBox="0 0 57 57" fill="none">
												<path
													d="M28.5 0L33.3366 23.6634L57 28.5L33.3366 33.3366L28.5 57L23.6634 33.3366L0 28.5L23.6634 23.6634L28.5 0Z"
													fill="var(--rgba-primary-2)" />
											</svg>
										</li>
										<li class="star-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
												viewBox="0 0 57 57" fill="none">
												<path
													d="M28.5 0L33.3366 23.6634L57 28.5L33.3366 33.3366L28.5 57L23.6634 33.3366L0 28.5L23.6634 23.6634L28.5 0Z"
													fill="var(--rgba-primary-2)" />
											</svg>
										</li>
										<li class="star-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57"
												viewBox="0 0 57 57" fill="none">
												<path
													d="M28.5 0L33.3366 23.6634L57 28.5L33.3366 33.3366L28.5 57L23.6634 33.3366L0 28.5L23.6634 23.6634L28.5 0Z"
													fill="var(--rgba-primary-2)" />
											</svg>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="banner-social-media style-2 left">
					<ul>
						<li>
							<a href="https://www.instagram.com/dexignzone/" target="_blank">Instagram</a>
						</li>
						<li>
							<a href="https://www.facebook.com/dexignzone" target="_blank">Facebook</a>
						</li>
						<li>
							<a href="https://twitter.com/dexignzones" target="_blank">twitter</a>
						</li>
					</ul>
				</div>
				<a href="contact-us-2.html" class="service-btn btn-dark">Let’s talk</a>
			</div>
		</div>
		<!--Swiper Banner End-->

		<!--Featured Section Start-->
		<div class="content-inner category-section">
			<div class="container">
				<div class="row gx-xl-4 g-3">
					<div class="col-xl-4 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.2s">
						<div class="category-product left product-1">
							<a href="shop-with-category.html">
								<img src="images/category/img-cloth.jpg" alt="">
								<div class="category-badge">Clothes</div>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.3s">
						<div class="category-product left product-2">
							<a href="shop-with-category.html">
								<img src="images/category/imgshoes.jpg" alt="">
								<div class="category-badge">Shoes</div>
							</a>
						</div>
					</div>
					<div class="col-xl-5 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.4s">
						<div class="category-product left product-3">
							<a href="shop-with-category.html">
								<img src="images/category/img-cos.jpg" alt="">
								<div class="category-badge">Coemetics</div>
							</a>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.5s">
						<div class="category-product right product-4">
							<a href="shop-with-category.html">
								<img src="images/category/img-jewellery.jpg" alt="">
								<div class="category-badge">Jewellery</div>
							</a>
						</div>
					</div>
					<div class="col-xl-5 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.6s">
						<div class="category-product right product-5">
							<a href="shop-with-category.html">
								<img src="images/category/bags.jpg" alt="">
								<div class="category-badge">Bags</div>
							</a>
						</div>
					</div>
					<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="0.7s">
						<div class="category-product right product-6">
							<a href="shop-with-category.html">
								<img src="images/category/pic6.jpg" alt="">
								<div class="category-badge">Blazer</div>
							</a>
						</div>
					</div> -->
				</div>
			</div>
			<a class="icon-button" href="shop-with-category.html">
				<div class="text-row word-rotate-box c-black border-white">
					<span class="word-rotate">category - category -</span>
					<svg class="badge__emoji" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
						viewBox="0 0 40 40" fill="none">
						<g clip-path="url(#clip0_161_568)">
							<path
								d="M10.7239 31.3072L19.0059 39.5891C19.2696 39.8523 19.627 40.0001 19.9995 40.0001C20.3721 40.0001 20.7295 39.8523 20.9932 39.5891L29.2752 31.3072C29.4582 31.1236 29.5608 30.8748 29.5606 30.6156C29.5604 30.3564 29.4573 30.1078 29.274 29.9245C29.0907 29.7412 28.8421 29.6381 28.5829 29.6379C28.3237 29.6377 28.075 29.7404 27.8913 29.9234L20.9781 36.8368V0.978516C20.9781 0.718997 20.875 0.470108 20.6915 0.286601C20.508 0.103093 20.2591 0 19.9995 0C19.74 0 19.4911 0.103093 19.3076 0.286601C19.1241 0.470108 19.021 0.718997 19.021 0.978516V36.8368L12.1077 29.9234C11.9241 29.7404 11.6754 29.6377 11.4162 29.6379C11.1569 29.6381 10.9084 29.7412 10.7251 29.9245C10.5418 30.1078 10.4387 30.3564 10.4385 30.6156C10.4383 30.8748 10.5409 31.1236 10.7239 31.3072Z"
								fill="#000" />
						</g>
						<defs>
							<clipPath id="clip0_161_568">
								<rect width="40" height="40" fill="#000" />
							</clipPath>
						</defs>
					</svg>
				</div>
			</a>
		</div>
		<!--Featured Section End-->

		<!-- Tranding Start-->
		<section class="content-inner-1 overflow-hidden">
			<div class="container">
				<div class=" row justify-content-md-between align-items-center">
					<div class="col-lg-6 col-md-8 col-sm-12">
						<div class="section-head style-1 m-b30  wow fadeInUp" data-wow-delay="0.2s">
							<div class="left-content">
								<h2 class="title">What's trending now</h2>
								<p>Discover the most trending products in Pixio.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-4 col-sm-12 text-md-end">
						<a class="btn btn-secondary m-b30" href="shop-cart.html">View All</a>
					</div>
				</div>

				<div class="swiper-btn-center-lr">
					<div class="swiper swiper-four">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.2s">
									<div class="dz-media">
										<img src="images/shop/product/img1.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Women Casuals</a></h5>
										<h5 class="price">PKR 3,400</h5>
									</div>

								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.3s">
									<div class="dz-media">
										<img src="images/shop/product/img2.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Woemn Fusion Wears</a></h5>
										<h5 class="price">PKR 4,500</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.4s">
									<div class="dz-media">
										<img src="images/shop/product/img4.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Classic Ready to Wear</a></h5>
										<h5 class="price">PKR 5,400</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.5s">
									<div class="dz-media">
										<img src="images/shop/product/img-men2.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Men T.Shirts</a>
										</h5>
										<h5 class="price">PKR 2,400</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.6s">
									<div class="dz-media">
										<img src="images/shop/product/img-men12.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Men Beautiful Kurta Wear</a></h5>
										<h5 class="price">PKR 5,000</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.7s">
									<div class="dz-media">
										<img src="images/shop/product/bags/2-1.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Beautiful Bags</a></h5>
										<h5 class="price">PKR 5,600</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.8s">
									<div class="dz-media">
										<img src="images/shop/product/jewellery/IMG-20240430-WA0011.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Jewellery</a></h5>
										<h5 class="price">5,400</h5>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="shop-card wow fadeInUp" data-wow-delay="0.9s">
									<div class="dz-media">
										<img src="images/shop/product/img-men6.jpg" alt="image">
										<div class="shop-meta">
											<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded"
												data-bs-toggle="modal" data-bs-target="#exampleModal">
												<i class="fa-solid fa-eye d-md-none d-block"></i>
												<span class="d-md-block d-none">Quick View</span>
											</a>
											<div class="btn btn-primary meta-icon dz-wishicon">
												<i class="icon feather icon-heart dz-heart"></i>
												<i class="icon feather icon-heart-on dz-heart-fill"></i>
											</div>
											<div class="btn btn-primary meta-icon dz-carticon">
												<i class="flaticon flaticon-basket"></i>
												<i class="flaticon flaticon-basket-on dz-heart-fill"></i>
											</div>
										</div>
									</div>
									<div class="dz-content">
										<h5 class="title"><a href="shop-list.html">Men Polo Shirts</a>
										</h5>
										<h5 class="price">PKR 5,500</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Tranding Stop-->

		<section class="video-section">
			<div class="video-wrapper bg-parallax" style="background-image:url('images/background/bg2.jpg');">
				<div class="container">
					<div class="d-flex justify-content-center">
						<a class="icon-button popup-youtube" href="https://www.youtube.com/watch?v=YwYoyQ1JdpQ">
							<div class="text-row word-rotate-box border-white c-black">
								<span class="word-rotate">shop - shop - shop - shop -</span>
								<svg class="badge__emoji" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
									viewBox="0 0 40 40" fill="none">
									<g clip-path="url(#clip0_671_345)">
										<path
											d="M34.6779 15.3843L11.0529 0.821429C9.34369 -0.230839 7.2772 -0.274589 5.52493 0.704398C3.77266 1.68323 2.72656 3.46612 2.72656 5.47323V34.4664C2.72656 37.5013 5.17188 39.9835 8.17735 39.9999C8.18556 39.9999 8.19376 40 8.20181 40C9.14103 39.9999 10.1198 39.7056 11.0339 39.1478C11.7693 38.6991 12.0017 37.7392 11.5531 37.0039C11.1044 36.2685 10.1444 36.0361 9.40923 36.4848C8.98165 36.7456 8.56407 36.8805 8.19415 36.8804C7.06016 36.8742 5.84602 35.9028 5.84602 34.4665V5.47331C5.84602 4.6123 6.29477 3.84769 7.04634 3.42776C7.79798 3.00784 8.68431 3.02659 9.41658 3.47745L33.0417 18.0404C33.7518 18.4776 34.1581 19.2065 34.1564 20.0405C34.1547 20.8743 33.7454 21.6016 33.0314 22.0373L15.9503 32.4958C15.2156 32.9456 14.9847 33.9059 15.4346 34.6405C15.8843 35.3752 16.8446 35.6061 17.5792 35.1563L34.6583 24.6991C36.2935 23.7015 37.2721 21.9624 37.276 20.0467C37.2799 18.1312 36.3083 16.3881 34.6779 15.3843Z"
											fill="#FEEB9D" />
									</g>
									<defs>
										<clipPath id="clip0_671_345">
											<rect width="40" height="40" fill="white" />
										</clipPath>
									</defs>
								</svg>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="dz-features-wrapper overflow-hidden">
				<ul class="dz-features text-wrapper">
					<li class="item">
						<h2 class="title">Jacket</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Jeans</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Shirts</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Shorts</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">t-shirt</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Blazer</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Jacket</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Jeans</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Shirts</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
					<li class="item">
						<h2 class="title">Shorts</h2>
					</li>
					<li class="item">
						<svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
							<path opacity="0.3"
								d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z"
								fill="black" />
						</svg>
					</li>
				</ul>
			</div>
		</section>

		<!-- Products  Section Start-->
		<section class="content-inner">
			<div class="container">
				<div class=" row justify-content-md-between align-items-start">
					<div class="col-lg-6 col-md-12">
						<div class="section-head style-1 m-b30  wow fadeInUp" data-wow-delay="0.2s">
							<div class="left-content">
								<h2 class="title">Most popular products</h2>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="site-filters clearfix style-1 align-items-center wow fadeInUp ms-lg-auto"
							data-wow-delay="0.4s">
							<ul class="filters" data-bs-toggle="buttons">
								<li class="btn active">
									<input type="radio">
									<a href="javascript:void(0);">ALL</a>
								</li>
								<li data-filter=".Dresses" class="btn">
									<input type="radio">
									<a href="javascript:void(0);">Dresses</a>
								</li>
								<li data-filter=".Tops" class="btn">
									<input type="radio">
									<a href="javascript:void(0);">Bags</a>
								</li>
								<li data-filter=".Outerwear" class="btn">
									<input type="radio">
									<a href="javascript:void(0);">Shoes</a>
								</li>
								<li data-filter=".Jacket" class="btn">
									<input type="radio">
									<a href="javascript:void(0);">Western</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearfix">
					<ul id="masonry" class="row g-xl-4 g-3">
					<div class="row gx-xl-4 g-3 mb-xl-0 mb-md-0 mb-3">
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img1.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Pakistani Eastern Wear Suit</a></h5>
													<h5 class="price">PKR 4,500</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img2.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Pakistani Eastern Short Shirt</a></h5>
													<h5 class="price">PKR 3,850</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img3.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Embroidered Silk Shalwar Kameez (Green Bottom)</a></h5>
													<h5 class="price">PKR 6,950</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img4.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Western Wear – Casual Denim Skinny Jeans</a></h5>
													<h5 class="price">PKR 4,250</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img5.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Cherry Farshi Set in Oversized Fit</a></h5>
													<h5 class="price">PKR 4,500</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img6.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Loose Pajama Set – Soft & Breathable Fabric</a></h5>
													<h5 class="price">PKR 3,500</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img7.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Modest Summer Abaya – Lightweight & Breathable</a></h5>
													<h5 class="price">PKR 5,500</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img8.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Baggy Shirt & Skirt Co-Ord Set</a></h5>
													<h5 class="price">PKR 3,600</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
										<div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-sm-b0 m-b30">
											<div class="shop-card style-1">
												<div class="dz-media">
													<img src="images/shop/product/img9.jpg" alt="image">
											<div class="shop-meta">
														<a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
															<i class="fa-solid fa-eye d-md-none d-block"></i>
															<span class="d-md-block d-none">Quick View</span>
														</a>
														<div class="btn btn-primary meta-icon dz-wishicon">
															<i class="icon feather icon-heart dz-heart"></i>
															<i class="icon feather icon-heart-on dz-heart-fill"></i>
														</div>
														<div class="btn btn-primary meta-icon dz-carticon">
															<i class="flaticon flaticon-basket"></i>
															<i class="flaticon flaticon-shopping-basket-on dz-heart-fill"></i>
														</div>
													</div>
												</div>
												<div class="dz-content">
													<h5 class="title"><a href="shop-list.html">Baggy Shirt & Skirt Co-Ord Set</a></h5>
													<h5 class="price">PKR 4,500</h5>
												</div>
												<div class="product-tag">
													<span class="badge ">Get 20% Off</span>
												</div>
											</div>
										</div>
									</div>
					</ul>
				</div>
			</div>
		</section>
		<!-- Products Section Start-->

		<section class="content-inner-3 companies-section overflow-hidden">
			<div class="container">
				<div class="row justify-content-between align-items-end">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<div class="section-head style-2 wow fadeInUp m-0" data-wow-delay="0.1s">
							<h2 class="title text-white">We’re just keep growing with Pakistani trusted brands</h2>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 text-md-center m-b30 wow fadeInUp" data-wow-delay="0.2s">
						<a class="icon-button d-md-inline-block d-none" href="blog-tag.html">
							<div class="text-row word-rotate-box c-black border-secondary bg-secondary">
								<span class="word-rotate">partner - partner - </span>
								<svg class="badge__emoji" xmlns="http://www.w3.org/2000/svg" width="86" height="86"
									viewBox="0 0 86 86" fill="none">
									<path
										d="M85.9974 27.7066L78.4547 15.2934L50.56 30.5869V0H35.44V30.5869L7.54534 15.2934L0 27.7066L27.9018 43L0.00212688 58.2934L7.5451 70.7066L35.44 55.4131V86H50.56V55.4131L78.4544 70.7066L86 58.2934L58.0982 43L85.9974 27.7066Z"
										fill="#FAFAF8" />
								</svg>
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="container-fluid py-4">
    <div class="d-flex flex-wrap justify-content-center gap-3">

        <!-- Brand Boxes -->
        <div class="text-center fw-bold" style="background-color:#FF6F61; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#FF3B30';"
            onmouseout="this.style.backgroundColor='#FF6F61';">Khaadi</div>

        <div class="text-center fw-bold" style="background-color:#6A5ACD; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#483D8B';"
            onmouseout="this.style.backgroundColor='#6A5ACD';">Gul Ahmed</div>

        <div class="text-center fw-bold" style="background-color:#20B2AA; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#008B8B';"
            onmouseout="this.style.backgroundColor='#20B2AA';">Sapphire</div>

        <div class="text-center fw-bold" style="background-color:#FFB347; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#FFA500';"
            onmouseout="this.style.backgroundColor='#FFB347';">J.</div>

        <div class="text-center fw-bold" style="background-color:#FF69B4; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#FF1493';"
            onmouseout="this.style.backgroundColor='#FF69B4';">Ndure</div>

        <div class="text-center fw-bold" style="background-color:#00CED1; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#20B2AA';"
            onmouseout="this.style.backgroundColor='#00CED1';">Servics</div>

        <div class="text-center fw-bold" style="background-color:#FF4500; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#CD3700';"
            onmouseout="this.style.backgroundColor='#FF4500';">Stylo</div>

        <div class="text-center fw-bold" style="background-color:#8A2BE2; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#4B0082';"
            onmouseout="this.style.backgroundColor='#8A2BE2';">Limelight</div>

        <div class="text-center fw-bold" style="background-color:#3CB371; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#2E8B57';"
            onmouseout="this.style.backgroundColor='#3CB371';">Zellbery</div>

        <div class="text-center fw-bold" style="background-color:#FF6347; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#FF4500';"
            onmouseout="this.style.backgroundColor='#FF6347';">Shoes</div>

        <div class="text-center fw-bold" style="background-color:#1E90FF; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#104E8B';"
            onmouseout="this.style.backgroundColor='#1E90FF';">Bags</div>

        <div class="text-center fw-bold" style="background-color:#FFD700; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
            onmouseover="this.style.backgroundColor='#FFA500';"
            onmouseout="this.style.backgroundColor='#FFD700';">Jewelry</div>

    </div>
</div>


		</section>

		<!-- Blog Start -->
		<section class="content-inner">
			<div class="container">
				<div class="section-head style-1 wow fadeInUp d-md-flex justify-content-between align-items-center"
					data-wow-delay="0.1s">
					<div class="left-content">
						<h2 class="title">latest Post</h2>
						<p>Discover the most trending products in FAM.</p>
					</div>
					<a class="btn btn-secondary " href="blog-archive.html">View All</a>
				</div>
				<div class="row blog-shap">
					<div class="col-lg-6 col-md-6 col-sm-12 m-b30 wow fadeInUp" data-wow-delay="0.1s">
						<div class="dz-card blog-half style-6 card-1">
							<div class="dz-media">
								<img src="images/blog/blogpost-4/pic1.jpg" alt="/">
							</div>
							<div class="dz-info">
								<div class="dz-meta">
									<ul>
										<li class="post-date">1 dec 2025</li>
									</ul>
								</div>
								<h4 class="dz-title">
									<a href="blog-grid-both-sidebar.html">Trendsetter Chronicles: Unveiling the Latest
										in Fashion</a>
								</h4>
								<a href="blog-grid-both-sidebar.html" class="btn btn-theme text-uppercase">Read more<i
										class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 m-b30 wow fadeInUp" data-wow-delay="0.1s">
						<div class="dz-card blog-half style-6 card-2">
							<div class="dz-media">
								<img src="images/blog/blogpost-4/pic2.jpg" alt="/">
							</div>
							<div class="dz-info">
								<div class="dz-meta">
									<ul>
										<li class="post-date">30 Nov 2025/li>
									</ul>
								</div>
								<h4 class="dz-title">
									<a href="blog-grid-both-sidebar.html">Runway Rundown: Decoding Fashion Week’s Best
										Looks</a>
								</h4>
								<a href="blog-grid-both-sidebar.html" class="btn btn-theme text-uppercase">Read more<i
										class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 m-b30 wow fadeInUp" data-wow-delay="0.1s">
						<div class="dz-card blog-half style-6 card-3">
							<div class="dz-media">
								<img src="images/blog/blogpost-4/pic3.jpg" alt="/">
							</div>
							<div class="dz-info">
								<div class="dz-meta">
									<ul>
										<li class="post-date">28 Nov 2025</li>
									</ul>
								</div>
								<h4 class="dz-title">
									<a href="blog-grid-both-sidebar.html">loset Confidential: Behind-the-Scenes of a
										Fashionista</a>
								</h4>
								<a href="blog-grid-both-sidebar.html" class="btn btn-theme text-uppercase">Read more<i
										class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 m-b30 wow fadeInUp" data-wow-delay="0.1s">
						<div class="dz-card blog-half style-6 card-4">
							<div class="dz-media">
								<img src="images/blog/blogpost-4/pic4.jpg" alt="/">
							</div>
							<div class="dz-info">
								<div class="dz-meta">
									<ul>
										<li class="post-date">25 Nov 2025</li>
									</ul>
								</div>
								<h4 class="dz-title">
									<a href="blog-grid-both-sidebar.html">DIY Couture: Crafting Your Own Fashion
										Masterpieces</a>
								</h4>
								<a href="blog-grid-both-sidebar.html" class="btn btn-theme text-uppercase">Read more<i
										class="fa-solid fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Blog End -->

		<!-- Feature Box -->
		<div class="content-inner py-0  image-wrapper">
			<div class="container-fluid px-0">
				<div class="row gx-0">
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.1s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/1.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.2s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/2.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.3s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/3.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.4s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/4.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.5s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/5.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="insta-post dz-media dz-img-effect rotate">
							<a href="portfolio-tiles.html">
								<img src="images/clothe/feature/6.png" alt="">
							</a>
						</div>
					</div>
					<a href="https://www.instagram.com/dexignzone/" class="instagram-link">
						<div class="follow-link  wow bounceIn" data-wow-delay="0.1s">
							<div class="follow-link-icon">
								<img src="images/insta-follow.png" alt="">
							</div>
							<div class="follow-link-content">
								<p class="m-0">Follow @FAM</p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- Feature Box End -->
	</div>
@endsection
