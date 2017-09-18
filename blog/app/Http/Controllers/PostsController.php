<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Repositories\PostsRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PostsRepository $posts)
    {
        $posts = $posts->all();
        //$posts = Post::latest()->filter(request()->all(['month', 'year']))->get();

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





//    use Illuminate\Contracts\Auth\Authenticatable;
//    public function store(NewPost $post, Authenticatable $user = null)
//    {
//        $user->publish($post);
//
//        return redirect('/');
//
//    }


    public function store()
    {


        $this->validate(request(),[
            'title' => 'required|min:5|max:150',
            'body' => 'required|min:5'
        ]);


        Auth::user()->publish(new Post(request(['title', 'body'])));

        return redirect('/');

    }
}
