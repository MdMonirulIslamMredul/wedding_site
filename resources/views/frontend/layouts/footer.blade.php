 @php
    $services = DB::table('services')->where('is_active', 1)->get();
@endphp

<style>

.modern-footer {background:var(--nt-secondary, #2B303A); color:#e5e7eb; padding:80px 0 0;}
.footer-grid {display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:50px; margin-bottom:50px;}
.footer-col h3 {font-size:22px; font-weight:700; margin:0 0 24px; color:#fff; position:relative; padding-bottom:12px;}
.footer-col h3:after {content:''; position:absolute; left:0; bottom:0; width:60px; height:3px; background:var(--nt-accent, #FFD166); border-radius:3px;}
.footer-logo-section img {height:70px; margin-bottom:18px; filter:brightness(1.1); background:#fff; padding:10px; border-radius:12px; display:inline-block;}
.footer-logo-section p {font-size:15px; line-height:1.65; color:#d1d5db; margin:0;}
.footer-services-list {list-style:none; margin:0; padding:0;}
.footer-services-list li {margin-bottom:12px;}
.footer-services-list li a {color:#d1d5db; text-decoration:none; font-size:15px; transition:.3s; display:inline-flex; align-items:center;}
.footer-services-list li a:before {content:'▸'; margin-right:8px; color:var(--nt-accent, #FFD166); font-weight:700;}
.footer-services-list li a:hover {color:var(--nt-accent, #FFD166); transform:translateX(4px);}
.footer-contact-item {display:flex; align-items:flex-start; gap:14px; margin-bottom:18px;}
.footer-contact-item i {color:var(--nt-accent, #FFD166); font-size:20px; margin-top:2px;}
.footer-contact-item .contact-text {font-size:15px; line-height:1.6; color:#d1d5db;}
.footer-contact-item a {color:#d1d5db; text-decoration:none; transition:.3s;}
.footer-contact-item a:hover {color:var(--nt-accent, #FFD166);}
.footer-map-container {border-radius:12px; overflow:hidden; box-shadow:0 8px 24px -8px rgba(0,0,0,.4); margin-top:20px; border:1px solid rgba(255,255,255,.12);}
.footer-map-container iframe {width:100%; height:240px; display:block; border:none; filter:grayscale(.15) contrast(1.05);}
.footer-social-section {text-align:center; padding:30px 0; border-top:1px solid rgba(255,255,255,.1);}
.footer-social-label {font-size:16px; font-weight:600; color:#fff; margin-bottom:18px;}
.footer-social-links {display:flex; justify-content:center; gap:14px; flex-wrap:wrap;}
.footer-social-links a {display:inline-flex; align-items:center; justify-content:center; width:46px; height:46px; border-radius:50%; background:var(--nt-primary, #F1F3F5); color:var(--nt-secondary, #2B303A); font-size:20px; border:2px solid transparent; transition:.35s; box-shadow:0 4px 12px rgba(0,0,0,.2);}
.footer-social-links a:hover {background:var(--nt-accent, #FFD166); color:var(--nt-dark, #1A1C20); border-color:#fff; transform:translateY(-4px); box-shadow:0 8px 20px rgba(255,209,102,.5);}
.footer-bottom {background:var(--nt-secondary-20, #20242C); padding:24px 0; text-align:center; border-top:1px solid rgba(255,255,255,.1);}
.footer-bottom p {margin:0; font-size:15px; color:#d1d5db;}
.footer-bottom a {color:var(--nt-accent, #FFD166); text-decoration:none; font-weight:600; transition:.3s;}
.footer-bottom a:hover {color:#ffe0a3; text-decoration:underline;}
@media (max-width: 991px){.footer-grid {gap:40px;}}
@media (max-width: 575px){.modern-footer {padding:60px 0 0;} .footer-grid {gap:35px;} .footer-col h3 {font-size:20px;}}
</style>

<footer class="modern-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Company Info -->
            <div class="footer-col">
                <div class="footer-logo-section">
                    <img src="{{ asset(get_setting('frontend_logo_footer')) }}" alt="Solartech Services Logo">
                    <p>{{ get_setting('footer_description') }}</p>
                </div>
            </div>

            <!-- Our Services -->
            <div class="footer-col">
                <h3>Our Services</h3>
                <ul class="footer-services-list">
                    @foreach ($services as $service)
                        <li><a href="/service/{{ $service->id }}">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-col">
                <h3>Contact Us</h3>
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
                <h3>Find Us</h3>
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
            <div class="footer-social-label">Follow Us On</div>
            <div class="footer-social-links">
                <a href="{{ get_setting('facebook') }}" target="_blank" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
                <a href="{{ get_setting('twitter') }}" target="_blank" aria-label="Twitter"><i class="ri-twitter-fill"></i></a>
                <a href="{{ get_setting('instagram') }}" target="_blank" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
                <a href="{{ get_setting('linkedin') }}" target="_blank" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container">
            <p>
                © {{ get_setting('copyright_text') }} |
                <a href="https://www.techwebdit.com" target="_blank">Developed by Techweb BD IT</a>
            </p>
        </div>
    </div>
</footer>



<div class="go-top">
     <i class="ri-arrow-up-s-line"></i>
     <i class="ri-arrow-up-s-line"></i>
 </div>
