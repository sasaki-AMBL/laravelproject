<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot(): void
    {
        if (request()->is('owner*')) {
            config(['session.cookie' => config('session.cookie_owner')]);
        } else {
            config(['session.cookie' => config('session.cookie')]);
        }
    }
}
