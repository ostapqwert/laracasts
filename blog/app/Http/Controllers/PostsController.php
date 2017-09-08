<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts'=>$posts]);
    }

    public function show()
    {
        return view('show.index');
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
