@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">

        @include('layouts.errors')

    <h1>Registration</h1>

    <form action="/register" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="name">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="name">Password:</label>
            <input type="password" class="form-control" id="Password" name="password" required>
        </div>

        <div class="form-group">
            <label for="name">Password Confirmation:</label>
            <input type="password" class="form-control" id="Password" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Register</button>
        </div>
    </form>
    </div>

    @endsection
