@extends('backend.layouts.app')

@section('title', 'Mixed Settings')

@php
$required = html()
->span('*')
->class('text-danger');
$demoImg = 'img/backend/front-logo.png';
@endphp

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@php
$multis = DB::table('projects')
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
                <form class="form-horizontal" action="{{ route('admin.setting.project.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" name="banner[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image2</label>
                        <input type="file" name="image2[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Image3</label>
                        <input type="file" name="image3[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Short Details</label>
                        <input type="text" name="short_details[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Details Title</label>
                        <input type="text" name="details_title[]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Details Description1</label>
                        <textarea type="text" class="editor form-control" rows="5" name="details[]" id="details" placeholder="Details"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Details Description2</label>
                        <textarea type="text" class="editor form-control" rows="5" name="details_description[]" id="details" placeholder="Details"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Details Description3</label>
                        <textarea type="text" class="editor form-control" rows="5" name="details_description2[]" id="details" placeholder="Details"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status[]">
                            <option value="" selected disabled>Select status</option>
                            <option value="1">Pending</option>
                            <option value="2">Running</option>
                            <option value="3">Complete</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <!--<input value="Submit" />  -->
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
                        <th>Title</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($multis as $multi)
                    <tr>
                        <td><img src="{{ asset('/setting/banner/' . $multi->image) }}" style="height: 100px"></td>
                        <td>{{ $multi->title ?? null }}</td>
                        <td>{!! $multi->details ?? null !!}</td>
                        <td>
                            @if ($multi->status == 1)
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($multi->status == 2)
                                <span class="badge badge-info">Running</span>
                            @elseif ($multi->status == 3)
                                <span class="badge badge-success">Complete</span>
                            @else
                                <span class="badge badge-secondary">None</span>
                            @endif
                        </td>
                        <td>
                            @if ($multi->is_active == 1)
                            <button class="btn btn-sm btn-primary">Active</button>
                            @elseif($multi->is_active == 0)
                            <button class="btn btn-sm btn-danger">Deactive</button>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/setting/study_destination/edit/{{ $multi->id }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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