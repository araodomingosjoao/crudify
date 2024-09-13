<?php

namespace AraoDomingos\Crudify\Providers;

use Illuminate\Support\ServiceProvider;
use AraoDomingos\Crudify\Commands\MakeCrudCommand;

class CrudifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeCrudCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../../config/crudify.php' => config_path('crudify.php'),
            ], 'crudify-config');

            $this->publishes([
                __DIR__.'/../../resources/stubs' => resource_path('crudify/stubs'),
            ], 'crudify-stubs');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/crudify.php', 'crudify'
        );
    }
}