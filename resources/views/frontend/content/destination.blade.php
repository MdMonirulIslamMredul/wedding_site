@extends('frontend.layouts.app')
@section('title', 'Study Destinations')
@section('meta_description', 'Explore the best study destinations for Bangladeshi students, including the USA, UK, Canada, Australia, and more.')

@section('content')
<div class="main-content">

    {{-- Page Banner --}}
    <div style="background: linear-gradient(135deg, #0d5560 0%, #145f6a 60%, #165b65 100%); padding: 80px 0 60px; text-align:center;">
        <div class="container">
            <h1 style="font-size:42px; font-weight:800; color:#fff; text-transform:uppercase; letter-spacing:2px; margin-bottom:14px;">
                Study <span style="color:#e63946;">Destinations</span>
            </h1>
            <p style="color:rgba(255,255,255,0.8); font-size:16px; max-width:600px; margin:0 auto; line-height:1.7;">
                Explore the world top educational destinations and find the perfect country for your academic journey.
            </p>
            <nav style="margin-top:20px; font-size:13px;">
                <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
                <span style="color:rgba(255,255,255,0.5); margin:0 10px;">/</span>
                <span style="color:#e63946; font-weight:600;">Destinations</span>
            </nav>
        </div>
    </div>

    {{-- Destinations Grid --}}
    <div style="background-color:#f4f3f0; padding:80px 0 90px;">
        <div class="container">
            @if($destinations->count())
            <div class="row">
                @foreach($destinations as $dest)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-duration="800">
                    <a href="/study_destination/{{ $dest->id }}" style="text-decoration:none; display:block;">
                        <div style="border-radius:15px; overflow:hidden; box-shadow:0 5px 18px rgba(0,0,0,0.10); background:#fff; transition:transform .3s ease, box-shadow .3s ease;"
                             onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 14px 32px rgba(0,0,0,0.15)';"
                             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 18px rgba(0,0,0,0.10)';">
                            <div style="position:relative; height:230px; overflow:hidden;">
                                @if($dest->banner)
                                <img src="{{ asset('setting/banner/' . $dest->banner) }}" alt="{{ $dest->title }}"
                                     style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .5s ease;">
                                @else
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800"
                                     alt="{{ $dest->title }}" style="width:100%; height:100%; object-fit:cover; display:block;">
                                @endif
                                <div style="position:absolute; bottom:14px; left:50%; transform:translateX(-50%); background:rgba(255,255,255,0.35); backdrop-filter:blur(8px); border:1px solid rgba(255,255,255,0.5); border-radius:30px; padding:6px 22px; white-space:nowrap;">
                                    <span style="color:#fff; font-weight:700; letter-spacing:1px; font-size:13px; text-transform:uppercase;">{{ $dest->title }}</span>
                                </div>
                            </div>
                            <div style="padding:22px 24px 24px;">
                                <h3 style="font-size:18px; font-weight:700; color:#165b65; margin-bottom:10px;">Study in {{ $dest->title }}</h3>
                                @if($dest->details_title)
                                <p style="font-size:13.5px; color:#666; line-height:1.65; margin-bottom:18px;">{{ Str::limit(strip_tags($dest->details_title), 100) }}</p>
                                @endif
                                <span style="display:inline-block; padding:8px 22px; background:linear-gradient(135deg,#165b65,#1e8a98); color:#fff; border-radius:30px; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:1px;">
                                    Explore &rarr;
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px 0;">
                <i class="fa-solid fa-globe" style="font-size:60px; color:#ccc; margin-bottom:20px; display:block;"></i>
                <h3 style="color:#888;">No destinations available yet.</h3>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
