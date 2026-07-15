@extends('backend.layouts.app')

@section('title', ' Edit Package')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Package</strong>
                <a href="{{ route('admin.setting.package') }}" class="btn btn-secondary btn-sm float-right">Back</a>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.setting.package.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Package Name</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="{{ $package->name }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Price</label>
                        <div class="col-md-10">
                            <input type="text" name="price" class="form-control" value="{{ $package->price }}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Suffix</label>
                        <div class="col-md-10">
                            <input type="text" name="suffix" class="form-control" value="{{ $package->suffix }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Most Popular</label>
                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                <input type="checkbox" name="is_popular" class="switch-input" value="1" {{ $package->is_popular ? 'checked' : '' }}>
                                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Is Active</label>
                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                <input type="checkbox" name="is_active" class="switch-input" value="1" {{ $package->is_active ? 'checked' : '' }}>
                                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Features (One per line)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="features" rows="6">{{ $package->features }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
