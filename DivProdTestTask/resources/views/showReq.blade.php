@extends('layouts.layout')

@section('content')
    Requests page

    @foreach($data as $element)
        @if($element->status == 'Resolved')
            @continue($element)
        @endif
        <div class="alert alert-dark">
            <h2>Massage from user {{ $element->name }}</h2>
            <p>{{ $element->email }}</p>
            <p>Status: {{ $element->status }}</p>
            <p><small>{{ $element->created_at }}</small></p>
            <a href="{{ route('showMessage', $element->id)}}">Open message</a>
        </div>
    @endforeach
@endsection
