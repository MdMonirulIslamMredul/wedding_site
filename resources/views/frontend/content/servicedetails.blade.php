@extends('frontend.layouts.app')
@section('content')
@section('title', __('Service'))

<title>{{ app_name() }} | @yield('title')</title>

<style>
    /* Service card hover border */
    .single-service-card:hover {
        border-color: #ff8c00 !important;
        transform: translateY(-8px);
        box-shadow: 0 18px 42px rgba(0,0,0,0.2);
    }
    /* Button hover border */
    .service-detail-btn:hover {
        border-color: #ff8c00 !important;
        background: #25934f !important;
        box-shadow: 0 0 0 4px rgba(255,140,0,.25), 0 10px 28px rgba(45,109,176,.4);
        transform: translateY(-2px);
    }
    /* Dark theme */
    .theme-dark .single-service-card {
        background: #1f2937 !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.55);
    }
    .theme-dark .single-service-card:hover {
        border-color: #ff8c00 !important;
        background: #1f2937 !important;
    }
    .theme-dark .service-detail-btn:hover {
        border-color: #ff8c00 !important;
    }
</style>

<div class="main-content">

    <!-- Banner Section -->
    <div class="banner-area pb-100" style="position: relative;">
        <div class="container-fluid p-0">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                <div class="slider-item" style="background-image: url('{{ asset('/setting/service/' . $banner->banner) }}'); background-size: cover; background-position: center; height: 450px; display: flex; align-items: center; justify-content: center;">
                    <div class="slider-content text-center">
                        <h2 style="color: #fff; font-size: 52px; font-weight: 900; text-shadow: 3px 3px 12px rgba(0,0,0,0.6);">
                            Our Services
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services-area ptb-100" style="background: #f3f6f9;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 style="font-size: 38px; font-weight: 800;">Our Services</h2>
                <p style="color: #666; font-size: 16px;">Professional services to make your life easier</p>
            </div>

            <div class="row justify-content-center">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-duration="1000">
                        <div class="single-service-card" style="background:#fff; box-shadow:0 15px 35px rgba(0,0,0,0.15); border-radius:20px; overflow:hidden; transition:all .35s ease; position:relative; display:flex; flex-direction:column; height:100%; border:2px solid transparent;">
                            @if($service->image1)
                                <div class="img" style="height:380px; overflow:hidden;">
                                    <img src="{{ asset('/setting/service/' . $service->image1) }}" alt="{{ $service->title }}" style="width:100%; height:100%; object-fit:cover; transform:scale(1.05); transition:transform .6s cubic-bezier(.19,1,.22,1);">
                                </div>
                            @endif
                            <div class="service-content p-4 text-center" style="flex:1 1 auto; display:flex; flex-direction:column;">
                                <h3 style="font-size:28px; font-weight:800; margin:0 0 14px; color:#17354f;">{{ $service->title }}</h3>
                                <div style="font-size:15px; line-height:1.55; color:#4d606f; margin-bottom:18px; max-height:140px; overflow:auto;">{!! Str::limit(strip_tags($service->details1), 160) !!}</div>
                                <div class="mt-auto">
                                    <a href="{{ route('service.show', $service->id) }}" class="btn btn-primary service-detail-btn" style="background:#2db05f; border:2px solid transparent; padding:12px 26px; font-weight:700; border-radius:40px; letter-spacing:.5px; box-shadow:0 8px 24px rgba(45,109,176,.35); text-decoration:none; display:inline-block; transition:.35s; color:#fff;">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Service Areas Section -->
    <div class="service-areas ptb-100" style="background: #fff;">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 style="font-size: 38px; font-weight: 800;">Service Areas</h2>
                <p style="color: #666; font-size: 16px;">We provide our services across multiple locations!</p>
            </div>

            <div class="service-areas-container" style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: center;">
                @foreach($areas as $area)
                    <div class="service-area-item" style="width: 300px; text-align: center; border: 1px solid #eee; border-radius: 16px; padding: 20px; background: #fafafa; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: transform 0.3s; cursor: pointer;">
                        @if($area->image)
                            <img src="{{ asset($area->image) }}"
                                 alt="{{ $area->areaname }}"
                                 style="width: 100%; height: 180px; object-fit: cover; border-radius: 12px;">
                        @endif
                        <h3 style="margin-top: 15px; font-size: 20px; font-weight: 700;">{{ $area->areaname }}</h3>
                        <p style="font-size: 15px; color: #555; line-height: 1.6;">{{ $area->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
