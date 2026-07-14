@extends('backend.layouts.app')

@section('title', 'University Settings')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.university.update') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $university->id }}">
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>University Name</label>
                            <input type="text" name="university_name" value="{{ $university->university_name }}"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>University Name</label>
                            <input type="text" name="website" value="{{ $university->website }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Study Destination</label>
                            <select name="study_destination_id" class="form-control">
                                <option value="">Select Destination</option>
                                @foreach ($study_destinations as $destination)
                                    <option @if ($destination->id == $university->study_destination_id) selected @endif
                                        value="{{ $destination->id }}">
                                        {{ $destination->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image1</label>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image2</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image3</label>
                            <input type="file" name="image3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details-1</label>
                            <textarea type="text" class="editor form-control" rows="5" name="details1" id="details"
                                placeholder="Details">{{ $university->details1 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Details-2</label>
                            <textarea type="text" class="editor form-control" rows="5" name="details2" id="details"
                                placeholder="Details">{{ $university->details2 }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Details-3</label>
                            <textarea type="text" class="editor form-control" rows="5" name="details3" id="details"
                                placeholder="Details">{{ $university->details3 }}</textarea>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                            <!--<input value="Submit" />  -->
                        </div>
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
            // $(document).ready(function() {
            //     simple_editor('.editor2', 450);
            //     $('#datepicker-autoclose').datepicker({
            //         format: "dd/mm/yyyy",
            //         clearBtn: true,
            //         autoclose: true,
            //         todayHighlight: true,
            //     });

            //     $("#image").change(function() {
            //         readImageURL(this, $('#holder'));
            //     });
            // });

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
