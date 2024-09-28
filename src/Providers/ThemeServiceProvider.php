<?php

namespace Insyht\LittleLovey\Providers;

use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../../resources/js' => public_path('js/insyht/little-lovey'),
            ],
            'insyht-little-lovey'
        );
    }
}
