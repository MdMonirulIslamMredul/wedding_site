@extends('backend.layouts.app')

@section('title', ' About Management')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.setting.faq.update') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $faq->id }}">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" name="question" value="{{ $faq->question }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea class="form-control" col="5" row="10" name="answer">{{ $faq->answer }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Page</label>
                            <select name="page_id" class="form-control">
                                <option value="">Select</option>
                                <option @if ($faq->page_id == 'home') selected @endif value="home">Home Page</option>
                                @foreach ($destination as $des)
                                    <option @if ($faq->page_id == $des->id) selected @endif value="{{ $des->id }}">
                                        {{ $des->title }} Page</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="is_active">
                                <option value="1" @if ($faq->is_active == 1) selected @endif>Active</option>
                                <option value="0" @if ($faq->is_active == 0) selected @endif>Deactive</option>
                            </select>
                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
