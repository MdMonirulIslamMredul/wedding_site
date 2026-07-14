@extends('frontend.layouts.app')
@section('content')

@section('title', __('Contact'))

<title>{{ app_name() }} | @yield('title')</title>
    @php
        $sliders = DB::table('sliders')
            ->where('is_active', 1)
            ->get();
    @endphp
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                @foreach ($sliders as $key => $slider)
                    <div class="slider-item" style="background-image: url('{{ asset('/setting/banner/' . $slider->image) }}">
                        <div class="slider-content @if ($key == 0) active @endif">
                            <h1>{{ $slider->header_title }}</h1>
                            <p>{{ $slider->details }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="contact-us-area pt-100 pb-90">
        <div class="container">
            <div class="contact-flex">
                <div class="contact-form-col">
                    <div class="appointment-container">
                        <h2>Book Your Appointment</h2>
                        @if(session('success'))
                        <div class="alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('appointment.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-group">
                                <label for="car_model">Address</label>
                                <input type="text" id="car_model" name="car_model" placeholder="Enter your address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group half-width">
                                    <label for="date">Preferred Date</label>
                                    <input type="date" id="date" name="date" required>
                                </div>
                                <div class="form-group half-width">
                                    <label for="time">Preferred Time</label>
                                    <input type="time" id="time" name="time" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note">Additional Notes</label>
                                <textarea id="note" name="note" rows="3" placeholder="Any special requests..."></textarea>
                            </div>
                            <button type="submit">Book Appointment</button>
                        </form>
                    </div>
                </div>
                <div class="contact-info-col">
                    <div class="contact-and-address">
                        <h2>Contact Information</h2>
                        <div class="cards-grid">
                            <div class="contact-card">
                                <div class="icon"><i class="ri-phone-line"></i></div>
                                <h4>Phone</h4>
                                <p><a href="tel:{{ get_setting('office_phone') }}">{{ get_setting('office_phone') }}</a></p>
                                <p><a href="mailto:{{ get_setting('office_email') }}">{{ get_setting('office_email') }}</a></p>
                            </div>
                            <div class="contact-card">
                                <div class="icon"><i class="ri-map-pin-line"></i></div>
                                <h4>Address</h4>
                                <p>{{ get_setting('office_address') }}</p>
                            </div>
                        </div>
                        <div class="social-media">
                            <h3>Social Media</h3>
                            <ul>
                                <li><a href="{{ get_setting('facebook') }}" target="_blank" aria-label="Facebook"><i class="ri-facebook-fill"></i></a></li>
                                <li><a href="{{ get_setting('twitter') }}" target="_blank" aria-label="Twitter"><i class="ri-twitter-fill"></i></a></li>
                                <li><a href="{{ get_setting('instagram') }}" target="_blank" aria-label="Instagram"><i class="ri-instagram-line"></i></a></li>
                                <li><a href="{{ get_setting('linkedin') }}" target="_blank" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .contact-flex {display:flex; gap:60px; align-items:flex-start; flex-wrap:wrap;}
        .contact-form-col {flex:1 1 480px;}
        .contact-info-col {flex:1 1 380px;}
        .appointment-container {background:#f9f9fb; border:1px solid #e2e8f0; border-radius:18px; padding:38px 34px; box-shadow:0 10px 28px -8px rgba(0,0,0,.12); transition:.35s;}
        .appointment-container:hover {box-shadow:0 16px 42px -10px rgba(0,0,0,.18);}
        .appointment-container h2 {font-size:30px; font-weight:700; margin:0 0 26px; color:#17354f; letter-spacing:.5px;}
        .appointment-container .form-group label {font-weight:600; color:#2b4558; font-size:14px;}
        .appointment-container .form-group input,
        .appointment-container .form-group textarea {width:100%; background:#fff; border:1px solid #c9d4dd; border-radius:10px; padding:14px 16px; font-size:15px; transition:.3s;}
        .appointment-container .form-group input:focus,
        .appointment-container .form-group textarea:focus {outline:none; border-color:#2D6DB0; box-shadow:0 0 0 3px rgba(45,109,176,.15);}
        .appointment-container .form-row {display:flex; gap:18px;}
        .appointment-container .half-width {flex:1;}
        .appointment-container button {width:100%; background:#347bbd; border:2px solid transparent; padding:16px 10px; border-radius:50px; font-size:17px; font-weight:700; color:#fff; letter-spacing:.5px; box-shadow:0 8px 22px rgba(74,187,110,.45); cursor:pointer; transition:.35s;}
        .appointment-container button:hover {border-color:#ff8c00; box-shadow:0 10px 28px rgba(74,187,110,.5); transform:translateY(-3px);}
        .alert-success {background:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:14px 18px; border-radius:10px; font-size:14px; margin-bottom:20px; font-weight:600;}
        .contact-and-address h2 {font-size:30px; font-weight:700; margin-bottom:26px; color:#17354f;}
        .cards-grid {display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:24px; margin-bottom:34px;}
        .contact-card {background:#ffffff; border:1px solid #e2e8f0; border-radius:16px; padding:26px 24px; box-shadow:0 8px 26px -10px rgba(0,0,0,.12); transition:.35s;}
        .contact-card:hover {box-shadow:0 14px 34px -12px rgba(0,0,0,.18); transform:translateY(-4px);}
        .contact-card .icon {width:52px; height:52px; background:#2D6DB0; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:14px; font-size:24px; margin-bottom:14px; box-shadow:0 6px 16px rgba(45,109,176,.4);}
        .contact-card h4 {margin:0 0 10px; font-size:18px; font-weight:700; letter-spacing:.5px; color:#17354f;}
        .contact-card p {margin:0 0 6px; font-size:15px; color:#2b4558;}
        .contact-card a {color:#2D6DB0; text-decoration:none;}
        .contact-card a:hover {text-decoration:underline;}
        .social-media h3 {font-size:22px; font-weight:700; margin:0 0 18px; color:#17354f;}
        .social-media ul {list-style:none; margin:0; padding:0; display:flex; gap:14px; flex-wrap:wrap;}
        .social-media ul li a {display:inline-flex; width:46px; height:46px; align-items:center; justify-content:center; background:#2D6DB0; color:#fff; border-radius:14px; font-size:22px; box-shadow:0 6px 16px rgba(45,109,176,.4); transition:.35s;}
        .social-media ul li a:hover {background:#255d95; transform:translateY(-3px);}
        @media (max-width: 991px){.contact-flex {gap:40px;} .contact-form-col, .contact-info-col {flex:1 1 100%;}}
        @media (max-width: 575px){.appointment-container {padding:30px 24px;} .contact-and-address h2 {font-size:26px;} .appointment-container h2 {font-size:26px;}}
    </style>
@endsection
