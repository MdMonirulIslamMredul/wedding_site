@extends('backend.layouts.app')

@section('title', 'Edit Album')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Album: {{ $album->title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.album.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control" required value="{{ $album->title }}">
                    </div>

                    <div class="form-group">
                        <label>Details / Description</label>
                        <textarea name="details" class="form-control" rows="4">{{ $album->details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Cover Image</label>
                        @if($album->cover_image)
                        <div class="mb-2">
                            <img src="{{ asset('setting/banner/' . $album->cover_image) }}" style="height: 100px; border-radius: 5px;">
                        </div>
                        @endif
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        <small class="text-muted">Leave blank to keep existing cover image.</small>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <label class="switch switch-primary">
                                <input type="checkbox" class="switch-input" name="is_active" {{ $album->is_active ? 'checked' : '' }} value="1">
                                <span class="switch-slider"></span>
                            </label>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mt-4 mb-3">Add More Pictures</h5>
                    <div class="form-group">
                        <label>Select Multiple Images by holding CTRL or Shift while selecting...</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Album</button>
                        <a href="{{ route('admin.setting.album.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>

                <hr>

                <h5 class="mt-4 mb-3">Existing Pictures</h5>
                <div class="row">
                    @foreach($album->pictures as $picture)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('setting/banner/' . $picture->image) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-footer text-center">
                                <form action="{{ route('admin.setting.album.picture.destroy', $picture->id) }}" method="POST" onsubmit="return confirm('Delete this picture?');">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if($album->pictures->count() == 0)
                    <div class="col-12">
                        <p class="text-muted">No pictures uploaded yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection