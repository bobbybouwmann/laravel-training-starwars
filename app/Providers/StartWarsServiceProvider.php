<?php

namespace App\Providers;

use App\Http\Clients\StarWarsClient;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class StartWarsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->singleton(StarWarsClient::class, function ($app) {
            return new StarWarsClient([
                'base_uri' => $app['config']['starwars']['base_uri'],
                'headers' => [
                    'Accept' => 'application/json',
                ]
            ]);
        });
    }

    public function provides()
    {
        return [
            StarWarsClient::class,
        ];
    }
}
