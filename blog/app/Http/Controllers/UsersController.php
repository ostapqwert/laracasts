<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store()
    {

        //create user

        User::register([
            'name' => 'Oleg',
            'email' => 'lego@cs.com',
            'password' => bcrypt('qwerty2')
        ]);

        // send welcome email


    }
}
