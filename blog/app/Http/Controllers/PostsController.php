<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show()
    {
        return view('show.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        dd($request);

    }
}
