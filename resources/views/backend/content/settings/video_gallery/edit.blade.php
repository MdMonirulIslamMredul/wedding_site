@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Video</h3>
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
                    
                    <form action="{{ route('admin.setting.video-gallery.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title (Optional)</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $video->title) }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Youtube Link *</label>
                            <input type="url" name="youtube_link" class="form-control" required value="{{ old('youtube_link', $video->youtube_link) }}">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $video->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $video->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
