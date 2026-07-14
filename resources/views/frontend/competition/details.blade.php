@extends('frontend.layouts.app')
@section('content')
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/competition/' . $competition->banner_image) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="container row">
                <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                    <h2 class="xs-title">{{ $year->year }} Competition</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 80%;">
            <div class="align-content-center text-center">
                <h2>{{ $competition->title }}</h2>
            </div>
        </div>
    </section>
    <section class="pb-1">
        <div class="container" style="max-width: 80%;">
            <div class="row pb-5">
                <div class="col-7">
                    {!! $competition->description1 ?? null !!}
                    {!! $competition->description2 ?? null !!}
                    {!! $competition->description3 ?? null !!}
                </div>
                <div class="col-5">
                    <div class="align-content-center text-center">
                        <img src="{{ asset('/setting/competition/' . $competition->photo) }}" style="max-width: 100%"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
