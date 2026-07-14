@extends('backend.layouts.app')

@section('title', 'Team Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.team.update') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $team->id }}" class="form-control">
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select</option>
                                <option @if ($team->type == 'player') selected @endif value="player">Player</option>
                                <option @if ($team->type == 'coach') selected @endif value="coach">Coach</option>
                                <option @if ($team->type == 'judge') selected @endif value="judge">Judge</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" value="{{ $team->description }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
