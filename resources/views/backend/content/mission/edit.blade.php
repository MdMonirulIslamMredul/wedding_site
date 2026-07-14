@extends('backend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Mission & Vision</h4>
        </div>
        <div class="card-body">

            @if(session('flash_success'))
                <div class="alert alert-success">{{ session('flash_success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.mission.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $mission->id }}">

                <div class="mb-3">
                    <label for="mission" class="form-label fw-bold">Mission</label>
                    <textarea name="mission" id="mission" class="form-control editor" rows="4">{{ old('mission_vision', $mission->mission_vision) }}</textarea>
                    @error('mission') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label fw-bold">Vision</label>
                    <textarea name="text" id="text" class="form-control editor2" rows="4">{{ old('text', $mission->text) }}</textarea>
                    @error('text') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label for="pdf_file" class="form-label fw-bold">Upload PDF (optional)</label>
                    <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                    @error('pdf_file') <small class="text-danger">{{ $message }}</small> @enderror
                    @if($mission->pdf_file)
                        <p class="mt-2">Current File: 
                            <a href="{{ asset('storage/mission_pdfs/' . $mission->pdf_file) }}" target="_blank">View PDF</a>
                        </p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="portfolio" class="form-label fw-bold">Portfolio File (optional)</label>
                    <input type="file" name="portfolio" class="form-control" accept="application/pdf">
                    @error('portfolio') <small class="text-danger">{{ $message }}</small> @enderror
                    @if($mission->portfolio)
                        <p class="mt-2">Current Portfolio: 
                            <a href="{{ asset('storage/mission_portfolios/' . $mission->portfolio) }}" target="_blank">View Portfolio</a>
                        </p>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
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
        $(document).ready(function () {
            simple_editor('.editor', 450);
            simple_editor('.editor2', 450);

            $('#datepicker-autoclose').datepicker({
                format: "dd/mm/yyyy",
                clearBtn: true,
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
@endpush
