@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.about.committee.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="details" class="form-control">
                        </div>
                        {{-- <div class="form-group">
                            <label>Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($type as $t)
                                    <option value="{{ $t->id }}">{{ $t->type }}</option>
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
                                <option value="fill-red">Red</option>
                                <option value="fill-purple">Purple</option>
                                <option value="fill-blue">Blue</option>
                                <option value="fill-orange">Orange</option>
                                <option value="fill-riptide">Riptide</option>
                                <option value="fill-yellow">Yellow</option>
                                <option value="fill-green">Green</option>
                                <option value="fill-navy-blue">Navy Blue</option>
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="">Select</option>
                                <option value="president">President</option>
                                <option value="executive-board">Executive Board</option>
                                <option value="committees">Committees</option>
                                <option value="secretariat">Secretariat</option>
                                <option value="honorable-members">Honorable Members</option>
                                <option value="ambassadors">Ambassadors</option>
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Serial</label>
                            <input type="text" name="serial" class="form-control">
                        </div> --}}
                        <div class="form-group">
                            <label>Has Description ?</label>
                            <select name="has_description" id="" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="" class="editor form-control" col="10" row="3" name="description"></textarea>
                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Position</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($committees as $committee)
                            @foreach ($type as $t)
                                @if ($committee->type_id == $t->id)
                                    @php
                                        $t_name = $t->type;
                                    @endphp
                                @endif
                            @endforeach
                            <tr>
                                <td><img src="{{ asset('/setting/committee/' . $committee->photo) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{{ $committee->name ?? 'N/A' }}</td>
                                <td>{{ $t_name ?? 'N/A' }}</td>
                                <td>{{ $committee->position ?? 'N/A' }}</td>
                                <td>{{ $committee->details ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.about.committee.edit', ['id' => $committee->id]) }}"
                                        class="btn btn-success">
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
