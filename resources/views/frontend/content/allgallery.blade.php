@extends('frontend.layouts.app')
@section('content')

@section('title', __('Photo Gallery'))

<title>{{ app_name() }} | @yield('title')</title>

<!-- Hero Banner Section -->
<div class="gallery-hero" style="background-image: url('{{ asset('assets/images/hero_wedding_image_1784024113691.png') }}');">
    <div class="gallery-hero-overlay"></div>
    <div class="gallery-hero-content">
        <h1 class="hero-title">Our Gallery</h1>
        <p class="hero-subtitle" style="color: #C5A059">Capturing the elegance and beauty of every moment</p>
    </div>
</div>

<!-- Gallery Section -->
<div class="gallery-section" style="padding: 80px 20px; background-color: #fafafa;">
    <!-- Gallery Grid -->
    @if(isset($categories) && count($categories) > 0)
    <div style="text-align: center; margin-bottom: 30px;">
        <button class="filter-btn active" onclick="filterGallery('all')">All</button>
        @foreach($categories as $cat)
        <button class="filter-btn" onclick="filterGallery('{{ $cat->id }}')">{{ $cat->name }}</button>
        @endforeach
    </div>
    @endif

    @if($images && count($images) > 0)
    <div class="gallery-grid" id="galleryContainer">
        @foreach ($images as $index => $image)
        <div class="gallery-card category-{{ $image->gallery_category_id ?? 'none' }}" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 50 }}" onclick="openLightbox(this)">
            <div class="gallery-image-wrapper">
                <img src="{{ asset('/setting/banner/' . $image->image) }}"
                    alt="Gallery Image {{ $index + 1 }} . {{ $image->details }}">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                    <span>View Image</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div style="text-align: center;">
        <h3>No images available.</h3>
    </div>
    @endif

    <!-- Book Now CTA Section -->
    <div class="container" style="margin-top: 40px;">
        <div class="gallery-cta-panel" data-aos="fade-up" data-aos-duration="900">
            <h2>Book Your Event With Us</h2>
            <p>Keep your precious moments remembered in professional ways. Let our experienced team capture every smile, emotion, and story of your special day.</p>
            <a href="{{ route('frontend.book_now') }}" class="gallery-cta-btn">
                Book Now <i class="fa-solid fa-calendar-check" style="margin-left: 8px;"></i>
            </a>
        </div>
    </div>
</div>

