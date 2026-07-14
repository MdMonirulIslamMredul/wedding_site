@extends('frontend.layouts.app')
@section('content')

@section('title', __('Blogs'))

<title>{{ app_name() }} | @yield('title')</title>
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                <div class="slider-item" style="background-image: url('{{ asset('/setting/blog/' . $banner->banner) }}')">
                    <div class="slider-content">
                        <h2 style="
                            font-size: 60px;
                            font-weight: 900;
                            color: #ffffff;
                            text-transform: uppercase;
                            letter-spacing: 3px;
                            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
                        ">
                         Blogs
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-news-area pt-100 pb-70">
        <div class="container">
            <h1>Blogs</h1>
            <style>
                /* Card radius + orange border hover (no size changes) */
                .single-news-card {border-radius:12px; border:2px solid transparent; overflow:hidden; transition:border-color .3s ease, box-shadow .3s ease;}
                .single-news-card:hover {border-color:#ff8c00; box-shadow:0 8px 24px -6px rgba(0,0,0,.15);}
                /* Preserve image sizing; no modifications */
                /* Read More button styling */
                .single-news-card .read-more-btn {display:inline-block; background:#4abb6e; color:#ffffff !important; font-weight:600; font-size:14px; padding:10px 22px; border-radius:30px; letter-spacing:.5px; text-decoration:none; box-shadow:0 4px 14px -4px rgba(255,140,0,.55); transition:.35s ease; border:1px solid #ff8c00;}
                .single-news-card .read-more-btn i {margin-left:6px; font-size:14px;}
                .single-news-card .read-more-btn:hover {background:#ffa438; border-color:#ffa438; box-shadow:0 0 0 4px rgba(255,140,0,.25), 0 10px 26px -6px rgba(255,140,0,.6); transform:translateY(-3px);}
                .single-news-card .read-more-btn:active {transform:translateY(0); box-shadow:0 2px 10px -4px rgba(255,140,0,.55);}
                .single-news-card .read-more-btn:focus-visible {outline:3px solid rgba(255,140,0,.45); outline-offset:3px;}
                /* Dark theme button */
                .theme-dark .single-news-card .read-more-btn {background:#ff8c00; border-color:#ff8c00; box-shadow:0 4px 14px -4px rgba(255,140,0,.65);}
                .theme-dark .single-news-card .read-more-btn:hover {background:#ffa438; border-color:#ffa438;}
                /* Related posts modern styling */
                .related-post-area {background:#ffffff; border-radius:16px; padding:24px 22px 10px; box-shadow:0 10px 30px -12px rgba(0,0,0,.15); border:2px solid transparent; transition:.35s ease;}
                .related-post-area:hover {border-color:#ff8c00;}
                .related-post-area h3 {font-size:22px; font-weight:700; margin:0 0 22px; position:relative; letter-spacing:.5px;}
                .related-post-area h3:after {content:''; position:absolute; left:0; bottom:-10px; width:70px; height:4px; background:#ff8c00; border-radius:4px;}
                .related-post-box {background:#f5f7fa; border:1px solid #e1e5ea; border-radius:12px; margin-bottom:16px; transition:.35s ease; overflow:hidden;}
                .related-post-box:hover {background:#ffffff; border-color:#ff8c00; box-shadow:0 12px 28px -10px rgba(0,0,0,.20); transform:translateY(-4px);}
                .related-post-content {display:flex; align-items:center; gap:16px; padding:12px 14px;}
                .related-post-content img {width:74px; height:74px; object-fit:cover; border-radius:10px; flex-shrink:0; box-shadow:0 4px 14px -6px rgba(0,0,0,.25);}
                .related-post-content h4 {font-size:15px; font-weight:600; margin:0; line-height:1.35; color:#172b3f; transition:color .3s ease;}
                .related-post-content a {text-decoration:none;}
                .related-post-content a:hover h4 {color:#ff8c00 !important;}
                /* Dark theme overrides */
                .theme-dark .related-post-area {background:#1f2937; box-shadow:0 10px 30px -12px rgba(0,0,0,.55);}
                .theme-dark .related-post-box {background:#243447; border-color:#2e4254;}
                .theme-dark .related-post-box:hover {background:#2d3d4d; border-color:#ff8c00;}
                .theme-dark .related-post-content h4 {color:#e5e7eb;}
                .theme-dark .related-post-area h3 {color:#e5e7eb;}
                .theme-dark .related-post-area h3:after {background:#ff8c00;}
                @media (max-width: 991px){ .related-post-area {margin-top:40px;} }
                @media (max-width: 575px){ .related-post-content {padding:10px 12px; gap:12px;} .related-post-content img {width:66px; height:66px;} }
            </style>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    @foreach ($blogs as $blog)
                        <div class="single-news-card">
                            <div class="news-img">
                                <a href="/blog/details/{{ $blog->id }}">
                                    <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="Image">
                                </a>
                            </div>
                            <div class="news-content">
                                <div class="list">
                                    <ul>
                                        <li><i class="flaticon-user"></i>By <span style="color: #000;">Admin</span></li>
                                        <li><i class="fa fa-calendar-check-o"></i>
                                            <span style="color: #000;">{{ date('j F, Y', strtotime($blog->created_at)) }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <a href="/blog/details/{{ $blog->id }}" style="text-decoration: none; color: #000;">
                                    <h3>{{ $blog->title ?? null }}</h3>
                                </a>
                                <a href="/blog/details/{{ $blog->id }}" class="read-more-btn" style="text-decoration: none; color: #000;">
                                    Read More<i class="flaticon-next"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    {{-- <div class="category-list">
                        <h3>Study Destination</h3>
                        <ul>
                            @foreach ($destination as $study)
                                <li>
                                    <a href="/study_destination/{{ $study->id }}" style="text-decoration: none; color: #000;">
                                        Study in {{ $study->title }} <i class="ri-arrow-drop-right-fill"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                    <div class="related-post-area">
                        <h3>Latest Posts</h3>
                        @foreach ($recent as $blog)
                            <div class="related-post-box">
                                <div class="related-post-content">
                                    <a href="/blog/details/{{ $blog->id }}" style="text-decoration: none; color: #000;">
                                        <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="Image">
                                    </a>
                                    <h4>
                                        <a href="/blog/details/{{ $blog->id }}" style="text-decoration: none; color: #000;">
                                            {{ $blog->title }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
