@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Add New Video</h3>
                    <a href="{{ route('admin.setting.video-gallery.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.setting.video-gallery.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title (Optional)</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Youtube Link *</label>
                            <input type="url" name="youtube_link" class="form-control" required value="{{ old('youtube_link') }}" placeholder="https://www.youtube.com/watch?v=...">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
