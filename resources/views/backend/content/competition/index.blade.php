@extends('backend.layouts.app')

@section('title', ' Competition Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.competition.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="year_id" id="year_id" class="form-control">
                                <option value="">Select Year</option>
                                @foreach ($year as $y)
                                    <option value="{{ $y->id }}">{{ $y->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">Select Type</option>
                                @foreach ($type as $t)
                                    <option value="{{ $t->id }}">{{ $t->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Competition Image</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-1</label>
                            <textarea id="" class="editor2 form-control" col="1" row="1" name="description1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-2</label>
                            <textarea id="" class="editor3 form-control" col="1" row="1" name="description2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description-3</label>
                            <textarea id="" class="editor form-control" col="10" row="3" name="description3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Competition Result</label>
                            <input type="file" name="result_file" class="form-control">
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
                            <th>Banner Image</th>
                            <th>Competition Image</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Type</th>
                            <th>Description1</th>
                            <th>Description2</th>
                            <th>Description3</th>
                            <th>Address</th>
                            <th>Result</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competition as $c)
                            @php
                                foreach ($year as $y) {
                                    if ($y->id == $c->year_id) {
                                        $c_year = $y->year;
                                    } else {
                                        $c_year = null;
                                    }
                                }
                                foreach ($type as $t) {
                                    if ($t->id == $c->type_id) {
                                        $c_type = $t->type;
                                    } else {
                                        $c_type = null;
                                    }
                                }
                            @endphp
                            <tr>
                                <td><img src="{{ asset('/setting/competition/' . $c->banner_image) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td><img src="{{ asset('/setting/competition/' . $c->photo) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{{ $c->title ?? 'N/A' }}</td>
                                <td>{{ $c_year }}</td>
                                <td>{{ $c_type }}</td>
                                <td>{!! $c->description1 !!}</td>
                                <td>{!! $c->description2 !!}</td>
                                <td>{!! $c->description3 !!}</td>
                                <td>{{ $c->address ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ asset('/setting/competition/' . $c->result_file) }}" target="_blank">Open
                                        <i class="fa fa-file"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.competition.edit', ['id' => $c->id]) }}"
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
