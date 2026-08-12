@extends('frontend.layouts.app')
@section('title', 'Premium Wedding Photography')
@section('content')

<style>
    /* ============================================================
       GLOBAL STYLES & TYPOGRAPHY
       ============================================================ */
    :root {
        --premium-gold: #C5A059;
        --premium-gold-dark: #B38F48;
        --charcoal: #1A1C20;
        --light-bg: #FAFAFA;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        color: #333;
        background-color: var(--light-bg);
        overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Playfair Display', serif;
        color: var(--charcoal);
    }

    /* ============================================================
       HERO SECTION
       ============================================================ */
    .hero-section {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        background-color: #000;
    }

    .hero-slider,
    .hero-slider .owl-stage-outer,
    .hero-slider .owl-stage,
    .hero-slider .owl-item,
    .hero-slider .slider-item {
        height: 100vh !important;
        width: 100%;
    }

    .hero-slider .slider-item {
        position: relative;
        overflow: hidden;
        background-color: #000;
    }

    .hero-slider .slider-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-color: #000;
        z-index: 1;
    }

    @keyframes zoomBanner {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.15);
        }
    }

    .hero-slider .owl-item.active .slider-bg {
        animation: zoomBanner 8s linear forwards;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 10;
        pointer-events: none;
    }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 10%;
        transform: translateY(-50%);
        text-align: left;
        z-index: 20;
        width: 100%;
        max-width: 800px;
        padding: 0 20px;
        color: #fff;
    }

    .hero-content h1 {
        color: #fff;
        font-size: clamp(3rem, 5vw, 5rem);
        font-weight: 700;
        letter-spacing: 0.05em;
        margin-bottom: 20px;
        text-transform: capitalize;
        animation: fadeInUp 1s ease;
    }

    .hero-content p {
        font-size: clamp(1rem, 1.5vw, 1.2rem);
        font-weight: 300;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        margin-bottom: 40px;
        color: #f1f1f1;
        animation: fadeInUp 1.2s ease;
    }

    .hero-btn {
        display: inline-block;
        padding: 15px 40px;
        background-color: var(--premium-gold);
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        animation: fadeInUp 1.4s ease;
        border-radius: 2px;
    }

    .hero-btn:hover {
        background-color: var(--premium-gold-dark);
        color: #fff;
    }

    /* ============================================================
       ABOUT SECTION
       ============================================================ */
    .about-section {
        padding: 100px 0;
        background: #fff;
    }

    .about-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    .about-image {
        flex: 1 1 400px;
        position: relative;
    }

    .about-image img {
        width: 100%;
        height: auto;
        box-shadow: -20px 20px 0px rgba(197, 160, 89, 0.2);
    }

    .about-text {
        flex: 1 1 400px;
        padding: 20px;
    }

    .section-subtitle {
        color: var(--premium-gold);
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 15px;
        display: block;
    }

    .about-text h2 {
        font-size: 3rem;
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .about-text p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 30px;
        font-size: 1rem;
    }

    .signature {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: 1.5rem;
        color: var(--charcoal);
    }

    /* ============================================================
       SERVICES SECTION
       ============================================================ */
    .services-section {
        padding: 100px 0;
        background: var(--light-bg);
        text-align: center;
    }

    .services-section h2 {
        font-size: 3rem;
        margin-bottom: 60px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .service-card {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        aspect-ratio: 4 / 3;
        display: block;
        text-decoration: none;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .service-img-wrap {
        position: absolute;
        inset: 0;
    }

    .service-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .service-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(26, 28, 32, 0.9) 0%, rgba(26, 28, 32, 0.4) 50%, rgba(26, 28, 32, 0.1) 100%);
        opacity: 0.85;
        transition: opacity 0.5s ease, background 0.5s ease;
    }

    .service-card:hover .service-img-wrap img {
        transform: scale(1.1);
    }

    .service-card:hover .service-overlay {
        opacity: 0.95;
        background: linear-gradient(to top, rgba(26, 28, 32, 0.95) 0%, rgba(26, 28, 32, 0.6) 50%, rgba(26, 28, 32, 0.2) 100%);
    }

    .service-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 40px 30px;
        text-align: center;
        transform: translateY(15px);
        transition: transform 0.5s ease;
    }

    .service-card:hover .service-content {
        transform: translateY(0);
    }

    .service-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #fff;
        margin-bottom: 10px;
        position: relative;
        padding-bottom: 15px;
    }

    .service-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%) scaleX(0);
        width: 50px;
        height: 2px;
        background: #C5A059;
        transition: transform 0.5s ease;
    }

    .service-card:hover .service-title::after {
        transform: translateX(-50%) scaleX(1);
    }

    .service-btn {
        color: #C5A059;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.15em;
        font-weight: 600;
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform: translateY(10px);
        display: inline-block;
    }

    .service-card:hover .service-btn {
        opacity: 1;
        transform: translateY(0);
    }

    /* ============================================================
       GALLERY SECTION
       ============================================================ */
    .gallery-section {
        padding: 100px 0;
        background: #1A1C20;
        text-align: center;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 15px;
        padding: 0 15px;
        margin-top: 50px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        aspect-ratio: 1;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    /* ============================================================
       TESTIMONIAL SECTION
       ============================================================ */
    .testimonial-section {
        padding: 100px 0;
        background: #121212;
        text-align: center;
        color: #fff;
    }

    .testimonial-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .testimonial-card {
        padding: 40px;
        border: 1px solid #333;
        background: #1A1C20;
        position: relative;
        text-align: left;
    }

    .testimonial-card i.fa-quote-left {
        font-size: 3rem;
        color: #C5A059;
        opacity: 0.2;
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .testimonial-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.15rem;
        font-style: italic;
        line-height: 1.8;
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
        color: #ccc;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .testimonial-author img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #C5A059;
    }

    .testimonial-author h4 {
        color: #C5A059;
        font-size: 1.1rem;
        margin: 0;
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 50px;
    }

    /* ============================================================
       LATEST BLOGS SECTION
       ============================================================ */
    .latest-blogs-section {
        padding: 100px 0;
        background: #1A1C20;
        text-align: center;
    }

    .latest-blogs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 50px auto 0;
        padding: 0 20px;
        text-align: left;
    }

    .blog-item-card {
        background: #121212;
        border: 1px solid #333;
        transition: transform 0.4s ease, border-color 0.4s ease;
    }

    .blog-item-card:hover {
        transform: translateY(-10px);
        border-color: #C5A059;
    }

    .blog-item-img {
        height: 250px;
        overflow: hidden;
    }

    .blog-item-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .blog-item-card:hover .blog-item-img img {
        transform: scale(1.05);
    }

    .blog-item-content {
        padding: 30px;
    }

    .blog-item-meta {
        color: #C5A059;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 15px;
    }

    .blog-item-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        color: #fff;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .blog-item-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-item-title a:hover {
        color: #C5A059;
    }

    .blog-item-readmore {
        color: #fff;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.1em;
        text-decoration: none;
        font-weight: 600;
        border-bottom: 1px solid #C5A059;
        padding-bottom: 3px;
        transition: color 0.3s ease;
    }

    .blog-item-readmore:hover {
        color: #C5A059;
    }

    /* ============================================================
       PORTFOLIO SECTION
       ============================================================ */
    .portfolio-section {
        padding: 100px 0;
        background: #fff;
        text-align: center;
    }

    .portfolio-section h2 {
        font-size: 3rem;
        margin-bottom: 60px;
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        padding: 0 15px;
    }

    .portfolio-item {
        position: relative;
        overflow: hidden;
        height: 600px;
    }

    .portfolio-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .portfolio-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .portfolio-overlay span {
        color: #fff;
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-style: italic;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .portfolio-item:hover img {
        transform: scale(1.05);
    }

    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-item:hover .portfolio-overlay span {
        transform: translateY(0);
    }

    @media(max-width: 768px) {
        .hero-section,
        .hero-slider,
        .hero-slider .owl-stage-outer,
        .hero-slider .owl-stage,
        .hero-slider .owl-item,
        .hero-slider .slider-item {
            height: 60vw !important;
            min-height: 375px !important;
            max-height: 500px !important;
            background-color: #1A1C20 !important;
        }

        .hero-slider .slider-bg {
            background-size: cover !important;
            background-position: center !important;
            background-color: #1A1C20 !important;
        }

        .hero-content {
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            width: 90% !important;
            max-width: 100% !important;
            padding: 0 15px !important;
            text-align: center !important;
        }

        .hero-content h1 {
            font-size: clamp(1.3rem, 5vw, 2.2rem) !important;
            margin-bottom: 10px !important;
            line-height: 1.2 !important;
        }

        .hero-content p {
            font-size: clamp(0.75rem, 3.2vw, 0.95rem) !important;
            margin-bottom: 15px !important;
            letter-spacing: 0.1em !important;
        }

        .hero-btn {
            padding: 8px 22px !important;
            font-size: 0.75rem !important;
        }

        .portfolio-grid {
            grid-template-columns: 1fr;
        }

        .portfolio-item {
            height: 400px;
        }

        .about-image img {
            box-shadow: none;
        }

        .about-section {
            position: relative;
            background-image: var(--about-bg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 80px 0 60px 0;
            border-top: 30px solid #1A1C20;
        }

        .about-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            z-index: 1;
        }

        .about-container {
            position: relative;
            z-index: 2;
        }

        .about-image {
            display: none;
        }

        .about-text {
            color: #fff;
            text-align: center;
            padding: 10px 15px;
        }

        .about-text h2 {
            color: #fff;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .about-text p {
            color: #f0f0f0;
        }

        .about-text .section-subtitle {
            color: var(--premium-gold);
        }
    }

    .hero-slider .owl-item:not(.active) .hero-content {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease;
    }

    .hero-slider .owl-item.active .hero-content {
        opacity: 1;
        visibility: visible;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
        @if(isset($sliders) && $sliders->count() > 0)
        @foreach($sliders as $slider)
        <div class="slider-item">
            <div class="slider-bg" style="background-image: url('{{ asset('/setting/banner/' . $slider->image) }}');"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>{{ $slider->header_title ?? 'Capturing Your Forever Moments' }}</h1>
                <p>{{ $slider->bottom_title ?? 'Exclusive Wedding Photography & Cinematography' }}</p>
                <a href="/contact" class="hero-btn">Book Your Date</a>
            </div>
        </div>
        @endforeach
        @else
        <!-- Fallback Dynamic Banners -->
        <div class="slider-item">
            <div class="slider-bg" style="background-image: url('{{ asset('assets/images/hero_wedding_image_1784024113691.png') }}');"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Capturing Your<br>Forever Moments</h1>
                <p>Exclusive Wedding Photography & Cinematography</p>
                <a href="/contact" class="hero-btn">Book Your Date</a>
            </div>
        </div>
        <div class="slider-item">
            <div class="slider-bg" style="background-image: url('{{ asset('assets/images/hero_wedding_banner_2_1784029464902.png') }}');"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Capturing Your<br>Forever Moments</h1>
                <p>Exclusive Wedding Photography & Cinematography</p>
                <a href="/contact" class="hero-btn">Book Your Date</a>
            </div>
        </div>
        <div class="slider-item">
            <div class="slider-bg" style="background-image: url('{{ asset('assets/images/hero_wedding_banner_3_1784029485237.png') }}');"></div>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Capturing Your<br>Forever Moments</h1>
                <p>Exclusive Wedding Photography & Cinematography</p>
                <a href="/contact" class="hero-btn">Book Your Date</a>
            </div>
        </div>
        @endif
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof jQuery !== 'undefined' && jQuery.fn.owlCarousel) {
            jQuery('.hero-slider').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                nav: false,
                dots: false
            });
        }
    });
