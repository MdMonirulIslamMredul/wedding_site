@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.about.committee.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" name="id" value="{{ $committee->id }}" class="form-control">
                            <input type="text" name="name" value="{{ $committee->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" value="{{ $committee->position }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="details" value="{{ $committee->details }}" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($type as $t)
                                    <option @if ($committee->type_id == $t->id) selected @endif value="{{ $t->id }}">
                                        {{ $t->type }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Color</label>
                            <select name="color" id="color" class="form-control">
                                <option value="">Select</option>
                                <option @if ($committee->color == 'fill-red') selected @endif value="fill-red">Red</option>
                                <option @if ($committee->color == 'fill-purple') selected @endif value="fill-purple">Purple
                                </option>
                                <option @if ($committee->color == 'fill-blue') selected @endif value="fill-blue">Blue</option>
                                <option @if ($committee->color == 'fill-orange') selected @endif value="fill-orange">Orange
                                </option>
                                <option @if ($committee->color == 'fill-riptide') selected @endif value="fill-riptide">Riptide
                                </option>
                                <option @if ($committee->color == 'fill-yellow') selected @endif value="fill-yellow">Yellow
                                </option>
                                <option @if ($committee->color == 'fill-green') selected @endif value="fill-green">Green</option>
                                <option @if ($committee->color == 'fill-navy-blue') selected @endif value="fill-navy-blue">Navy Blue
                                </option>
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="">Select</option>
                                <option @if ($committee->section == 'president') selected @endif value="president">President
                                </option>
                                <option @if ($committee->section == 'executive-board') selected @endif value="executive-board">
                                    Executive Board</option>
                                <option @if ($committee->section == 'committees') selected @endif value="committees">Committees
                                </option>
                                <option @if ($committee->section == 'secretariat') selected @endif value="secretariat">Secretariat
                                </option>
                                <option @if ($committee->section == 'honorable-members') selected @endif value="honorable-members">
                                    Honorable Members</option>
                                <option @if ($committee->section == 'ambassadors') selected @endif value="ambassadors">Ambassadors
                                </option>
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Serial</label>
                            <input type="text" name="serial" value="{{ $committee->serial ?? null }}"
                                class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label>Has Description ?</label>
                            <select name="has_description" id="" class="form-control">
                                <option @if ($committee->has_description == 0) selected @endif value="0">No</option>
                                <option @if ($committee->has_description == 1) selected @endif value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="" class="editor form-control" col="10" row="3" name="description">{{ $committee->description }}</textarea>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
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
