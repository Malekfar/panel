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
        $this->publishes([
            __DIR__.'/Auth' => base_path('app/Http/Controllers/Panel'),
        ]);
        $this->publishes([
            __DIR__.'/fa' => base_path('resources/lang/fa'),
        ]);
        $this->publishes([
            __DIR__.'/fonts' => base_path('public/fonts'),
        ]);
    }

    public function boot()
    {
        $this->app->make('Malekfar\Panel\PanelController');
    }
}
