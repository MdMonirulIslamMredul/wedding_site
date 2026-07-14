@extends('backend.layouts.app')

@section('title', 'Mixed Settings')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.service.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <div class="form-group">
                            <label>Banner</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $service->title }}" class="form-control"
                                placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label>Image-1</label>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image-2</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image-3</label>
                            <input type="file" name="image3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details-1</label>
                            <textarea type="text" rows="3" name="details1" class="editor form-control" placeholder="Description">{{ $service->details1 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Details-2</label>
                            <textarea type="text" rows="3" name="details2" class="editor form-control" placeholder="Description">{{ $service->details2 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Details-3</label>
                            <textarea type="text" rows="3" name="details3" class="editor form-control" placeholder="Description">{{ $service->details3 }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="is_active">
                                <option value="1" @if ($service->is_active == 1) selected @endif>Active</option>
                                <option value="0" @if ($service->is_active == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('after-styles')
        {{ style(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')) }}
    @endpush

    @push('after-scripts')
        {!! script(asset('assets/plugins/tinymce/jquery.tinymce.min.js')) !!}
        {!! script(asset('assets/plugins/tinymce/tinymce.min.js')) !!}
        {!! script(asset('assets/plugins/tinymce/editor-helper.js')) !!}
        {!! script(asset('assets/plugins/moment/moment.js')) !!}
        {!! script(asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')) !!}

        <script>
            $(document).ready(function() {
                simple_editor('.editor', 450);
                $('#datepicker-autoclose').datepicker({
                    format: "dd/mm/yyyy",
                    clearBtn: true,
                    autoclose: true,
                    todayHighlight: true,
                });

                $("#image").change(function() {
                    readImageURL(this, $('#holder'));
                });
            });
            $(document).on('blur', "#post_title", function() {
                let postField = $(this);
                let post_title = postField.val();
                if (post_title) {
                    ajax_slug_url(post_title);
                    setTimeout(update, 1000); // 30 seconds
                    $("#post_error").empty();
                    postField.removeClass('is-invalid');
                } else {
                    $("#post_error").text('Title must not empty');
                    postField.addClass('is-invalid');
                }
            });

            $(function() {
                $(".form-check-input").click(function() {
                    const status = $(this).val();
                    if (status === "schedule") {
                        $("#scheduleDate").removeClass("d-none");
                    } else if (status === "1") {
                        $("#for_New_upload").removeClass("d-none");
                    } else if (status === "0") {
                        $("#for_New_upload").addClass("d-none");
                    } else {
                        $("#scheduleDate").addClass("d-none");
                    }
                });

            });
        </script>
    @endpush


@endsection
