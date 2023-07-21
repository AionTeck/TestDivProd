@extends('layouts.layout')

@section('content')
    Answer for request

    <form action="{{ route('answerMessage_send', $data->id) }}" method="post">
        @csrf

        <div class="alert alert-dark">
            <h2>Massage from user {{ $data->name }}</h2>
            <p>{{ $data->email }}</p>
            <p>Status: {{ $data->status }}</p>
            <p>Massage:</br>{{ $data->message }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('answerMessage', $data->id)}}">Answer message</a>
        </div>

        <div class="form-group mt-2">
            <label for="text">Enter your comment</label>
            <textarea name="comment" id="comment" placeholder="Enter your message"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="status">Enter your solved</label>
            <input type="text" name="status" value="Resolved" id='status'>
        </div>

        <button type="submit">Send</button>
    </form>
@endsection
