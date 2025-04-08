@extends('layouts')
@section('title','Topic Form')
@section('content')
    <a href="{{ url('/') }}" class="text-danger fw-bold d-block mb-3">Back to main page</a>

    <form method="POST" action="/insert">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Topic</label>
            <textarea name="topic_title" id="topic_title" rows="1" class="form-control"></textarea>
        </div>
       @error('topic_title')
            <small class="text-danger">{{ $message }}</small>
       @enderror
        <div class="mb-3">
            <label for="topic_content" class="form-label fw-semibold">Content</label>
            <textarea name="topic_content" id="topic_content" rows="5" class="form-control" placeholder="Simple Content"></textarea>
            <pr>
            
        </div>
        @error('topic_content')
                <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="mb-3">
            <label for="create_by" class="form-label fw-semibold">Create By</label>
            <textarea name="create_by" id="create_by" rows="1" class="form-control" placeholder="Chana"></textarea>
            <pr>
            
        </div>
        <button type="submit" class="btn btn-red me-2">SAVE</button>
        <button type="reset" class="btn btn-outline-red">RESET</button>
    </form>
@endsection