@extends('master')
@section('content')

    @foreach($tasks as $task)
        <li><a href="/tasks/{{ $task->id }}"> {{ $task->body }}</a></li>
        @endforeach

@endsection

