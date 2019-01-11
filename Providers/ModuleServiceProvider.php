<?php

namespace Raffles\Modules\Nodobroker\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('nodobroker', 'Resources/Lang', 'app'), 'nodobroker');
        $this->loadViewsFrom(module_path('nodobroker', 'Resources/Views', 'app'), 'nodobroker');
        $this->loadMigrationsFrom(module_path('nodobroker', 'Database/Migrations', 'app'), 'nodobroker');
        $this->loadConfigsFrom(module_path('nodobroker', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('nodobroker', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
