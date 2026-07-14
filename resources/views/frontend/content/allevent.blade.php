@extends('frontend.layouts.app')
@section('content')
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                <div class="slider-item" style="background-image: url('../../{{ get_setting('bottombanner_image') }}">
                    <div class="slider-content">
                        <h2>Event</h2>
                        <p>{{ get_setting('bottombanner_text_bottom') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="events-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-events-card style-4">
                            <div class="events-image">
                                <a href="/event/details/{{ $event->id }}"><img
                                        src="{{ asset('/setting/banner/' . $event->image) }}" alt="Image"></a>
                                <div class="date">
                                    <span
                                        class="entry-date-day">{{ Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    <span
                                        class="entry-date-month">{{ Carbon\Carbon::parse($event->date)->format('F') }}</span>
                                </div>
                            </div>
                            <div class="events-content">
                                <div class="admin">
                                    <p><a href="/event/details/{{ $event->id }}"><span class="entry-date-month">
                                                @if ($event->status == 1)
                                                    Upcomming..
                                                @else
                                                    Completed
                                                @endif
                                            </span></p>
                                </div>
                                <a href="/event/details/{{ $event->id }}">
                                    <h3>{{ $event->title }}</h3>
                                    <p>{{ $event->sort_para }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
