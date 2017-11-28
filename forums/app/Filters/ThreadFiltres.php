<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFiltres extends Filters
{

    protected $filters = ['by'];

    /**
     * @param $username
     * @return mixed
     * @internal param $user
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }

}