@extends('layouts.layout')

@section('content')
    Main Page

    <a href="{{ route('req') }}">Send new request</a>

    @if(Auth::user())
        <a href="{{ route('show') }}">Show all requests</a>
        <a href="{{ route('logout') }}">Выйти</a>
    @endif

    @if(!Auth::user())
    <a href="{{ route('register') }}">Register as admin</a>
    <a href="{{ route('login') }}">Login</a>
    @endif


@endsection
