<?php

namespace AmirAnbari\Panel;

use Illuminate\Support\ServiceProvider;

class PanelServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'panel');
        $this->publishes([
            __DIR__.'/controllers' => base_path('app/Http/Controllers/Panel/'),
            __DIR__.'/middleware' => base_path('app/Http/Middleware/'),
            __DIR__.'/commands' => base_path('app/Console/Commands/'),
            __DIR__.'/migrations' => base_path('database/migrations'),
            __DIR__.'/views' => base_path('resources/views/panel'),
            __DIR__.'/fa' => base_path('resources/lang/fa'),
            __DIR__.'/seeds' => base_path('database/seeds'),
            __DIR__.'/admin' => base_path('public/admin'),
            __DIR__.'/fonts' => base_path('public/fonts'),
            __DIR__.'/models' => base_path('app/Models/'),
            __DIR__.'/Tools' => base_path('app/Tools'),
            __DIR__.'/config' => base_path('config'),
        ]);

    }

    public function boot()
    {

    }
}
