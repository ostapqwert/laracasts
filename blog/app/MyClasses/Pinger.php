<?php

namespace App\MyClasses;

use GuzzleHttp\Client;

class Pinger
{

    protected $client;
    protected $url;

    public function __construct($url, Client $client)
    {
        $this->client = $client;
        $this->url = $url;
    }

    public function pingNow()
    {
        $response = $this->client->get($this->url);

        return $response->getBody();
    }
}