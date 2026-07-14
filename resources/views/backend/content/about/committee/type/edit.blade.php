@extends('backend.layouts.app')

@section('title', ' Committee Type')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.about.committee.type.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Committee Type</label>
                            <input type="hidden" value="{{ $type->id }}" name="id">
                            <input type="text" value="{{ $type->type ?? null }}" name="type" class="form-control">
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
