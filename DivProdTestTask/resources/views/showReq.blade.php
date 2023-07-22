@extends('layouts.layout')

@section('content')

                        {{--  Все запросы  --}}
    Requests page
                                {{--  Кнопки выборки из контроллера ShowReqPageController.php  --}}
    <div class="mt-3">
        <a href="{{ route('show') }}">Show All</a>
        <a href="{{ route('show_active') }}">Active</a>
        <a href="{{ route('show_resolved') }}">Resolved</a>
        <a href="{{ route('byDateNewest') }}">Sort by newest requests</a>
    </div>


{{--  Вывод всех записей из таблицы  --}}
    @foreach($data as $element)

        <div class="alert alert-dark">
            <h2>Massage from user {{ $element->name }}</h2>
            <p>{{ $element->email }}</p>
            <p>Status: {{ $element->status }}</p>
            <p><small>{{ $element->created_at }}</small></p>
            <a href="{{ route('showMessage', $element->id)}}">Open message</a>
        </div>

    @endforeach
@endsection
