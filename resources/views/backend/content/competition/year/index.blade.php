@extends('backend.layouts.app')

@section('title', ' Competition Year Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.competition.year.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year" class="form-control">
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($year as $y)
                            <tr>
                                <td>{{ $y->id ?? 'N/A' }}</td>

                                <td>{{ $y->year ?? 'N/A' }}</td>

                                <td>
                                    <a href="{{ route('admin.competition.year.edit', ['id' => $y->id]) }}"
                                        class="btn btn-success">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
