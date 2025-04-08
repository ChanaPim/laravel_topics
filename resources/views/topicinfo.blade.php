@extends('layouts')
@section('title','Topic Information')
@section('content')
<div class="container">
    @foreach ($topics as $item)
    <div class="mb-3">
        <a href="{{ url('/') }}" class="text-danger fw-bold">Topic list</a> / <span class="text-dark">{{ $item->topic_title }}</span>
    </div>
    <h5>Topic: {{ $item->topic_title }}</h5>          
    <div class="mb-2">{{ $item->content }}</div>
    <div class="text-end mb-4">Fri 21, Mar 2025 - HR    </div>
    
    @endforeach
    
    
    @foreach ($topic_comment as $item)
    <hr>
        <div class="mb-3">
            <strong>Comment#{{ $loop->iteration }}</strong>
            <p>{{ $item->comment }}</p>
            <div class="text-end text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('l d,M Y') }} - {{ $item->comment_by }}</div>
        </div>
    
    @endforeach
    <hr>
    <form method="POST" action="{{ route('comment', $id) }}">
        @csrf
        <div class="mb-3">
            <textarea name="comment" class="form-control" rows="4" placeholder="Comment"></textarea>
            @error('comment')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-red me-2">SAVE</button>
        <button type="reset" class="btn btn-outline-red">RESET</button>
    </form>
</div>
@endsection