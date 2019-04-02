<?php

namespace Westhack\LaravelSwagger\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class SwaggerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
    }

    /**
     * Publish config file for the installer.
     *
     * @return void
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../Config/swagger.php' => base_path('config/swagger.php'),
        ], 'laravelswagger');

        $this->publishes([
            __DIR__.'/../assets' => public_path('assets/swagger'),
        ], 'laravelswagger');

        $this->publishes([
            __DIR__.'/../Views' => base_path('resources/views/vendor/swagger'),
        ], 'laravelswagger');

    }
}
