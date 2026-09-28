@php
$services = DB::table('services')->where('is_active', 1)->get();
@endphp

<style>
    /* ============================================================
   FOOTER – Premium Wedding Design
   ============================================================ */
    .modern-footer {
        background: #1A1C20;
        color: #e5e7eb;
        padding: 80px 0 0;
        font-family: 'Montserrat', sans-serif;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 50px;
        margin-bottom: 50px;
    }

    .footer-col h3 {
        font-size: 22px;
        font-weight: 500;
        margin: 0 0 24px;
        color: #fff;
        position: relative;
        padding-bottom: 12px;
        font-family: 'Playfair Display', serif;
        letter-spacing: 0.05em;
    }

    .footer-col h3:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 1px;
        background: #C5A059;
        /* Premium Gold */
    }

    .footer-logo-section .footer-logo-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #fff;
        font-weight: 700;
        letter-spacing: 0.05em;
        margin-bottom: 20px;
        display: block;
        text-decoration: none;
    }

    .footer-logo-section p {
        font-size: 0.9rem;
        line-height: 1.8;
        color: #9CA3AF;
        margin: 0;
        font-weight: 300;
    }

    .footer-services-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .footer-services-list li {
        margin-bottom: 15px;
    }

    .footer-services-list li a {
        color: #9CA3AF;
        text-decoration: none;
        font-size: 0.95rem;
        transition: 0.3s ease;
        display: inline-flex;
        align-items: center;
        font-weight: 300;
        letter-spacing: 0.05em;
    }

    .footer-services-list li a:before {
        content: '';
        display: inline-block;
        width: 6px;
        height: 1px;
        background: #C5A059;
        margin-right: 12px;
        transition: width 0.3s ease;
    }

    .footer-services-list li a:hover {
        color: #C5A059;
        transform: translateX(4px);
    }

    .footer-services-list li a:hover:before {
        width: 12px;
    }

    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 20px;
    }

    .footer-contact-item i {
        color: #C5A059;
        font-size: 20px;
        margin-top: 2px;
    }

    .footer-contact-item .contact-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #9CA3AF;
        font-weight: 300;
    }

    .footer-contact-item a {
        color: #9CA3AF;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .footer-contact-item a:hover {
        color: #C5A059;
    }

    .footer-map-container {
        border-radius: 4px;
        overflow: hidden;
        margin-top: 20px;
        border: 1px solid rgba(197, 160, 89, 0.2);
    }

    .footer-map-container iframe {
        width: 100%;
        height: 200px;
        display: block;
        border: none;
        filter: grayscale(0.8) contrast(1.1) brightness(0.9);
    }

    .footer-social-section {
        text-align: center;
        padding: 40px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer-social-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: #fff;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }

    .footer-social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .footer-social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: transparent;
        color: #fff;
        font-size: 18px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s ease;
        text-decoration: none !important;
    }

    .footer-social-links a:hover {
        background: #C5A059;
        color: #1A1C20;
        border-color: #C5A059;
        transform: translateY(-3px);
    }

    .footer-bottom {
        background: #15161A;
        padding: 25px 0;
        text-align: center;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer-bottom p {
        margin: 0;
        font-size: 0.85rem;
        color: #6B7280;
        font-weight: 300;
        letter-spacing: 0.05em;
    }

    .footer-bottom a {
        color: #C5A059;
        text-decoration: none;
        font-weight: 400;
        transition: 0.3s ease;
    }

    .footer-bottom a:hover {
        color: #fff;
    }

    @media (max-width: 991px) {
        .footer-grid {
            gap: 40px;
        }
    }

    @media (max-width: 575px) {
        .modern-footer {
            padding: 60px 0 0;
        }

        .footer-grid {
            gap: 35px;
        }

        .footer-col h3 {
            font-size: 20px;
        }
    }
</style>

<footer class="modern-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-col">
                <div class="footer-logo-section">
                    <img src="{{ asset(get_setting('frontend_logo_footer')) }}" alt="Wedding House" class="img-fluid" style="width: 150px; height: auto;">
                    <p>Capturing the essence of your love story with elegance, authenticity, and a touch of cinematic magic. Your forever moments, immortalized.</p>
                </div>
            </div>

            <!-- Our Services -->
            <div class="footer-col">
                <h3>Our Services</h3>
                <ul class="footer-services-list">
                    @php
                        $footerServices = \App\Models\Service::take(5)->get();
                    @endphp
                    @forelse($footerServices as $service)
                        <li><a href="{{ route('service.show', $service->id) }}">{{ $service->title }}</a></li>
                    @empty
                        <li><a href="#">Wedding Photography</a></li>
                        <li><a href="#">Cinematography</a></li>
                    @endforelse
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col">
                <h3>Get in Touch</h3>
                <div class="footer-contact-item">
                    <i class="ri-map-pin-line"></i>
                    <div class="contact-text">{{ get_setting('office_address') }}</div>
                </div>
                <div class="footer-contact-item">
                    <i class="ri-phone-line"></i>
                    <div class="contact-text">
                        <a href="tel:{{ get_setting('office_phone') }}">{{ get_setting('office_phone') }}</a>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <i class="ri-mail-line"></i>
                    <div class="contact-text">
                        <a href="mailto:{{ get_setting('office_email') }}">{{ get_setting('office_email') }}</a>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="footer-col">
                <h3>Our Studio</h3>
                <div class="footer-map-container">
                    @php
                    $mapUrl = 'https://maps.google.com/maps?q=' . urlencode(get_setting('office_address')) . '&t=&z=13&ie=UTF8&iwloc=&output=embed';
                    @endphp
                    <iframe src="{{ $mapUrl }}" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Social Media Section -->
        <div class="footer-social-section">
            <div class="footer-social-label">Follow Our Journey</div>
            <div class="footer-social-links">
                @php
                    $facebook = get_setting('facebook');
                    $twitter = get_setting('twitter');
                    $instagram = get_setting('instagram');
                    $linkedin = get_setting('linkedin');
                    $youtube = get_setting('youtube');
                    $officeEmail = get_setting('office_email');
                    $officePhone = get_setting('office_phone');
                @endphp

                <a href="{{ $facebook ?: '#' }}" target="_blank" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                <a href="{{ $twitter ?: '#' }}" target="_blank" aria-label="Twitter"><i class="ri-twitter-fill"></i></a>
                <a href="{{ $instagram ?: '#' }}" target="_blank" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                <a href="{{ $linkedin ?: '#' }}" target="_blank" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
                <a href="{{ $youtube ?: '#' }}" target="_blank" aria-label="Youtube"><i class="ri-youtube-fill"></i></a>
                <a href="{{ $officeEmail ? 'mailto:' . $officeEmail : '#' }}" target="_blank" aria-label="Email"><i class="ri-mail-line"></i></a>
                <a href="{{ $officePhone ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $officePhone) : '#' }}" target="_blank" aria-label="Whatsapp"><i class="ri-whatsapp-line"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container">
            <p>
                 {!! get_setting('copyright_text') !!} |
                <a href="https://www.techwebdit.com" target="_blank">Developed by Techweb BD IT</a>
            </p>
        </div>
    </div>
</footer>

<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
    <i class="ri-arrow-up-s-line"></i>
</div>