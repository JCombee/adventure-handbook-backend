<?php

namespace App\Providers;

use App\DataAggregators\DataAggregatorManager;
use Illuminate\Support\ServiceProvider;

class DataAggregatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            DataAggregatorManager::class,
            static fn() => new DataAggregatorManager(config('data-aggregator.providers'))
        );
    }
}
