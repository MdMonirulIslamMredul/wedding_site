@extends('backend.layouts.app')

@section('title', 'Gallery Categories')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Gallery Categories</h4>
                <a href="{{ route('admin.setting.gallery-category.create') }}" class="btn btn-sm btn-success float-right">Add New Category</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->is_active == 1)
                                <button class="btn btn-sm btn-primary">Active</button>
                                @else
                                <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.setting.gallery-category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.setting.gallery-category.destroy', $category->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
