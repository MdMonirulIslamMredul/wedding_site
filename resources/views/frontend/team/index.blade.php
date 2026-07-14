@extends('frontend.layouts.app')
@section('content')


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



        <!-- Start Page Title Area -->

<!-- End Page Title Area -->
<style>
.modern-team-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    padding: 80px 0;
    position: relative;
}
.team-header {
    text-align: center;
    margin-bottom: 60px;
    position: relative;
}
.team-header h1 {
    font-size: 48px;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
    letter-spacing: 1px;
}
.team-header p {
    font-size: 18px;
    color: #5a6c7d;
    max-width: 700px;
    margin: 0 auto;
}
.team-header::after {
    content: '';
    display: block;
    width: 100px;
    height: 5px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    margin: 20px auto 0;
    border-radius: 3px;
}
.modern-team-card {
    background: #ffffff;
    border-radius: 24px;
    padding: 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
    border: 2px solid transparent;
}
.modern-team-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
    background-size: 200% 100%;
    animation: gradientShift 3s linear infinite;
}
@keyframes gradientShift {
    0% { background-position: 0% 0%; }
    100% { background-position: 200% 0%; }
}
.modern-team-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 50px rgba(102, 126, 234, 0.25);
    border-color: rgba(102, 126, 234, 0.3);
}
.team-image-wrapper {
    position: relative;
    width: 180px;
    height: 180px;
    margin: 0 auto 25px;
}
.team-image-wrapper::before {
    content: '';
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
    animation: rotate 3s linear infinite;
    z-index: 0;
}
@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.team-image {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 6px solid #ffffff;
    position: relative;
    z-index: 1;
    transition: transform 0.4s ease;
}
.modern-team-card:hover .team-image {
    transform: scale(1.08);
}
.team-name {
    font-size: 24px;
    font-weight: 700;
    color: #2d3436;
    margin: 0 0 8px;
    letter-spacing: 0.5px;
}
.team-position {
    font-size: 15px;
    color: #667eea;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
    display: inline-block;
    padding: 6px 16px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 20px;
}
.team-social {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 12px;
}
.team-social li {
    display: inline-block;
}
.team-social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #ffffff;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}
.team-social-link:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
    background: linear-gradient(135deg, #764ba2, #667eea);
}
.team-social-link i {
    font-size: 16px;
}

/* Dark theme support */
.theme-dark .modern-team-section {
    background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 100%);
}
.theme-dark .modern-team-card {
    background: rgba(30, 30, 46, 0.95);
    border-color: rgba(255, 255, 255, 0.1);
}
.theme-dark .team-header h1 {
    background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.theme-dark .team-header p {
    color: #c7c7c7;
}
.theme-dark .team-name {
    color: #e5e7eb;
}
.theme-dark .team-position {
    color: #a78bfa;
    background: rgba(167, 139, 250, 0.15);
}
.theme-dark .team-image {
    border-color: rgba(30, 30, 46, 1);
}

@media (max-width: 991px) {
    .modern-team-section { padding: 60px 0; }
    .team-header h1 { font-size: 38px; }
    .team-header { margin-bottom: 50px; }
    .modern-team-card { padding: 35px 25px; }
    .team-image-wrapper { width: 160px; height: 160px; }
}
@media (max-width: 575px) {
    .modern-team-section { padding: 50px 0; }
    .team-header h1 { font-size: 32px; }
    .team-header p { font-size: 16px; }
    .modern-team-card { padding: 30px 20px; }
    .team-image-wrapper { width: 140px; height: 140px; }
    .team-name { font-size: 20px; }
    .team-position { font-size: 13px; }
}
</style>

<div class="modern-team-section">
    <div class="container">
        <div class="team-header" data-aos="fade-up" data-aos-duration="800">
            <h1>Meet Our Team</h1>
            <p>Dedicated professionals committed to delivering excellence and innovation in every project</p>
        </div>

        <div class="row justify-content-center">
            @foreach ($team as $index => $project)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ ($index % 4) * 100 }}" data-aos-once="true">
                    <div class="modern-team-card">
                        <div class="team-image-wrapper">
                            <img src="{{ asset('/setting/committee/' . $project->photo) }}"
                                 alt="{{ $project->name }}"
                                 class="team-image">
                        </div>
                        <h5 class="team-name">{{ $project->name }}</h5>
                        <span class="team-position">{{ $project->position }}</span>
                        <ul class="team-social">
                            <li><a href="#" class="team-social-link" aria-label="Facebook"><i class="ri-facebook-fill"></i></a></li>
                            <li><a href="#" class="team-social-link" aria-label="Twitter"><i class="ri-twitter-fill"></i></a></li>
                            <li><a href="#" class="team-social-link" aria-label="Instagram"><i class="ri-instagram-line"></i></a></li>
                            <li><a href="#" class="team-social-link" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>





@endsection
