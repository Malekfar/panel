<?php

namespace Malekfar\Panel;

use Illuminate\Support\ServiceProvider;

class PanelServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'panel');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/malekfar/panel'),
        ]);
        $this->publishes([
            __DIR__.'/admin' => base_path('public/admin'),
        ]);
    }

    public function boot()
    {
        $this->app->make('Malekfar\Panel\PanelController');
    }
}
