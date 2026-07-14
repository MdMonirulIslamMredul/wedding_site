@extends('backend.layouts.app')

@section('title', 'Mixed Settings')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.testmony.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Reviewer Name</label>
                            <input type="text" name="reviewer" value="{{ $notice->reviewer }}" class="form-control">
                            <input type="hidden" name="notice_id" value="{{ $notice->id }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Reviewer Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Reviewer Job</label>
                            <input type="text" name="reviewer_job" value="{{ $notice->reviewer_job }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <textarea type="text" rows="5" name="review" value="{{ $notice->review }}" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="is_active">
                                <option value="1" @if ($notice->is_active == 1) selected @endif>Active</option>
                                <option value="0" @if ($notice->is_active == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>





    </div>


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>


@endsection



@push('after-scripts')
    {{ script('assets/js/jscolor.js') }}
@endpush
