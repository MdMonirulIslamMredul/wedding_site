@extends('frontend.layouts.app')
@section('title', 'Book Now | Wedding Heritage')
@section('content')

    <style>
        /* Modern Book Now styling - Premium Dark/Gold */
        .page-header {
            position: relative;
            padding: 220px 0 140px;
            background: #1A1C20;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* Generic fallback banner image */
            background-image: url('{{ asset("assets/images/about_wedding_image_1784024125051.png") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0.25;
            z-index: 0;
        }

        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 180px;
            background: linear-gradient(to top, #121212, transparent);
            z-index: 1;
        }

        .page-title {
            position: relative;
            z-index: 2;
            font-family: 'Playfair Display', serif;
            font-size: 3.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .page-subtitle {
            position: relative;
            z-index: 2;
            color: #C5A059;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .booking-section {
            background: #121212;
            padding-bottom: 120px;
        }

        .booking-container {
            background: #1A1C20;
            padding: 70px 90px;
            max-width: 900px;
            margin: -100px auto 0;
            position: relative;
            z-index: 10;
            border: 1px solid #333;
            border-top: 3px solid #C5A059;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        .booking-form .form-group {
            margin-bottom: 30px;
        }

        .booking-form label {
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
            letter-spacing: 0.05em;
        }

        .booking-form .form-control,
        .booking-form .form-select {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid #333;
            color: #ccc;
            font-family: 'Montserrat', sans-serif;
            padding: 15px 20px;
            border-radius: 4px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .booking-form .form-control:focus,
        .booking-form .form-select:focus {
            background: rgba(255, 255, 255, 0.05);
            border-color: #C5A059;
            outline: none;
            box-shadow: none;
            color: #fff;
        }

        /* Fix for date picker icon color */
        .booking-form input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.5;
            cursor: pointer;
        }

        /* Fix select text color */
        .booking-form .form-select option {
            background: #1A1C20;
            color: #fff;
        }

        .btn-book-submit {
            background: transparent;
            color: #C5A059;
            border: 1px solid #C5A059;
            padding: 16px 40px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        .btn-book-submit:hover {
            background: #C5A059;
            color: #1A1C20;
            box-shadow: 0 10px 20px rgba(197, 160, 89, 0.2);
        }

        .booking-description {
            text-align: center;
            color: #ccc;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 50px;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Modern Package Selection UI */
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .package-card {
            position: relative;
            cursor: pointer;
            display: block;
        }

        .package-card input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .package-content {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid #333;
            border-radius: 8px;
            padding: 35px 30px;
            height: 100%;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .package-card:hover .package-content {
            border-color: rgba(197, 160, 89, 0.5);
            background: rgba(255, 255, 255, 0.04);
            transform: translateY(-5px);
        }

        .package-card input[type="radio"]:checked+.package-content {
            border-color: #C5A059;
            background: rgba(197, 160, 89, 0.05);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3), inset 0 0 0 1px #C5A059;
        }

        .package-check {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #C5A059;
            font-size: 24px;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.3s ease;
        }

        .package-card input[type="radio"]:checked+.package-content .package-check {
            opacity: 1;
            transform: scale(1);
        }

        .package-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #fff;
            margin-bottom: 10px;
            font-weight: 700;
            padding-right: 25px;
        }

        .package-price {
            font-size: 2rem;
            color: #C5A059;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .package-suffix {
            font-size: 0.95rem;
            color: #999;
            font-weight: 400;
        }

        .package-expand-btn {
            background: rgba(197, 160, 89, 0.08);
            border: 1px solid rgba(197, 160, 89, 0.3);
            color: #C5A059;
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
        }

        .package-card:hover .package-expand-btn {
            background: rgba(197, 160, 89, 0.15);
            border-color: #C5A059;
        }

        .package-expand-btn .expand-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .package-card.expanded .package-expand-btn .expand-icon {
            transform: rotate(180deg);
        }

        .package-card.expanded .package-expand-btn {
            background: #C5A059;
            color: #121212;
        }

        .package-details {
            display: none;
            margin-top: 20px;
            border-top: 1px dashed rgba(197, 160, 89, 0.3);
            padding-top: 20px;
            animation: fadeInDetails 0.3s ease forwards;
        }

        .package-card.expanded .package-details {
            display: block;
        }

        @keyframes fadeInDetails {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .package-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .package-features li {
            font-size: 0.95rem;
            color: #ccc;
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
            line-height: 1.5;
        }

        .package-features li i {
            color: #C5A059;
            margin-right: 12px;
            font-size: 1.2rem;
            margin-top: 2px;
        }

        .popular-badge {
            position: absolute;
            top: 15px;
            right: -35px;
            background: #C5A059;
            color: #121212;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 5px 40px;
            transform: rotate(45deg);
            letter-spacing: 0.1em;
            z-index: 2;
        }

        /* Custom Package Builder Styling */
        .custom-label {
            color: #C5A059;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: block;
            letter-spacing: 0.05em;
        }

        .hours-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pill-option {
            position: relative;
            cursor: pointer;
            margin: 0;
        }

        .pill-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .pill-option span {
            display: inline-block;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid #333;
            border-radius: 20px;
            color: #ccc;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .pill-option input[type="radio"]:checked+span {
            background: #C5A059;
            color: #121212;
            border-color: #C5A059;
            font-weight: 600;
        }

        .checkbox-option {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid #333;
            padding: 12px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 0;
            height: 100%;
            color: #ccc;
            font-size: 0.88rem;
        }

        .checkbox-option:hover {
            border-color: rgba(197, 160, 89, 0.5);
            background: rgba(255, 255, 255, 0.04);
        }

        .checkbox-option input[type="checkbox"] {
            accent-color: #C5A059;
            width: 18px;
            height: 18px;
            margin-right: 12px;
            cursor: pointer;
        }

        .checkbox-option i {
            color: #C5A059;
            margin-right: 8px;
            font-size: 1.1rem;
        }

        @media (max-width: 767px) {
            .page-title {
                font-size: 2.5rem;
            }

            .booking-container {
                padding: 40px 25px;
                margin-top: -50px;
            }
        }
    </style>

    <div class="page-header">
        <div class="page-subtitle">Reserve Your Date</div>
        <h1 class="page-title">Book Now</h1>
    </div>

    <div class="booking-section">
        <div class="container">
            <div class="booking-container" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <div class="booking-description">
                    Let us capture the magic of your special day. Fill out the form below with your event details, and our
                    team will get back to you shortly to finalize your booking.
                </div>

                @if(session('success'))
                    <div class="alert alert-success"
                        style="background: rgba(197, 160, 89, 0.1); border-color: #C5A059; color: #C5A059; padding: 20px; border-radius: 8px; margin-bottom: 30px; font-family: 'Montserrat', sans-serif;">
                        <i class="ri-check-line" style="margin-right: 10px;"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('frontend.book_now.store') }}" method="POST" class="booking-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. John & Jane" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="your@email.com" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" placeholder="e.g. +1 234 567 8900" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Event Date *</label>
                            <input type="date" name="event_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Event Venue / Location</label>
                            <input type="text" name="venue" class="form-control"
                                placeholder="Where will the event take place?">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Service Needed *</label>
                            <select name="service_id" class="form-select" required>
                                <option value="">-- Select a Service --</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title ?? $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label class="mb-4"
                            style="font-size: 1.2rem; font-family: 'Playfair Display', serif; color: #C5A059;">Select Your
                            Package *</label>
                        <div class="packages-grid">
                            @foreach($packages as $package)
                                <label class="package-card">
                                    <input type="radio" name="package_id" value="{{ $package->id }}" class="package-radio-input"
                                        required {{ request('package') == $package->id ? 'checked' : '' }}>
                                    <div class="package-content">
                                        @if(isset($package->is_popular) && $package->is_popular)
                                            <div class="popular-badge">Popular</div>
                                        @endif
                                        <div class="package-check"><i class="ri-checkbox-circle-fill"></i></div>
                                        <div class="package-name">{{ $package->title ?? $package->name }}</div>
                                        <div class="package-price">{{ $package->price }} <span
                                                class="package-suffix">{{ $package->suffix }}</span></div>

                                        <div class="package-expand-btn">
                                            <span class="btn-text">Expand Details</span>
                                            <i class="ri-arrow-down-s-line expand-icon"></i>
                                        </div>

                                        <div class="package-details">
                                            <ul class="package-features">
                                                @php $featuresList = explode("\n", $package->features ?? ''); @endphp
                                                @foreach($featuresList as $feature)
                                                    @if(trim($feature) != '')
                                                        <li><i class="ri-check-line"></i> <span>{{ trim($feature) }}</span></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </label>
                            @endforeach

                            <!-- Custom Package Radio Option -->
                            <label class="package-card custom-package-card">
                                <input type="radio" name="package_id" value="custom" class="package-radio-input"
                                    id="package_custom_radio" required {{ request('package') == 'custom' ? 'checked' : '' }}>
                                <div class="package-content" style="border-style: dashed;">
                                    <div class="popular-badge"
                                        style="background: #1A1C20; border: 1px solid #C5A059; color: #C5A059;">Custom
                                        Package</div>
                                    <div class="package-check"><i class="ri-checkbox-circle-fill"></i></div>
                                    <div class="package-name">Custom Package</div>
                                    <div class="package-price" id="card_custom_price_preview">Price on Consultation <span
                                            class="package-suffix">(BDT)</span></div>

                                    <div class="package-expand-btn"
                                        style="background: rgba(197, 160, 89, 0.15); border-color: #C5A059;">
                                        <span class="btn-text">Customize Facilities</span>
                                        <i class="ri-settings-4-line expand-icon"></i>
                                    </div>

                                    <div class="package-details">
                                        <ul class="package-features">
                                            <li><i class="ri-check-line"></i> <span>Custom Photographers &
                                                    Cinematographers</span></li>
                                            <li><i class="ri-check-line"></i> <span>Custom Duration, Lighting & Print
                                                    Copies</span></li>
                                            <li><i class="ri-check-line"></i> <span>Drone, Photobook, Video Trailer &
                                                    Drive/Pendrive</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Custom Package Builder Controls Panel -->
                    <div id="custom_package_builder" class="custom-builder-container mt-4 mb-4"
                        style="display: none; background: rgba(255,255,255,0.02); border: 1px solid #C5A059; border-radius: 8px; padding: 35px 30px;">
                        <h4
                            style="font-family: 'Playfair Display', serif; color: #C5A059; margin-bottom: 25px; font-size: 1.5rem; display: flex; align-items: center;">
                            <i class="ri-equalizer-line" style="margin-right: 12px; font-size: 1.8rem;"></i> Customize Your
                            Event Facilities
                        </h4>

                        <!-- 1. Hours Selection -->
                        <div class="custom-group mb-4">
                            <label class="custom-label">1. Coverage Duration (Hours)</label>
                            <div class="hours-pills">
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="4 Hours">
                                    <span>4 Hours</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="5 Hours">
                                    <span>5 Hours</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="6 Hours" checked>
                                    <span>6 Hours</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="7 Hours">
                                    <span>7 Hours</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="8 Hours">
                                    <span>8 Hours</span>
                                </label>
                                <label class="pill-option">
                                    <input type="radio" name="custom_hours" value="Full Day (12+ Hours)">
                                    <span>Full Day / Multi-Event</span>
                                </label>
                            </div>
                        </div>

                        <!-- 2. Photographer Team Selection -->
                        <label class="custom-label mb-2">2. Photography Team Selection</label>
                        <div class="row">
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Chief Photographer</label>
                                <select name="custom_chief_photographers" class="form-select">
                                    <option value="0">None</option>
                                    <option value="1">1 Chief Photographer</option>
                                </select>
                            </div>
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Senior Photographers</label>
                                <select name="custom_senior_photographers" class="form-select">
                                    <option value="0">None</option>
                                    <option value="1" selected>1 Senior Photographer</option>
                                    <option value="2">2 Senior Photographers</option>
                                </select>
                            </div>
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Core Photographers</label>
                                <select name="custom_core_photographers" class="form-select">
                                    <option value="0" selected>None</option>
                                    <option value="1">1 Core Photographer</option>
                                    <option value="2">2 Core Photographers</option>
                                    <option value="3">3 Core Photographers</option>
                                </select>
                            </div>
                        </div>

                        <!-- 3. Cinematographer / Videographer Team Selection -->
                        <label class="custom-label mb-2">3. Cinematography / Videography Team</label>
                        <div class="row">
                            <div class="col-md-6 custom-group mb-4">
                                <label class="text-white small mb-1">Senior Cinematographers</label>
                                <select name="custom_senior_cinematographers" class="form-select">
                                    <option value="0">None</option>
                                    <option value="1" selected>1 Senior Cinematographer</option>
                                    <option value="2">2 Senior Cinematographers</option>
                                </select>
                            </div>
                            <div class="col-md-6 custom-group mb-4">
                                <label class="text-white small mb-1">Core Cinematographers</label>
                                <select name="custom_core_cinematographers" class="form-select">
                                    <option value="0" selected>None</option>
                                    <option value="1">1 Core Cinematographer</option>
                                    <option value="2">2 Core Cinematographers</option>
                                    <option value="3">3 Core Cinematographers</option>
                                </select>
                            </div>
                        </div>

                        <!-- 4. Photo Editing & Print Options -->
                        <label class="custom-label mb-2">4. Photo Editing & Print Deliverables</label>
                        <div class="row">
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Edited Soft Copies</label>
                                <select name="custom_edited_copies" class="form-select">
                                    <option value="100 Copies Edited">100 Copies Edited</option>
                                    <option value="150 Copies Edited" selected>150 Copies Edited</option>
                                    <option value="200 Copies Edited">200 Copies Edited</option>
                                    <option value="250 Copies Edited">250 Copies Edited</option>
                                    <option value="300 Copies Edited">300 Copies Edited</option>
                                    <option value="500 Copies Edited">500 Copies Edited</option>
                                    <option value="700 Copies Edited">700 Copies Edited</option>
                                </select>
                            </div>
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Printed Copies</label>
                                <select name="custom_printed_copies" class="form-select">
                                    <option value="None" selected>None (Digital Only)</option>
                                    <option value="80 Copies Print">80 Copies Print</option>
                                    <option value="100 Copies Print">100 Copies Print</option>
                                    <option value="120 Copies Print">120 Copies Print</option>
                                    <option value="150 Copies Print">150 Copies Print</option>
                                </select>
                            </div>
                            <div class="col-md-4 custom-group mb-4">
                                <label class="text-white small mb-1">Photobook Selection</label>
                                <select name="custom_photobook" class="form-select">
                                    <option value="None" selected>None</option>
                                    <option value="1 Photobook">1 Photobook</option>
                                    <option value="1 Exclusive Photobook">1 Exclusive Photobook</option>
                                </select>
                            </div>
                        </div>

                        <!-- 5. Video Deliverables & Lighting -->
                        <label class="custom-label mb-2">5. Video Deliverables & Lighting Setup</label>
                        <div class="row">
                            <div class="col-md-6 custom-group mb-4">
                                <label class="text-white small mb-1">Full HD Video (1080P)</label>
                                <select name="custom_video_duration" class="form-select">
                                    <option value="None">None (Photography Only)</option>
                                    <option value="Full HD Video (25 - 40 Mins)" selected>25 - 40 Mins Full Video</option>
                                    <option value="Full HD Video (30 - 45 Mins)">30 - 45 Mins Full Video</option>
                                    <option value="Full HD Video (45 - 55 Mins)">45 - 55 Mins Full Video</option>
                                </select>
                            </div>
                            <div class="col-md-6 custom-group mb-4">
                                <label class="text-white small mb-1">Lighting Setup</label>
                                <select name="custom_lighting_setup" class="form-select">
                                    <option value="Moderate Lighting Setup">Moderate Lighting Setup</option>
                                    <option value="All Necessary Lighting Setup" selected>All Necessary Lighting Setup
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- 6. Additional Add-ons & Coverage Scope -->
                        <label class="custom-label mb-3">6. Additional Facilities & Add-ons</label>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="custom_video_trailer" value="1" checked>
                                    <span><i class="ri-film-line"></i> Exclusive Video Trailer</span>
                                </label>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="custom_drone" value="1">
                                    <span><i class="ri-flight-takeoff-line"></i> Drone Aerial Photography /
                                        Videography</span>
                                </label>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="custom_pre_wedding" value="1">
                                    <span><i class="ri-heart-line"></i> Pre-Wedding / Engagement Shoot</span>
                                </label>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="text-white small mb-1 d-block">Delivery Method</label>
                                <select name="custom_delivery_method" class="form-select">
                                    <option value="Google Drive" selected>Google Drive</option>
                                    <option value="Pendrive">Pendrive</option>
                                    <option value="Portable HDD">Portable HDD</option>
                                </select>
                            </div>
                        </div>

                        <!-- Discussion Info Notice -->
                        <div class="custom-price-info mt-4"
                            style="background: rgba(197, 160, 89, 0.08); border: 1px solid rgba(197, 160, 89, 0.3); border-radius: 6px; padding: 22px; text-align: center;">
                            <div
                                style="font-size: 1.1rem; font-weight: 700; color: #C5A059; font-family: 'Playfair Display', serif; margin-bottom: 6px;">
                                <i class="ri-calendar-check-line" style="margin-right: 8px;"></i> Pricing Finalized Upon
                                Personal Consultation (BDT)
                            </div>
                            <div style="color: #bbb; font-size: 0.88rem; max-width: 650px; margin: 0 auto;">
                                Select your desired event facilities above and submit your booking request. Custom package
                                pricing will be finalized during your personal consultation with our team.
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Additional Details or Special Requests</label>
                        <textarea name="notes" class="form-control" rows="5"
                            placeholder="Tell us more about your event, timeline, or specific shots you'd love..."></textarea>
                    </div>

                    <button type="submit" class="btn-book-submit">
                        Request Booking
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const packageCards = document.querySelectorAll('.package-card');
            const customBuilder = document.getElementById('custom_package_builder');
            const customRadio = document.getElementById('package_custom_radio');
            const radioInputs = document.querySelectorAll('.package-radio-input');

            // Accordion card expand details
            packageCards.forEach(card => {
                const btnText = card.querySelector('.btn-text');

                card.addEventListener('click', function (e) {
                    if (e.target.tagName === 'INPUT' || e.target.type === 'radio') {
                        return;
                    }

                    if (e.target.closest('.package-details') && !e.target.closest('.package-expand-btn')) {
                        return;
                    }

                    card.classList.toggle('expanded');
                    const isExpanded = card.classList.contains('expanded');

                    if (btnText) {
                        btnText.textContent = isExpanded ? 'Hide Details' : 'Expand Details';
                    }
                });
            });

            // Custom Builder toggle
            function checkCustomPackageDisplay() {
                if (customRadio && customRadio.checked) {
                    customBuilder.style.display = 'block';
                } else {
                    customBuilder.style.display = 'none';
                }
            }

            radioInputs.forEach(radio => {
                radio.addEventListener('change', checkCustomPackageDisplay);
            });

            // Initial run check
            checkCustomPackageDisplay();
        });
    </script>

@endsection