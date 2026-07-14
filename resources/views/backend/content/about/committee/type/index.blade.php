@extends('backend.layouts.app')

@section('title', ' Committee Type')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.about.committee.type.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Committee Type</label>
                            <input type="text" name="type" class="form-control">
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
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($type)
                            @foreach ($type as $t)
                                <tr>
                                    <td>{{ $t->type ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.about.committee.type.edit', ['id' => $t->id]) }}"
                                            class="btn btn-success">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
