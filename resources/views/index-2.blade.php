@extends('layouts.app')

@section('title', 'FAM Fashion Hub')



@section('content')

@php
    $categories       = \App\Models\Category::where('is_active', true)->take(6)->get();
    $trendingProducts = \App\Models\Product::where('status','active')->orderBy('created_at','desc')->take(8)->get();
    $featuredProducts = \App\Models\Product::where('status','active')->orderBy('created_at','desc')->take(9)->get();
@endphp

<div class="page-content bg-light">
<div class="page-content bg-light">

    {{-- ===================== HERO BANNER ===================== --}}
    <div class="main-slider style-2">
        <div class="main-swiper2">
            <div class="container">
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
                                <div class="content-btn mt-4" data-swiper-parallax="-60" style="text-align: center;">
                                    <a class="btn btn-secondary me-3" href="{{ route('products.index') }}">Shop Now</a>
                                    <a class="btn btn-outline-secondary" href="{{ route('products.index') }}">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-12">
                            <div class="banner-media">
                                <div class="shap"></div>
                                <div class="border-shap"></div>
                                <div class="border-shap2"></div>
                                <div class="img-preview" data-swiper-parallax="-100">
                                    <img src="{{ asset('images/main-slider/slider2/slider-2.jpg') }}" alt="banner-media">
                                </div>
                                <div class="bnr-content-bx slideskew">
                                    <div class="dz-media">
                                        <img src="{{ asset('images/shop/product/small/1.png') }}" alt="">
                                    </div>
                                    <div class="dz-info">
                                        <h5 class="dz-title">Cozy Knit Cardigan</h5>
                                        <h6 class="price text-primary">PKR 8,000</h6>
                                    </div>
                                </div>
                                <ul class="star-list">
                                    <li class="star-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                            <path d="M28.5 0L33.3366 23.6634L57 28.5L33.3366 33.3366L28.5 57L23.6634 33.3366L0 28.5L23.6634 23.6634L28.5 0Z" fill="var(--rgba-primary-2)"/>
                                        </svg>
                                    </li>
                                    <li class="star-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                            <path d="M28.5 0L33.3366 23.6634L57 28.5L33.3366 33.3366L28.5 57L23.6634 33.3366L0 28.5L23.6634 23.6634L28.5 0Z" fill="var(--rgba-primary-2)"/>
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== CATEGORIES (BACKEND) ===================== --}}
    <div class="content-inner category-section">
        <div class="container">
            <div class="section-head style-1 mb-4 wow fadeInUp">
                <h2 class="title">Shop by Category</h2>
            </div>
            <div class="row g-3">
                @forelse($categories as $index => $cat)
                <div class="col-xl-4 col-lg-4 col-md-4 col-6 wow fadeInUp" data-wow-delay="{{ 0.1 * ($index + 1) }}s">
                    <a href="{{ route('category.filter', $cat->slug) }}" class="text-decoration-none">
                        <div class="category-product left product-{{ $index + 1 }}" style="position:relative; overflow:hidden; border-radius:12px; cursor:pointer;">
                            @if($cat->image)
                                <img src="{{ asset($cat->image) }}" alt="{{ $cat->name }}"
                                     style="width:100%; height:220px; object-fit:cover;"
                                     onerror="this.src='{{ asset('images/category/img-cloth.jpg') }}'">
                            @else
                                <img src="{{ asset('images/category/img-cloth.jpg') }}" alt="{{ $cat->name }}"
                                     style="width:100%; height:220px; object-fit:cover;">
                            @endif
                            <div class="category-badge" style="position:absolute; bottom:15px; left:15px; background:#fff; color:#000; padding:6px 16px; border-radius:20px; font-weight:600; font-size:14px;">
                                {{ $cat->name }}
                            </div>
                        </div>
                    </a>
                </div>
                @empty
                {{-- Fallback static categories --}}
                <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                    <div class="category-product left product-1">
                        <a href="{{ url('/shop-standard-clothes') }}">
                            <img src="{{ asset('images/category/img-cloth.jpg') }}" alt="Clothes">
                            <div class="category-badge">Clothes</div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-6">
                    <div class="category-product left product-2">
                        <a href="{{ url('/shoes-men-loafer') }}">
                            <img src="{{ asset('images/category/imgshoes.jpg') }}" alt="Shoes">
                            <div class="category-badge">Shoes</div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-6">
                    <div class="category-product left product-3">
                        <a href="{{ url('/cosmetics-skincare') }}">
                            <img src="{{ asset('images/category/img-cos.jpg') }}" alt="Cosmetics">
                            <div class="category-badge">Cosmetics</div>
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ===================== TRENDING PRODUCTS (BACKEND) ===================== --}}
    <section class="content-inner-1 overflow-hidden">
        <div class="container">
            <div class="row justify-content-md-between align-items-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="section-head style-1 m-b30 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="left-content">
                            <h2 class="title">What's trending now</h2>
                            <p>Discover the most trending products in FAM.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-12 text-md-end">
                    <a class="btn btn-secondary m-b30" href="{{ route('products.index') }}">View All</a>
                </div>
            </div>

            <div class="swiper-btn-center-lr">
                <div class="swiper swiper-four">
                    <div class="swiper-wrapper">
                        @forelse($trendingProducts as $product)
                        <div class="swiper-slide">
                            <div class="shop-card wow fadeInUp">
                                <div class="dz-media">
                                    <img src="{{ asset($product->first_image) }}" alt="{{ $product->name }}"
                                         style="height:280px; object-fit:cover;"
                                         onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                                    <div class="shop-meta">
                                        <a href="{{ route('products.show', $product->slug) }}"
                                           class="btn btn-secondary btn-md btn-rounded">
                                            <span class="d-md-block d-none">Quick View</span>
                                        </a>
                                        @auth
                                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary meta-icon dz-wishicon border-0">
                                                <i class="icon feather icon-heart dz-heart"></i>
                                            </button>
                                        </form>
                                        @endauth
                                        <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-primary meta-icon dz-carticon border-0">
                                                <i class="flaticon flaticon-basket"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="dz-content">
                                    <h5 class="title">
                                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h5>
                                    @if($product->sale_price)
                                        <h5 class="price text-danger">PKR {{ number_format($product->sale_price) }}
                                            <small class="text-muted text-decoration-line-through ms-1" style="font-size:13px;">PKR {{ number_format($product->price) }}</small>
                                        </h5>
                                    @else
                                        <h5 class="price">PKR {{ number_format($product->price) }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="swiper-slide">
                            <p class="text-muted">No products available.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== VIDEO SECTION ===================== --}}
    <section class="video-section">
        <div class="video-wrapper bg-parallax" style="background-image:url('{{ asset('images/background/bg2.jpg') }}');">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <a class="icon-button popup-youtube" href="https://www.youtube.com/watch?v=YwYoyQ1JdpQ">
                        <div class="text-row word-rotate-box border-white c-black">
                            <span class="word-rotate">shop - shop - shop - shop -</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="dz-features-wrapper overflow-hidden">
            <ul class="dz-features text-wrapper">
                <li class="item"><h2 class="title">Clothes</h2></li>
                <li class="item"><svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none"><path opacity="0.3" d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z" fill="black"/></svg></li>
                <li class="item"><h2 class="title">Shoes</h2></li>
                <li class="item"><svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none"><path opacity="0.3" d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z" fill="black"/></svg></li>
                <li class="item"><h2 class="title">Bags</h2></li>
                <li class="item"><svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none"><path opacity="0.3" d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z" fill="black"/></svg></li>
                <li class="item"><h2 class="title">Jewellery</h2></li>
                <li class="item"><svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none"><path opacity="0.3" d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z" fill="black"/></svg></li>
                <li class="item"><h2 class="title">Cosmetics</h2></li>
                <li class="item"><svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none"><path opacity="0.3" d="M29.302 -0.00499268L38.533 21.2005L60.3307 28.9297L39.1253 38.1607L31.396 59.9585L22.165 38.753L0.367297 31.0237L21.5728 21.7928L29.302 -0.00499268Z" fill="black"/></svg></li>
            </ul>
        </div>
    </section>

    {{-- ===================== POPULAR PRODUCTS (BACKEND) ===================== --}}
    <section class="content-inner">
        <div class="container">
            <div class="row justify-content-md-between align-items-start">
                <div class="col-lg-6 col-md-12">
                    <div class="section-head style-1 m-b30 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="left-content">
                            <h2 class="title">Most popular products</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 text-lg-end">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-4">View All Products</a>
                </div>
            </div>

            <div class="row g-3">
                @forelse($featuredProducts as $product)
                <div class="col-6 col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp">
                    <div class="shop-card style-1">
                        <div class="dz-media">
                            <img src="{{ asset($product->first_image) }}" alt="{{ $product->name }}"
                                 style="height:280px; object-fit:cover; width:100%;"
                                 onerror="this.src='{{ asset('images/shop/product/1.png') }}'">
                            <div class="shop-meta">
                                <a href="{{ route('products.show', $product->slug) }}"
                                   class="btn btn-secondary btn-md btn-rounded">
                                    <span class="d-md-block d-none">Quick View</span>
                                </a>
                                @auth
                                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary meta-icon dz-wishicon border-0">
                                        <i class="icon feather icon-heart dz-heart"></i>
                                    </button>
                                </form>
                                @endauth
                                <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-primary meta-icon dz-carticon border-0">
                                        <i class="flaticon flaticon-basket"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="dz-content">
                            <h5 class="title">
                                <a href="{{ route('products.show', $product->slug) }}">{{ Str::limit($product->name, 30) }}</a>
                            </h5>
                            @if($product->sale_price)
                                <h5 class="price text-danger">PKR {{ number_format($product->sale_price) }}</h5>
                            @else
                                <h5 class="price">PKR {{ number_format($product->price) }}</h5>
                            @endif
                        </div>
                        @if($product->sale_price)
                        <div class="product-tag">
                            <span class="badge">SALE</span>
                        </div>
                        @endif
                        @if($product->featured)
                        <div class="product-tag">
                            <span class="badge">⭐ Featured</span>
                        </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5 text-muted">
                    <p>No products available yet.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-dark">Browse Shop</a>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== BRANDS SECTION ===================== --}}
    <section class="content-inner-3 companies-section overflow-hidden">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="section-head style-2 wow fadeInUp m-0" data-wow-delay="0.1s">
                        <h2 class="title text-white">We're just keep growing with Pakistani trusted brands</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="d-flex flex-wrap justify-content-center gap-3">
                @foreach([
                    ['name'=>'Khaadi',    'color'=>'#FF6F61', 'hover'=>'#FF3B30'],
                    ['name'=>'Gul Ahmed', 'color'=>'#6A5ACD', 'hover'=>'#483D8B'],
                    ['name'=>'Sapphire',  'color'=>'#20B2AA', 'hover'=>'#008B8B'],
                    ['name'=>'J.',        'color'=>'#FFB347', 'hover'=>'#FFA500'],
                    ['name'=>'Ndure',     'color'=>'#FF69B4', 'hover'=>'#FF1493'],
                    ['name'=>'Servis',    'color'=>'#00CED1', 'hover'=>'#20B2AA'],
                    ['name'=>'Stylo',     'color'=>'#FF4500', 'hover'=>'#CD3700'],
                    ['name'=>'Limelight', 'color'=>'#8A2BE2', 'hover'=>'#4B0082'],
                    ['name'=>'Zellbury',  'color'=>'#3CB371', 'hover'=>'#2E8B57'],
                ] as $brand)
                <div class="text-center fw-bold brand-box"
                     style="background-color:{{ $brand['color'] }}; color:white; padding:20px 35px; border-radius:12px; min-width:140px; transition:0.3s; cursor:pointer;"
                     onmouseover="this.style.backgroundColor='{{ $brand['hover'] }}'"
                     onmouseout="this.style.backgroundColor='{{ $brand['color'] }}'">
                    {{ $brand['name'] }}
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== BLOG SECTION ===================== --}}
    <section class="content-inner">
        <div class="container">
            <div class="section-head style-1 wow fadeInUp d-md-flex justify-content-between align-items-center" data-wow-delay="0.1s">
                <div class="left-content">
                    <h2 class="title">Latest Posts</h2>
                    <p>Discover the most trending fashion tips in FAM.</p>
                </div>
            </div>
            <div class="row blog-shap">
                @foreach([
                    ['img'=>'pic1.jpg', 'date'=>'1 Dec 2025', 'title'=>'Trendsetter Chronicles: Unveiling the Latest in Fashion'],
                    ['img'=>'pic2.jpg', 'date'=>'30 Nov 2025', 'title'=>'Runway Rundown: Decoding Fashion Week\'s Best Looks'],
                    ['img'=>'pic3.jpg', 'date'=>'28 Nov 2025', 'title'=>'Closet Confidential: Behind-the-Scenes of a Fashionista'],
                    ['img'=>'pic4.jpg', 'date'=>'25 Nov 2025', 'title'=>'DIY Couture: Crafting Your Own Fashion Masterpieces'],
                ] as $i => $post)
                <div class="col-lg-6 col-md-6 col-sm-12 m-b30 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="dz-card blog-half style-6 card-{{ $i+1 }}">
                        <div class="dz-media">
                            <img src="{{ asset('images/blog/blogpost-4/'.$post['img']) }}" alt="">
                        </div>
                        <div class="dz-info">
                            <div class="dz-meta"><ul><li class="post-date">{{ $post['date'] }}</li></ul></div>
                            <h4 class="dz-title"><a href="#">{{ $post['title'] }}</a></h4>
                            <a href="#" class="btn btn-theme text-uppercase">Read more <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== INSTAGRAM SECTION ===================== --}}
    <div class="content-inner py-0 image-wrapper">
        <div class="container-fluid px-0">
            <div class="row gx-0">
                @foreach(range(1,6) as $i)
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4 wow fadeIn" data-wow-delay="{{ 0.1 * $i }}s">
                    <div class="insta-post dz-media dz-img-effect rotate">
                        <a href="#">
                            <img src="{{ asset('images/clothe/feature/'.$i.'.png') }}" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
                <a href="https://www.instagram.com/" class="instagram-link">
                    <div class="follow-link wow bounceIn" data-wow-delay="0.1s">
                        <div class="follow-link-icon">
                            <img src="{{ asset('images/insta-follow.png') }}" alt="">
                        </div>
                        <div class="follow-link-content">
                            <p class="m-0">Follow @FAM</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection