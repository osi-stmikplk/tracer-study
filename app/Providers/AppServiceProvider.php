<?php

namespace STMIKPLK\Providers;

use Illuminate\Support\ServiceProvider;
use STMIKPLK\Authorization\Authorization;
use STMIKPLK\Factories\PostFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // register function_helpers yang menjadi pembantu untuk beberapa kebutuhan
        require_once __DIR__ .'/../Tools/function_helpers.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // register authorization
        $this->app->singleton('STMIKPLK\Authorization\AuthorizationInterface', function($app) {
            return new Authorization();
        });
        // service untuk PostFactory
        $this->app->singleton('STMIKPLK\Factories\PostFactory', function($app) {
            return new PostFactory();
        });
        // tambah blade
        // @runX($a=$b)
        \Blade::directive('runX', function($expression){
            return "<?php {$expression}; ?>";
        });
        // only load when we'are in local env
        if($this->app->environment()=='local')
        {
            $this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
        }
    }
}
