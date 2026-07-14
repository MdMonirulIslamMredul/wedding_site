@extends('frontend.layouts.app')
@section('content')
    <style>
        .heading {
            text-align: center;
            color: #454343;
            font-size: 40px;
            font-weight: 700;
            position: relative;
            margin-top: -100px;
            margin-bottom: 70px;
            text-transform: uppercase;
            z-index: 999;
        }

        .white-heading {
            color: #1E73BE;
        }

        .heading:after {
            content: ' ';
            position: absolute;
            top: 100%;
            left: 50%;
            height: 40px;
            width: 180px;
            border-radius: 4px;
            transform: translateX(-50%);
            /* background: url(img/heading-line.png); */
            background-repeat: no-repeat;
            background-position: center;
        }

        .white-heading:after {
            background: url(https://i.ibb.co/d7tSD1R/heading-line-white.png);
            background-color: #1E73BE;
            background-repeat: no-repeat;
            background-position: center;
        }

        .heading span {
            font-size: 18px;
            display: block;
            font-weight: 500;
        }

        .white-heading span {
            color: #1E73BE;
        }
    </style>
    <main class="xs-main">
        <section class="xs-banner-inner-section parallax-window mrt"
            style="background-image: url({{ asset('/setting/about/' . $about->banner_img) }});">
            <div class="xs-black-overlay"></div>
            <div class="container">
                <div class="container row">
                    <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                        <h2 class="xs-title">About Us</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="xs-section-padding" style="padding-bottom: 0px;">
            <div class="container">
                @foreach ($type as $t)
                    <a href="#" class="btn btn-info btn-lg-outline">{{ $t->type }}</a>
                @endforeach
            </div>
        </section>

        <section class="xs-section-padding">
            <div class="container">
                <div class="heading white-heading">
                    Committees
                </div>
                <div class="row">
                    @foreach ($committees as $committee)
                        <div class="col-md-6 col-lg-3">
                            <div class="xs-single-team xs-mb-50">
                                <img src="{{ asset('/setting/committee/' . $committee->photo) }}" alt="">
                                <div class="xs-team-content">
                                    <h4>{{ $committee->name }}</h4>
                                    <small>{{ $committee->position }}</small>
                                    <svg class="xs-svgs" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 270 138">
                                        <path class="{{ $committee->color }}"
                                            d="M375,3294H645v128a10,10,0,0,1-10,10l-250-20a10,10,0,0,1-10-10V3294Z"
                                            transform="translate(-375 -3294)" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
