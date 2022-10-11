<?php

namespace Tschope\IPTVCustomers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Tschope\IPTVCustomers\Middleware\CustomerMiddleware;
use Tschope\IPTVCore\Helpers\IPTVProviderBase;
use Tschope\IPTVCustomers\Dashs\Customers;
use Tschope\IPTVCustomers\Dashs\Plans;
use Tschope\IPTVCustomers\Commands\GenerateInvoces;

class IPTVProvider extends IPTVProviderBase
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMidleware();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
		$this->loadViewsFrom(__DIR__.'/resources/views', 'IPTV');
		$this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadJSONTranslationsFrom(__DIR__.'/resources/translations');
        $this->loadMenusFrom(__DIR__.'/resources/menu');
        $this->registerDashboard();
        $this->registerCommands();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register Midleware
     *
     * @return void
     */
    private function registerMidleware(){
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('client', CustomerMiddleware::class);
    }

    /**
     * Regoster Dashboard card
     *
     * @return void
     */
    private function registerDashboard(){
        $this->loadDashFrom(Customers::class);
        $this->loadDashFrom(Plans::class);
    }

    /**
     * Register Commands
     *
     * @return void
     */
    private function registerCommands(){
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateInvoces::class,
            ]);
        }
    }

}
