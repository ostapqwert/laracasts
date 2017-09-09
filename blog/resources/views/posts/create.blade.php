@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">

     <h1>Create the post</h1>
        <hr>

        @include('layouts.errors')

        <form action="{{ route('posts.store') }}" method="POST">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>

                <input type="text" class="form-control" id="title" name="title">

            </div>


            <div class="form-group">
                <label for="title">Post:</label>

                <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Save post</button>
        </form>


    </div>
@endsection