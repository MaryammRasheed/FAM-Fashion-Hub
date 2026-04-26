<style>
.site-footer .footer-title { color: #000 !important; }
.site-footer ul li a { color: #555 !important; }
.site-footer ul li a:hover { color: #000 !important; }
.site-footer .text-muted { color: #555 !important; }
</style>

<footer class="site-footer bg-white border-top">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-md-12 mb-4">
                    <div class="widget widget_about">
                        <div class="footer-logo mb-3">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('images/logo1.png') }}" alt="FAM Fashion Hub" style="max-width: 220px; height: auto;">
                            </a>
                        </div>
                        <p class="text-muted" style="font-size: 14px; line-height: 1.8;">
                            FAM Fashion Hub is your ultimate destination for clothes, shoes, cosmetics, jewellery, and bags.
                            Shop the latest trends and local brands with ease!
                        </p>
                        <div class="mt-4">
                            <h6 class="text-uppercase fw-bold mb-3" style="font-size: 13px; letter-spacing: 1px;">Join Our Newsletter</h6>
                            <div class="input-group mb-3" style="max-width: 300px;">
                                <input type="email" class="form-control border-dark" placeholder="Email Address" style="border-radius: 0; font-size: 13px;">
                                <button class="btn btn-dark" type="button" style="border-radius: 0; font-size: 13px;">SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4 col-6 mb-4">
                    <div class="widget">
                        <h6 class="footer-title text-uppercase fw-bold mb-4" style="font-size: 14px;">Information</h6>
                        <ul class="list-unstyled" style="font-size: 14px; line-height: 2;">
                            <li><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                            <li><a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Shop</a></li>
                            <li><a href="{{ url('/about-us') }}" class="text-decoration-none text-muted">About Us</a></li>
                            <li><a href="{{ url('/contact') }}" class="text-decoration-none text-muted">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-md-4 col-6 mb-4">
                    <div class="widget">
                        <h6 class="footer-title text-uppercase fw-bold mb-4" style="font-size: 14px;">Shop Now</h6>
                        <ul class="list-unstyled" style="font-size: 14px; line-height: 2;">
                            <li><a href="{{ url('/shop-standard-clothes') }}" class="text-decoration-none text-muted">Clothes</a></li>
                            <li><a href="{{ url('/shoes-men-loafer') }}" class="text-decoration-none text-muted">Shoes</a></li>
                            <li><a href="{{ url('/cosmetics-skincare') }}" class="text-decoration-none text-muted">Cosmetics</a></li>
                            <li><a href="{{ url('/jewellery') }}" class="text-decoration-none text-muted">Jewellery</a></li>
                            <li><a href="{{ url('/bags') }}" class="text-decoration-none text-muted">Bags</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-md-4 col-12 mb-4">
                    <div class="widget">
                        <h6 class="footer-title text-uppercase fw-bold mb-4" style="font-size: 14px;">Connect With Us</h6>
                        <ul class="widget-address list-unstyled text-muted mb-4" style="font-size: 14px;">
                            <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 451 Fashion Street, Karachi, Pakistan</li>
                            <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@famfashionhub.com</li>
                            <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +92 300 1234567</li>
                        </ul>
                        <div class="d-flex gap-4 mt-3">
                            <a href="#" class="text-dark"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-instagram fa-lg"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-whatsapp fa-lg"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom py-4 border-top bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-muted" style="font-size: 12px;">&copy; 2026 <strong>FAM Fashion Hub</strong>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <img src="{{ asset('images/footer-img.png') }}" alt="Payment Methods" style="max-height: 25px; filter: grayscale(1);">
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JS Scripts — must be in this order -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('js/dz.carousel.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>

<!-- Browse Categories Dropdown Fix -->
<script>
$(document).ready(function() {
    $('.category-btn').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('.category-menu-items').slideToggle(200);
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.browse-category-menu').length) {
            $('.category-menu-items').slideUp(200);
        }
    });
});
</script>

<!-- Loader Hide -->
<script>
window.addEventListener('load', function() {
    var loader = document.getElementById('loading-area');
    if (loader) loader.style.display = 'none';
});
</script>

@stack('scripts')
</div><!-- page-wraper end -->
</body>
</html>