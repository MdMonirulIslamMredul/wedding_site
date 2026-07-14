@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form class="form-horizontal" action="{{ route('admin.mission.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Mission</label>
                        <textarea name="mission" class="form-control editor" rows="4">{{ old('mission') }}</textarea>
                        @error('mission') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Vision</label>
                        <textarea name="vision" class="form-control editor" rows="4">{{ old('vision') }}</textarea>
                        @error('vision') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>Portfolio File (optional)</label>
                        <input type="file" name="portfolio" class="form-control" accept="application/pdf">
                        @error('portfolio') <small class="text-danger">{{ $message }}</small> @enderror
                        <small class="text-muted">PDF, up to 10MB.</small>
                    </div>

                    <div class="form-group">
                        <label>Attach PDF (optional)</label>
                        <input type="file" name="pdf_file" class="form-control" accept="application/pdf">
                        @error('pdf_file') <small class="text-danger">{{ $message }}</small> @enderror
                        <small class="text-muted">PDF, up to 10MB.</small>
                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- List --}}
<div class="col-lg-12 mt-3">
    <div class="card">
        <div class="card-header">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mission/Vision</th>
                        <th>Description</th>
                        <th>Portfolio</th>
                        <th>PDF</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php use Illuminate\Support\Str; @endphp
                    @forelse($items as $i => $it)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ Str::limit($it->mission_vision, 60) }}</td>
                            <td>{!! Str::limit(strip_tags($it->text), 100) !!}</td>
                            <td>
                                @if($it->portfolio)
                                    <a href="{{ route('admin.mission.view.pdf', $it->portfolio) }}" target="_blank" class="btn btn-sm btn-secondary">View Portfolio</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($it->pdf_file)
                                    <a href="{{ route('admin.mission.view.pdf', $it->pdf_file) }}" target="_blank" class="btn btn-sm btn-secondary">View PDF</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.mission.edit', $it->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted">No data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('after-scripts')
    {!! script(asset('assets/plugins/tinymce/tinymce.min.js')) !!}
    <script>
        if (typeof tinymce !== 'undefined') {
            tinymce.init({ selector: '.editor', height: 300, menubar: false });
        }
    </script>
@endpush
