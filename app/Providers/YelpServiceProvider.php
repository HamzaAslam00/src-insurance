<?php

namespace App\Providers;

use App\Services\YelpService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class YelpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(YelpService::class, function ($app) {
            $apiKey = env('YELP_API_KEY');
            return new YelpService(new Client(), $apiKey);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
