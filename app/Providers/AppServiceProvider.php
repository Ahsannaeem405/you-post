<?php

namespace App\Providers;
use App\Models\User;
use App\Observers\UserObserver;
use App\Services\Facebookservice;
use App\Services\TwitterService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(Facebookservice::class, function () {
            return new Facebookservice();
        });

        $this->app->bind(TwitterService::class, function () {
            return new TwitterService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