</script>

<!-- About Section -->
<section class="about-section" style="--about-bg: url('{{ asset('setting/about/' . ($about->about_image ?? '')) }}');">
    <div class="container about-container">
        <div class="about-image">
            <img src="{{ asset('setting/about/' . $about->about_image) }}" alt="About Us">
        </div>
        <div class="about-text">
            <span class="section-subtitle">{{ 'Our Philosophy' }}</span>
            <h2>{{ $about->title ?? 'Love Documented in its Purest Form' }}</h2>
            {!! $about->short_description !!}
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <span class="section-subtitle">What We Offer</span>
        <h2>Our Premium Services</h2>
        <div class="services-grid">
            @forelse($services->take(3) as $service)
            <a href="{{ route('service.show', $service->id) }}" class="service-card">
                @if($service->image1)
                <div class="service-img-wrap">
                    <img src="{{ asset('/setting/service/' . $service->image1) }}" alt="{{ $service->title }}">
                </div>
                @else
                <div class="service-img-wrap" style="background:#2b2d31;"></div>
                @endif
                <div class="service-overlay"></div>

                <div class="service-content">
                    <h3 class="service-title">{{ $service->title }}</h3>
                    <div class="service-btn">Discover More <i class="fa-solid fa-arrow-right" style="margin-left:5px;"></i></div>
                </div>
            </a>
            @empty
            <div style="text-align: center; width: 100%;">
                <p style="font-size: 1.2rem; color: #666;">No services available at the moment.</p>
            </div>
            @endforelse
        </div>

        <div style="margin-top: 60px;">
            <a href="{{ url('/service') }}" class="btn-primary" style="display:inline-block; padding: 15px 40px; background: transparent; border: 1px solid #C5A059; color: #C5A059; text-transform: uppercase; letter-spacing: 0.15em; font-family: 'Montserrat', sans-serif; font-weight: 600; text-decoration: none; transition: 0.3s ease;">
                View All Services
            </a>
            <style>
                .btn-primary:hover {
                    background: #C5A059 !important;
                    color: #1A1C20 !important;
                }
            </style>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="container">
        <span class="section-subtitle" style="color: #C5A059; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.85rem; font-weight: 600;">Our Portfolio</span>
        <h2 style="font-size: 3rem; margin-bottom: 20px; color: #fff;">Our Latest Work</h2>

        <div class="gallery-grid">
            @forelse($galary as $item)
            <div class="gallery-item">
                <a href="{{ asset('/setting/banner/' . $item->image) }}" data-lightbox="gallery" data-title="{{ $item->title ?? 'Wedding Photography' }}">
                    <img src="{{ asset('/setting/banner/' . $item->image) }}" alt="Gallery Image">
                </a>
            </div>
            @empty
            <div style="grid-column: 1/-1; color: #666; padding: 40px;">No gallery items available.</div>
            @endforelse
        </div>

        <div style="margin-top: 60px;">
            <a href="/gallery" class="btn-primary" style="display:inline-block; padding: 15px 40px; background: transparent; border: 1px solid #C5A059; color: #C5A059; text-transform: uppercase; letter-spacing: 0.15em; font-family: 'Montserrat', sans-serif; font-weight: 600; text-decoration: none; transition: 0.3s ease;">
                View All Albums
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonial-section">
    <div class="testimonial-container">
        <span class="section-subtitle" style="color: #C5A059; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.85rem; font-weight: 600;">Kind Words</span>
        <h2 style="font-size: 3rem; margin-bottom: 20px; color: #fff">Client Testimonials</h2>

        <div class="testimonial-grid">
            @forelse($testmonies as $testmony)
            <div class="testimonial-card">
                <i class="fa-solid fa-quote-left"></i>
                <div class="testimonial-text">
                    "{{ $testmony->review }}"
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('/setting/testmony/' . $testmony->photo) }}" alt="{{ $testmony->reviewer }}">
                    <h4>{{ $testmony->reviewer }}</h4>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; color: #666; padding: 40px;">No testimonials available.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest Blogs Section -->
