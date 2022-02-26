<?php

namespace App\Providers;

use App\DataAggregators\WikiApi\WikiApiDataProviderDataProviderHandler;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class WikiApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            WikiApiDataProviderDataProviderHandler::class,
            static fn(Application $app) => new WikiApiDataProviderDataProviderHandler(
                $app->make(Client::class),
                config('data-aggregator.handler.wiki-api.url')
            )
        );
    }
}
