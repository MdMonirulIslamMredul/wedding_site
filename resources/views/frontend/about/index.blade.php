@extends('frontend.layouts.app')
@section('content')
@section('title', __('About Us'))

<title>{{ app_name() }} | @yield('title')</title>
<style>
    /* === ANIMATION KEYFRAMES === */
    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInLeft {
        0% { opacity: 0; transform: translateX(-50px); }
        100% { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideInRight {
        0% { opacity: 0; transform: translateX(50px); }
        100% { opacity: 1; transform: translateX(0); }
    }
    @keyframes zoomIn {
        0% { opacity: 0; transform: scale(0.8); }
        100% { opacity: 1; transform: scale(1); }
    }
    @keyframes flipIn {
        0% { opacity: 0; transform: rotateY(90deg); }
        100% { opacity: 1; transform: rotateY(0); }
    }
    @keyframes rotateIn {
        0% { opacity: 0; transform: rotate(-10deg) scale(0.9); }
        100% { opacity: 1; transform: rotate(0) scale(1); }
    }

    /* === BASE STYLES FOR HIDDEN STATE === */
    .fade-up, .slide-left, .slide-right, .zoom, .flip, .rotate, .banner-text {
        opacity: 0;
    }

    /* === TRIGGERED STATE === */
    .in-view.fade-up { animation: fadeInUp 1s ease forwards; }
    .in-view.slide-left { animation: slideInLeft 1s ease forwards; }
    .in-view.slide-right { animation: slideInRight 1s ease forwards; }
    .in-view.zoom { animation: zoomIn 1s ease forwards; }
    .in-view.flip { animation: flipIn 1s ease forwards; }
    .in-view.rotate { animation: rotateIn 1s ease forwards; }
    .in-view.banner-text { animation: fadeInUp 1.2s ease forwards; }

    /* === CARD HOVER EFFECT === */
    .card-animated {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-animated:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 40px rgba(0,0,0,0.15);
    }

    /* === BUTTON HOVER === */
    .btn-animated {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-animated:hover {
        background-color: #08306b !important;
        transform: scale(1.05);
    }
</style>

<div class="main-content">

    <!-- Banner Area -->
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                <div class="slider-item" style="background-image: url('{{ asset('/setting/about/' . $about->banner_img) }}')">
                    <div class="slider-content">
                        <h2 style="
                            font-size: 60px;
                            font-weight: 900;
                            color: #ffffff;
                            text-transform: uppercase;
                            letter-spacing: 3px;
                            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
                        ">
                            About Us
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="rs-about gray-color mt-10 pt-220 pb-120 md-pt-80 md-pb-80" style="margin-top:100px;margin-bottom:100px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 md-mb-30 slide-left" style="animation-delay: 0.2s;">
                    <div class="rs-animation-shape">
                        <div class="images">
                            <img src="{{ asset('/setting/about/' . $about->about_image) }}" alt="">
                        </div>
                        <div class="middle-image2">
                            <img class="dance3" src="assets/images/effect-1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 slide-right" style="animation-delay: 0.4s;">
                    <div class="contact-wrap">
                        <div class="sec-title mb-30">
                            <h1>About Us</h1>
                        </div>
                        <div style="
                            background: #fff;
                            padding: 40px 35px;
                            border-radius: 18px;
                            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
                            max-width: 900px;
                            margin: 40px auto;
                            font-size: 18px;
                            line-height: 1.7;
                            color: #444;
                            text-align: justify;
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            width: 100%;
                        ">
                            {{ $about->short_description }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="row align-items-center">
                <div class="col-lg-12 pl-60 md-pl-15 zoom" style="animation-delay: 0.6s; padding-left: 15px; padding-right: 15px;">
                    <h2>Why Choose Us</h2>
                    <div style="
                        background: #fff;
                        padding: 40px 35px;
                        border-radius: 18px;
                        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
                        max-width: 1400px;
                        margin: 40px auto;
                        font-size: 18px;
                        line-height: 1.7;
                        color: #444;
                        text-align: justify;
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        width: 100%;
                    ">
                        {!! $about->description !!}
                    </div>
                </div>
            </div>



            <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 23px; padding: 50px 20px; max-width: 1200px; margin: auto;">

    <!-- Feature 1 -->
    <div style="flex: 1 1 calc(25% - 20px); text-align: center; min-width: 220px;">
        <img src="{{ asset('setting/brand/hybrid.png') }}" alt="Quick & Reliable" style="width: 80px; height: auto; margin-bottom: 30px;margin-top: 10px;">
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;"> Reliable</h3>
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">  <p style="font-size: 14px; color: #555; text-align: justify; text-justify: inter-word; hyphens: auto; line-height: 1.6; margin: 0 10px;">Our service is fully customer-centric and focused on bringing the best dazzle and shine on the face and smile of satisfaction on your face.</p>
    </div>


    <!-- Feature 2 -->
    <div style="flex: 1 1 calc(25% - 20px); text-align: center; min-width: 220px;">
        <img src="{{ asset('setting/brand/best_price.jpg') }}" alt="Affordable Price" style="width: 80px; height: auto; margin-bottom: 15px;">
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Affordable Price</h3>
       <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;"><p style="font-size: 14px; color: #555; text-align: justify; text-justify: inter-word; hyphens: auto; line-height: 1.6; margin: 0 10px;">Affordability and quality are always on top of our agenda with customers convenience given top priority.</p>
    </div>

    <!-- Feature 3 -->
    <div style="flex: 1 1 calc(25% - 20px); text-align: center; min-width: 220px;">
        <img src="{{ asset('setting/brand/quality.png') }}" alt="High Quality Service" style="width: 80px; height: auto; margin-bottom: 15px;">
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">High Quality Service</h3>
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;"> <p style="font-size: 14px; color: #555; text-align: justify; text-justify: inter-word; hyphens: auto; line-height: 1.6; margin: 0 10px;">Premium quality eco-friendly solar panels are used for achieving maximun efficiency.</p>
    </div>

    <!-- Feature 4 -->
    <div style="flex: 1 1 calc(25% - 20px); text-align: center; min-width: 220px;">
        <img src="{{ asset('setting/brand/eco.jpg') }}" alt="Eco Friendly" style="width: 80px; height: auto; margin-bottom: 15px;">
        <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Green Energy  <p style="font-size: 14px; color: #555; text-align: justify; text-justify: inter-word; hyphens: auto; line-height: 1.6; margin: 0 10px;">
            We are committed to promoting sustainable and eco-friendly energy solutions for a greener future.
    </p>
    </div>

</div>


            <!-- Mission & Vision Section -->
<div class="row g-4" style="margin-bottom: 40px;">
    <!-- Mission -->
    <div class="col-lg-6 col-md-12">
        <div class="card-animated flip" style="animation-delay: 0.2s; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1); text-align: center; height: 100%;">
            <div style="font-size: 50px; margin-bottom: 20px; color: #1565c0;">🎯</div>
            <h3 style="font-size: 26px; font-weight: bold; color: #1565c0; margin-bottom: 20px;">Our Mission</h3>
            <p style="font-size: 17px; line-height: 1.8; color: #333; text-align: justify; text-justify: inter-word;">
                {{ $mission->mission_vision ?? 'Mission content is not available.' }}
            </p>
        </div>
    </div>
    <!-- Vision -->
    <div class="col-lg-6 col-md-12">
        <div class="card-animated flip" style="animation-delay: 0.4s; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1); text-align: center; height: 100%;">
            <div style="font-size: 50px; margin-bottom: 20px; color: #2e7d32;">🚀✨</div>
            <h3 style="font-size: 26px; font-weight: bold; color: #2e7d32; margin-bottom: 20px;">Our Vision</h3>
            <p style="font-size: 17px; line-height: 1.8; color: #333; text-align: justify; text-justify: inter-word;">
                {{ $mission->text ?? 'Vision content is not available.' }}
            </p>
        </div>
    </div>
</div>


  <!-- License Section -->
    <div class="card-animated rotate" style="animation-delay: 0.6s; background: #ffffff; padding: 40px; margin-bottom: 30px; border-radius: 16px; box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1); text-align: center;">
        <div style="font-size: 50px; margin-bottom: 20px; color: #0d47a1;">📜</div>
        <h3 style="font-size: 26px; font-weight: bold; color: #0d47a1; margin-bottom: 20px;">Our License</h3>
        <p style="font-size: 17px; line-height: 1.8; color: #333; margin-bottom: 25px;">
            Official government-recognized license for authorized operations.
        </p>
        @if($mission->pdf_file)
            <a href="{{ asset('setting/mission/' . $mission->pdf_file) }}" target="_blank" class="btn-animated" style="padding: 12px 28px; background-color: #0d47a1; color: #fff; font-size: 16px; font-weight: 600; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 12px rgba(13, 71, 161, 0.2); text-decoration: none;">
                📄 View Official License
            </a>
        @else
            <span class="text-muted">No License File</span>
        @endif
    </div>

    <!-- Portfolio Section -->
    <div class="card-animated rotate" style="animation-delay: 0.8s; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1); text-align: center;">
        <div style="font-size: 50px; margin-bottom: 20px; color: #6a1b9a;">💼</div>
        <h3 style="font-size: 26px; font-weight: bold; color: #6a1b9a; margin-bottom: 20px;">Our Portfolio</h3>
        <p style="font-size: 17px; line-height: 1.8; color: #333; margin-bottom: 25px;">
            Showcase of our work and achievements.
        </p>
        @if($mission->portfolio)
            <a href="{{ asset('setting/mission/' . $mission->portfolio) }}" target="_blank" class="btn-animated" style="padding: 12px 28px; background-color: #6a1b9a; color: #fff; font-size: 16px; font-weight: 600; border: none; border-radius: 8px; cursor: pointer; box-shadow: 0 4px 12px rgba(106, 27, 154, 0.2); text-decoration: none;">
                📄 View Portfolio
            </a>
        @else
            <span class="text-muted">No Portfolio File</span>
        @endif
    </div>

</div>

<script>
    // Scroll-trigger animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            }
        });
    }, { threshold: 0.2 });

    document.querySelectorAll('.fade-up, .slide-left, .slide-right, .zoom, .flip, .rotate, .banner-text')
        .forEach(el => observer.observe(el));
</script>
@endsection
