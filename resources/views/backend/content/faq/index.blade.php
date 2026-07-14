@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.faq.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea class="form-control" col="5" row="10" name="answer"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Page</label>
                            <select name="page_id" class="form-control">
                                <option value="">Select</option>
                                <option value="home">Home Page</option>
                                @foreach ($destination as $des)
                                    <option value="{{ $des->id }}">{{ $des->title }} Page</option>
                                @endforeach

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
                            <th>Page</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faq as $f)
                            <tr>
                                <td>
                                    @if ($f->page_id == 'home')
                                        Home Page
                                    @else
                                        @foreach ($destination as $des)
                                            @if ($f->page_id == $des->id)
                                                {{ $des->title }} Page
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $f->question ?? 'N/A' }}</td>
                                <td>{{ $f->answer ?? 'N/A' }}</td>
                                <td>
                                    @if ($f->is_active == 1)
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    @elseif($f->is_active == 0)
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="faq/edit/{{ $f->id }}" class="btn btn-success">
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

@endsection
