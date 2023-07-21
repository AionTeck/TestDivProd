@extends('layouts.layout')

@section('content')
    Main Page

    <a href="{{ route('req') }}">Send new request</a>
    <a href="{{ route('show') }}">Show all requests</a>

@endsection
