@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{ $post->title }}">{{ $post->title }}</a></h2>

            <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">Jacob</a></p>

            <p>{{ $post->body }}</p>


        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->
    </div>

@endsection