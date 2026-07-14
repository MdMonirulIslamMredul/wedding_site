@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.history.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image-1</label>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-1</label>
                            <textarea id="" class="editor form-control" col="1" row="1" name="description1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image-2</label>
                            <input type="file" name="image2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-2</label>
                            <textarea id="" class="editor2 form-control" col="1" row="1" name="description2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image-3</label>
                            <input type="file" name="image3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-3</label>
                            <textarea id="" class="editor3 form-control" col="1" row="1" name="description3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image-4</label>
                            <input type="file" name="image4" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-4</label>
                            <textarea id="" class="editor4 form-control" col="1" row="1" name="description4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image-5</label>
                            <input type="file" name="image5" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-5</label>
                            <textarea id="" class="editor5 form-control" col="1" row="1" name="description5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image-6</label>
                            <input type="file" name="image6" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description-6</label>
                            <textarea id="" class="editor6 form-control" col="1" row="1" name="description6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Video Link</label>
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <select name="section" id="section" class="form-control">
                                <option value="">Select</option>
                                <option value="history">History of Wushu</option>
                                <option value="traditional">Traditional Wushu</option>
                                <option value="taolu">Taolu</option>
                                <option value="sanda">Sanda</option>
                            </select>
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
                            <th>Section</th>
                            <th>Image-1</th>
                            <th>Description-1</th>
                            <th>Image-2</th>
                            <th>Description-2</th>
                            <th>Image-3</th>
                            <th>Description-3</th>
                            <th>Image-4</th>
                            <th>Description-4</th>
                            <th>Image-5</th>
                            <th>Description-5</th>
                            <th>Image-6</th>
                            <th>Description-6</th>
                            <th>Video Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $his)
                            <tr>
                                <td>{{ $his->section ?? 'N/A' }}</td>
                                <td><img src="{{ asset('/setting/history/' . $his->image1) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description1 ?? 'N/A' !!}</td>

                                <td><img src="{{ asset('/setting/history/' . $his->image2) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description2 ?? 'N/A' !!}</td>
                                <td><img src="{{ asset('/setting/history/' . $his->image3) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description3 ?? 'N/A' !!}</td>
                                <td><img src="{{ asset('/setting/history/' . $his->image4) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description4 ?? 'N/A' !!}</td>
                                <td><img src="{{ asset('/setting/history/' . $his->image5) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description5 ?? 'N/A' !!}</td>
                                <td><img src="{{ asset('/setting/history/' . $his->image6) ?? 'N/A' }}"
                                        style="height: 100px">
                                </td>
                                <td>{!! $his->description6 ?? 'N/A' !!}</td>
                                <td>{{ $his->link ?? 'N/A' }}</td>


                                <td>

                                    <a href="{{ route('admin.history.settings.edit', ['id' => $his->id]) }}"
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
            $(document).ready(function() {
                simple_editor('.editor5', 450);
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
                simple_editor('.editor6', 450);
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
