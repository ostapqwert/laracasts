@extends('layouts.master')

@section('content')


    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>

            <p class="blog-post-meta">{{ $post->created_at }} by <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a></p>

            <p>{{ $post->body }}</p>


        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

            <div class="comments">
                @foreach($post->comments as $comment)

                    <li class="list-group-item">
                        <strong> {{ $comment->created_at->diffForHumans() }}: </strong>

                        {{ $comment->body }}
                    </li>
                    @endforeach
            </div>

<hr>

            <div class="card">
                <div class="card-block">

                    @include('layouts.errors')

                    <form action="/posts/{{ $post->id }}/comments" method="POST">

                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="title">Your Comment here:</label>

                            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add comment</button>

                    </form>

                </div>
            </div>

    </div><!-- /.blog-main -->
    </div>

@endsection