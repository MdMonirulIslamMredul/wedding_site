@extends('frontend.layouts.app')
@section('title', $blog->title . ' | Editorial')
@section('content')

<style>
/* Modern blog details styling - Premium Dark/Gold */
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
    top: 0; left: 0; right: 0; bottom: 0;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    opacity: 0.25;
    z-index: 0;
}

.page-header::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0; height: 180px;
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
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.2;
}

.page-subtitle {
    position: relative;
    z-index: 2;
    color: #C5A059;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.blog-detail-section {
    background: #121212;
    padding-bottom: 100px;
}

.blog-detail-container {
    background: #1A1C20;
    padding: 70px 90px;
    max-width: 1000px;
    margin: -100px auto 0;
    position: relative;
    z-index: 10;
    border: 1px solid #333;
    border-top: 3px solid #C5A059;
    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
}

.blog-meta-bar {
    display: flex;
    justify-content: center;
    gap: 40px;
    font-size: 0.85rem;
    color: #C5A059;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    margin-bottom: 50px;
    padding-bottom: 35px;
    border-bottom: 1px solid rgba(197, 160, 89, 0.2);
}

.blog-meta-bar .meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.blog-meta-bar .meta-item i {
    font-size: 1.1rem;
}

.blog-detail-image {
    margin: 50px 0;
    position: relative;
}

.blog-detail-image::before {
    content: '';
    position: absolute;
    top: -12px; left: -12px; right: -12px; bottom: -12px;
    border: 1px solid rgba(197, 160, 89, 0.3);
    z-index: 0;
}

.blog-detail-image img {
    width: 100%;
    height: auto;
    display: block;
    position: relative;
    z-index: 1;
}

.blog-detail-content {
    font-size: 1.15rem;
    line-height: 2;
    color: #e0e0e0;
    font-family: 'Montserrat', sans-serif;
    font-weight: 300;
}

/* Force text colors to override WYSIWYG inline styles */
.blog-detail-content p,
.blog-detail-content span,
.blog-detail-content div,
.blog-detail-content li,
.blog-detail-content b,
.blog-detail-content strong,
.blog-detail-content i,
.blog-detail-content em {
    color: #e0e0e0 !important;
}

/* Elegant Drop cap for first paragraph */
.blog-detail-content > p:first-of-type::first-letter {
    font-family: 'Playfair Display', serif;
    font-size: 5rem;
    float: left;
    line-height: 0.8;
    margin-right: 18px;
    margin-top: 8px;
    color: #C5A059;
}

.blog-detail-content h2, .blog-detail-content h3, .blog-detail-content h4 {
    margin: 50px 0 25px;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: #fff !important;
    line-height: 1.3;
}

.blog-detail-content h2 { font-size: 2.6rem; color: #fff !important; }
.blog-detail-content h3 { font-size: 2.1rem; color: #fff !important; }
.blog-detail-content h4 { font-size: 1.6rem; color: #C5A059 !important; }

.blog-detail-content p {
    margin-bottom: 30px;
}

.blog-detail-content ul, .blog-detail-content ol {
    margin: 30px 0;
    padding-left: 20px;
}

.blog-detail-content li {
    margin-bottom: 15px;
    padding-left: 10px;
}

.blog-detail-content a {
    color: #C5A059;
    text-decoration: none;
    border-bottom: 1px solid #C5A059;
    transition: all 0.3s ease;
}

.blog-detail-content a:hover {
    color: #fff;
    border-bottom-color: transparent;
}

/* Premium Blockquotes */
.blog-detail-content blockquote {
    padding: 40px 50px;
    margin: 50px 0;
    background: rgba(255, 255, 255, 0.02);
    border-left: 3px solid #C5A059;
    position: relative;
}

.blog-detail-content blockquote::before {
    content: '"';
    font-family: 'Playfair Display', serif;
    font-size: 90px;
    color: rgba(197, 160, 89, 0.1);
    position: absolute;
    top: 20px;
    left: 20px;
    line-height: 1;
}

.blog-detail-content blockquote p {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-style: italic;
    color: #fff;
    margin: 0;
    position: relative;
    z-index: 1;
    line-height: 1.6;
}

/* Back button */
.back-btn-wrapper {
    margin-bottom: 45px;
}

.back-to-blogs {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #999;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    text-decoration: none;
    transition: color 0.3s ease;
}

.back-to-blogs i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.back-to-blogs:hover {
    color: #C5A059;
}

.back-to-blogs:hover i {
    transform: translateX(-6px);
}

/* Share Section */
.share-section {
    margin-top: 70px;
    padding-top: 40px;
    border-top: 1px solid rgba(255,255,255,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.share-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: #fff;
    margin: 0;
}

.share-icons {
    display: flex;
    gap: 15px;
}

.share-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border: 1px solid #333;
    border-radius: 50%;
    color: #ccc;
    text-decoration: none;
    transition: all 0.3s ease;
}

.share-icons a:hover {
    border-color: #C5A059;
    color: #fff;
    background: #C5A059;
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(197, 160, 89, 0.2);
}

@media (max-width: 991px) {
    .page-title { font-size: 3rem; }
    .blog-detail-container { padding: 50px 40px; }
}
@media (max-width: 767px) {
    .page-header { padding: 150px 0 100px; }
    .page-title { font-size: 2.2rem; }
    .blog-detail-container { padding: 40px 25px; margin-top: -50px; }
    .blog-meta-bar { flex-direction: column; gap: 15px; align-items: center; margin-bottom: 30px; }
    .blog-detail-content h2 { font-size: 2rem; }
    .share-section { flex-direction: column; gap: 20px; text-align: center; }
}
</style>

<div class="page-header">
    <style>
        .page-header::before {
            background-image: url('{{ asset("/setting/blog/" . $blog->banner) }}');
        }
    </style>
    <div class="page-subtitle">Editorial</div>
    <h1 class="page-title">{{ $blog->title }}</h1>
</div>

<div class="blog-detail-section">
    <div class="container">
        <div class="blog-detail-container" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
            
            <div class="back-btn-wrapper">
                <a href="/blogs" class="back-to-blogs">
                    <i class="fa fa-long-arrow-left"></i> Back to Journal
                </a>
            </div>

            <div class="blog-meta-bar">
                <div class="meta-item">
                    <i class="fa-regular fa-user"></i>
                    <span>Editorial Team</span>
                </div>
                <div class="meta-item">
                    <i class="fa-regular fa-calendar"></i>
                    <span>{{ date('F j, Y', strtotime($blog->created_at)) }}</span>
                </div>
            </div>

            @if(!empty($blog->image1))
                <div class="blog-detail-image">
                    <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="{{ $blog->title }}">
                </div>
            @endif

            @if(!empty($blog->details1))
                <div class="blog-detail-content">
                    {!! $blog->details1 !!}
                </div>
            @endif

            @if(!empty($blog->image2))
                <div class="blog-detail-image">
                    <img src="{{ asset('/setting/blog/' . $blog->image2) }}" alt="{{ $blog->title }}">
                </div>
            @endif

            @if(!empty($blog->details2))
                <div class="blog-detail-content">
                    {!! $blog->details2 !!}
                </div>
            @endif

            <div class="share-section">
                <h4 class="share-title">Share this story</h4>
                <div class="share-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
