@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">

        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $post->title }}</h2>

                <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">Jacob</a></p>

                <p>{{ $post->body }}</p>
            </div><!-- /.blog-post -->
        @endforeach


    </div>

    <hr>

@endsection


