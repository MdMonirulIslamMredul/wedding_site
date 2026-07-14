@extends('frontend.layouts.app')
@section('content')
    {{-- @dd($banner); --}}
    <section class="xs-banner-inner-section parallax-window mrt"
        style="background-image: url({{ asset('/setting/competition/' . $banner->banner_image) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="container row">
                <div class="xs-welcome-wraper banner-verion-2 color-white col-md-8 content-left">
                    <h2 class="xs-title">Competition Result</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 50%;">
            <form action="{{ route('result.year.index') }}" method="get">
                <div class="row">
                    <div class="col-6">
                        <select name="year" class="form-control">
                            <option value="">Select Year</option>
                            @foreach ($s_year as $y)
                                <option @if (request('year', null) == $y->id) selected @endif value="{{ $y->id }}">
                                    {{ $y->year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="type" class="form-control">
                            <option value="">Select Type</option>
                            @foreach ($s_type as $t)
                                <option @if (request('type', null) == $t->id) selected @endif value="{{ $t->id }}">
                                    {{ $t->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="align-content-center text-center">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block"><i class="fa fa-search">
                            Search</i></button>
                </div>
            </form>
        </div>
    </section>
    @if (count($results) != 0)
        @foreach ($all_year as $year)
            @php
                if ($search_type != null) {
                    $yearresult = App\models\Competition::where('year_id', $year->id)
                        ->where('type_id', $search_type)
                        ->get();
                } else {
                    $yearresult = App\models\Competition::where('year_id', $year->id)->get();
                }
            @endphp
            <section class="pt-5">
                <div class="container" style="max-width: 80%;">
                    <div class="align-content-center text-center">
                        <h1>{{ $year->year }}</h1>
                    </div>
                </div>
            </section>
            @if ($yearresult != null)
                <section class="pb-5">
                    <div class="container" style="max-width: 80%;">
                        <table class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Competition</th>
                                <th>Place</th>
                                <th>Result</th>
                            </thead>
                            <tbody>
                                @foreach ($yearresult as $com)
                                    <td>{{ $com->date }}</td>
                                    <td>{{ $com->title }}</td>
                                    <td>{{ $com->address }}</td>
                                    <td><a href="{{ asset('/setting/competition/' . $com->result_file) }}"
                                            target="_blank">Open
                                            <i class="fa fa-file"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @else
                <div class="align-content-center text-center pb-5">
                    <h2>Sorry Nothing Found!!!!!</h2>
                </div>
            @endif
        @endforeach
    @else
        <div class="align-content-center text-center pb-5">
            <h2>Sorry Nothing Found!!!!!</h2>
        </div>
    @endif
@endsection
