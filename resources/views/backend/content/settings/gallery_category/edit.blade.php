@extends('backend.layouts.app')

@section('title', 'Edit Gallery Category')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Gallery Category</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.setting.gallery-category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ $category->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $category->is_active == 0 ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.setting.gallery-category.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
