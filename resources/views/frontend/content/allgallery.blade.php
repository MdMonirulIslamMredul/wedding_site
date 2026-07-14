@extends('frontend.layouts.app')
@section('content')

@section('title', __('Gellery'))

<title>{{ app_name() }} | @yield('title')</title>

<!-- Gallery Section -->
<div class="gallery-section" style="padding: 80px 20px; background-color: #fafafa;">
    <!-- Section Title -->
    <div style="text-align: center; margin-bottom: 50px;">
        <h2 style="font-size: 42px; font-weight: bold; color: #222; margin: 0 0 10px 0;">
            Gallery
        </h2>
        <p style="color: #777; font-size: 18px;">Explore our latest moments and events</p>
    </div>

    <!-- Gallery Grid -->
    @if($images && count($images) > 0)
        <div class="gallery-grid">
            @foreach ($images as $index => $image)
                <div class="gallery-card" data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $index * 50 }}" onclick="openLightbox({{ $index }})">
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
</div>

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
    /* Gallery Grid - Bigger Images */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
        max-width: 1400px;
        margin: auto;
        padding: 0 20px;
    }

    /* Gallery Card - Enhanced */
    .gallery-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        cursor: pointer;
        height: 350px;
        display: block;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-image-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Hover Effects - Zoom In */
    .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    .gallery-card:hover img {
        transform: scale(1.15);
    }

    /* Overlay with Icon */
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(45, 109, 176, 0.85);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.4s ease;
        color: white;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-overlay i {
        font-size: 48px;
        margin-bottom: 12px;
        animation: pulse 1.5s infinite;
    }

    .gallery-overlay span {
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
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
        from { opacity: 0; }
        to { opacity: 1; }
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
        box-shadow: 0 10px 50px rgba(0,0,0,0.5);
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
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
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
        box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    }

    #imgtext {
        position: absolute;
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 20px;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
        letter-spacing: 0.5px;
        background: rgba(0,0,0,0.5);
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
        background: rgba(0,0,0,0.6);
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
        text-shadow: 0 2px 8px rgba(0,0,0,0.5);
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
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .gallery-card {
            height: 280px;
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
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .gallery-card {
            height: 250px;
        }

        .gallery-overlay i {
            font-size: 36px;
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
    // Gallery Images Array
    const galleryImages = [
        @foreach ($images as $image)
            "{{ asset('/setting/banner/' . $image->image) }}",
        @endforeach
    ];

    const galleryTitles = [
        @foreach ($images as $image)
            "{{ $image->details ?? 'Gallery Image' }}",
        @endforeach
    ];

    let currentIndex = 0;
    let zoomLevel = 1;

    // Open Lightbox
    function openLightbox(index) {
        currentIndex = index;
        const lightbox = document.getElementById("lightbox");
        const expandedImg = document.getElementById("expandedImg");
        const imgText = document.getElementById("imgtext");
        const counter = document.getElementById("imageCounter");

        expandedImg.src = galleryImages[currentIndex];
        imgText.innerHTML = galleryTitles[currentIndex];
        counter.innerHTML = `${currentIndex + 1} / ${galleryImages.length}`;
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
        currentIndex += direction;

        if (currentIndex >= galleryImages.length) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = galleryImages.length - 1;
        }

        const expandedImg = document.getElementById("expandedImg");
        const imgText = document.getElementById("imgtext");
        const counter = document.getElementById("imageCounter");

        // Fade effect
        expandedImg.style.opacity = "0";
        setTimeout(() => {
            expandedImg.src = galleryImages[currentIndex];
            imgText.innerHTML = galleryTitles[currentIndex];
            counter.innerHTML = `${currentIndex + 1} / ${galleryImages.length}`;
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
