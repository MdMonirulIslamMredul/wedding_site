@extends('frontend.layouts.app')
@section('content')
    {{-- @dd($banner); --}}
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/competition/' . $banner->banner_image) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="container row">
                <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                    <h2 class="xs-title">Competition</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 80%;">
            <div class="align-content-center text-center">
                <h1>{{ $year->year }} Competition</h1>
            </div>
        </div>
    </section>
    <section class="pb-5">
        <div class="container" style="max-width: 80%;">
            <table class="table table-bordered">
                <thead>
                    <th>Date</th>
                    <th>Competition</th>
                    <th>Place</th>
                    <th>Details</th>
                </thead>
                <tbody>
                    @foreach ($competition as $com)
                        <tr>
                            <td>{{ $com->date }}</td>
                            <td>{{ $com->title }}</td>
                            <td>{{ $com->address }}</td>
                            <td><a href="{{ route('competition.details', ['id' => $com->id]) }}">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
