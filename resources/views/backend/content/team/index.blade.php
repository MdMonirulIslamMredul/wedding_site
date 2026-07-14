@extends('backend.layouts.app')

@section('title', 'Team Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.team.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select</option>
                                <option value="player">Player</option>
                                <option value="coach">Coach</option>
                                <option value="judge">Judge</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control">
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($team as $t)
                            <tr>
                                <td><img src="{{ asset('/setting/team/' . $t->image) ?? 'N/A' }}" style="height: 100px">
                                </td>
                                <td>{{ $t->name ?? 'N/A' }}</td>
                                <td>{{ $t->type ?? 'N/A' }}</td>
                                <td>{{ $t->description ?? 'N/A' }}</td>

                                <td>
                                    <a href="{{ route('admin.team.edit', ['id' => $t->id]) }}" class="btn btn-success">
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
