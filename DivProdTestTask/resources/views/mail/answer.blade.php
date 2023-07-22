<x-mail::message>
# Introduction

Hello, {{ $name }}

    Your question is:
        {{ $message }}


    Answer of your question:

        {{ $comment }}


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
