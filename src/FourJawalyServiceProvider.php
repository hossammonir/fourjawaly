<?php

namespace HossamMonir\FourJawaly;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class FourJawalyServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register a class in the service container
        $this->app->bind('FourJawaly', function () {
            return new FourJawalyServices();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Unifonic services config to the application config
        $this->publishes([
            __DIR__.'/config/fourjawaly.php' => config_path('fourjawaly.php'),
        ]);

        $loader = AliasLoader::getInstance();
        $loader->alias('FourJawaly', 'HossamMonir\\FourJawaly\\Facades\\FourJawaly');
    }
}
