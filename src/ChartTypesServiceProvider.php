<?php

namespace Vadiasov\ChartTypes;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class ChartTypesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
//        $router->aliasMiddleware('chart-types', \Vadiasov\ChartTypes\Middleware\ChartTypesMiddleware::class);

//        $this->publishes([__DIR__.'/Config/chartTypes.php' => config_path('chartTypes.php'),], 'chartTypes_config');
//        $this->publishes([__DIR__ . '/Translations' => resource_path('lang/vendor/chart-types'),]);
//        $this->publishes([__DIR__ . '/Views' => resource_path('views/vendor/chart-types'),]);
//        $this->publishes([__DIR__ . '/Assets' => public_path('vendor/chart-types'),], 'chartTypes_assets');
    
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'chartTypes');
        $this->loadViewsFrom(__DIR__ . '/Views', 'chart-types');
        
//        if ($this->app->runningInConsole()) {
//            $this->commands([
//                \Vadiasov\ChartTypes\Commands\ChartTypesCommand::class,
//            ]);
//        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__ . '/Config/chartTypes.php', 'chart-types');
        $this->app->make('Vadiasov\ChartTypes\Controllers\ChartTypesController');
        $this->app->make('Vadiasov\ChartTypes\Requests\ChartTypeRequest');
    }
}
