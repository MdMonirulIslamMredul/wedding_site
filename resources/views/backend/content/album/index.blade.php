@extends('backend.layouts.app')

@section('title', 'Albums Management')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Albums</h4>
                <a href="{{ route('admin.setting.album.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add New Album</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cover Image</th>
                            <th>Title</th>
                            <th>Pictures Count</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                        <tr>
                            <td>
                                @if($album->cover_image)
                                <img src="{{ asset('setting/banner/' . $album->cover_image) }}" style="height: 60px; object-fit: cover; width: 80px; border-radius: 4px;">
                                @else
                                <span class="badge badge-secondary">No Cover</span>
                                @endif
                            </td>
                            <td>{{ $album->title }}</td>
                            <td>{{ $album->pictures->count() }}</td>
                            <td>
                                @if ($album->is_active == 1)
                                <span class="badge badge-primary">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.setting.album.edit', $album->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.setting.album.destroy', $album->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this album?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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
