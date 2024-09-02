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
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/crudify.php', 'crudify'
        );
    }
}