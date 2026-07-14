@extends('backend.layouts.app')




@section('content')
    @php
        $multis = DB::table('notices')
            ->where('is_active', 1)
            ->orwhere('is_active', 0)
            ->get();
    @endphp
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.page.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        {{-- @dd($notice); --}}
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <input type="hidden" name="oldimage" value="{{ $notice->image }}" class="form-control">


                        </div>
                        <div class="form-group">
                            <label>Background Color</label>
                            <input type="input" name="bgcolor" value="{{ $notice->bgcolor }}" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $notice->title }}" class="form-control">
                            <input type="hidden" name="notice_id" value="{{ $notice->id }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-1</label>
                            <textarea id="" class="editor form-control" col="10" row="3" name="description">{{ $notice->description ?? null }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-2</label>
                            <textarea id="" class="editor2 form-control" col="10" row="3" name="description2">{{ $notice->description_a ?? null }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-3</label>
                            <textarea id="" class="editor3 form-control" col="10" row="3" name="description3">{{ $notice->description_b ?? null }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-4</label>
                            <textarea id="" class="editor4 form-control" col="10" row="3" name="description4">{{ $notice->description_c ?? null }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="is_active">
                                <option value="1" @if ($notice->is_active == 1) selected @endif>Active</option>
                                <option value="0" @if ($notice->is_active == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" value="{{ $notice->slug }}" class="form-control">

                        </div>
                        <div class="form-group">
                            <input type="checkbox" @if ($notice->hearder == 1) checked @endif id="vehicle1"
                                name="hearder" value="1">
                            <label for="vehicle1">Header</label><br>
                            <input type="checkbox" @if ($notice->footer_right == 3) checked @endif id="vehicle3"
                                name="footer_right" value="3">
                            <label for="vehicle3"> Footer Right</label><br><br>

                        </div>

                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </div>
        </div>





    </div>
@endsection


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
        $(document).ready(function() {
            simple_editor('.editor2', 450);
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
        $(document).ready(function() {
            simple_editor('.editor3', 450);
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
        $(document).ready(function() {
            simple_editor('.editor4', 450);
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
