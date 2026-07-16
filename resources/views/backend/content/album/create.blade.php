@extends('backend.layouts.app')

@section('title', 'Add New Album')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add New Album</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.album.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control" required placeholder="Enter album title">
                    </div>

                    <div class="form-group">
                        <label>Details / Description</label>
                        <textarea name="details" class="form-control" rows="4" placeholder="Enter album details"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Cover Image (Optional)</label>
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        <small class="text-muted">This image will be used as the thumbnail for the album list.</small>
                    </div>

                    <div class="form-group">
                        <label>Album Pictures (Select Multiple)</label>
                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                        <small class="text-muted">You can select multiple images by holding CTRL or Shift while selecting.</small>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Album</button>
                        <a href="{{ route('admin.setting.album.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection