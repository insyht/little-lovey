<?php

namespace Insyht\LittleLovey\Providers;

use Illuminate\Support\ServiceProvider;
use Insyht\LittleLovey\Console\InstallPlugin;
use Insyht\LittleLovey\Console\InstallTheme;

class LittleLoveyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../../public/vendor/insyht/little-lovey' => public_path('vendor/insyht/little-lovey'),
                __DIR__ . '/../../resources/js' => public_path('vendor/insyht/little-lovey/js')
            ],
            'insyht-little-lovey'
        );
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'insyht-little-lovey');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'insyht-little-lovey');

        // Todo Als Theme::fresh_install === true, dan het InstallTheme commando uitvoeren
        if ($this->app->runningInConsole()) {
            $this->commands(
                [
                    InstallTheme::class,
                ]
            );
        }
    }
}