<style>
    /* Gallery CTA Panel Styling */
    .gallery-cta-panel {
        background: #1A1C20;
        padding: 70px 40px;
        color: #fff;
        position: relative;
        overflow: hidden;
        max-width: 1200px;
        margin: 20px auto 40px;
        text-align: center;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        border-radius: 6px;
    }

    .gallery-cta-panel:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C5A059, #e8c784, #C5A059);
    }

    .gallery-cta-panel h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 18px;
        color: #C5A059;
    }

    .gallery-cta-panel p {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.05rem;
        line-height: 1.7;
        color: #ccc;
        max-width: 750px;
        margin: 0 auto 35px;
    }

    .gallery-cta-btn {
        display: inline-block;
        background: #C5A059;
        color: #1A1C20;
        padding: 16px 42px;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 4px;
    }

    .gallery-cta-btn:hover {
        background: #e8c784;
        color: #1A1C20;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(197, 160, 89, 0.3);
    }

    @media (max-width: 575px) {
        .gallery-cta-panel {
            padding: 50px 20px;
        }

        .gallery-cta-panel h2 {
            font-size: 1.8rem;
        }
    }
    /* Hero Banner Styling */
    .gallery-hero {
        position: relative;
        height: 60vh;
        min-height: 400px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .gallery-hero.fallback-hero {
        background-color: #1a1a1a;
        background-image: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
    }

    .gallery-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .gallery-hero-content {
        position: relative;
        z-index: 2;
        color: white;
        padding: 0 20px;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-subtitle {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        font-weight: 300;
        color: #f0f0f0;
        letter-spacing: 1px;
    }

    @media (max-width: 768px) {
        .gallery-hero {
            height: 40vh;
            min-height: 300px;
        }

        .hero-title {
            font-size: 36px;
        }

        .hero-subtitle {
            font-size: 16px;
        }
    }

    /* Filter Buttons - Premium Look */
    .filter-btn {
        background: transparent;
        border: 2px solid #e0e0e0;
        color: #555;
        padding: 12px 28px;
        text-align: center;
        display: inline-block;
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 5px;
        cursor: pointer;
        border-radius: 30px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .filter-btn:hover {
        border-color: #d4af37;
        color: #d4af37;
        transform: translateY(-2px);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #d4af37 0%, #b58d22 100%);
        border-color: transparent;
        color: white;
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
    }

    /* Gallery Card Animation */
    .gallery-card {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 1;
        transform: scale(1);
    }

    .gallery-card.hidden {
        opacity: 0;
        transform: scale(0.9);
        display: none;
    }
</style>

<script>
    let activeCategoryId = 'all';

    function filterGallery(categoryId) {
        activeCategoryId = categoryId;
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        const items = document.querySelectorAll('.gallery-card');
        items.forEach(item => {
            if (categoryId === 'all') {
                item.classList.remove('hidden');
                item.style.display = '';
            } else {
                if (item.classList.contains('category-' + categoryId)) {
                    item.classList.remove('hidden');
                    item.style.display = '';
                } else {
                    item.classList.add('hidden');
                    setTimeout(() => {
                        if (item.classList.contains('hidden')) {
                            item.style.display = 'none';
                        }
                    }, 500);
                }
            }
        });

        setTimeout(() => {
            updateLightboxArray();
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
                // Ensure elements currently in view get animated
                items.forEach(item => {
                    if (!item.classList.contains('hidden')) {
                        item.classList.add('aos-animate');
                    }
                });
            }
        }, 550);
    }
</script>

<!-- Modern Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightboxOnBackground(event)">
    <span class="closebtn" onclick="event.stopPropagation(); closeLightbox();">&times;</span>
    <button class="nav-btn prev-btn" onclick="event.stopPropagation(); changeImage(-1);">&#10094;</button>
    <button class="nav-btn next-btn" onclick="event.stopPropagation(); changeImage(1);">&#10095;</button>

    <div class="lightbox-content">
        <div class="image-container">
            <img id="expandedImg" src="" alt="">
            <div class="lightbox-controls">
                <button class="control-btn" onclick="event.stopPropagation(); zoomIn();" title="Zoom In">
                    <i class="fas fa-search-plus"></i>
                    <span class="btn-text">Zoom In</span>
                </button>
                <button class="control-btn" onclick="event.stopPropagation(); zoomOut();" title="Zoom Out">
                    <i class="fas fa-search-minus"></i>
                    <span class="btn-text">Zoom Out</span>
                </button>
                <button class="control-btn" onclick="event.stopPropagation(); resetZoom();" title="Reset">
                    <i class="fas fa-undo"></i>
                    <span class="btn-text">Reset</span>
                </button>
            </div>
        </div>
        <div id="imgtext"></div>
        <div class="image-counter" id="imageCounter"></div>
    </div>
</div>

<style>
    /* Gallery Grid - Masonry Layout */
    .gallery-grid {
        column-count: 3;
        column-gap: 25px;
        max-width: 1400px;
        margin: auto;
        padding: 0 20px;
    }

    /* Gallery Card - Enhanced Masonry Item */
    .gallery-card {
        break-inside: avoid;
        margin-bottom: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        cursor: pointer;
        display: block;
        position: relative;
    }

    .gallery-image-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 12px;
    }

    .gallery-card img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
    }

    /* Hover Effects - Zoom In */
    .gallery-card:hover {
        box-shadow: 0 15px 35px rgba(212, 175, 55, 0.2);
    }

    .gallery-card:hover img {
        transform: scale(1.08);
    }

    /* Overlay with Icon */
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        opacity: 0;
        padding-bottom: 30px;
        transition: opacity 0.4s ease;
        color: white;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-overlay i {
        font-size: 32px;
        margin-bottom: 10px;
        color: #d4af37;
        animation: fadeInUp 0.5s ease forwards;
        transform: translateY(20px);
        opacity: 0;
    }

    .gallery-overlay span {
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
        animation: fadeInUp 0.5s ease forwards 0.1s;
        transform: translateY(20px);
        opacity: 0;
    }

    .gallery-card:hover .gallery-overlay i,
    .gallery-card:hover .gallery-overlay span {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Modern Lightbox */
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .lightbox-content {
        position: relative;
        width: 95%;
        height: 90vh;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .image-container {
        position: relative;
        width: 100%;
        height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #expandedImg {
        max-width: 95vw;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s ease;
        cursor: zoom-in;
    }

    #expandedImg.zoomed {
        cursor: zoom-out;
    }

    /* Lightbox Controls - Positioned over image */
    .lightbox-controls {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        z-index: 10002;
    }

    .control-btn {
        background: rgba(45, 109, 176, 0.9);
        border: 2px solid rgba(255, 255, 255, 0.5);
        color: white;
        min-width: 90px;
        height: 38px;
        padding: 0 14px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .control-btn i {
        font-size: 14px;
    }

    .btn-text {
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    .control-btn:hover {
        background: rgba(45, 109, 176, 1);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
    }

    #imgtext {
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 20px;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
        letter-spacing: 0.5px;
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 20px;
        border-radius: 25px;
        backdrop-filter: blur(10px);
        z-index: 10002;
    }

    .image-counter {
        position: absolute;
        top: 20px;
        right: 80px;
        color: white;
        font-size: 16px;
        opacity: 0.9;
        font-weight: 500;
        background: rgba(0, 0, 0, 0.6);
        padding: 8px 16px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        z-index: 10002;
    }

    /* Close Button */
    .closebtn {
        position: absolute;
        top: 25px;
        right: 35px;
        color: white;
        font-size: 50px;
        font-weight: 300;
        cursor: pointer;
        z-index: 10000;
        transition: transform 0.3s ease;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .closebtn:hover {
        transform: rotate(90deg) scale(1.2);
    }

    /* Navigation Buttons */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        z-index: 10001;
    }

    .nav-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
    }

    .prev-btn {
        left: 30px;
    }

    .next-btn {
        right: 30px;
    }

    /* Dark Theme Support */
    .theme-dark .gallery-section {
        background-color: #0e0e0e !important;
    }

    .theme-dark .gallery-card {
        background: #1a1a1a;
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.05);
    }

    .theme-dark .gallery-section h2 {
        color: #f1f1f1 !important;
    }

    .theme-dark .gallery-section p {
        color: #c7c7c7 !important;
    }

    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        .gallery-grid {
            column-count: 2;
        }
    }

    @media (max-width: 768px) {
        .gallery-grid {
            column-count: 2;
            column-gap: 15px;
        }

        .gallery-card {
            margin-bottom: 15px;
        }

        .nav-btn {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }

        .prev-btn {
            left: 15px;
        }

        .next-btn {
            right: 15px;
        }

        .closebtn {
            font-size: 40px;
            top: 15px;
            right: 20px;
        }

        .control-btn {
            min-width: 85px;
            height: 36px;
            font-size: 12px;
            gap: 5px;
        }

        .btn-text {
            font-size: 12px;
        }

        #imgtext {
            font-size: 16px;
            top: -40px;
        }

        .image-counter {
            font-size: 14px;
            top: 15px;
            right: 60px;
        }

        .image-container {
            height: 80vh;
        }

        #expandedImg {
            max-height: 80vh;
        }

        .lightbox-controls {
            bottom: 15px;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        .gallery-grid {
            column-count: 1;
        }

        .gallery-card {
            margin-bottom: 20px;
        }

        .gallery-overlay i {
            font-size: 28px;
        }

        .gallery-overlay span {
            font-size: 14px;
        }

        .lightbox-controls {
            flex-direction: row;
            gap: 8px;
            bottom: 10px;
        }

        .control-btn {
            min-width: 75px;
            height: 34px;
            font-size: 11px;
        }

        .btn-text {
            display: inline;
            font-size: 11px;
        }

        #imgtext {
            font-size: 14px;
            top: -40px;
            padding: 8px 16px;
        }

        .image-counter {
            font-size: 13px;
            top: 10px;
            right: 40px;
            padding: 6px 12px;
        }

        .image-container {
            height: 75vh;
        }

        #expandedImg {
            max-height: 75vh;
        }
    }
