@extends('layouts')
@section('title','Topic list')
@section('content')
<div class="container">
        <a href="{{ url('/topicform') }}" class="btn btn-danger mb-3">NEW TOPIC</a>
        <table class="table table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th style="width:60%">Topics</th>
                    <th>Comment</th>
                    <th>Last comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $item)
                <tr>
                    <td>
                    <a href="/topic/{{ $item->topic_id }}">{{ $item->topic_title }}</a>
                    </td>
                    <td align="center">{{ $item->comment_count }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('l d,M Y') }}</td>
                    
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection