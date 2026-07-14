@extends('frontend.layouts.app')
@section('content')
@php
    abort_if(optional($service)->is_active != 1, 404);
    $images = [
        $service->image1 ?? null,
        $service->image2 ?? null,
        $service->image3 ?? null,
    ];
@endphp

<style>
    .service-banner {position:relative; padding:130px 0 120px; background:#17354f; color:#fff; overflow:hidden;}
    .service-banner.has-bg {background-size:cover; background-position:center;}
    .service-banner:before {content:''; position:absolute; inset:0; background:rgba(23,53,79,.72); mix-blend-mode:multiply;}
    .service-banner .inner {position:relative; z-index:2; max-width:1050px; margin:0 auto; padding:0 25px; text-align:center;}
    .service-banner h1 {font-size:60px; font-weight:800; margin:0 0 20px; letter-spacing:.5px;}
    .service-banner .lead {font-size:20px; line-height:1.55; max-width:900px; margin:0 auto 22px; opacity:.92;}
    .service-banner .crumbs {display:flex; gap:8px; justify-content:center; font-size:14px; margin-top:8px; flex-wrap:wrap;}
    .service-banner .crumbs a {color:#ffcc80; text-decoration:none;}
    .service-banner .crumbs span {color:#c1ced6;}

    .service-sections {max-width:1200px; margin:0 auto; padding:70px 25px 40px;}
    .service-row {display:flex; align-items:center; gap:60px; margin-bottom:100px;}
    .service-row.reverse {flex-direction:row-reverse;}
    .service-row .media {flex:1;}
    .service-row .media figure {margin:0;}
    .service-row .media img {width:100%; height:430px; object-fit:cover; border-radius:32px; box-shadow:0 18px 46px -14px rgba(0,0,0,.35); transition:.55s;}
    .service-row .media img:hover {transform:scale(1.025);}
    .service-row .content {flex:1;}
    .service-row .content h2 {font-size:46px; font-weight:700; margin:0 0 24px; color:#17354f; position:relative;}
    .service-row .content h2:after {content:''; width:90px; height:5px; background:#2D6DB0; position:absolute; left:0; bottom:-14px; border-radius:4px;}
    .service-row .content .text {font-size:18px; line-height:1.7; color:#2b4558;}
    .service-row .content .text p {margin-bottom:18px;}

    .cta-panel {margin:10px auto 30px; background:linear-gradient(135deg,#1c85bc,#2caf3b); border-radius:30px; padding:56px 60px; color:#fff; box-shadow:0 20px 54px -16px rgba(23,53,79,.55); position:relative; overflow:hidden; max-width:1200px;}
    .cta-panel:before {content:''; position:absolute; inset:0; background:radial-gradient(circle at 70% 30%, rgba(255,255,255,.15), transparent 65%); pointer-events:none;}
    .cta-panel .cta-actions {position:relative; z-index:2;}
    .cta-panel h2 {font-size:44px; font-weight:800; margin:0 0 22px; letter-spacing:.5px;}
    .cta-panel p {font-size:20px; line-height:1.55; opacity:.92; max-width:880px;}
    .cta-panel .cta-actions {margin-top:30px; display:flex; flex-wrap:wrap; gap:20px;}
    .cta-panel a.cta-btn {display:inline-block; background:#ff8c00; color:#fff; padding:18px 44px; font-weight:700; font-size:19px; text-decoration:none; border-radius:50px; letter-spacing:.5px; box-shadow:0 8px 22px rgba(255,140,0,.45); transition:.35s;}
    .cta-panel a.cta-btn.secondary {background:#2D6DB0; box-shadow:0 8px 22px rgba(45,109,176,.45);}
    .cta-panel a.cta-btn:hover {transform:translateY(-4px);}

    /* Dark theme adjustments */
    .theme-dark .service-row .content h2 {color:#f2f6f9;}
    .theme-dark .service-row .content h2:after {background:#ff8c00;}
    .theme-dark .service-row .content .text {color:#c9d3dc;}
    .theme-dark .cta-panel {background:linear-gradient(135deg,#17354f,#0d1d28);}

    @media (max-width: 1199px){
        .service-row {gap:45px;}
    }
    @media (max-width: 991px){
        .service-banner {padding:110px 0 100px;}
        .service-banner h1 {font-size:48px;}
        .service-row {flex-direction:column; gap:34px; margin-bottom:80px;}
        .service-row.reverse {flex-direction:column;}
        .service-row .media img {height:380px;}
        .service-row .content h2 {font-size:38px;}
        .cta-panel h2 {font-size:38px;}
    }
    @media (max-width: 575px){
        .service-banner {padding:85px 0 70px;}
        .service-banner h1 {font-size:34px;}
        .service-banner .lead {font-size:16px;}
        .service-row .media img {height:260px; border-radius:22px;}
        .service-row .content h2 {font-size:30px;}
        .cta-panel {padding:46px 34px;}
        .cta-panel h2 {font-size:30px;}
        .cta-panel a.cta-btn {padding:14px 32px; font-size:17px;}
    }
</style>

<div class="service-banner {{ $service->image1 ? 'has-bg' : '' }}" @if($service->image1) style="background-image:url('{{ asset('/setting/service/' . $service->image1) }}')" @endif>
    <div class="inner" data-aos="fade-up" data-aos-duration="800">
        <h1>{{ $service->title }}</h1>
        @if($service->details1)
            <div class="lead">{!! Str::limit(strip_tags($service->details1), 170) !!}</div>
        @endif
        <div class="crumbs">
            <a href="/">Home</a><span>/</span><a href="/service">Services</a><span>/</span><span>{{ $service->title }}</span>
        </div>
    </div>
</div>

<div class="service-sections">
    @if($service->details1 || $images[0])
        <div class="service-row" data-aos="fade-up" data-aos-duration="800">
            @if($images[0])
            <div class="media" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="120">
                <figure>
                    <img src="{{ asset('/setting/service/' . $images[0]) }}" alt="{{ $service->title }} primary image">
                </figure>
            </div>
            @endif
            @if($service->details1)
            <div class="content">
                <h2>Overview</h2>
                <div class="text">{!! $service->details1 !!}</div>
            </div>
            @endif
        </div>
    @endif

    @if($service->details2 || $images[1])
        <div class="service-row reverse" data-aos="fade-up" data-aos-duration="800">
            @if($service->details2)
            <div class="content">
                <h2>More Details</h2>
                <div class="text">{!! $service->details2 !!}</div>
            </div>
            @endif
            @if($images[1])
            <div class="media" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="120">
                <figure>
                    <img src="{{ asset('/setting/service/' . $images[1]) }}" alt="{{ $service->title }} secondary image">
                </figure>
            </div>
            @endif
        </div>
    @endif

    @if($service->details3 || $images[2])
        <div class="service-row" data-aos="fade-up" data-aos-duration="800">
            @if($images[2])
            <div class="media" data-aos="zoom-in" data-aos-duration="900" data-aos-delay="120">
                <figure>
                    <img src="{{ asset('/setting/service/' . $images[2]) }}" alt="{{ $service->title }} tertiary image">
                </figure>
            </div>
            @endif
            @if($service->details3)
            <div class="content">
                <h2>Additional Info</h2>
                <div class="text">{!! $service->details3 !!}</div>
            </div>
            @endif
        </div>
    @endif
</div>

<div class="cta-panel" data-aos="fade-up" data-aos-duration="900" data-aos-delay="150">
    <h2>Interested in {{ $service->title }}?</h2>
    <p>Get in touch to learn how our {{ $service->title }} solution can be tailored to meet your needs and deliver lasting performance and value.</p>
    <div class="cta-actions">
        <a href="{{ route('appointment.index') }}" class="cta-btn">Book Appointment</a>
        <a href="/contact" class="cta-btn secondary">Contact Us</a>
    </div>
</div>
@endsection
