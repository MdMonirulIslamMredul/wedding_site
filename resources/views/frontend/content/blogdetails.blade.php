@extends('frontend.layouts.app')
@section('content')

<style>
/* Modern blog details styling */
.blog-detail-banner {position:relative; height:420px; background-size:cover; background-position:center; display:flex; align-items:center; justify-content:center; overflow:hidden; margin-bottom:-60px;}
.blog-detail-banner::before {content:''; position:absolute; inset:0; background:linear-gradient(to bottom, rgba(0,0,0,.45), rgba(0,0,0,.65));}
.blog-detail-banner h1 {position:relative; z-index:2; font-size:48px; font-weight:800; color:#fff; text-align:center; padding:0 20px; line-height:1.2; letter-spacing:1px; text-shadow:0 4px 12px rgba(0,0,0,.5);}
.blog-detail-container {background:#ffffff; border-radius:24px; box-shadow:0 12px 42px -12px rgba(0,0,0,.18); padding:50px 60px; margin-top:80px; border:2px solid transparent; transition:.35s ease;}
.blog-detail-container:hover {border-color:#ff8c00;}
.blog-meta-bar {display:flex; flex-wrap:wrap; gap:24px; align-items:center; padding:0 0 24px; margin-bottom:28px; border-bottom:2px solid #f0f0f0; font-size:15px; color:#555;}
.blog-meta-bar i {color:#ff8c00; margin-right:6px; font-size:16px;}
.blog-meta-bar .meta-item {display:flex; align-items:center;}
.blog-detail-image {border-radius:16px; overflow:hidden; margin-bottom:32px; box-shadow:0 8px 28px -8px rgba(0,0,0,.2);}
.blog-detail-image img {width:100%; height:auto; display:block; object-fit:cover;}
.blog-detail-content {font-size:17px; line-height:1.75; color:#2d3748; margin-bottom:40px;}
.blog-detail-content h2, .blog-detail-content h3 {margin:32px 0 18px; font-weight:700; color:#172b3f;}
.blog-detail-content h2 {font-size:32px;}
.blog-detail-content h3 {font-size:26px;}
.blog-detail-content p {margin-bottom:20px;}
.blog-detail-content ul, .blog-detail-content ol {margin:20px 0; padding-left:28px;}
.blog-detail-content li {margin-bottom:10px;}
.blog-detail-content a {color:#ff8c00; text-decoration:underline; transition:.3s;}
.blog-detail-content a:hover {color:#d47400;}
.back-to-blogs {display:inline-flex; align-items:center; gap:8px; background:#f5f7fa; color:#172b3f; font-weight:600; font-size:15px; padding:12px 24px; border-radius:30px; text-decoration:none; border:2px solid #e1e5ea; transition:.35s ease; margin-bottom:30px;}
.back-to-blogs:hover {background:#ff8c00; color:#fff; border-color:#ff8c00; transform:translateX(-4px);}
.back-to-blogs i {font-size:18px;}
/* Dark theme */
.theme-dark .blog-detail-container {background:#1f2937; box-shadow:0 12px 42px -12px rgba(0,0,0,.55);}
.theme-dark .blog-detail-content {color:#d1d5db;}
.theme-dark .blog-detail-content h2, .theme-dark .blog-detail-content h3 {color:#e5e7eb;}
.theme-dark .blog-meta-bar {border-bottom-color:#374151; color:#9ca3af;}
.theme-dark .back-to-blogs {background:#243447; border-color:#2f4254; color:#e5e7eb;}
.theme-dark .back-to-blogs:hover {background:#ff8c00; color:#fff;}
@media (max-width: 991px){ .blog-detail-container {padding:40px 35px;} .blog-detail-banner h1 {font-size:38px;} }
@media (max-width: 575px){ .blog-detail-container {padding:30px 20px; margin-top:60px;} .blog-detail-banner {height:320px;} .blog-detail-banner h1 {font-size:28px;} .blog-detail-content {font-size:16px;} }
</style>

    <div class="blog-detail-banner" style="background-image: url('{{ asset('/setting/blog/' . $blog->banner) }}');">
    </div>
    <div class="py-5">
        <div class="container">
            <div class="blog-detail-container" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <a href="/blogs" class="back-to-blogs">
                    <i class="flaticon-left-arrow"></i> Back to Blogs
                </a>

                <div class="blog-meta-bar">
                    <div class="meta-item">
                        <i class="flaticon-user"></i>
                        <span>Admin</span>
                    </div>
                    <div class="meta-item">
                        <i class="fa fa-calendar-check-o"></i>
                        <span>{{ date('j F, Y', strtotime($blog->created_at)) }}</span>
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

                <div class="text-center mt-5">
                    <a href="/blogs" class="back-to-blogs">
                        <i class="flaticon-left-arrow"></i> Back to All Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
