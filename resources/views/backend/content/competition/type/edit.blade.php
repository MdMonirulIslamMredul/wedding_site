@extends('backend.layouts.app')

@section('title', ' Competition Type Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.competition.type.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" value="{{ $type->type }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $type->id }}">
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
