<?php

namespace AraoDomingos\Crudfiy\Providers;

use Illuminate\Support\ServiceProvider;
use AraoDomingos\Crudfiy\Commands\MakeCrudCommand;

class CrudfiyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeCrudCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../../config/crudfiy.php' => config_path('crudfiy.php'),
            ], 'crudfiy-config');

            $this->publishes([
                __DIR__.'/../../resources/stubs' => resource_path('vendor/crudfiy/stubs'),
            ], 'crudfiy-stubs');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/crudfiy.php', 'crudfiy'
        );
    }
}