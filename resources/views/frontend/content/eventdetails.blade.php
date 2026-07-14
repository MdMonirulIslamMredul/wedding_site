@extends('frontend.layouts.app')
@section('content')
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">

                <div class="slider-item"
                    style="background-image: url('{{ asset('/setting/banner/' . $event->single_event_banner) }}">
                    <div class="slider-content">
                        <h2>Event</h2>
                        <p>{{ get_setting('bottombanner_text_bottom') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="events-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events-details-left-content pr-20">
                        <div class="events-image">
                            <img src="{{ asset('/setting/banner/' . $event->image) }}" alt="Image">
                        </div>
                        <div class="meetings">
                            <h2>Event Detalis</h2>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="next-workshop pl-20">
                        <h3>Location</h3>
                        <div class="list">
                            <ul>
                                <li><span>Organized by:</span>{{ $event->organized_by }}</li>
                                <li><span>Date :</span>{{ Carbon\Carbon::parse($event->date)->format('d-M-Y') }}</li>
                                <li><span>Times :</span>{{ $event->start }}</li>
                                <li>
                                    <span>Phone:</span>{{ $event->phone }}
                                </li>
                                <li>
                                    <span>Email:</span>{{ $event->email }}
                                </li>
                                <li><span>Location :</span>{{ $event->venue }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
