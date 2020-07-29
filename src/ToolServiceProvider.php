<?php

namespace Vladski\NovaXtra;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Vladski\NovaXtra\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-xtra');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });

        $this->publishes([
            __DIR__ . '/../resources/css' => resource_path('css/vendor/nova-xtra'),
        ]);
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('/nova-vendor/vladski/nova-xtra')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
