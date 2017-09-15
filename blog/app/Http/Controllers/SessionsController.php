<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
        //$this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if( ! Auth::attempt(request(['email', 'password']))){
            return redirect()->back()->withErrors(['message'=>'The incorect pass or login']);
        }

        return redirect()->home();
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->home();
    }
}
