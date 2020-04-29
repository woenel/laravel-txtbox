<?php

namespace Woenel\TxtBox;

use Illuminate\Support\ServiceProvider;

class TxtBoxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/txtbox.php' => config_path('txtbox.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('TxtBox', 'Woenel\TxtBox');
    }
}