@extends('frontend.layouts.app')
@section('content')
    <div class="main-content">
        <div class="banner-area pb-100">
            <div class="container-fluid">
                <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">

                    <div class="slider-item"
                        style="background-image: url('{{ asset('/setting/banner/' . $project->banner) }}">
                        <div class="slider-content">
                            <h2>Study in {{ $project->title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rs-about pt-120 pb-120 md-pt-80 md-pb-80">
            <div class="container">
                <div class="row align-items-center pb-80">
                    <div class="col-lg-6 pr-40 md-pr-15 md-mb-50">
                        <div class="sec-title4">
                            <h2 class="title">{{ $project->details_title }}</h2>
                            <div class="heading-line mb-40"></div>
                            <div class="mt-50">
                                {!! $project->details !!}
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="software-img">
                            <img src="{{ asset('/setting/banner/' . $project->image) }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-12 pr-40 md-pr-15 md-mb-50">
                        <div class="sec-title4">
                            <div>
                                {!! $project->details_description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 pr-40 md-pr-15 md-mb-50">
                        <div class="sec-title4">
                            <div class="software-img">
                                <img src="{{ asset('/setting/banner/' . $project->image3) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- jQuery (required by Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <div class="academic-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <h2>Our Partners</h2>
                </div>
                <div id="universityCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner">
                        @foreach ($university->chunk(4) as $key => $chunk)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $uni)
                                        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-duration="1200"
                                            data-aos-delay="200" data-aos-once="true">
                                            <a href="/universities/{{ $uni->id }}">
                                                <div class="single-academics-card">
                                                    <a href="/universities/{{ $uni->id }}">
                                                        <img src="{{ asset('/setting/university/' . $uni->logo) }}"
                                                            alt="" style="height: 80px; padding: 10px;">
                                                    </a>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <a class="default-btn" href="{{ route('universities') }}"> View More</a>
            </div>
        </div>
    </div>
    {{-- <div id="rs-faq" class="faq-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title2 mb-45">
                        <h2 class="title title6">
                            Faqs
                        </h2>
                    </div>
                    <div class="faq-content">
                        <div id="accordionExample" class="accordion">
                            @foreach ($faqs as $key => $faq)
                                @php
                                    $i = null;
                                    if ($key == 0) {
                                        $i = 'collapseOne';
                                    }
                                    if ($key == 1) {
                                        $i = 'collapseTwo';
                                    }
                                    if ($key == 2) {
                                        $i = 'collapseThree';
                                    }
                                    if ($key == 3) {
                                        $i = 'collapsefour';
                                    }
                                    if ($key == 4) {
                                        $i = 'collapsefive';
                                    }
                                    if ($key == 5) {
                                        $i = 'collapsesix';
                                    }
                                    if ($key == 6) {
                                        $i = 'collapseseven';
                                    }
                                @endphp
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $i }}" aria-expanded="true"
                                            aria-controls="{{ $i }}">
                                            {{ $faq->question ?? 'FAQ' }}
                                        </button>
                                    </div>
                                    <div id="{{ $i }}" class="collapse" data-bs-parent="#accordionExample"
                                        style="">
                                        <div class="accordion-body">
                                            {{ $faq->answer ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
