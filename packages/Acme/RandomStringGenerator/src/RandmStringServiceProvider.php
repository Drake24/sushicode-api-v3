<?php

namespace Acme\RandomStringGenerator;

use Illuminate\Support\ServiceProvider;

class RandomStringServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('randomstring', function () {
            return new RandomStringGenerator();
        });
    }

    public function boot()
    {
        //
    }
}
