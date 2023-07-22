@extends('layouts.layout')

@section('content')
    Send request page


{{-- Вывод ошибок из валидатора контроллера SendReqPageController.php --}}


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--  Форма создания запроса  --}}
    <form action="{{ route('req_send') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Enter your name</label>
            <input type="text" name="name" placeholder="Your name here..." id="name">
        </div>
        <div class="form-group mt-2">
            <label for="email">Enter your email</label>
            <input type="text" name="email" placeholder="Your email here..." id='email'>
        </div>
        <div class="form-group mt-2">
            <label for="text">Enter your message</label>
            <textarea name="message" id="message" placeholder="Enter your message"></textarea>
        </div>

        <button type="submit">Send</button>
    </form>
@endsection
