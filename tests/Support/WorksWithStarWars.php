<?php

namespace Tests\Support;

use App\Http\Clients\StarWarsClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

trait WorksWithStarWars
{
    public function mockStarWars(): MockHandler
    {
        $mockHandler = new MockHandler();
        $client = new Client([
            'handler' => HandlerStack::create($mockHandler)
        ]);

        $this->app->singleton(StarWarsClient::class, function () use ($client) {
            return $client;
        });

        return $mockHandler;
    }
}
