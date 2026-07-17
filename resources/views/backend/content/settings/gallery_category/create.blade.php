@extends('backend.layouts.app')

@section('title', 'Create Gallery Category')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Gallery Category</h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.setting.gallery-category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
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
