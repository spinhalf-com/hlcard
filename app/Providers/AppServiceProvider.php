<?php

namespace App\Providers;

use App\HLCard\CardApi;
use App\HLCard\CardApiInterface;
use App\HLCard\GameManager;
use App\HLCard\GameManagerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GameManagerInterface::class, GameManager::class);
        $this->app->bind(CardApiInterface::class, CardApi::class);
    }
}
