<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $this->validate(\request(),[
            'title' => 'required|min:5|max:150',
            'body' => 'required|min:5'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/');

    }
}
