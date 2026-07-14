@extends('frontend.layouts.app')
@section('title', 'Testimonials - Stories of Satisfaction')
@section('meta_description', 'Read success stories from students who achieved their dreams of studying abroad with SHEC guidance.')

@section('content')
<div class="main-content">

    {{-- Page Banner --}}
    <div style="background: linear-gradient(135deg, #0d5560 0%, #145f6a 60%, #165b65 100%); padding: 80px 0 60px; text-align:center;">
        <div class="container">
            <h1 style="font-size:42px; font-weight:800; color:#fff; text-transform:uppercase; letter-spacing:2px; margin-bottom:14px;">
                Stories of <span style="color:#e63946;">Satisfaction</span>
            </h1>
            <p style="color:rgba(255,255,255,0.8); font-size:16px; max-width:600px; margin:0 auto; line-height:1.7;">
                Real stories from real students who fulfilled their dreams of studying abroad with our guidance.
            </p>
            <nav style="margin-top:20px; font-size:13px;">
                <a href="/" style="color:rgba(255,255,255,0.7); text-decoration:none;">Home</a>
                <span style="color:rgba(255,255,255,0.5); margin:0 10px;">/</span>
                <span style="color:#e63946; font-weight:600;">Testimonials</span>
            </nav>
        </div>
    </div>

    {{-- Testimonials Grid --}}
    <div style="background-color:#f4f3f0; padding:80px 0 90px;">
        <div class="container">
            @if($testmonies->count())
            <div class="row">
                @foreach($testmonies as $testi)
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-duration="800">
                    <div style="background:#fff; border-radius:15px; padding:36px 32px; box-shadow:0 5px 18px rgba(0,0,0,0.07); border:1px solid #eee; height:100%; display:flex; flex-direction:column; transition:transform .3s ease, box-shadow .3s ease;"
                         onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 14px 32px rgba(0,0,0,0.12)';"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 18px rgba(0,0,0,0.07)';">

                        {{-- Quote icon --}}
                        <div style="font-size:64px; color:#ddd; line-height:0.8; font-family:Georgia,serif; letter-spacing:-4px; margin-bottom:20px;">&quot;&nbsp;&quot;</div>

                        {{-- Review text --}}
                        <p style="font-size:14px; color:#555; line-height:1.8; flex-grow:1; margin-bottom:28px; text-transform:capitalize;">
                            {{ $testi->review ?? 'Great experience!' }}
                        </p>

                        {{-- Divider --}}
                        <div style="height:1px; background:#f0f0f0; margin-bottom:22px;"></div>

                        {{-- Author --}}
                        <div style="display:flex; align-items:center; gap:15px;">
                            @if($testi->photo)
                            <img src="{{ asset('setting/testmony/' . $testi->photo) }}" alt="{{ $testi->reviewer }}"
                                 style="width:52px; height:52px; border-radius:50%; object-fit:cover; border:3px solid #165b65;">
                            @else
                            <div style="width:52px; height:52px; border-radius:50%; background:linear-gradient(135deg,#165b65,#1e8a98); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <i class="fa-solid fa-user" style="color:#fff; font-size:20px;"></i>
                            </div>
                            @endif
                            <div>
                                <h4 style="font-size:15px; font-weight:700; color:#222; margin:0 0 3px;">{{ $testi->reviewer }}</h4>
                                @if($testi->reviewer_job)
                                <p style="font-size:12px; color:#888; margin:0;">{{ $testi->reviewer_job }}</p>
                                @endif
                            </div>
                            {{-- Stars --}}
                            <div style="margin-left:auto;">
                                @for($i = 0; $i < 5; $i++)
                                <i class="fa-solid fa-star" style="color:#f4c430; font-size:13px;"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px 0;">
                <i class="fa-solid fa-comment-dots" style="font-size:60px; color:#ccc; margin-bottom:20px; display:block;"></i>
                <h3 style="color:#888;">No testimonials available yet.</h3>
                <p style="color:#aaa;">Check back soon for student success stories!</p>
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
