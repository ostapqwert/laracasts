<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    public function store(Team $team)
    {
        $this->authorize($team); // текущий юзер может вызвать store
        // https://laracasts.com/series/whip-monstrous-code-into-shape/episodes/7?autoplay=true
    }
}
