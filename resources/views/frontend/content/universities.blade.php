@extends('frontend.layouts.app')
@section('content')
<div class="main-content">
    <div class="rs-breadcrumbs" style="background-image:url({{ asset('/setting/university/' . $banner->banner) }})">
        <div class="breadcrumbs-inner text-center">
            <h1 class="page-title">Our Partner Universities</h1>
            <ul>
                <li>
                    <a class="active" href="/">Home</a>
                </li>
                <li>Universities</li>
            </ul>
        </div>
    </div>

    <div class="rs-partner pt-80 pb-70">
        <div class="container">
            <div class="text-center mb-4">
                <h3>Our Partner Universities</h3>
            </div>
            <div class="row">
                @foreach ($university as $uni)
                <div class="col-3 mb-5">
                    <div class="card">
                        <div class="text-center">
                            <a href="/universities/{{ $uni->id }}">
                                <img class="main-logo" src="{{ asset('/setting/university/' . $uni->logo) }}" alt="" style="height: 80px;padding: 10px;">
                                </br>
                                <small>{{ $uni->university_name ?? null }}</small>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row pt-5">
                <div class="col-md-12 text-center">
                    <div class="btn-part ">
                        <a class="readon learn-more contact-us" href="{{ route('universities') }}"> View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection