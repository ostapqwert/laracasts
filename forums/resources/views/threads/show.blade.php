@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b> {{ $thread->creator->name }} posted:</b> {{ $thread->title }}</div>
                    <div class="panel-body">{{ $thread->body }}

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @if(Auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-group" action="{{ $thread->path(). '/replies' }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body">Body text</label>
                        <textarea class="form-control" name="body" id="" cols="30" rows="5" placeholder="input body text..."></textarea>
                    </div>

                        <button type="submit" class="btn btn-primary">Post it</button>
                </form>
            </div>
        </div>
        @else
            <p class="text-center">Please <a href="{{ route('login') }}">SignIn</a></p>
        @endif

    </div>




@endsection
