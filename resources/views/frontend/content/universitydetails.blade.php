@extends('frontend.layouts.app')
@section('content')
    <div class="main-content">
        <div class="rs-breadcrumbs" style="background-image:url({{ asset('/setting/university/' . $university->banner) }})">
            <div class="breadcrumbs-inner text-center">
                <h1 class="page-title">Study in {{ $university->university_name }}</h1>
                <ul>
                    <li>
                        <a class="active" href="/">Home</a>
                    </li>
                    <li>{{ $university->university_name }}</li>
                </ul>
            </div>
        </div>
        <div class="mt-4 text-center" style="background-color:#f1f1f1;padding:10px;">
            <a href="{{ $university->website }}">
                <img class="main-logo" src="{{ asset('/setting/university/' . $university->logo) }}" alt=""
                    style="height: 150px">
                </br>
                <small>{{ $university->university_name ?? null }}</small>
            </a>
        </div>
        <div class="rs-about mt-5 pb-90 md-pt-80 md-pb-80">
            <div class="container">
                <div class="row align-items-center pb-80">
                    @if ($university->details1)
                        <div class="col-lg-6 pr-40 md-pr-15 md-mb-50">
                            <div class="sec-title4">
                                <div class="mt-50">
                                    {!! $university->details1 !!}
                                </div>

                            </div>
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="software-img">
                            <img src="{{ asset('/setting/university/' . $university->image1) }}" alt="">
                        </div>
                    </div>
                </div>
                @if ($university->details2)
                    <div class="row align-items-center pb-80">
                        <div class="col-lg-6">
                            <div class="software-img">
                                <img src="{{ asset('/setting/university/' . $university->image2) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-40 md-pr-15 md-mb-50">
                            <div class="sec-title4">
                                <div class="mt-50">
                                    {!! $university->details2 !!}
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                @if ($university->details3)
                    <div class="row align-items-center">
                        <div class="col-lg-12 pr-40 md-pr-15 md-mb-50 text-center">
                            <div class="sec-title4">
                                <div>
                                    {!! $university->details3 !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pr-40 text-center">
                            <div class="sec-title4">
                                <div class="software-img">
                                    <img src="{{ asset('/setting/university/' . $university->image3) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="rs-partner pt-10 pb-30">
            <div class="container">
                <div class="text-center mb-4">
                    <h3>Our Partner Universities</h3>
                </div>
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true"
                    data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false"
                    data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="2"
                    data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="3"
                    data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2"
                    data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5"
                    data-md-device-nav="false" data-md-device-dots="false">
                    @foreach ($universities as $uni)
                        <div class="card">
                            <div class="partner-item">
                                <div class="logo-img text-center">
                                    <a href="/universities/{{ $uni->id }}">
                                        <img class="hover-logo" src="{{ asset('/setting/university/' . $uni->logo) }}"
                                            alt="" style="height: 150px">
                                        <img class="main-logo" src="{{ asset('/setting/university/' . $uni->logo) }}"
                                            alt="" style="height: 150px">
                                        <small>{{ $uni->university_name ?? null }}</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="row mb-4">
            <div class="col-md-12 text-center">
                <div class="btn-part ">
                    <a class="readon learn-more contact-us" href="{{ route('universities') }}"> View More</a>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