<section class="latest-blogs-section">
    <div class="container">
        <span class="section-subtitle" style="color: #C5A059; text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.85rem; font-weight: 600;">Journal</span>
        <h2 style="font-size: 3rem; margin-bottom: 20px; color: #fff;">Latest Threads From Our Blog</h2>

        <div class="latest-blogs-grid">
            @forelse($blogs as $blog)
            <div class="blog-item-card">
                <div class="blog-item-img">
                    <a href="/blog/details/{{ $blog->id }}">
                        <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="{{ $blog->title }}">
                    </a>
                </div>
                <div class="blog-item-content">
                    <div class="blog-item-meta">
                        <i class="fa-regular fa-calendar" style="margin-right: 5px;"></i> {{ date('M j, Y', strtotime($blog->created_at)) }}
                    </div>
                    <h3 class="blog-item-title">
                        <a href="/blog/details/{{ $blog->id }}">{{ $blog->title }}</a>
                    </h3>
                    <a href="/blog/details/{{ $blog->id }}" class="blog-item-readmore">Read Full Story</a>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; color: #666; padding: 40px; text-align: center;">No blog posts available.</div>
            @endforelse
        </div>

        <div style="margin-top: 60px;">
            <a href="/blogs" class="btn-primary" style="display:inline-block; padding: 15px 40px; background: transparent; border: 1px solid #C5A059; color: #C5A059; text-transform: uppercase; letter-spacing: 0.15em; font-family: 'Montserrat', sans-serif; font-weight: 600; text-decoration: none; transition: 0.3s ease;">
                View All Posts
            </a>
        </div>
    </div>
</section>

@endsection