</style>

<script>
    let visibleGalleryItems = [];
    let currentIndex = 0;
    let zoomLevel = 1;

    // Initialize the lightbox array with all images on load
    document.addEventListener("DOMContentLoaded", function() {
        updateLightboxArray();
    });

    function updateLightboxArray() {
        visibleGalleryItems = [];
        const items = document.querySelectorAll('.gallery-card:not(.hidden)');
        items.forEach((item, index) => {
            const img = item.querySelector('img');
            // Store the dynamic index on the element so click handler knows which one it is
            item.setAttribute('data-lightbox-index', index);
            visibleGalleryItems.push({
                src: img.src,
                title: img.alt.split(' . ')[1] || img.alt
            });
        });
    }

    // Open Lightbox
    function openLightbox(element) {
        currentIndex = parseInt(element.getAttribute('data-lightbox-index')) || 0;
        const lightbox = document.getElementById("lightbox");
        const expandedImg = document.getElementById("expandedImg");
        const imgText = document.getElementById("imgtext");
        const counter = document.getElementById("imageCounter");

        if (visibleGalleryItems.length === 0) return;

        expandedImg.src = visibleGalleryItems[currentIndex].src;
        imgText.innerHTML = visibleGalleryItems[currentIndex].title;
        counter.innerHTML = `${currentIndex + 1} / ${visibleGalleryItems.length}`;
        lightbox.style.display = "flex";
        document.body.style.overflow = "hidden"; // Prevent background scroll
        resetZoom();
    }

    // Close Lightbox
    function closeLightbox() {
        document.getElementById("lightbox").style.display = "none";
        document.body.style.overflow = "auto";
        resetZoom();
    }

    // Close on background click
    function closeLightboxOnBackground(event) {
        if (event.target.id === "lightbox") {
            closeLightbox();
        }
    }

    // Navigate Images
    function changeImage(direction) {
        if (visibleGalleryItems.length === 0) return;

        currentIndex += direction;

        if (currentIndex >= visibleGalleryItems.length) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = visibleGalleryItems.length - 1;
        }

        const expandedImg = document.getElementById("expandedImg");
        const imgText = document.getElementById("imgtext");
        const counter = document.getElementById("imageCounter");

        // Fade effect
        expandedImg.style.opacity = "0";
        setTimeout(() => {
            expandedImg.src = visibleGalleryItems[currentIndex].src;
            imgText.innerHTML = visibleGalleryItems[currentIndex].title;
            counter.innerHTML = `${currentIndex + 1} / ${visibleGalleryItems.length}`;
            expandedImg.style.opacity = "1";
        }, 150);

        resetZoom();
    }

    // Zoom Functions
    function zoomIn() {
        const expandedImg = document.getElementById("expandedImg");
        zoomLevel += 0.2;
        if (zoomLevel > 3) zoomLevel = 3;
        expandedImg.style.transform = `scale(${zoomLevel})`;
        expandedImg.classList.add('zoomed');
    }

    function zoomOut() {
        const expandedImg = document.getElementById("expandedImg");
        zoomLevel -= 0.2;
        if (zoomLevel < 0.5) zoomLevel = 0.5;
        expandedImg.style.transform = `scale(${zoomLevel})`;
        if (zoomLevel === 1) {
            expandedImg.classList.remove('zoomed');
        }
    }

    function resetZoom() {
        const expandedImg = document.getElementById("expandedImg");
        zoomLevel = 1;
        expandedImg.style.transform = `scale(1)`;
        expandedImg.classList.remove('zoomed');
    }

    // Keyboard Navigation
    document.addEventListener('keydown', function(event) {
        const lightbox = document.getElementById("lightbox");
        if (lightbox.style.display === "flex") {
            if (event.key === "ArrowLeft") {
                changeImage(-1);
            } else if (event.key === "ArrowRight") {
                changeImage(1);
            } else if (event.key === "Escape") {
                closeLightbox();
            } else if (event.key === "+") {
                zoomIn();
            } else if (event.key === "-") {
                zoomOut();
            }
        }
    });

    // Touch/Mouse Drag for Zoomed Image
    let isDragging = false;
    let startX, startY, scrollLeft, scrollTop;

    document.addEventListener('DOMContentLoaded', function() {
        const expandedImg = document.getElementById("expandedImg");

        expandedImg.addEventListener('mousedown', function(e) {
            if (zoomLevel > 1) {
                isDragging = true;
                expandedImg.style.cursor = 'grabbing';
            }
        });

        expandedImg.addEventListener('mouseup', function() {
            isDragging = false;
            if (zoomLevel > 1) {
                expandedImg.style.cursor = 'grab';
            }
        });

        expandedImg.addEventListener('click', function() {
            if (zoomLevel === 1) {
                zoomIn();
            } else if (zoomLevel >= 2) {
                resetZoom();
            }
        });
    });
</script>

@endsection