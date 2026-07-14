@extends('backend.layouts.app')

@section('title', 'Mixed Settings')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.testmony.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Reviewer Name</label>
                            <input type="text" name="reviewer" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Reviewer Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Reviewer Job</label>
                            <input type="text" name="reviewer_job" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>Review</label>
                            <textarea type="text" class="form-control" rows="5" name="review" id="review" placeholder="Review Details"></textarea>
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
                            <th>Reviewer</th>
                            <th>Reviewer Name</th>
                            <th>Reviewer Job</th>
                            <th>Review</th>
                            <th>Active/Deactive</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testmony as $multi)
                            <tr>
                                <td><img src="{{ asset('/setting/testmony/' . $multi->photo) }}" style="height: 100px"></td>
                                <td>{{ $multi->reviewer ?? null }}</td>
                                <td>{{ $multi->reviewer_job ?? null }}</td>
                                <td>{{ $multi->review ?? null }}</td>

                                <td>
                                    @if ($multi->is_active == 1)
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    @elseif($multi->is_active == 0)
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    @endif
                                </td>


                                <td>
                                    <a href="/admin/setting/testmony/edit/{{ $multi->id }}"
                                        class="btn btn-primary btn-sm editProduct">Edit</a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var postURL = "<?php echo url('addmore'); ?>";
            var i = 1;


            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><input type="file" name="multiimage[]" placeholder="multiimage" class="form-control name_list" /></td><td><input type="text" name="title[]" placeholder="Title" class="form-control name_list" /></td><td><textarea class="form-control" col="10" row="3" name="description[]"></textarea></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


        });

        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection




@push('after-scripts')
    {{ script('assets/js/jscolor.js') }}
@endpush
