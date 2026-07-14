@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('admin.about.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if ($about != null)
                    <input type="hidden" value="{{ $about->id }}" name="id">
                    @endif

                    <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" name="banner_image" class="form-control" id="bannerImageInput">
                    <img id="bannerImagePreview" src="#" alt="Banner Preview" style="max-height: 150px; display:none; margin-top:10px;">
                </div>
                
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control" col="10" row="5" name="short_description"></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label>About Image</label>
                    <input type="file" name="about_image" class="form-control" id="aboutImageInput">
                    <img id="aboutImagePreview" src="#" alt="About Preview" style="max-height: 150px; display:none; margin-top:10px;">
                </div>
                    <div class="form-group">
                        <label>Details</label>
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
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($about)
                    <tr>
                        <td><img src="{{ asset('/setting/about/' . $about->about_image) ?? 'N/A' }}" style="height: 100px">
                        </td>
                        <td>{{ $about->title ?? 'N/A' }}</td>
                        <td>{{ $about->short_description ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.about.settings.edit', ['id' => $about->id]) }}" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endif
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
    
    
    
    function previewImage(input, previewId) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
}

document.getElementById('bannerImageInput').addEventListener('change', function() {
    previewImage(this, 'bannerImagePreview');
});

document.getElementById('aboutImageInput').addEventListener('change', function() {
    previewImage(this, 'aboutImagePreview');
});
</script>
@endpush

@endsection