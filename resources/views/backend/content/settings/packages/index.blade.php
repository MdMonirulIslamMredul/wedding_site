@extends('backend.layouts.app')

@section('title', ' Package Management')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Add New Package</strong>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.setting.package.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Package Name</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Gold">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Price</label>
                        <div class="col-md-10">
                            <input type="text" name="price" class="form-control" required placeholder="e.g. BDT 50K">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Suffix</label>
                        <div class="col-md-10">
                            <input type="text" name="suffix" class="form-control" placeholder="e.g. / event">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Most Popular</label>
                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                <input type="checkbox" name="is_popular" class="switch-input" value="1">
                                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Is Active</label>
                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                <input type="checkbox" name="is_active" class="switch-input" value="1" checked>
                                <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Features (One per line)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="features" rows="6" placeholder="1 Chief Photographer&#10;1 Senior Cinematographer&#10;4 Hours Coverage"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>All Packages</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Popular</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price }} {{ $package->suffix }}</td>
                        <td>
                            @if($package->is_popular)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            @if($package->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/setting/package/edit/' . $package->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
