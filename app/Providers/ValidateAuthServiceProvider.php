<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Validator\ValidateAuth;

class ValidateAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('validateauth', function () {
            return new ValidateAuth();
        });
    }
}
