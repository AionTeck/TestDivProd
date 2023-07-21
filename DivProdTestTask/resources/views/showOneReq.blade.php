@extends('layouts.layout')

@section('content')
    Requests page

        <div class="alert alert-dark">
            <h2>Massage from user {{ $data->name }}</h2>
            <p>{{ $data->email }}</p>
            <p>Status: {{ $data->status }}</p>
            <p>Massage:</br>{{ $data->message }}</p>
            <p><small>{{ $data->created_at }}</small></p>
            <a href="{{ route('answerMessage', $data->id)}}">Answer message</a>
        </div>

@endsection
