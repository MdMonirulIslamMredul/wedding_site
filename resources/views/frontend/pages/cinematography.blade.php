@extends('frontend.layouts.app')
@section('title', 'Cinematography | Wedding Heritage')
@section('content')

<style>
    .page-header {
        position: relative;
        padding: 180px 0 100px;
        background: #1A1C20;
        text-align: center;
        color: #fff;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: url('{{ asset("assets/images/hero_wedding_image_1784024113691.png") }}');
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        z-index: 0;
    }

    .page-title {
        position: relative;
        z-index: 1;
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .page-subtitle {
        position: relative;
        z-index: 1;
        color: #C5A059;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .cinema-section {
        padding: 100px 0;
        background: #111;
        color: #fff;
    }

    .cinema-intro {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 60px;
    }

    .cinema-intro h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #fff;
        margin-bottom: 20px;
    }

    .cinema-intro p {
        color: #aaa;
        font-size: 1.1rem;
        line-height: 1.8;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 40px;
        padding: 0 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    @media (max-width: 768px) {
        .video-grid {
            grid-template-columns: 1fr;
        }
    }

    .video-card {
        background: #1A1C20;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        transition: transform 0.3s ease;
    }

    .video-card:hover {
        transform: translateY(-5px);
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .video-info {
        padding: 25px;
        text-align: center;
    }

    .video-info h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: #fff;
        margin-bottom: 0;
    }

    /* CTA Panel Styling */
    .cinema-cta-panel {
        background: #1A1C20;
        padding: 70px 40px;
        color: #fff;
        position: relative;
        overflow: hidden;
        max-width: 1200px;
        margin: 80px auto 20px;
        text-align: center;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        border-radius: 6px;
        border: 1px solid #282a30;
    }

    .cinema-cta-panel:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #C5A059, #e8c784, #C5A059);
    }

    .cinema-cta-panel h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 18px;
        color: #C5A059;
    }

    .cinema-cta-panel p {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.05rem;
        line-height: 1.7;
        color: #ccc;
        max-width: 750px;
        margin: 0 auto 35px;
    }

    .cinema-cta-btn {
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

    .cinema-cta-btn:hover {
        background: #e8c784;
        color: #1A1C20;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(197, 160, 89, 0.3);
    }

    @media (max-width: 575px) {
        .cinema-cta-panel {
            padding: 50px 20px;
        }

        .cinema-cta-panel h2 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="page-header">
    <div class="page-subtitle">Cinematic Storytelling</div>
    <h1 class="page-title">Wedding Films</h1>
</div>

<div class="cinema-section">
    <div class="container">
        <div class="cinema-intro">
            <h2>Relive the Magic</h2>
            <p>Our cinematic wedding films are meticulously crafted to capture the authentic emotions, the heartfelt vows, and the joyous celebrations of your special day. Each film is a unique masterpiece, telling your love story beautifully.</p>
        </div>

        @if($videos && $videos->count() > 0)
        <div class="video-grid">
            @foreach($videos as $video)
                @php
                    $embedLink = $video->youtube_link;
                    if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $video->youtube_link, $match)) {
                        $embedLink = 'https://www.youtube.com/embed/' . $match[1];
                    }
                @endphp
                <div class="video-card" data-aos="fade-up">
                    <div class="video-wrapper">
                        <iframe src="{{ $embedLink }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @if($video->title)
                    <div class="video-info">
                        <h3>{{ $video->title }}</h3>
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
        @else
        <div style="text-align: center; color: #888; padding: 40px;">
            <h3>No videos available at the moment.</h3>
        </div>
        @endif

        <!-- Book Now CTA Section -->
        <div class="cinema-cta-panel" data-aos="fade-up" data-aos-duration="900">
            <h2>Book Your Event With Us</h2>
            <p>Keep your precious moments remembered in professional ways. Let our cinematic team capture every emotion, smile, and story of your special day.</p>
            <a href="{{ route('frontend.book_now') }}" class="cinema-cta-btn">
                Book Now <i class="fa-solid fa-calendar-check" style="margin-left: 8px;"></i>
            </a>
        </div>
    </div>
</div>

@endsection
