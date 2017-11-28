<?php

namespace App\Http\Controllers;

use App\MyClasses\Pinger;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Client $client)
    {
        $obj = new Pinger('http://www.checkip.org', $client);
        return $obj->pingNow();

    }
}
